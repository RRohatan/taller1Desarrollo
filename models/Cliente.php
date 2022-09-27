<?php
    class Cliente extends Conectar{

       

        public function create_cliente($Identificacion,$Nombre,$Apellidos,$Telefono,$Direccion){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="INSERT INTO clientes(
                Id_cliente,
                Identificacion,
                Nombre,
                Apellidos,
                Telefono, 
                Direccion) VALUES (NULL,?,?,?,?,?);";
            
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $Identificacion);
            $sql->bindValue(2, $Nombre);
            $sql->bindValue(3, $Apellidos);
            $sql->bindValue(4, $Telefono);
            $sql->bindValue(5, $Direccion);
            $sql->execute();
              
           
           $resultado = array(
               "Id_cliente" =>mysqli_insert_id($conectar->insert_Id), 
             "Identificacion"=>$Identificacion,
             "Nombre"=>$Nombre,
             "Apellidos"=>$Apellidos,
             "Telefono"=>$Telefono, 
             "Direccion"=>$Direccion
            );
            return $resultado;
            //mysqli_insert_id($sql)
           //return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function read_cliente(){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM clientes";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function Read_cliente_x_id($Id_cliente){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM clientes WHERE Id_cliente = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $Id_cliente);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

       

        public function update_cliente($Id_cliente,$Identificacion,$Nombre,$Apellidos,$Telefono,$Direccion){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="UPDATE clientes set
                Identificacion = ?,
                Nombre = ?,
                Apellidos = ?,
                Telefono = ?,
                Direccion = ?
                WHERE
                Id_cliente = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $Identificacion);
            $sql->bindValue(2, $Nombre);
            $sql->bindValue(3, $Apellidos);
            $sql->bindValue(4, $Telefono);
            $sql->bindValue(5, $Direccion);
            $sql->bindValue(6, $Id_cliente);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function delete_cliente($Id_cliente){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="DELETE  FROM clientes  WHERE Id_cliente = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $Id_cliente);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

    }
?>