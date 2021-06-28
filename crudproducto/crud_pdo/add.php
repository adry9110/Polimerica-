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

	if(isset($_POST['add'])){
		$database = new Connection();
		$db = $database->open();
		try{
			$cod_produ = $_POST['cod_produ'];
			$tipo = $_POST['tipo_produ'];
			$nombre = $_POST['nom_produ'];
			
			// hacer uso de una declaración preparada para evitar la inyección de sql
			$stmt = $db->prepare("INSERT INTO producto (cod_produ, tipo_produ, nom_produ) VALUES ('$cod_produ','$tipo', '$nombre')");
			// declaración if-else en la ejecución de nuestra declaración preparada
			$_SESSION['message'] = ( $stmt->execute(array(':cod_produ' => $_POST['cod_produ'] , ':tipo_produ' => $_POST['tipo_produ'] , ':nom_produ' => $_POST['nom_produ'],)) ) ? 'Miembro agregado correctamente' : 'Something went wrong. Cannot add member';	
	    
		}
		catch(PDOException $e){
			$_SESSION['message'] = $e->getMessage();
		}

		//cerrar conexión
		$database->close();
	}

	else{
		$_SESSION['message'] = 'Fill up add form first';
	}

	header('location: index.php');
	
?>
