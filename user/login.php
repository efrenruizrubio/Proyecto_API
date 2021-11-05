<?php
  session_start();
  $sesion=session_id();
  require "../includes/connection.php";
  require "../includes/requester.php";
  $params = Requester::getParams();
  $query = "SELECT id_usuario,contra FROM usuario WHERE username = '$params->usuario'";

  $row = $db->fetchRow($query);
  if(!$row){
    session_unset();
    Requester::endRequest("not-found");
  }

  $flag = password_verify($params->contra, $row->contra);
  if($flag){
    $_SESSION['id'] = $row->id_usuario;
  }else{
    session_unset();
  }

  $msg = $flag === false ? 'incorrect' : 'correct';
  Requester::endRequest($msg, array(
    'id' => $sesion
  ));
?>