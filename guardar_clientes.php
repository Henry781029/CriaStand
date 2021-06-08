<?php

include ("Bdatos.php");

if (isset($_POST['guardar_clientes'])){

   $nombre = $_POST['nombre'];
   $apellido = $_POST['apellido'];
   $celular = $_POST['celular'];
   $RazaCanina = $_POST['RazaCanina'];
   $direccion = $_POST['direccion'];

   $query = "INSERT INTO clientes(nombre, apellido, celular, RazaCanina, direccion) VALUES ('$nombre', '$apellido', '$celular', '$RazaCanina', '$direccion')";
   $resultado = mysqli_query($conexion, $query);
   
   if (!$resultado) {

        die("busqueda fallida");

    }
    
    $_SESSION['message'] = 'Cliente guardado correctamente';
    $_SESSION['message_type'] = 'success';


    header("Location:clientes.php");

}
?>