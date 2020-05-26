<?php

require_once 'config/DB.php';

class Task{
    private static $operations;
    private $id_task;
    private $name;
    private $priority;
    private $description;
	
	public function __construct(){
		$this->db=DB::doConnect();
		//$this->task=array();
	}

	public static function Get()
    {
        //$sql = "CALL sp_select_all_task";
        $sql = "SELECT * FROM task";
        $mysqli = DB::doConnect()->query($sql);
        while($rows = $mysqli->fetch_assoc()){
            self::$operations[] = $rows;
        }
        return self::$operations;
    }
    
    public static function GetForId($id_task)
    {
        //$procedure = "CALL sp_get_forid_task($id_task)";
        $sql = "SELECT * FROM task WHERE id_task={$id_task}";
        $sql = DB::doConnect()->query($sql);
        while($rows = $sql->fetch_assoc()){
            self::$operations[] = $rows;
        }
        return self::$operations;
    }

    //Save operations generic
    public static function Save($values){
        $sql = "INSERT INTO task(id_task, name, priority, description) VALUES(
                            NULL,
                            '{$values['name']}', 
                            '{$values['priority']}', 
                            '{$values['description']}')";
        return DB::doConnect()->query($sql);
    }

    public static function Delete($id){
        $sql = "DELETE FROM task WHERE id_task={$id}";
        return DB::doConnect()->query($sql);
    }
}