<?php

  include_once "../autocompletar.php";

  $calendario = new Autocompletar();

  $array = $calendario->ventas_facturas();
  $total_array = sizeof($array);

 if(!sizeof($array)==0){
  $fecha = $array[0]["Fecha"];
  $fecha = substr($fecha,0,10);
  $mes = substr($fecha,0,4);}

  $mes_mostrar = ["01"=>"Enero","02"=>"Febrero","03"=>"Marzo","04"=>"Abril","05"=>"Mayo","06"=>"Junio",
"07"=>"Julio","08"=>"Agosto","09"=>"Septiembre","10"=>"Octubre","11"=>"Noviembre","12"=>"Diciembre"];


echo "
<div class='container' onclick='mostrarTodo3(this)'>
<form id='form3' action='Añadir/' method='post'>
 <a style='text-decoration:none; color:white;'>
 <h2>Añadir</h2></a>";
 if(isset($_POST["nombre"])){
   echo "<input type='hidden' name='nombre' value='".$_POST["nombre"]."'>";
 }
echo "</form></div>";

$array_nombre = $calendario->ventas_facturas();

 if(!sizeof($array)==0){
echo "
<div class='container'>";
echo "<form method='POST' class='form_eliminar' action='' id='form".$mes."'>
<input type='checkbox' id='$mes' name='mostrar".$mes."' value='".$mes."' onchange='mostrarTodo(this)' style=' width: 0.0px;
 height: 0.0px;
 opacity: 0;
 overflow: hidden;
 position: absolute;
 z-index: -1;'>
<label for='$mes'>
 <h2 style=' cursor: pointer; '>".$mes."</h2>
</label>
";
echo "</form></div>";

echo "<div id='menu".$mes."' class='menu'>";


if(isset($_POST["mostrar".$mes.""])){
$resultado = $calendario->fecha3($_POST["mostrar".$mes.""]);
  $dia_p =substr($resultado[0]["Fecha"],0,7);
    require "mes1.php";
    foreach ($resultado as $valor){
    $dia =substr($valor["Fecha"],0,7);
    if($dia_p == $dia){
    }else{
        $dia_p=$dia;
        require "mes.php";
    }

  }
}
echo "</div>";



  foreach ($array as $producto) {
    $fecha_p = substr($producto["Fecha"],0,4);
    if($mes == $fecha_p){
  }else{
    $mes = $fecha_p;
    echo "
    <div class='container'>";
    echo "<form method='POST' class='form_eliminar' action='' id='form".$mes."'>
    <input type='checkbox' id='$mes' name='mostrar".$mes."' value='".$mes."' onchange='mostrarTodo(this)' style=' width: 0.0px;
     height: 0.0px;
     opacity: 0;
     overflow: hidden;
     position: absolute;
     z-index: -1;'>
    <label for='$mes'>
     <h2 style='margin-top:10px;'>".$mes."</h2>
    </label>
    ";
    echo "</form></div>";
    echo "<div id='menu".$mes."' class='menu'>";

    if(isset($_POST["mostrar".$mes.""])){
    $resultado = $calendario->fecha3($_POST["mostrar".$mes.""]);
      $dia_p =substr($resultado[0]["Fecha"],0,7);
        require "mes1.php";
        foreach ($resultado as $valor){
        $dia =substr($valor["Fecha"],0,7);
        if($dia_p == $dia){
        }else{
            $dia_p=$dia;
            require "mes.php";
        }

      }
    }

    echo "</div>";

  }
}}

  ?>
  <script>
  function mostrarTodo(e){
        var id = "form" + e.value;
        console.log(id);
      var formulario = document.getElementById(id);
      formulario.submit();

  }

  function mostrarTodo1(e){
        var id = "form1";
        console.log(id);
      var formulario = document.getElementById(id);
      formulario.submit();

  }

  function mostrarTodo3(e){
        var id = "form3";
        console.log(id);
      var formulario = document.getElementById(id);
      formulario.submit();

  }

  </script>
