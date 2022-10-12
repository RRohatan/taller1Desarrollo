<?php
    header('Content-Type: application/json');

    require_once("../config/conexion.php");
    require_once("../models/Credito.php");
    $credito = new Credito();

    $body = json_decode(file_get_contents("php://input"), true);

    switch($_GET["op"]){

        case "Create":
            $datos=$credito->create_credito($body["Id_cliente"],$body["Monto"],$body["Porcentaje"],$body["Fecha_inicial"],$body["Fecha_venci"],$body["Modalidad"],$body["N_cuotas"],$body["Email"]);
            echo json_encode("CREDITO CREADO CON EXITO");
            echo json_encode($datos);  
        break;

        case "Read":
            $datos=$credito->read_credito();
            echo json_encode($datos);
        break;

        case "Read_Id":
            $datos=$credito->Read_credito_x_id($body["Id_credito"]);
            echo json_encode($datos);
        break;

        case "Update":
            $datos=$credito->update_credito($body["Id_credito"],$body["Monto"],$body["Porcentaje"],$body["Fecha_inicial"],$body["Fecha_venci"],$body["Modalidad"],$body["N_cuotas"],$body["Email"]);
            echo json_encode("Update Correcto");
            echo json_encode($datos);
        break;

        case "Delete":
            $datos=$credito->delete_credito($body["Id_credito"]);
            echo json_encode("Delete Correcto");
            echo json_encode($datos);
        break;

        

        
    }
        
?>