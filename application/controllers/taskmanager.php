<?php

class Taskmanager_Controller extends Controller
{
    public function action_index()
    {
        $task = new \Taskmanager;
        
        $task->commannd = 'set_gogo';
        $task->period = 10;
        $task->status = 1;
        
        $task->save();
    }
}