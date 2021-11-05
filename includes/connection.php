<?php
class dbControl
{
    private $host = 'localhost';
    private $user = 'root';
    private $password = 'root';
    private $database = 'proyecto_sis1';
    private $port = '3307';

    private $con;

    function __construct()
    {
        $this->con = $this->connectDB();
        if (!empty($this->con)) {
            $this->selectDB();
        }
    }
    function connectDB()
    {
        $con = mysqli_connect($this->host, $this->user, $this->password, $this->database, $this->port) or die("falle");
        return $con;
    }
    function selectDB()
    {
        mysqli_select_db($this->con, $this->database);
    }

    function numRows($query)
    {
        $result = mysqli_query($this->con, $query);
        $rowcount = mysqli_num_rows($result);
        return $rowcount;
    }

    function fetchRow($query)
    {
        $result = mysqli_query($this->con, $query);
        $row = mysqli_fetch_object($result);
        return $row;
    }

    function escapeString($var)
    {
        return mysqli_real_escape_string($this->con, $var);
    }

    function doQuery($query)
    {
        return mysqli_query($this->con, $query);
    }

    function fetchRows($result)
    {
        return mysqli_fetch_array($result);
    }

    function insert($query){
        $this->doQuery($query);
        return mysqli_insert_id($this->con);
    }
    function showError(){
        return mysqli_error($this->con);
    }

    function fetchAll($query){
      $result = $this->doQuery($query);
      $objetos = array();
      while ($obj = mysqli_fetch_object($result)) {
        array_push($objetos,$obj);
      }
      return $objetos;
    }
}

$db = new dbControl();
