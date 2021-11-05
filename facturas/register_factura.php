<?php
require "../includes/connection.php";
require "../includes/requester.php";
$params = Requester::getParams();

$query = "INSERT INTO factura (RFC_Exp, RFC_Rec, regimen, impuestos, 
            cond_pago, metodo_pago) VALUES(
  '$params->rfc_exp',
  '$params->rfc_rec',
  '$params->regimen',
  '$params->impuestos',
  '$params->cond_pago',
  '$params->metodo_pago,')";

$result = $db->insert($query);
Requester::endRequest('correct');