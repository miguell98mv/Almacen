<?php

  include_once "../../autocompletar.php";

  $calendario = new Autocompletar();
date_default_timezone_set("America/Bogota");
  $hoy = date("Y")."-".date("m")."-".date("d");

$vendedor = $_POST["nombre"];

include_once "resivir.php";
  echo "
  <div class='container1'>";
  if(isset($_POST["producto"]) && isset($_POST["unidad"]) && isset($_POST["cantidad"])
  && isset($_POST["precio_c"]) && isset($_POST["precio_v"]) && isset($_POST["ganancias"])){

  $nombre=ucwords(mb_strtolower($_POST["producto"]));
  $unidad=$_POST["unidad"];
  $cantidad=$_POST["cantidad"];
  $precio_c=$_POST["precio_c"];
  $precio_v=$_POST["precio_v"];
  $ganancias=$_POST["ganancias"];

  $unidad_db = $calendario->cantidad_producto($nombre);

  if(!$unidad_db ==null){
  $unidad_p = $unidad_db[0]["Unidad"];
  $unidad_p = $unidad_p-$unidad;
  if($unidad_p<=0){
    $unidad_p=0;
  }
  if($calendario->añadir1($unidad_p,$nombre)){
  $calendario->añadir_venta($nombre,$unidad,$cantidad,$precio_c,$precio_v,$ganancias,$vendedor);
  echo "<p style='margin-left:25px; color:#00cc00;'>Nuevo registro agregado<p>";
}else{
"<p style='margin-left:25px;'>No se pudo guardar el registro<p>";
}
}else{
  echo "<p style='margin-left:25px;'>Este producto no esta registrado en el almacen<p>";
}}
  echo"
  <form action='' id='formMostrarTodo' method='POST'>
   <input name='producto' class='menus' onkeyup='return añadir();' onclick='return añadir();' id='tag' type='text' placeholder='Nombre' value='' style='  display: inline-block;'>
   <input autocomplete='off' name='unidad' type='text' class='menus' id='Unidad' value='' placeholder='Unidad' style='  display: inline-block;'>
   <input autocomplete='off' name='cantidad' type='text' class='menus' id='Cantidad' placeholder='Cantidad' style='  display: inline-block;'>
   <input autocomplete='off' name='precio_c' type='text' class='menus' id='Precio_c' placeholder='Precio_c' style='  display: inline-block;'>
   <input autocomplete='off' name='precio_v' type='text' class='menus' id='Precio_v' placeholder='Precio_v' style='  display: inline-block;'>
      <input autocomplete='off' name='ganancias' type='text' class='menus' id='Ganancia' placeholder='Ganancia' style='  display: inline-block;'><br>
      <input type='hidden' name='nombre' value='".$_POST["nombre"]."'>
      <input type='submit' id='Envio' placeholder='Añadir' style='  display: inline-block;'>
   <form>";
  echo "</div>";

echo "<center>
<div class='container'>
 <h2 style='margin-top:10px;'>Hoy</h2>";echo "</div>";
echo "</div>";

$arreglo = $calendario->consulta();
$array =array();
foreach ($arreglo as $a) {
   array_push($array,utf8_encode($a["Nombre"]));
}
$resultado = $calendario->fecha1($hoy,$vendedor);
echo "<table class='tabla text-center'><tr><th>Nombre</th><th>Unidad</th><th>Cantidad</th><th>Precio_c</th><th>Precio_v</th><th>Ganancias</th></tr>";
$t_unidad=0;$t_precio_c=0;$t_precio_v=0;$t_ganancias=0;
foreach ($resultado as $valor) {
require "resulta.php";
}
echo "<tr><td class='borde_bajo'><h4>Total</td></h4><td class='borde_bajo'><h4>".$t_unidad."</h4></td><td class='borde_bajo'><h4>Varios</h4></td>
<td class='borde_bajo'><h4>".$t_precio_c.".ps"."</h4></td><td class='borde_bajo'><h4>".$t_precio_v.".ps"."</h4></td><td class='borde_bajo'><h4>".$t_ganancias.".ps"."</h4></td></tr>";
echo "</table>";

echo "</div></center>";


  ?>
<p id="respa"></p>
  <script type="text/javascript">

$(document).ready(function(){
 var items = <?= json_encode($array) ?>;
 $("#tag").autocomplete({
   source: items
 });


});

function añadir(){

  var nombre= document.getElementById("tag").value;
  var dataen = 'tag='+nombre;
  $.ajax({
    type:'POST',
    url:'resivir.php',
    data:dataen,
    success:function(resp){
      $("#respa").html(resp);
    }

  });  return false
}
//setInterval('añadir()',1);//Cada milisegundo se ejecuta esta funcion
  </script>
