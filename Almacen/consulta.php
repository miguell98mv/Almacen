<?php

include_once "../database.php";

class Consulta_db extends DB{

  function consulta(){
  $arreglo = array();

  $query = $this->connect()->query("SELECT * FROM almacen");
  while($r = $query->fetch()){
    array_push($arreglo, $r);
  }
  return $arreglo;
  }

}

 ?>
