<?php
$http_origin = $_SERVER['HTTP_ORIGIN'];
if ($http_origin == "http://localhost:3000" || $http_origin == "https://tryme.com.mx" || $http_origin == "http://localhost:3001")
{  
  header("Access-Control-Allow-Origin: $http_origin");
}
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method, Authorization");
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header('content-type: application/json; charset=utf-8');
header('Access-Control-Allow-Credentials: true');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
  die();
}

class Requester{
  /**
   * Esta funcion imprime un arreglo assoc con indice status utilizanod el $msg enviado, opcionalmente se puede
   * enviar una arreglo con mas informacion al cual se le agregará el indice status con el msg
   * Ademas, TERMINA la ejecucion del script para terminar la peticion;
   * @param Any variable que determina el status
   * @param Array arreglo con informacion adicional
   */
  static function endRequest($msg, $array = array()){
    $array['status'] = $msg;
    echo json_encode($array);
    die();
  }

  /**
   * Esta funcion entra el body de la request y hace json_decode 
   * a los datos que se mandan en la request para retornar un objeto
   * @return Object objeto con los datos enviados en la request
   */
  static function getParams(){
    return json_decode(file_get_contents("php://input"));
  }


}

