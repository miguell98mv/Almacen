<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="index_style11.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=10.0, minimum-scale=1.0">
    <script src="https://kit.fontawesome.com/c4e9a2fa9a.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="default5.css">
  </head>
  <body>

<header>
   <form id="form1" class="" action="Busqueda/" autocomplete="off" method="GET">
   <div class="menu_bar">
    <input type="text" id="tipo-mascota1" style="padding-left:3%;" name="resultado" placeholder="Bucar producto"><a id="boton_busqueda1"><i onclick="mostrarTodo1()" style="margin-top:5px" class="fas fa-search"></i></a>
      <a id="bt-munu"><i style="margin-right: 10px;" class="fas fa-home"></i>Inicio</a><a class="bt-menu"><i id="menu" class="fas fa-bars"></i></a>
   </div></form>

    <nav>
       <ul>
         <li><a id="bt-munu1"><i style="margin-right: 10px;" class="fas fa-home"></i>Inicio</a></li>
          <li><a href="Almacen"><i class="fas fa-database"></i>Almacen</a></li>
          <li><a href="Ventas"><i class="far fa-money-bill-alt"></i>Ventas</a></li>
          <li><a href="Facturas"><i class="fas fa-balance-scale"></i>Facturas</a></li>
          <li><a href="Añadir"><i class="far fa-plus-square"></i>Añadir</a></li>
          <form id="form" action="Busqueda/" autocomplete="off" method="GET">
         <div class="autocompletar">
          <input type="text" name="resultado" id="tipo-mascota" style="padding-left:3%;" placeholder="Bucar producto"><a id="boton_busqueda2"><i onclick="mostrarTodo()" style="margin-top:5px" class="fas fa-search"></i></a>
          </div></form>
          </ul>
    </nav>

</header>
<div class="vacio">
</div>
<section><center>
<a href="Añadir">
  <div class="fondo">
   <p id="titulo">Añadir</p>
   <p id="parrafo">Añade productos nuevos al almacen y ten control de tu negocio.</p>
   <img src="icono4.png">
  </div></a>

    <a href="Almacen">
  <div class="">
   <p id="titulo">Almacen</p>
   <p id="parrafo">Ten ordenado tus productos calcula tus ganancias, precios, unidades etc.</p>
   <img src="icono1.png">
  </div></a>

  <a href="Ventas">
  <div class="">
   <p id="titulo">Ventas</p>
   <p id="parrafo">Registra las ventas del dia a dia para tener un manejo del almacen en timpo real.</p>
   <img src="icono2.png">
  </div></a>

  <a href="Facturas">
  <div class="">
   <p id="titulo">Facturas</p>
   <p id="parrafo">Registra nuevas facturas, sepa cuanto gasta y tenga un historial para un mayor orden.</p>
   <img src="icono3.png">
  </center>
</div></a>
   </section>

   <script src="http://code.jquery.com/jquery-latest.js"></script>
   <script type="text/javascript" src="menu.js"></script>
   <script src="default2.js"></script>
   <script src="default11.js"></script>


   <script>
   function mostrarTodo(){
         var id = "form";
       var formulario = document.getElementById(id);
       formulario.submit();

   }

   function mostrarTodo1(){
         var id = "form1";
       var formulario = document.getElementById(id);
       formulario.submit();

   }
      </script>
  </body>
</html>
