<?php

    include("Bdatos.php");

    if(isset($_GET['id'])) {

        $id = $_GET['id'];
        $query = "DELETE FROM clientes WHERE id = $id";
        $resultadoborrar = mysqli_query($conexion, $query);

        if(!$resultadoborrar) {

            die("terminar busquedad");

        }


        $_SESSION['message'] = 'cliente borrado con exito';
        $_SESSION['message-type'] = 'danger';

        header("Location: clientes.php");

    }



?>