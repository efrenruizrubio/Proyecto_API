<?php
require "../includes/connection.php";
require "../includes/requester.php";
$params = Requester::getParams();

session_id($params->id);
session_start();
$id=$_SESSION['id'];

$query = "INSERT INTO factura (RFC_Exp, RFC_Rec, regimen, impuestos, cond_pago, metodo_pago, descripcion_producto, cantidad, valor_unitario, fk_id_usuario, nombre_empresa, direccion_empresa, ciudad_estado, zip_empresa, telefono_empresa, nombre_cliente, direccion_cliente, ciudad_cliente, zip_cliente, nombre_facturador) VALUES(
  '$params->rfc_exp',
  '$params->rfc_rec',
  '$params->regimen',
  '$params->impuestos',
  '$params->cond_pago',
  '$params->metodo_pago',
  '$params->descripcion',
  '$params->cantidad',
  '$params->valor',
  '$id',
  '$params->nombreEmpresa',
  '$params->direccionEmpresa',
  '$params->ciudadEstadoEmpresa',
  '$params->codigoPostalEmpresa',
  '$params->telefonoEmpresa',
  '$params->nombreCliente',
  '$params->direccionCliente',
  '$params->ciudadEstadoCliente',
  '$params->codigoPostalCliente',
  '$params->nombreFacturador')";

$result = $db->insert($query);
Requester::endRequest('correct', array(
  'result' => $result
));