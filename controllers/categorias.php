<?php

    header('Content-Type: application/json');

    require_once ("../config/conexion.php");
    require_once ("../models/Categorias.php");

    $categoria = new Categorias();

    $body = json_decode(file_get_contents("php://input"), true);

    switch($_GET["op"]){
        case "GetAll":
            $datos = $categoria->get_categorias();
            echo json_encode($datos);
        break;

        case "GetId":
            $datos = $categoria->get_categorias_id($body["cat_id"]);
            echo json_encode($datos);
        break;

        case "InsertCate":
            $datos = $categoria->insert_categoria($body["nombre"],$body["observacion"]);
            echo "Datos Insertados Correctamente";
        break;

        case "UpdateCate":
            $datos = $categoria->update_categoria($body["id"],$body["nombre"],$body["observacion"],$body["estado"]);
            echo "Datos Actualizados Correctamente";
        break;
    }

?>