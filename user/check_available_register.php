<?php
require "../includes/connection.php";
require "../includes/requester.php";
$params = Requester::getParams();
$query = "SELECT id_usuario FROM Usuario WHERE username = '$params->usuario'";
$number = $db->numRows($query);

$query = "SELECT id_usuario FROM Usuario WHERE correo = '$params->correo'";
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