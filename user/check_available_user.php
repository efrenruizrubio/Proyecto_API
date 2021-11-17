<?php
require "../includes/connection.php";
require "../includes/requester.php";
$params = Requester::getParams();
$query = "SELECT id_usuario FROM Usuario WHERE username = '$params'";
$number = $db->numRows($query);

if($number){
  Requester::endRequest('fail', array(
    'estadoUser' => $number == 0
  ));
}
if(!$number){
  Requester::endRequest('success', array(
    'estadoUser' => $number == 0,
  ));
}