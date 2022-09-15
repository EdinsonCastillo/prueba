<?php
//Archivo que permite validar la sesi�n

if(!isset($_SESSION['usuario']) || !isset($_SESSION['tipo']))
{
	header("Location: ../index.html");
	exit;
}
?>