
<?php
session_start();
require_once("../../db/connection.php");
include("../../controller/validarSesion.php");
$sql = "SELECT * FROM user, tip_user WHERE user = '".$_SESSION['usuario']."' AND user.id_tip_user = tip_user.id_tip_user";
$usuarios = mysqli_query($mysqli, $sql);
$usua = mysqli_fetch_assoc($usuarios);


?>

<?php 
if((isset($_POST["guardar"]))&&($_POST["guardar"]==)

?>


<form method="POST">

    <tr>
        <td colspan='2' align="center"><?php echo $usua['nombres']?></td>
    </tr>
<tr><br>
    <td colspan='2' align="center">
    
    
        <input type="submit" value="Cerrar sesión" name="btncerrar" /></td>
        <input type="submit" formaction="../index.php" value="Regresar" />
    </tr>
</form>

<?php 

if(isset($_POST['btncerrar']))
{
	session_destroy();

   
    header('location: ../../index.html');
}
	
?>

</div>

</div>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos.css">
    <title>taller</title>
</head>
    <body>
        <section class="title">
            <h1>INTERFAZ    <?php echo $usua['tip_user']?></h1>
        </section>
		<table border = "1" class "center">
			<form name = "frm_usu" method "POST" autocomplete = "off">
				<tr>
					<th colspan = "2"> Crear tipo de usuarios</th>
				</tr>
				<tr>
					<th> Identificador</th>
					<th><input type="text" readonly></th>
				</tr>
				<tr>
					<th> Tipo de usuario</th>
					<th><input type="text" name= "tipo_usu" placeholder="Ingresar tipo de usuario"></th>
				</tr>
				
				<tr>
					<th colspan = "2"> &nbsp;</th>
					<th><input type="text" name= "tipo_usu" placeholder="Ingresar tipo de usuario"></th>
				</tr>
			
			
			</form>
		
		</table>
    
        
    </body>
</html>