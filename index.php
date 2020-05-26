<?php 
header("Access-Control-Allow-Origin: *"); 
header("Access-Control-Allow-Methods: *"); 
header("Access-Control-Allow-Headers: *");
header('Content-Type: application/json');

$_POST = json_decode(file_get_contents("php://input"),true);

require_once 'config/Auth.php';
require_once 'controllers/TaskController.php';
require_once 'controllers/ProductosController.php';

//Auth
//Auth::authenticate();

//Tareas
if(isset($_GET['task'])){
    echo TaskController::Index();
}if(isset($_GET['task?id_task'])){
    echo TaskController::Detail($_GET['task?id_task']);
}if(isset($_GET['task_post'])){
    if (!empty($_POST)) {
        TaskController::Create($_POST);
    }
}if(isset($_GET['task_del?id_task'])){
    TaskController::Delete($_GET['task_del?id_task']);
}  

//Productos
if(isset($_GET['productos'])){
    echo ProductosController::Index();
}if(isset($_GET['productos?id_producto'])){
    echo ProductosController::Detail($_GET['productos?id_producto']);
}if(isset($_GET['producto_post'])){
    if (!empty($_POST)) {
        ProductosController::Create($_POST);
    }
}if(isset($_GET['producto_del?id_producto'])){
    ProductosController::Delete($_GET['producto_del?id_producto']);
}  