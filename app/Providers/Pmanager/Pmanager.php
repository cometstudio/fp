<?php namespace App\Providers\Pmanager;

class Pmanager
{
    /*
    protected $_pid = 0;
    protected $_name;

    protected $_cmd = '';

    protected $_stderr = '/dev/null';

    private $_resource = null;
    private $_pipes = [];
    private $_waitpid = true;

    public function execute($cmd, $name = 'job')
    {
        $this->_cmd = $cmd;
        $this->_name = $name;

        // Descriptors setup
        $descriptorspec = [
            0 => ['pipe', 'r'],
            1 => ['file', storage_path('logs/normalProcessOutput.txt'), 'a'],
            2 => ['file', storage_path('logs/errorProcessOutput.txt'), 'a'],
        ];

        // Open a process with a command
        $this->_resource = proc_open('exec '.$this->_cmd . ' &', $descriptorspec, $this->_pipes, '/tmp');

        // Unblock descriptor(s)
        stream_set_blocking($this->_pipes[0], 0);

        if (!is_resource($this->_resource)) return false;

        // Get process status
        $proc_status = proc_get_status($this->_resource);

        // Get process id
        $this->_pid = isset($proc_status['pid']) ? $proc_status['pid'] : 0;

        for($i=0;$i<1;$i++) fclose($this->_pipes[$i]);

        // Close opened process
        proc_close($this->_resource);

        return $this->_pid;
    }
    */

    private $pid;
    private $command;

    /**
     * Run a command
     * @param string $command
     * @param bool $outputToFiles
     * @return $this
     */
    public function run($command = '', $outputToFiles = false)
    {
        if ($command != false){

            $this->command = $command;

            $sh = 'nohup '.$this->command.'  >';
            $sh .= empty($outputToFiles) ? '/dev/null' : storage_path('logs/tasks/out.txt');
            $sh .= ' 2>&1 & echo $!';

            //dd($sh);

            $op = $this->execute($sh);

            $this->pid = (int) $op[0];
        }

        return $this;
    }

    public function stop($pid)
    {
        if($this->status($pid)){
            $command = 'kill '.$pid;
    
            $this->execute($command);
        }

        return ($this->status($pid) == false) ? true : false;
    }

    public function setPid($pid = 0)
    {
        $this->pid = (int) $pid;
    }

    public function getPid()
    {
        return (int) $this->pid;
    }

    public function test()
    {
        return true;
    }

    public function status($pid)
    {
        $command = 'ps -p '.$pid;

        $op = $this->execute($command);

        return (empty($pid) || !isset($op[1])) ? false : true;
    }

    private function execute($command = '')
    {
        exec($command, $op);

        return $op;
    }
}