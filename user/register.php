<?php
require "../includes/connection.php";
require "../includes/requester.php";
$params = Requester::getParams();

$hashed_password = password_hash($params->contra, PASSWORD_DEFAULT);
$query = "INSERT INTO usuario (nombre, apellido, contra, correo, username) VALUES(
  '$params->nombre',
  '$params->apellido',
  '$hashed_password',
  '$params->correo',
  '$params->usuario')";

$result = $db->insert($query);
Requester::endRequest('correct');