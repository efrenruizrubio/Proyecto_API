<?php
require "../includes/connection.php";
require "../includes/requester.php";
$params = Requester::getParams();
$opciones = [
  'cost' => 5,
];
$query = "INSERT INTO Usuario (nombre, apellido, contra, correo, username) VALUES (
  '$params->nombre', 
  '$params->apellido', 
  '$params->contra', 
  '$params->correo', 
  '$params->usuario');";
$result = $db->insert($query);
Requester::endRequest('correct');