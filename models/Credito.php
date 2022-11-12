<?php
    class Credito extends Conectar{

       

        public function create_credito($Id_cliente,$Monto,$Entidad,$Fecha_inicial,$Fecha_final,$Modalidad,$Estado){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="INSERT INTO creditos(
            Id_credito,
            Id_cliente,
            Monto,
            Entidad,
            Fecha_inicial, 
            Fecha_final,
            Modalidad,
            Estado) VALUES (NULL,?,?,?,?,?,?,?);";
            
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $Id_cliente);
            $sql->bindValue(2, $Monto);
            $sql->bindValue(3, $Entidad);
            $sql->bindValue(4, $Fecha_inicial);
            $sql->bindValue(5, $Fecha_final);
            $sql->bindValue(6, $Modalidad);
            $sql->bindValue(7, $Estado);
            $sql->execute();
            $Id_credito=$conectar->lastInsertId();
            $resultado=array(
           "Id credito"=>$Id_credito,
           "Id cliente"=>$Id_cliente,
           "Monto" =>$Monto,
           "Entidad" =>$Entidad,
           "Fecha inicial" =>$Fecha_inicial,
           "Fecha final" =>$Fecha_final,
           "Modalidad" =>$Modalidad,
           "Estado" =>$Estado);
            return $resultado;
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

       

        public function update_credito($Id_credito,$Monto,$Entidad,$Fecha_inicial,$Fecha_final,$Modalidad,$Estado){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM creditos WHERE Id_credito = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $Id_credito);
            $sql->execute();
            $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);

            $conectar= parent::conexion();
            parent::set_names();
            $sql="UPDATE creditos set
                
                Monto = ?,
                Entidad = ?,
                Fecha_inicial = ?,
                Fecha_final = ?,
                Modalidad = ?,
                Estado = ?
                WHERE
                Id_credito = ?";
            $sql=$conectar->prepare($sql);
        
            $sql->bindValue(1, $Monto);
            $sql->bindValue(2, $Entidad);
            $sql->bindValue(3, $Fecha_inicial);
            $sql->bindValue(4, $Fecha_final);
            $sql->bindValue(5, $Modalidad);
            $sql->bindValue(6, $Estado);
            $sql->bindValue(7, $Id_credito); 
           
            $sql->execute();
            return $resultado;

          
        }

        public function delete_credito($Id_credito){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM creditos WHERE Id_credito = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $Id_credito);
            $sql->execute();
            $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);

            $conectar= parent::conexion();
            parent::set_names();
            $sql="DELETE  FROM creditos  WHERE Id_credito = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $Id_credito);
            $sql->execute();
            return $resultado;
        }

    }
?>