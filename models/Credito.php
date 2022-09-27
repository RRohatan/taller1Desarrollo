<?php
    class Credito extends Conectar{

       

        public function create_credito($Id_cliente,$Monto,$Porcentaje,$Fecha_inicial,$Fecha_venci,$Modalidad,$N_cuotas,$Email){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="INSERT INTO creditos(
            Id_credito,
            Id_cliente,
            Monto,
            Porcentaje,
            Fecha_inicial, 
            Fecha_venci,
            Modalidad,
            N_cuotas,
            Email) VALUES (NULL,?,?,?,?,?,?,?,?);";
            
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $Id_cliente);
            $sql->bindValue(2, $Monto);
            $sql->bindValue(3, $Porcentaje);
            $sql->bindValue(4, $Fecha_inicial);
            $sql->bindValue(5, $Fecha_venci);
            $sql->bindValue(6, $Modalidad);
            $sql->bindValue(7, $N_cuotas);
            $sql->bindValue(8, $Email);
            $sql->execute();

          
           return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function read_credito(){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM creditos";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function Read_credito_x_id($Id_credito){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM creditos WHERE Id_credito = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $Id_credito);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

       

        public function update_credito($Id_credito,$Monto,$Porcentaje,$Fecha_inicial,$Fecha_venci,$Modalidad,$N_cuotas,$Email){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="UPDATE creditos set
                
                Monto = ?,
                Porcentaje = ?,
                Fecha_inicial = ?,
                Fecha_venci = ?,
                Modalidad = ?,
                N_cuotas = ?,
                Email = ?
                WHERE
                Id_credito = ?";
            $sql=$conectar->prepare($sql);
           
            $sql->bindValue(1, $Monto);
            $sql->bindValue(2, $Porcentaje);
            $sql->bindValue(3, $Fecha_inicial);
            $sql->bindValue(4, $Fecha_venci);
            $sql->bindValue(5, $Modalidad);
            $sql->bindValue(6, $N_cuotas);
            $sql->bindValue(7, $Email);
            $sql->bindValue(8, $Id_credito); 
           
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function delete_credito($Id_credito){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="DELETE  FROM creditos  WHERE Id_credito = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $Id_credito);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

    }
?>