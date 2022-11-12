<?php
    class Cliente extends Conectar{

       

        public function create_cliente($Identificacion,$Nombre,$Apellidos,$Edad,$Telefono,$Direccion,$Email){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="INSERT INTO clientes(
                Id_cliente,
                Identificacion,
                Nombre,
                Apellidos,
                Edad,
                Telefono, 
                Direccion,
                Email) VALUES (NULL,?,?,?,?,?,?,?);";

          
           $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $Identificacion);
            $sql->bindValue(2, $Nombre);
            $sql->bindValue(3, $Apellidos);
            $sql->bindValue(4, $Edad);
            $sql->bindValue(5, $Telefono);
            $sql->bindValue(6, $Direccion);
            $sql->bindValue(7, $Email);
           
            $sql->execute();
            $Id_cliente=$conectar->lastInsertId();
            $resultado=array(
           "id_cliente"=>$Id_cliente,
           "Identificacion"=>$Identificacion,
           "Apellidos" =>$Apellidos,
           "Nombre" =>$Nombre,
           "Edad" =>$Edad,
           "Telefono" =>$Telefono,
           "Direccion" =>$Direccion,
           "Email" =>$Email);
           if (empty($resultado)) {
            echo '$var es o bien 0, vacía, o no se encuentra definida en absoluto';
        }
           return $resultado;
        
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

       

        public function update_cliente($Id_cliente,$Identificacion,$Nombre,$Apellidos,$Edad,$Telefono,$Direccion,$Email){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="UPDATE clientes set
                Identificacion = ?,
                Nombre = ?,
                Apellidos = ?,
                Edad = ?,
                Telefono = ?,
                Direccion = ?,
                Email = ?
                WHERE
                Id_cliente = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $Identificacion);
            $sql->bindValue(2, $Nombre);
            $sql->bindValue(3, $Apellidos);
            $sql->bindValue(4, $Edad);
            $sql->bindValue(5, $Telefono);
            $sql->bindValue(6, $Direccion);
            $sql->bindValue(7, $Email);
            $sql->bindValue(8, $Id_cliente);
           
            $sql->execute();
            $resultado=array(
                "Id_cliente_"=>$Id_cliente,
                "Identificacion"=>$Identificacion,
                "Apellidos" =>$Apellidos,
                "Nombre" =>$Nombre,
                "Edad" => $Edad,
                "Telefono" =>$Telefono,
                "Direccion" =>$Direccion,
                "Email" =>$Email);
                 return $resultado;
        }

        public function delete_cliente($Id_cliente){
       
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM clientes WHERE Id_cliente = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $Id_cliente);
            $sql->execute();
            $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);

            $conectar= parent::conexion();
            parent::set_names();
            $sql="DELETE  FROM clientes  WHERE Id_cliente = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $Id_cliente);
            $sql->execute();
           return $resultado;
        }

    }
?>