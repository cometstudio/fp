<?php

namespace App\Providers\ProcessManager;

class Process
{
    protected $_pid = 0;
    protected $_name;

    protected $_cmd = '';

    protected $_stderr = '/dev/null';

    private $_resource = NULL;
    private $_pipes = array();
    private $_waitpid = TRUE;

    public function __construct($cmd, $name = 'job') {
        $this->_cmd = $cmd;
        $this->_name = $name;
    }

    public function __destruct() {

        // ожидаем завершения процесса

        if ($this->_resource) {
            if ($this->_waitpid && $this->isRunning()) {
                echo "Waiting for job to complete ";

                $status = NULL;
                pcntl_waitpid($this->_pid, $status);

                /*while ($this->isRunning()) {
                    echo '.';
                    sleep(1);
                }*/
                echo "\n";
            }
        }

        // закрываем дескрипторы

        if (isset($this->_pipes) && is_array($this->_pipes)) {
            foreach (array_keys($this->_pipes) as $index ) {
                if (is_resource($this->_pipes[$index])) {
                    fflush($this->_pipes[$index]);
                    fclose($this->_pipes[$index]);
                    unset($this->_pipes[$index]);
                }
            }
        }

        // закрываем открытый хэндлер

        if ($this->_resource) {
            proc_close($this->_resource);
            unset($this->_resource);
        }

    }

    public function pid() {
        return $this->_pid;
    }

    public function name() {
        return $this->_name;
    }

    // функция чтения из "трубы". $nohup отвечает за блокирование при чтении
    private function readPipe($index, $nohup = FALSE) {
        if (!isset($this->_pipes[$index])) return FALSE;

        if (!is_resource($this->_pipes[$index]) || feof($this->_pipes[$index])) return FALSE;

        if ($nohup) {
            $data = '';
            while ($line = fgets($this->_pipes[$index])) {
                $data .= $line;
            }

            return $data;
        }

        while ($data = fgets($this->_pipes[$index])) {
            echo $data;
        }
    }

    public function pipeline($nohup = FALSE) {
        return $this->readPipe(1, $nohup);
    }

    public function stderr($nohup = FALSE) {
        return $this->readPipe(2, $nohup);
    }

    // запуск задачи в новом процессе
    public function execute() {
        // определяем откуда будет читать и куда писать процесс
        $descriptorspec = array(
            0 => array('pipe', 'r'),  // stdin
            1 => array('pipe', 'w'),  // stdout
            2 => array('pipe', 'w') // stderr
        );


        $this->_resource = proc_open('exec '.$this->_cmd, $descriptorspec, $this->_pipes);

        // ставим неблокирующий режим всем дескрипторам
        stream_set_blocking($this->_pipes[0], 0);
        stream_set_blocking($this->_pipes[1], 0);
        stream_set_blocking($this->_pipes[2], 0);

        if (!is_resource($this->_resource)) return FALSE;

        $proc_status     = proc_get_status($this->_resource);
        $this->_pid      = isset($proc_status['pid']) ? $proc_status['pid'] : 0;
    }

    public function getPipe() {
        return $this->_pipes[1];
    }

    public function getStderr() {
        return $this->_pipes[2];
    }

    public function isRunning() {
        if (!is_resource($this->_resource)) return FALSE;

        $proc_status = proc_get_status($this->_resource);
        return isset($proc_status['running']) && $proc_status['running'];
    }

    // посылка сигнала процессу
    public function signal($sig) {
        if (!$this->isRunning()) return FALSE;

        posix_kill($this->_pid, $sig);
    }

    // отправка сообщения в STDIN процесса
    public function message($msg) {
        if (!$this->isRunning()) return FALSE;

        fwrite($this->_pipes[0], $msg);
    }
}
