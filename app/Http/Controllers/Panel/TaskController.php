<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;

use App\Http\Requests;
use Pmanager;
use App\Models\Task;

class TaskController extends Controller
{
    public function manage(Request $request, $id, $action)
    {
        if(empty($id)) throw new \Exception('Nothing to manage');
        if(empty($action)) throw new \Exception('No action');

        $task = Task::where('id', '=', $id)->first();

        if(empty($task)) throw new \Exception('Nothing to start');
        if(empty($task->command)) throw new \Exception('No command');

        $message = '';

        switch ($action){
            case 'start':
                if(Pmanager::status($task->pid)) throw new \Exception('The process has already started');

                if($task->pid = Pmanager::run($task->command, $task->output_to_a_file)->getPid()){
                    $task->started_at = time();
                }

                $task->update();
            break;
            case 'stop':
                if(empty($task->pid)) throw new \Exception('No pid to kill');

                Pmanager::stop($task->pid);
            break;
        }

        $pid = !empty($task->pid) && $task->pid ? $task->pid : null;

        return response()->json([
            'message'=>$message,
            'chunk'=>$this->renderTaskControlsChunk($task),
        ]);
    }

    /*
     * Check if a process of task with given id is currently running
     */
    public function check($id)
    {
        if(empty($id)) throw new \Exception('Nothing to check');

        $task = Task::where('id', '=', $id)->first();

        if(empty($task)) throw new \Exception('No task found');

        $running = !empty($task) ? Pmanager::status($task->pid) : false;

        return response()->json([
            'id'=>$task->id,
            'running'=>$running,
        ]);
    }

    private function renderTaskControlsChunk(Task $task)
    {
        return view('panel.manage.task.controls', [
            'task'=>$task
        ])->render();
    }
}
