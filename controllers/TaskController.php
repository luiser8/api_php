<?php

require_once 'models/Task.php';

class TaskController extends Task{

	public static function Index(){
		return json_encode(Task::Get(), JSON_PRETTY_PRINT);
	}

    public static function Detail($id_task){
		return json_encode(Task::GetForId($id_task), JSON_PRETTY_PRINT);
	}

	public static function Create($request){
        if(!empty($request)){
            Task::Save($request);
        }
        return $request;
    }

    public static function Delete($request){
        return Task::Delete($request);
    }
}