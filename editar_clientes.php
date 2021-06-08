<?php

    include("Bdatos.php");

    if(isset($_GET['id'])) {

        $id = $_GET['id'];
        $query = "SELECT * FROM clientes WHERE id = $id";
        $resultadoeditar = mysqli_query($conexion, $query);

        if(mysqli_num_rows($resultadoeditar) == 1) {

            $row = mysqli_fetch_array($resultadoeditar);
            $nombre = $row['nombre'];
            $apellido = $row['apellido'];
            $celular = $row['celular'];
            $RazaCanina = $row['RazaCanina'];
            $direccion = $row['direccion'];    
              
        }
    }

    if (isset($_POST['actualizar'])) {

        $id = $_GET['id'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $celular = $_POST['celular'];
        $RazaCanina = $_POST['RazaCanina'];
        $direccion = $_POST['direccion'];

        $query = "UPDATE clientes set nombre = '$nombre', apellido = '$apellido', celular = '$celular', RazaCanina = '$RazaCanina', direccion = '$direccion' WHERE id = $id";
        mysqli_query($conexion, $query);

        $_SESSION['message'] ='cliente actualizado correctamente';
        $_SESSION['message_type'] = 'primary';

        header("Location: clientes.php");

    }

?>

<?php include("encabezados/header.php")?>

<div class="container p-4">
    <div class="row">
        <div class="col-md4 mx-auto">
            <div class="card card-body">
                <form action="editar_clientes.php?id=<?php echo $_GET['id'];?>" method="POST">
                    <div class="form-group">
                        <input type="text" name="nombre" value = "<?php echo $nombre?>" class = "form-control" placeholder = "Edite nombre">
                        <input type="text" name="apellido" value = "<?php echo $apellido?>" class = "form-control" placeholder = "Edite apellido">
                        <input type="text" name="celular" value = "<?php echo $celular?>" class = "form-control" placeholder = "Edite celular">
                        <input type="text" name="RazaCanina" value = "<?php echo $RazaCanina?>" class = "form-control" placeholder = "Edite RazaCanina">
                        <input type="text" name="direccion" value = "<?php echo $direccion?>" class = "form-control" placeholder = "Edite direccion">
                    </div>
                    <button class= "btn btn-success" name="actualizar">Editar</button>
                </form>
            </div>
        </div>
    </div>
</div>



<?php include("encabezados/footer.php")?>
