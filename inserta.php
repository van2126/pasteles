<!DOCTYPE html> 
<meta charset="UTF-8">

<?php 

$con = mysqli_connect("localhost", "root","12345678","app") or die ("Error!"); 

?>

<html>
<head>
	<title>Aplicacion</title>
	</HEAD><H1><P ALIGN="CENTER"><FONT SIZE="7" COLOR="#8B0000" FACE="verdana"> Altas, Bajas y Consultas</H1><B><B></FONT> <B><B>
	</HEAD><H2><P ALIGN="CENTER"><FONT SIZE="7" COLOR="#8B0000" FACE="arial"> PASTELES DEL RUMBO</H2><B><B></FONT> <B><B>
	<meta charset="utf-8">
</head>
<body BACKGROUND="3030.JPG">
 <form method="POST" action="inserta.php">
	 <label>Nombre:<br></label>
	 <input type="text" name="nombre" placeholder = "Escriba su nombre"><br />
	 <label>Contraseña:<br> </label>
	 <input type="password" name="passw" placeholder = "Escriba su contraseña"><br />
	 <label>Email:<br></label>
	 <input type="text" name="email" placeholder = "Escriba su email"><br /><br>
	 <input type="submit" name="insert" value = "INSERTAR DATOS">


 </form>

<?php
	if(isset($_POST["insert"])){
		$usuario = $_POST["nombre"];
		$pass = $_POST["passw"];
		$email = $_POST["email"];

		$insertar = "INSERT INTO users (usuario,password,email) VALUES ('$usuario', '$pass', '$email')";
		$ejecutar = mysqli_query($con, $insertar);

		if ($ejecutar){
			echo "<h3>Insertado Correctamente</h3>";
		}
	}
?>
<br/>
<center><table width="500" border="2" style="background-color:	#98FB98; ">
	<tr>
		<th>Id</th>
		<th>Usuario</th>
		<th>Password</th>
		<th>Email</th>
		<th>Editar</th>
		<th>Borrar</th>
	</tr></center>
<?php

$consulta = "SELECT * FROM users";
$ejecutar = mysqli_query($con, $consulta);
$i = 0;
while ( $fila = mysqli_fetch_array($ejecutar)) {
	$id = $fila['id'];
	$usuario = $fila['usuario'];
	$password = $fila['password'];
	$email = $fila['email'];

	$i++;

?>
<tr align="center">
<td><?php echo $id; ?></td>
<td><?php echo $usuario; ?></td>
<td><?php echo $password; ?></td>
<td><?php echo $email; ?></td>
<td><a href="inserta.php?editar=<?php echo $id; ?>">Editar</a></td>
<td><a href="inserta.php?borrar=<?php echo $id; ?>">Borrar</a></td>
</tr>
<?php } ?>
</table>

<?php
if(isset($_GET['editar'])){
	include("editar.php");
}
?>

<?php
if(isset($_GET['borrar'])){
	$borrar_id = $_GET['borrar'];
	$borrar = "DELETE FROM users WHERE id = '$borrar_id'";
	$ejecutar = mysqli_query($con, $borrar);

	if ($ejecutar){
		echo "<script>alert('El usuario ha sido borrado!')</script>";
		echo "<script>windoows.open('inserta.php','_self')</script>";
	}

}
?>

<br><br><br><br><br>
<marquee DIRECTION="CENTER" FACE="Arial Unicode MS" BEHAVIOR="ALTERNATE" BGCOLOR ="ORANGE">
<FONT COLOR="BLACK">
<center> UNADEM. <br>
Materia:Programacion Web <br>
Maestro:Balam Mukulluis Alberto <br>
Alumno: Eduardo Espinosa Reyes <br>
Ingenieria En Telematica</FONT>
</marquee>
</body>
</html>

