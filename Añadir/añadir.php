<?php

include_once "../database.php";

class Anadir extends DB{


function añadir($producto, $unidad, $cantidad, $precio_c, $precio_v, $ganancias, $imagen){

$query = $this->connect()->prepare("INSERT INTO almacen(Nombre,Unidad,Cantidad,Precio_c,Precio_v,Ganancia,Imagen)
VALUES(:Nombre,:Unidad,:Cantidad,:Precio_c,:Precio_v,:Ganancia,:Imagen)");

if($query->execute(["Nombre"=>$producto, "Unidad"=>$unidad, "Cantidad"=>$cantidad,"Precio_c"=>$precio_c, "Precio_v"=>$precio_v, "Ganancia"=>$ganancias, "Imagen"=>$imagen])){
  return true;
}else{
  return false;
}

}

function revisar_imagen($imagen){
  $query = $this->connect()->prepare("SELECT * FROM almacen WHERE Imagen=:imagen");
  $query->execute(["imagen"=>$imagen]);

  if($query->rowCount() >0){
  return false;
}else{
  return true;
}
}

function revisar_nombre($producto){
  $query = $this->connect()->prepare("SELECT * FROM almacen WHERE Nombre=:nombre");
  $query->execute(["nombre"=>$producto]);

  if($query->rowCount() >0){
  return false;
}else{
  return true;
}
}



}


 ?>
