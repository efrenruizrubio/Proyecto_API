<?php
require "../includes/requester.php";
if(isset($_COOKIE['PHPSESSID'])){
  session_start();
  if(isset($_SESSION['id'])){
    Requester::endRequest(true);
  }
}
Requester::endRequest(false);