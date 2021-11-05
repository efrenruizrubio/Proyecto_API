<?php
  /* session_start();
  $sesion=session_id(); */
  require "../includes/connection.php";
  require "../includes/requester.php";
  $params = Requester::getParams();
  $query = "SELECT contra FROM usuario WHERE username = '$params->usuario'";

  $row = $db->fetchRow($query);
  if(!$row){
    /* session_unset(); */
    Requester::endRequest("not-found");
  }

  if($row->contra == $params->contra){
    $flag = true;
    /* $_SESSION['id'] = $row->id_usuario; */
  }else{
    $flag = false;
    /* session_unset(); */
  }

  $msg = $flag == false ? 'incorrect' : 'correct';
  Requester::endRequest($msg);
?>