<?php
if(!isset($_POST["id"])){
if(!isset($_POST["editar"])){
  header("location: ../");
}else if($_POST["editar"] == ""){
  header("location: ../");
}}

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="../busqueda3.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=10.0, minimum-scale=1.0">
    <script src="https://kit.fontawesome.com/c4e9a2fa9a.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="tabla4.css">
    <link rel="stylesheet" href="../script/default2.css">
    <link rel="stylesheet" href="../../fonts.css">
  </head>
  <body>
    <header>
      <form id="boton_mini" class="" action="../../Busqueda" autocomplete="off" method="GET">
      <div class="menu_bar">
       <input type="text" id="tipo-mascota1" style="padding-left:3%;" name="resultado" placeholder="Bucar producto"><a id="boton_busqueda1"><i onclick="boton_mini()" style="margin-top:5px" class="fas fa-search"></i></a>
         <a id="bt-munu" href="../"><i style="margin-right: 10px;" class="fas fa-home"></i>Inicio</a><a class="bt-menu"><i id="menu" class="fas fa-bars"></i></a>



      </div></form>
        <nav>
           <ul>
             <li><a id="bt-munu1" href="../"><i style="margin-right: 10px;" class="fas fa-home"></i>Inicio</a></li>
              <li><a href="../../Almacen"><i class="fas fa-database"></i>Almacen</a></li>
              <li><a href="../../Ventas"><i class="far fa-money-bill-alt"></i>Ventas</a></li>
              <li><a href="../../Facturas"><i class="fas fa-balance-scale"></i>Facturas</a></li>
              <li><a href="../../Añadir"><i class="far fa-plus-square"></i>Añadir</a></li>
              <form id="boton_full" action="../../Busqueda" autocomplete="off" method="GET">
             <div class="autocompletar">
              <input type="text" name="resultado" id="tipo-mascota" style="padding-left:3%;" placeholder="Bucar producto"><a id="boton_busqueda2"><i onclick="boton_full()" style="margin-top:5px" class="fas fa-search"></i></a>
              </div></form>
              </ul>
        </nav>

    </header>
<div class="vacio">
</div>
<section>

  <div class="newProducto">
    <center>  <h2>Editar Producto</h2>
    <?php

      include_once "miniaturas5.php";

      if(isset($_FILES["file"])){
        $miniatura = new Editarimagen();
        $miniatura->crearMiniatura($_FILES['file']['name']);
      }


     ?>
     <?php

     include_once "../../autocompletar.php";

     $productos = new Autocompletar();

      if(isset($_POST["editar"])){
        $nombres = array();
     $nombres = $productos->productos($_POST["editar"]);

   }else{
  $nombres = array();
  $nombres = $productos->producto_id($_POST["id"]);

   }

     ?></center>
     <form action="#" method="post" enctype="multipart/form-data" autocomplete="off">
       <input type="text" name="text_producto" value="<?php echo $nombres[0]["Nombre"]; ?>" placeholder="Nuevo producto" required>
       <input type="text" name="text_unidad" value="<?php echo $nombres[0]["Unidad"]; ?>" placeholder="Unidad" required>
       <input type="text" name="text_cantidad" value="<?php echo $nombres[0]["Cantidad"]; ?>" placeholder="Cantidad" required>
       <input type="text" name="text_precio_c" value="<?php echo $nombres[0]["Precio_c"]; ?>" placeholder="Precio_c" required>
       <input type="text" name="text_precio_v" value="<?php echo $nombres[0]["Precio_v"]; ?>" placeholder="Precio_v" required>
       <input type="text" name="text_ganancias" value="<?php echo $nombres[0]["Ganancia"]; ?>" placeholder="Ganancias" required>
       <input type="hidden" name="imagen" value="<?php echo $nombres[0]["Imagen"]; ?>">
       <input type="hidden" name="editar1" value="<?php echo $nombres[0]["Nombre"]; ?>">
       <input type="hidden" name="id" value="<?php echo $nombres[0]["id"]; ?>">
        <div><div class="nuest">
          <span class="icon-upload"></span>
            <span class="nuestroinput">
              <input  type="file" name="file" id="nuestroinput">
            </span>
          <label for="nuestroinput">
           <span >Subir imagen</span>
          </label>

        </div>

      <input class="nuest1" type="submit" value="Guardar" >
     </form> </div><div>
   </section>

   <script src="http://code.jquery.com/jquery-latest.js"></script>
   <script type="text/javascript" src="../../menu.js">
   </script>

<script type="application/javascript">
jQuery("input[type=file]").change(function(e){
var filename = e.currentTarget.files[0].name;
 var idname = jQuery(this).attr('id');
 console.log(jQuery(this));
 console.log(filename);
 console.log(idname);
 jQuery('span.'+idname).next().find('span').html(filename);
});
</script>
<script src="../script/default5.js"></script>
<script src="../script/default11.js"></script>
<script>
function boton_full(){
      var id = "boton_full";
    var formulario = document.getElementById(id);
    formulario.submit();

}

function boton_mini(){
      var id = "boton_mini";
    var formulario = document.getElementById(id);
    formulario.submit();

}
   </script>
  </body>
</html>
