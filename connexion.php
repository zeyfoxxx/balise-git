<?php
function connexpdo($base,$param)
{
  include_once($param.".inc.php");
  $base='testgraph';
  $dsn="mysql:host=".HOST.";dbname=".$base;
  $user='root';
  $pass='snir';
  try
  {
    $idcom = new PDO("mysql:host=localhost;dbname=anychart_db","root","snir");
    return $idcom;
  }
  catch(PDOException $except)
  {
    echo"Echec de la connexion",$except->getMessage();
    return FALSE;
    exit();
  }
}
?>
