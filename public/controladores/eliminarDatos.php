<?php
    session_start();
    if(!isset($_SESSION['logueado']) || $_SESSION['logueado'] != "true"){
        echo "<script>alert('No tiene permisos para ingresar');</script>";
        header("Location: login.php");
    }

?>
<!DOCTYPE html>
<html>
<head>
    <title>Eliminar datos de persona </title>
</head>
<body>
<?php
    //incluir conexión a la base de datos
    include '../../config/conexionBD.php';
    $cedula = $_GET["cedula"] ? mb_strtoupper(trim($_GET["cedula"]), 'UTF-8') : null;    
    $nombres = isset($_GET["nombres"]) ? mb_strtoupper(trim($_GET["nombres"]), 'UTF-8') : null;
    $apellidos = isset($_GET["apellidos"]) ? mb_strtoupper(trim($_GET["apellidos"]), 'UTF-8') : null;
    $direccion = isset($_GET["direccion"]) ? mb_strtoupper(trim($_GET["direccion"]), 'UTF-8') : null;
    $telefono = isset($_GET["telefono"]) ? trim($_GET["telefono"]): null;
    $correo = isset($_GET["correo"]) ? trim($_GET["correo"]): null;
    $fechaNacimiento = isset($_GET["fechaNacimiento"]) ? trim($_GET["fechaNacimiento"]): null;
    $contrasena = isset($_GET["contrasena"]) ? trim($_GET["contrasena"]) : null;
    $sql = "DELETE FROM DatosPersonales WHERE cedula = '$cedula'";

    if ($conn->query($sql) === TRUE) {
        echo "Se ha eliminado los datos personales correctamemte!!!<br>";     
    } else {        
        echo "Error: " . $sql . "<br>" . $conn->errno . "<br>";        
    }
    echo "<a href='home.php'>Regresar</a>";

    $conn->close();
    
?>
</body>
</html>