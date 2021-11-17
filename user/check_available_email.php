<?php
require "../includes/connection.php";
require "../includes/requester.php";
$params = Requester::getParams();
$query = "SELECT id_usuario FROM Usuario WHERE correo = '$params'";
$numberMail = $db->numRows($query);

if($numberMail){
  Requester::endRequest('fail', array(
    'estadoMail' => $numberMail == 0
  ));
}
if(!$numberMail){
  Requester::endRequest('success', array(
    'estadoMail' => $numberMail == 0
  ));
}