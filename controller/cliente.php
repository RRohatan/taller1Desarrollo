<?php
    header('Content-Type: application/json');

    require_once("../config/conexion.php");
    require_once("../models/Cliente.php");
    $cliente = new Cliente();

    $body = json_decode(file_get_contents("php://input"), true);

    switch($_GET["op"]){

        case "Create":
            $datos=$cliente->create_cliente($body["Identificacion"],$body["Nombre"],$body["Apellidos"],$body["Telefono"],$body["Direccion"]);
            
         $response = array("msj"=>"CLIENTE CREADO CON EXITO","data"=>$datos);
         echo json_encode($response);
                
        break;

        case "Read":
            $datos=$cliente->read_cliente();
            echo json_encode($datos);
        break;

        case "Read_Id":
            $datos=$cliente->Read_cliente_x_id($body["Id_cliente"]);
            echo json_encode($datos);
        break;

        case "Update":
            $datos=$cliente->update_cliente($body["Id_cliente"],$body["Identificacion"],$body["Nombre"],$body["Apellidos"],$body["Telefono"],$body["Direccion"]);
            echo json_encode("Update Correcto");
        break;

        case "Delete":
            $datos=$cliente->delete_cliente($body["Id_cliente"]);
            echo json_encode("Delete Correcto");
        break;

        

        
    }
        
?>
