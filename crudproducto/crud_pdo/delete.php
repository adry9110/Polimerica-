<?php

	session_start();
	include_once('connection.php');

	if(isset($_GET['cod_produ'])){
		$database = new Connection();
		$db = $database->open();
		try{
			$sql = "DELETE FROM producto WHERE cod_produ = '".$_GET['cod_produ']."'";
			// declaración if-else en la ejecución de nuestra consulta
			$_SESSION['message'] = ( $db->exec($sql) ) ? 'Miembro eliminado correctamente' : 'Ocurrió un error. No se pudo eliminar al miembro';
		}
		catch(PDOException $e){
			$_SESSION['message'] = $e->getMessage();
		}

		//cerrar conexión
		$database->close();

	}
	else{
		$_SESSION['message'] = 'Seleccione miembro para eliminar';
	}

	header('location: index.php');

?>