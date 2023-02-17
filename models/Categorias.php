<?php

    class Categorias extends Conectar{

        public function get_categorias(){
            $conectar=parent::Conexion();
            parent::set_names();
            $sql="SELECT * FROM categorias WHERE estado = 1";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function get_categorias_id($cat_id){
            $conectar=parent::Conexion();
            parent::set_names();
            $sql="SELECT * FROM categorias WHERE estado = 1 AND id = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindParam(1,$cat_id);
            $sql->execute();
            return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function insert_categoria($nombre,$observacion){
            $conectar=parent::Conexion();
            parent::set_names();
            $sql="INSERT INTO categorias(nombre,observacion,estado) VALUES(?,?,'1')";
            $sql=$conectar->prepare($sql);
            $sql->bindParam(1,$nombre);
            $sql->bindParam(2,$observacion);
            $sql->execute();
            return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function update_categoria($id,$nombre,$observacion,$estado){
            $conectar=parent::Conexion();
            parent::set_names();
            $sql="UPDATE categorias SET nombre = ?, observacion = ?, estado = ? WHERE id = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindParam(1,$nombre);
            $sql->bindParam(2,$observacion);
            $sql->bindParam(3,$estado);
            $sql->bindParam(4,$id);
            $sql->execute();
            return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        }
    }


?>