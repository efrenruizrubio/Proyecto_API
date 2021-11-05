<?php
  session_start();
  $sesion=session_id();
  require "../includes/connection.php";
  require "../includes/requester.php";
  $params = Requester::getParams();
  var_dump($params);
  $query = "SELECT id_usuario, contra FROM usuario WHERE username = '$params->usuario'";

  $row = $db->fetchRow($query);
  echo $query;
  if(!$row){
    session_unset();
    Requester::endRequest("not-found");
  }

  if($row->password == $params->contra){
    $flag = true;
    $_SESSION['id'] = $row->id_usuario;
  }else{
      $flag = false;
    session_unset();
  }

  $db->showError();
  $msg = $flag == false ? 'incorrect' : 'correct';
  Requester::endRequest($msg, array(
    'id' => $sesion
  ));
?>