<?php
require "../includes/connection.php";
require "../includes/requester.php";
$values = Requester::getParams();
$query = "SELECT Id_usuario FROM usuario WHERE Usuario = '$values->user'";
$number = $db->numRows($query);

$query = "SELECT Id_usuario FROM usuario WHERE Correo = '$values->mail'";
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