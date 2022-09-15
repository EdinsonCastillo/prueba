<?php
  
  require_once("db/connection.php");

    $control = "SELECT * From tipo_usuario WHERE id_tipousu > 3";
    $query=mysqli_query($mysqli,$control);
    $fila=mysqli_fetch_assoc($query);

    if ((isset($_POST["MM_insert"]))&&($_POST["MM_insert"]=="formreg"))
    {   
        $idusu=     $_POST['idusuario'];
        $nombre=    $_POST['Nombres'];
        $apellido=  $_POST['Apellidos'];
        $direccion=  $_POST['Direccion'];
        $usuario=   $_POST['email'];
        $tipousu=   $_POST['tipousu'];
        $telefono=   $_POST['telefono'];
        $tarjeta=   $_POST['tarjeta'];
        $clave=     $_POST['clave'];
        $estado=   $_POST['estado'];
    
      

        $validar ="SELECT * FROM usuario WHERE id_usu='$idusu' or email ='$usuario'";
        $queryi=mysqli_query($mysqli,$validar);
        $fila1=mysqli_fetch_assoc($queryi);
    
       if ($fila1) {
           echo '<script>alert ("DOCUMENTO O USUARIO EXISTEN //CAMBIELOS//");</script>';
           echo '<script>windows.location="http://localhost/happypets/MVC-PHP/registrousu.php"</script>';
       }
        else if ($nombre=="" || $apellido=="" || $usuario=="" || $clave=="" || $idusu=="" || $direccion=="" 
                 || $tipousu=="" || $telefono=="" || $estado=="")
        {
            echo '<script>alert ("EXISTEN DATOS VACIOS");</script>';
            echo '<script>windows.location="/registrousu.php"</script>';
        }

        else
        {
           $insertsql="INSERT INTO usuario (id_usu, Nombres, Apellidos, Direccion, email, id_tipousu, Telefono, tp, clave, id_est) 
                      VALUES('$idusu','$nombre','$apellido','$direccion','$usuario','$tipousu','$telefono','$tarjeta','$clave','$estado')";
           mysqli_query($mysqli,$insertsql) or die(mysqli_error());
           echo '<script>alert (" Registro Exitoso, Gracias");</script>';
           echo '<script>window.location="index.html"</script>';
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
   
   <!--  <link rel="stylesheet" href="controller/css/style1.css"> -->
   <link rel="stylesheet" href="controller/css/style1.css"> 
    <title>Ingreso de Propietarios de Mascotas</title>
</head>
<body>
    <div class="login-box">
        <img src="controller/image/logo1.png" class="avatar" alt="Imagen Avar">
        <form method="POST" name="formreg" autocomplete="off" id="formreg">
            <h1 for="usuario"> REGISTRO DE USUARIOS </h1> 
            <table id= "tabla"  cellspacing="2" cellpadding="0"  >
                <tr aling="center" >
                    <td><input type="text" id= "tipo" name="tipo"  value= "Propietario de Mascota" required></td>
                    <td><input type="number" name="idusuario" placeholder="Ingrese identificación" required></td>
                </tr>
                <tr aling="center">
                    <td><input type="text" name="Nombres" placeholder="Ingrese sus Nombres" required></td>
                    <td><input type="text" name="Apellidos" placeholder="Ingrese sus Apellidos" required></td>
                </tr>
                <tr aling="center">
                    <td><input type="text" name="Direccion" placeholder="Ingrese la dirección de residencia" required></td>
                    <td><input type="number" name="telefono" placeholder="Ingrese el teléfono" required></td>
                </tr>
                <tr aling="center">
                    <td> <input type="text" name="email" placeholder="Ingrese un email válido" required></td>
                    <td><input type="password" name="clave" placeholder="Ingrese una clave" required></td>    
                </tr>
            </table>
            <input type="hidden" name="estado" placeholder="Ingrese Nombres Completos" value="1">
            <input type="hidden" name="tarjeta" placeholder="Ingrese tarjeta profesional" value="">
            <input type="submit" name="validar" value="Registrarme" >
            <input type="hidden" name="MM_insert" value="formreg">
            <input type="hidden" name="tipousu" id="tipousu" value="4">  
        </form>
    </div>
</body>
</html>