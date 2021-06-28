
<?php
/*
| -----------------------------------------------------
| PROYECTO: 		PHP CRUD usando PDO y Bootstrap
| -----------------------------------------------------
| AUTOR:			Adriana Diaz Cardenas
| -----------------------------------------------------
*/
	session_start();
	include_once('connection.php');

	if(isset($_POST['edit'])){
		$database = new Connection();
		$db = $database->open();
		try{
			$cod_produ = $_POST['cod_produ'];
			$tipo = $_POST['tipo_produ'];
			$nombre = $_POST['nom_produ'];
			

			$sql = "UPDATE producto SET cod_produ = '$cod_produ',tipo_produ = '$tipo', nom_produ = '$nombre' WHERE cod_produ = '$cod_produ'";
			// declaración if-else en la ejecución de nuestra consulta
			$_SESSION['message'] = ( $db->exec($sql) ) ? 'Los datos se actualizaron' : 'Ocurrio un error. No se pudo actualizar';

		}
		catch(PDOException $e){
			$_SESSION['message'] = $e->getMessage();
		}

		//cerrar conexión 
		$database->close();
	}
	else{
		$_SESSION['message'] = 'Primero debe llenar el form';
	}

	header('location: index.php');

?>