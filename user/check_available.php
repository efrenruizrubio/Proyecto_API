<?php
require "../includes/connection.php";
require "../includes/requester.php";
$values = Requester::getParams();
$query = "SELECT id_usuario FROM Usuario WHERE username = '$values->user'";
$number = $db->numRows($query);

$query = "SELECT id_usuario FROM Usuario WHERE correo = '$values->mail'";
$numberMail = $db->numRows($query);

if($number||$numberMail){
  Requester::endRequest('fail', array(
    'estadoUser' => $number == 0,
    'estadoMail' => $numberMail == 0
  ));
}
if(!$number||!$numberMail){
  Requester::endRequest('success', array(
    'estadoUser' => $number == 0,
    'estadoMail' => $numberMail == 0
  ));
}