<?php
require "../includes/connection.php";
require "../includes/requester.php";
$params = Requester::getParams();

$query = "SELECT * FROM factura WHERE id_factura = $params->id";
$prod = $db->fetchAll($query);
echo json_encode($prod);