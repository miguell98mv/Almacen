<?php

  include_once "../../autocompletar.php";

  $calendario = new Autocompletar();

if(!isset($_POST["nombre"])){
   header("location: ../");
}

   $vendedor = $_POST["nombre"];
  $array = $calendario->fecha1($_POST["mostrar"],$vendedor);
  $total_array = sizeof($array);

  $fecha = $array[0]["Fecha"];
  $fecha = substr($fecha,0,10);
  $hoy = date("Y")."-".date("m")."-".date("d");

echo "
<div class='container my-1 text-center btn-danger w-50'>";
echo "<form method='POST' class='form_eliminar' action='' id='form".$fecha."'>
<input type='checkbox' id='$fecha' name='mostrar".$fecha."' value='".$fecha."' onchange='mostrarTodo(this)' style=' width: 0.0px;
 height: 0.0px;
 opacity: 0;
 overflow: hidden;
 position: absolute;
 z-index: -1;'>
 <input type='hidden' name='mostrar' value='".$_POST["mostrar"]."'>
  <input type='hidden' name='nombre' value='".$_POST["nombre"]."'>
<label for='$fecha'>
 <h2 style='margin-top:10px;'>".$fecha."</h2>
</label>
";
echo "</form></div>";
echo "<div id='menu".$fecha."' class='menu'>";


if(isset($_POST["mostrar".$fecha.""])){
$resultado = $calendario->fecha1($_POST["mostrar".$fecha.""],$vendedor);
echo "<table class='tabla text-center'><tr><th>Nombre</th><th>Unidad</th><th>Cantidad</th><th>Precio_c</th><th>Precio_v</th><th>Ganancias</th></tr>";
$t_unidad=0;$t_precio_c=0;$t_precio_v=0;$t_ganancias=0;
foreach ($resultado as $valor) {
require "resulta.php";
}
echo "<tr><td class='borde_bajo'><h4>Total</td></h4><td class='borde_bajo'><h4>".$t_unidad."</h4></td><td class='borde_bajo'><h4>Varios</h4></td>
<td class='borde_bajo'><h4>".$t_precio_c.".ps"."</h4></td><td class='borde_bajo'><h4>".$t_precio_v.".ps"."</h4></td><td class='borde_bajo'><h4>".$t_ganancias.".ps"."</h4></td></tr>";
echo "</table>";
}

echo "</div>";




  foreach ($array as $producto) {
    $fecha_p = substr($producto["Fecha"],0,10);
    if($fecha == $fecha_p){
  }else{
    $fecha = $fecha_p;
    echo "
    <div class='container my-1 text-center btn-danger w-50'>";
    echo "<form method='POST' class='form_eliminar' action='' id='form".$fecha."'>
    <input type='checkbox' id='$fecha' name='mostrar".$fecha."' value='".$fecha."' onchange='mostrarTodo(this)' style=' width: 0.0px;
     height: 0.0px;
     opacity: 0;
     overflow: hidden;
     position: absolute;
     z-index: -1;'>
     <input type='hidden' name='mostrar' value='".$_POST["mostrar"]."'>
       <input type='hidden' name='nombre' value='".$_POST["nombre"]."'>
    <label for='$fecha'>
     <h2 style='margin-top:10px;'>".$fecha."</h2>
    </label>
    ";
    echo "</form></div>";
    echo "<div id='menu".$fecha."' class='menu'>";

    if(isset($_POST["mostrar".$fecha.""])){
    $resultado = $calendario->fecha1($_POST["mostrar".$fecha.""],$vendedor);
    echo "<table class='tabla text-center'><tr><th>Nombre</th><th>Unidad</th><th>Cantidad</th><th>Precio_c</th><th>Precio_v</th><th>Ganancias</th></tr>";
    $t_unidad=0;$t_precio_c=0;$t_precio_v=0;$t_ganancias=0;
    foreach ($resultado as $valor) {
    require "resulta.php";
    }
    echo "<tr><td class='borde_bajo'><h4>Total</td></h4><td class='borde_bajo'><h4>".$t_unidad."</h4></td><td class='borde_bajo'><h4>Varios</h4></td>
    <td class='borde_bajo'><h4>".$t_precio_c.".ps"."</h4></td><td class='borde_bajo'><h4>".$t_precio_v.".ps"."</h4></td><td class='borde_bajo'><h4>".$t_ganancias.".ps"."</h4></td></tr>";
    echo "</table>";
    }

    echo "</div>";
  }
}

  ?>
  <script>
  function mostrarTodo(e){
        var id = "form" + e.value;
        console.log(id);
      var formulario = document.getElementById(id);
      formulario.submit();

  }

  </script>
