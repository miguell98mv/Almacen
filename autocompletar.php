<?php

include_once "database.php";


class Autocompletar extends DB{

  function buscar($texto){
    $res = array();
    $query = $this->connect()->prepare("SELECT * FROM almacen WHERE Nombre LIKE :texto");
    $query->execute(["texto" => $texto."%"]);

    if($query->rowCount()){
      while($r = $query->fetch()){
        array_push($res, $r["Nombre"]);
      }
    }

    return $res;
  }

  function consulta(){
  $arreglo = array();

  $query = $this->connect()->query("SELECT * FROM almacen");
  while($r = $query->fetch()){
    array_push($arreglo, $r);
  }
  return $arreglo;
  }

  function productos($texto){
    $res = array();
    $query = $this->connect()->prepare("SELECT * FROM almacen WHERE Nombre LIKE :texto");
    $query->execute(["texto" => $texto."%"]);

    if($query->rowCount()){
      while($r = $query->fetch()){
        array_push($res, $r);
       }
     }else{
       echo "<center><div style='padding:3%; background-color:white; width: fit-content; border-radius:20px; '><h1>No se encontro resultados con la palabra:</h1>"."<h2>".$_GET["resultado"]."</h2></div></center>";
     }
    return $res;
  }

  function producto_id($id){
    $res = array();
    $query = $this->connect()->prepare("SELECT * FROM almacen WHERE id=:id");
    $query->execute(["id" => $id]);

    if($query->rowCount()){
      while($r = $query->fetch()){
        array_push($res, $r);
       }
     }else{
       echo "<center><div style='padding:3%; background-color:white; width: fit-content; border-radius:20px; '><h1>No se encontro resultados con la palabra:</h1>"."<h2>".$_GET["resultado"]."</h2></div></center>";
     }
    return $res;
  }

  function ventas(){
  $arreglo = array();

  $query = $this->connect()->query("SELECT * FROM ventas ORDER BY Fecha DESC");
  while($r = $query->fetch()){
    array_push($arreglo, $r);
  }
  return $arreglo;
  }

  function ventas1($vendedor){
  $arreglo = array();

  $query = $this->connect()->prepare("SELECT * FROM ventas WHERE vendedor=:vendedor ORDER BY Fecha DESC");
  $query->execute(["vendedor"=>$vendedor]);
  while($r = $query->fetch()){
    array_push($arreglo, $r);
  }
  return $arreglo;
  }

  function fecha($fecha){
    $res = array();
  $query = $this->connect()->prepare("SELECT * FROM ventas WHERE Fecha LIKE :fecha ORDER BY Fecha DESC");
  $query->execute(["fecha"=>$fecha."%"]);

  while($r = $query->fetch()){
    array_push($res, $r);
   }
   return $res;
  }

  function fecha1($fecha,$vendedor){
    $res = array();
  $query = $this->connect()->prepare("SELECT * FROM ventas WHERE Fecha LIKE :fecha AND vendedor=:vendedor ORDER BY Fecha DESC");
  $query->execute(["fecha"=>$fecha."%","vendedor"=>$vendedor]);

  while($r = $query->fetch()){
    array_push($res, $r);
   }
   return $res;
  }

  function productos1($texto){
    $res = array();
    $query = $this->connect()->prepare("SELECT * FROM almacen WHERE Nombre LIKE :texto");
    $query->execute(["texto" => $texto]);

    if($query->rowCount()){
      while($r = $query->fetch()){
        array_push($res, $r);
       }
     }
    return $res;
  }

  function añadir_venta($nombre, $unidad, $cantidad, $precio_c, $precio_v, $ganancias, $vendedor){
   $query = $this->connect()->prepare("INSERT INTO ventas(Nombre,Unidad,Cantidad,Precio_c,Precio_v,Ganancias,vendedor) VALUES (:Nombre,:Unidad,:Cantidad,:Precio_c,:Precio_v,:Ganancias,:vendedor)");

   $query->execute(["Nombre"=>$nombre, "Unidad"=>$unidad, "Cantidad"=>$cantidad,"Precio_c"=>$precio_c,"Precio_v"=>$precio_v,"Ganancias"=>$ganancias,"vendedor"=>$vendedor]);

  }


  function cantidad_producto($texto){
    $res = array();
    $query = $this->connect()->prepare("SELECT Unidad FROM almacen WHERE Nombre LIKE :texto");
    $query->execute(["texto" => $texto]);

    if($query->rowCount()){
      while($r = $query->fetch()){
        array_push($res, $r);
       }
     }
    return $res;
  }

  function añadir1($unidad,$nombre){

  $query = $this->connect()->prepare("UPDATE almacen SET Unidad=:Unidad WHERE Nombre=:Nombre");

  if($query->execute(["Unidad"=>$unidad,"Nombre"=>$nombre])){
    return true;
  }else{
    return false;
  }}



  function añadir_factura($nombre, $unidad, $cantidad, $precio_c, $precio_v, $ganancias){
   $query = $this->connect()->prepare("INSERT INTO facturas(Nombre,Unidad,Cantidad,Precio_c,Precio_v,Ganancias) VALUES (:Nombre,:Unidad,:Cantidad,:Precio_c,:Precio_v,:Ganancias)");

   $query->execute(["Nombre"=>$nombre, "Unidad"=>$unidad, "Cantidad"=>$cantidad,"Precio_c"=>$precio_c,"Precio_v"=>$precio_v,"Ganancias"=>$ganancias]);

  }


  function fecha_facturas($fecha){
    $res = array();
  $query = $this->connect()->prepare("SELECT * FROM facturas WHERE Fecha LIKE :fecha ORDER BY Fecha DESC");
  $query->execute(["fecha"=>$fecha."%"]);

  while($r = $query->fetch()){
    array_push($res, $r);
   }
   return $res;
  }

  function fecha3($fecha){
    $res = array();
  $query = $this->connect()->prepare("SELECT * FROM facturas WHERE Fecha LIKE :fecha ORDER BY Fecha DESC");
  $query->execute(["fecha"=>$fecha."%"]);

  while($r = $query->fetch()){
    array_push($res, $r);
   }
   return $res;
  }

  function ventas_facturas(){
  $arreglo = array();

  $query = $this->connect()->query("SELECT * FROM facturas ORDER BY Fecha DESC");
  while($r = $query->fetch()){
    array_push($arreglo, $r);
  }
  return $arreglo;
  }


}

 ?>
