<?php
if(isset($_POST["tag"])){
$nombre =$_POST["tag"];

include_once "../../autocompletar.php";
$productos = new Autocompletar();
$muchos = $productos->productos1($nombre);
$cantidad="";
$Precio_c="";
$Precio_v="";
$Ganancia="";
foreach ($muchos as $key){
  $cantidad=json_encode($key["Cantidad"]);
  $Precio_c=json_encode($key["Precio_c"]);
  $Precio_v=json_encode($key["Precio_v"]);
  $Ganancia=json_encode($key["Ganancia"]);
}
}
 ?>

<script type="text/javascript">
<?php if(isset($_POST["tag"])){
 if(!$cantidad==""){
  ?>

$(document).ready(function(){
var Cantidad = document.querySelector("#Cantidad");
Cantidad.value=<?= $cantidad ?>;
var Precio_c = document.querySelector("#Precio_c");
Precio_c.value=<?= $Precio_c ?>;
var Precio_v = document.querySelector("#Precio_v");
Precio_v.value=<?= $Precio_v ?>;
var Ganancia = document.querySelector("#Ganancia");
Ganancia.value=<?= $Ganancia ?>;
});
<?php }} ?>
</script>
