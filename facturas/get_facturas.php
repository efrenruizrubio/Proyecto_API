<?php
require "../includes/connection.php";
require "../includes/requester.php";
$query = "SELECT id_factura, RFC_Exp, RFC_Rec, regimen, impuestos, cond_pago, metodo_pago FROM Factura";
$facturas = $db->fetchAll($query);
echo json_encode($facturas);
