<?php
namespace Controllers;

use Config\conexion;
use Models\Cliente;

class ReportesController extends BaseController
{

    public function index()
    {
      echo $this->response('hola');
    }

    public function find()
    {
        if (!isset($_POST['fecha_ini']) || !isset($_POST['fecha_fin'])) {
            echo $this->response(['error' => ['mensaje' => 'Faltan datos']]);
            return;
        }
        $fecha_init = $_POST['fecha_ini'];
        $fecha_fin = $_POST['fecha_fin'];
        if (!$this->validar_fecha($fecha_init)){
            echo $this->response(['error'=>
                ["mensaje"=> "La fecha inicial no tiene el formato dd/mm/aaaa"]
            ]);
            return;
        }
        if (!$this->validar_fecha($fecha_fin)){
            echo $this->response(['error'=>
                ["mensaje"=> "La fecha final no tiene el formato dd/mm/aaaa"]
            ]);
            return;
        }
        $fecha_init = $this->restrucDate($fecha_init);
        $fecha_fin = $this->restrucDate($fecha_fin);

        $cliente = new Cliente();
        echo $this->response($cliente->get_cliente_x_for_timestamp_credito($fecha_init, $fecha_fin));
    }


    private function validar_fecha($fecha){
        $valores = explode('/', $fecha);
        if (count($valores) != 3) return false;
        if (strlen($valores[0]) != 2) return false;
        if (strlen($valores[1]) != 2) return false;
        if (strlen($valores[2]) != 4) return false;
        if (!checkdate($valores[1], $valores[0], $valores[2])) return false;
        return true;
    }

    private function restrucDate($fecha){
        $valores = explode('/', $fecha);
        return $valores[2].'/'.$valores[1].'/'.$valores[0];
    }

}