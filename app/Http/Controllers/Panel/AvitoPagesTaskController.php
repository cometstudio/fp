<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;

use App\Http\Requests;
use Pmanager;
use App\Models\AvitoPage;
use App\Models\AvitoPageQueue;

class AvitoPagesTaskController extends Controller
{
    public function manage($id, $action)
    {
        if(empty($id)) throw new \Exception('Nothing to manage');
        if(empty($action)) throw new \Exception('No action');

        $avitoPage = AvitoPage::where('id', '=', $id)->first();

        if(empty($avitoPage)) throw new \Exception('Nothing to start');

        $message = '';

        switch ($action){
            case 'start':
                $data = [
                    'url'=>$avitoPage->url,
                    'avito_page_id'=>$avitoPage->id,
                    'type'=>1,
                ];

                $avitoPageQueueItem = AvitoPageQueue::create($data);

                if(!empty($avitoPage->id)){
                    $avitoPage->started_at = time();
                    $avitoPage->update();
                }
            break;
            case 'drop':
                $query = "DELETE FROM avito_page_queue WHERE avito_page_id = {$id}";
                \DB::statement($query);

                $avitoPage->started_at = null;
                $avitoPage->update();

            break;
        }

        return response()->json([
            'message'=>$message,
            'chunk'=>$this->renderAvitoPagesTaskControlsChunk($avitoPage),
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

    private function renderAvitoPagesTaskControlsChunk(AvitoPage $avitoPage)
    {
        return view('panel.show.avitoPage.controls', [
            'item'=>$avitoPage
        ])->render();
    }

    private function renderTaskControlsChunk(Task $task)
    {
        return view('panel.manage.task.controls', [
            'task'=>$task
        ])->render();
    }
}
