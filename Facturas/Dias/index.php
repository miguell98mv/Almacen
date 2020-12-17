<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="ventas2.css">
      <link rel="stylesheet" type="text/css" href="tabla8.css">
      <meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=10.0, minimum-scale=1.0">
    <script src="https://kit.fontawesome.com/c4e9a2fa9a.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../script/default2.css">
  </head>
  <body>

    <header>
      <form id="boton_mini" class="" action="../../Busqueda" autocomplete="off" method="GET">
      <div class="menu_bar">
       <input type="text" id="tipo-mascota1" style="padding-left:3%;" name="resultado" placeholder="Bucar producto"><a id="boton_busqueda1"><i onclick="boton_mini()" style="margin-top:5px" class="fas fa-search"></i></a>
         <a id="bt-munu" href="../../"><i style="margin-right: 10px;" class="fas fa-home"></i>Inicio</a><a class="bt-menu"><i id="menu" class="fas fa-bars"></i></a>
      </div></form>
        <nav>
           <ul>
             <li><a id="bt-munu1" href="../../"><i style="margin-right: 10px;" class="fas fa-home"></i>Inicio</a></li>
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

<div class="ventas">

     <?php
      include_once "ventas.php";


      ?>
</div>

   <script src="http://code.jquery.com/jquery-latest.js"></script>
   <script type="text/javascript" src="../../menu.js"></script>
   <script src="../script/default5.js"></script>
   <script src="../script/default11.js"></script>
   <div class="vacio">
   </div>
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
