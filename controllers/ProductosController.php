<?php

require_once 'models/Producto.php';

class ProductosController extends Producto{

	public static function Index(){
		return json_encode(Producto::Get(), JSON_PRETTY_PRINT);
	}

    public static function Detail($id_producto){
		return json_encode(Producto::GetForId($id_producto), JSON_PRETTY_PRINT);
	}

	public static function Create($request){
        if(!empty($request)){
            Producto::Save($request);
        }
        return $request;
    }

    public static function Delete($request){
        return Producto::Delete($request);
    }
}