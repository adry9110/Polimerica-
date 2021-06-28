<?php
session_start();
session_unset();
session_destroy();
header("location:../index.html");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>polimerica</title>
</head>
<body>
   <h1>Cerrar session</h1>
   
    <a href="cerrar.php"></a><br> 
</body>
</html>