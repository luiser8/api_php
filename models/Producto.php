<?php

require_once 'config/DB.php';

class Producto{
    private static $operations;
	
	public function __construct(){
		$this->db=DB::doConnect();
	}

	public static function Get()
    {
        //$sql = "CALL sp_select_all_task";
        $sql = "SELECT * FROM productos";
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
        $procedure = "CALL sp_insert_task(
                            '{$values['name']}', 
                            '{$values['priority']}', 
                            '{$values['description']}')";
        return DB::doConnect()->query($procedure);
    }

    public static function Delete($id){
        $sql = "DELETE FROM task WHERE id_task={$id}";
        return DB::doConnect()->query($sql);
    }
}