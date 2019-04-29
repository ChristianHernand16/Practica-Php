<?php
    session_start();    
    if(!isset($_SESSION['logueado']) || $_SESSION['logueado'] != "true"){
        echo "<script>alert('No tiene permisos para ingresar');</script>";
        header("Location: login.php");
    }
    include '../../config/conexionBD.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Modificar datos de persona</title>    
</head>

<body>
    <?php
        $cedula = $_GET["cedula"];
        $sql = "SELECT * FROM DatosPersonales where cedula='$cedula'";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            
            while($row = $result->fetch_assoc()) {
             ?>
                <form id="formulario01" method="POST" action="modificarDatos.php">
                    <label for="cedula">Cedula (*)</label>
                    <input type="text" id="cedula" name="cedula" value="<?php echo $row["cedula"]; ?>" disabled placeholder="Ingrese el número de cedula ..."/>
                    <br>

                    <label for="nombres">Nombres (*)</label>
                    <input type="text" id="nombres" name="nombres" value="<?php echo $row["nombres"]; ?>" placeholder="Ingrese sus dos nombres ..."/>
                    <br>
                    <label for="apellidos">Apelidos (*)</label>
                    <input type="text" id="apellidos" name="apellidos" value="<?php echo $row["apellidos"]; ?>" placeholder="Ingrese sus dos apellidos ..."/>
                    <br>
                 
                    <label for="direccion">Direccion (*)</label>
                    <input type="text" id="direccion" name="direccion" value="<?php echo $row["direccion"]; ?>" placeholder="Ingrese su  direccion ..."/>
                    <br>
                    <label for="telefono">Telefono (*)</label>
                    <input type="text" id="telefono" name="telefono" value="<?php echo $row["telefono"]; ?>" placeholder="Ingrese su número telefónico ..."/>
                    <br>     
                    <label for="correo">Correo electrónico (*)</label>
                    <input type="text" id="correo" name="correo" value="<?php echo $row["correo"]; ?>" placeholder="Ingrese su correo electrónico ..."/>
                    <br>
                    <br>     
                    <label for="fechaNacimiento">Fecha Nacimiento  (*)</label>
                    <input type="text" id="fechaNacimiento" name="fechaNacimiento" value="<?php echo $row["fechaNacimiento"]; ?>" placeholder="Ingrese su Fecha de Nacimiento ..."/>
                    <br>
                    <label for="correo">Contraseña (*)</label>
                    <input type="password" id="contrasena" name="contrasena" value="" placeholder="Ingrese su contraseña..."/>
                    <br>
                    <input type="submit" id="guardar" name="guardar" value="Guardar" />
                    <input type="button" id="regresar" name="regresar" value="Cancelar" onclick="location.href = 'home.php';" />
                </form>    

             <?php
            }
        } else {            
            echo "Ha ocurrido un error inesperado !";
        }
        $conn->close();         
    ?>                      

</body>
</html>