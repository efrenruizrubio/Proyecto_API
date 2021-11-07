<?php
require "../includes/connection.php";
require "../includes/requester.php";
$params = Requester::getParams();

$params = (int) $params;

$query = "SELECT * FROM factura WHERE id_factura = $params";
$prod = $db->fetchAll($query);
echo json_encode($prod);