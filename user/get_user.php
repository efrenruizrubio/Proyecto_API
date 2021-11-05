<?php
require "../includes/connection.php";
require "../includes/requester.php";
$params = Requester::getParams();
session_id($params->id);
session_start();
$id =$_SESSION['id'];

$query = "SELECT id_usuario, nombre, apellido FROM usuario WHERE id_usuario= $id ";
$prods = $db->fetchAll($query);
echo json_encode($prods);