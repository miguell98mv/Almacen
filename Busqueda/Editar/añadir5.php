<?php

include_once "../../database.php";

class Editar extends DB{


function añadir($producto_p,$unidad, $cantidad, $precio_c, $precio_v, $ganancias){

$query = $this->connect()->prepare("UPDATE almacen SET Unidad=:Unidad, Cantidad=:Cantidad, Precio_c=:Precio_c, Precio_v=:Precio_v, Ganancia=:Ganancia WHERE Nombre=:Nombre");

if($query->execute(["Unidad"=>$unidad, "Cantidad"=>$cantidad,"Precio_c"=>$precio_c, "Precio_v"=>$precio_v, "Ganancia"=>$ganancias, "Nombre"=>$producto_p])){
  return true;
}else{
  return false;
}

}

function añadir1($producto,$producto_p,$unidad, $cantidad, $precio_c, $precio_v, $ganancias){

$query = $this->connect()->prepare("UPDATE almacen SET Nombre=:Nombre1,Unidad=:Unidad, Cantidad=:Cantidad, Precio_c=:Precio_c, Precio_v=:Precio_v, Ganancia=:Ganancia WHERE Nombre=:Nombre");

if($query->execute(["Unidad"=>$unidad, "Cantidad"=>$cantidad,"Precio_c"=>$precio_c, "Precio_v"=>$precio_v, "Ganancia"=>$ganancias, "Nombre"=>$producto_p,"Nombre1"=>$producto])){
  return true;
}else{
  return false;
}

}

function update_imagen($producto_p,$unidad,$cantidad,$precio_c,$precio_v,$ganancias,$imagen){

$query = $this->connect()->prepare("UPDATE almacen SET Unidad=:Unidad, Cantidad=:Cantidad, Precio_c=:Precio_c, Precio_v=:Precio_v, Ganancia=:Ganancia,Imagen=:Imagen WHERE Nombre=:Nombre");

if($query->execute(["Unidad"=>$unidad, "Cantidad"=>$cantidad,"Precio_c"=>$precio_c, "Precio_v"=>$precio_v, "Ganancia"=>$ganancias, "Nombre"=>$producto_p,"Imagen"=>$imagen])){
  return true;
}else{
  return false;
}

}

function update_imagen1($producto,$producto_p,$unidad,$cantidad,$precio_c,$precio_v,$ganancias,$imagen){

$query = $this->connect()->prepare("UPDATE almacen SET Nombre=:Nombre1,Unidad=:Unidad, Cantidad=:Cantidad, Precio_c=:Precio_c, Precio_v=:Precio_v, Ganancia=:Ganancia,Imagen=:Imagen WHERE Nombre=:Nombre");

if($query->execute(["Unidad"=>$unidad, "Cantidad"=>$cantidad,"Precio_c"=>$precio_c, "Precio_v"=>$precio_v, "Ganancia"=>$ganancias, "Nombre"=>$producto_p,"Imagen"=>$imagen,"Nombre1"=>$producto])){
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
