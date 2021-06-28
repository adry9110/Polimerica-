<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title> CRUD PRODUCTO</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/custom.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/font-awesome.css">
</head>
<body>
<div class="container">
	<nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
  		<a class="navbar-brand" href="code.html" target="_blank">Polimerica</a>
  		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
    		<span class="navbar-toggler-icon"></span>
  		</button>

	  	<div class="collapse navbar-collapse" id="navbarColor02">
		    <ul class="navbar-nav mr-auto">
		      	<li class="nav-item">
		        <a class="nav-link" href="https://www.youtube.com/channel/UCoBEy_rD5FsKHFHtTPTimjQ/videos?spfreload=10" target="_blank"></a>
		      	</li>
		      	<li class="nav-item dropdown">
	              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" id="download" aria-expanded="false"> <span class="caret"></span></a>
	              <div class="dropdown-menu" aria-labelledby="download">
	                <a class="dropdown-item" href="https://www.facebook.com/AnthonCode" target="_blank"></a>
	                <div class="dropdown-divider"></div>
	                <a class="dropdown-item" href="https://www.youtube.com/c/AnthonCode" target="_blank"></a>
	                <div class="dropdown-divider"></div>
	                <a class="dropdown-item" href="https://AnthonCode.blogspot.com" target="_blank"></a>
	              </div>
	            </li>
		      	<li class="nav-item">
		        <a class="nav-link" href="http://facebook.com/anthoncode" target="_blank"><i class="fa fa-facebook-official"></i></a>
		      	</li>
		      	<li class="nav-item">
		        <a class="nav-link text-warning" href="code.html" target="_blank"><i class="fa fa-code"></i> </a>
		    </ul>
		    <form class="form-inline my-2 my-lg-0">
		      <input class="form-control mr-sm-2" placeholder="Search" type="text">
		      <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
		    </form>
	  	</div>
	</nav>
	<h1 class="page-header text-center">Listado Producción Polimerica s.a</h1>
	<div class="row">
		<div class="col-sm-12">
			<a href="#addnew" class="btn btn-primary" data-toggle="modal"><span class="fa fa-plus"></span> Nuevo</a>
            <?php 
                session_start();
                if(isset($_SESSION['message'])){
                    ?>
                    <div class="alert alert-dismissible alert-success" style="margin-top:20px;">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <?php echo $_SESSION['message']; ?>
                    </div>
                    <?php

                    unset($_SESSION['message']);
                }
            ?>
			<table class="table table-bordered table-striped" style="margin-top:20px;">
				<thead>
					<th>Codigo Producto</th>
					<th>Tipo De Producto</th>
					<th>Nombre del Producto</th>
					<th>Acción</th>
					
				</thead>
				<tbody>
					<?php
						// incluye la conexión
						include_once('connection.php');

						$database = new Connection();
    					$db = $database->open();
						try{	
						    $sql = 'SELECT * FROM producto';
						    foreach ($db->query($sql) as $row) {
						    	?>
						    	<tr>
						    		<td><?php echo $row['cod_produ']; ?></td>
						    		<td><?php echo $row['tipo_produ']; ?></td>
						    		<td><?php echo $row['nom_produ']; ?></td>
						    		<td>
						    			<a href="#edit_<?php echo $row['cod_produ']; ?>" class="btn btn-success btn-sm" data-toggle="modal"><span class="fa fa-edit"></span> Editar</a>
						    			<a href="#delete_<?php echo $row['cod_produ']; ?>" class="btn btn-danger btn-sm" data-toggle="modal"><span class="fa fa-trash"></span> Eliminar</a>
						    		</td>
						    		<?php include('edit_delete_modal.php'); ?>
						    	</tr>
						    	<?php 
						    }
						}
						catch(PDOException $e){
							echo "There is some problem in connection: " . $e->getMessage();
						}

						//cerrar conexión
						$database->close();

					?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<?php include('add_modal.php'); ?>
<script src="bootstrap/js/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.js"></script>
<script src="bootstrap/js/custom.js"></script>
</body>
</html>
