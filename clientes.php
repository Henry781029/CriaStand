<?php include("Bdatos.php")?>
<?php include("encabezados/header.php")?>
<div class="container p-4">
    <div class="row">
        <div class="col-md-4">
            <div class="card card-body">
                <form action="guardar_clientes.php" method = "POST">
                    <div class="form-group">
                        <input type="text" name = "nombre" class = "form-control" placeholder = "Nombre Cliente" autofocus>
                    </div>
                    <div class="form-group">
                        <input type="text" name = "apellido" class = "form-control" placeholder = "Apellido">
                    </div>
                    <div class="form-group">
                        <input type="text" name = "celular" class = "form-control" placeholder = "celular">
                    </div>
                    <div class="form-group">
                        <input type="text" name = "RazaCanina" class = "form-control" placeholder = "RazaCanina">
                    </div>
                    <div class="form-group">
                        <input type="text" name = "direccion" class = "form-control" placeholder = "direccion">
                    </div>
                    <input type="submit" class = "btn btn-warning btn-block" name = "guardar_clientes" value = "Guardar Cliente" >
                </form>
            </div> 

            <?php if(isset($_SESSION['message'])) { ?>

                <div class="alert alert-<?= $_SESSION['message_type'];?> alert-dismissible fade show" role="alert">
                <?= $_SESSION['message'] ?>
                <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden = "true">&times;</span>
                </button>
                
                </div>

            <?php  session_unset(); } ?>           

        </div>

        <div class="col-md-8">
            <table class="table table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">nombre</th>
                        <th scope="col">apellido</th>
                        <th scope="col">celular</th>
                        <th scope="col">RazaCanina</th>
                        <th scope="col">direccion</th>
                        <th scope="col">created</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    
                    $query = "SELECT * FROM clientes";
                    $resultadoClientes = mysqli_query($conexion, $query);

                    while($row = mysqli_fetch_array($resultadoClientes)) { ?>

                        <tr>
                        
                            <td><?php echo $row['id']?></td>
                            <td><?php echo $row['nombre']?></td>
                            <td><?php echo $row['apellido']?></td>
                            <td><?php echo $row['celular']?></td>
                            <td><?php echo $row['RazaCanina']?></td>
                            <td><?php echo $row['direccion']?></td>
                            <td><?php echo $row['created']?></td>
                            <td>

                                <a href="editar_clientes.php?id=<?php echo $row['id']?>" class= "btn btn-success">
                                <i class="fas fa-marker"></i>
                                </a>
                                <a href="borrar_clientes.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                                <i class="fas fa-trash-alt"></i>
                                </a>
                            
                            </td>
                        
                        </tr>


                   <?php }  ?>
                

                </tbody>
            </table>
        
        
        </div>
    
    </div>

</div>



<?php include("encabezados/footer.php")?>