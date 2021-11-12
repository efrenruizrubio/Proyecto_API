<?php
require "../includes/connection.php";
require "../includes/requester.php";
$params = Requester::getParams();

session_id($params->id);
session_start();
$id=$_SESSION['id'];

$query = "SELECT id_factura, RFC_Exp, RFC_Rec, regimen, impuestos, cond_pago, metodo_pago, fecha 
FROM Factura WHERE fk_id_usuario = $id";
$facturas = $db->fetchAll($query);
echo json_encode($facturas);
