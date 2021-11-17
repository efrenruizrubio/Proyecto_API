<?php
require "../includes/connection.php";
require "../includes/requester.php";
$params = Requester::getParams();
session_id($params->id);
session_start();
$id=$_SESSION['id'];

$query = "UPDATE usuario SET 
  nombre = '$params->nombre', 
  apellido = '$params->apellido', 
  username = '$params->usuario', 
  correo = '$params->correo'
  WHERE id_usuario = $id";

$db->doQuery($query);

Requester::endRequest(true);
?>