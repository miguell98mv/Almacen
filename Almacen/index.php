<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="almacen4.css">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <script src="https://kit.fontawesome.com/c4e9a2fa9a.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="tabla4.css">
    <link rel="stylesheet" href="script/default2.css">
    <link rel="stylesheet" href="../fonts.css">
  </head>
  <body>
<header>
  <form id="boton_mini" class="" action="../Busqueda" autocomplete="off" method="GET">
  <div class="menu_bar">
   <input type="text" id="tipo-mascota1" style="padding-left:3%;" name="resultado" placeholder="Bucar producto"><a id="boton_busqueda1"><i onclick="boton_mini()" style="margin-top:5px" class="fas fa-search"></i></a>
     <a id="bt-munu" href="../"><i style="margin-right: 10px;" class="fas fa-home"></i>Inicio</a><a class="bt-menu"><i id="menu" class="fas fa-bars"></i></a>
  </div></form>

    <nav>
       <ul>
         <li><a id="bt-munu1" href="../"><i style="margin-right: 10px;" class="fas fa-home"></i>Inicio</a></li>
          <li><a href=""><i class="fas fa-database"></i>Almacen</a></li>
          <li><a href="../Ventas"><i class="far fa-money-bill-alt"></i>Ventas</a></li>
          <li><a href="../Facturas"><i class="fas fa-balance-scale"></i>Facturas</a></li>
          <li><a href="../Añadir"><i class="far fa-plus-square"></i>Añadir</a></li>
          <form id="boton_full" action="../Busqueda" autocomplete="off" method="GET">
         <div class="autocompletar">
          <input type="text" name="resultado" id="tipo-mascota" style="padding-left:3%;" placeholder="Bucar producto"><a id="boton_busqueda2"><i onclick="boton_full()" style="margin-top:5px" class="fas fa-search"></i></a>
          </div></form>
          </ul>
    </nav>

</header>
<div class="vacio">
</div>
<section>

  <table>
    <tr> <th>Nombre</th><th>Unidad</th><th>Cantidad</th><th>Precio_c</th><th>Precio_v</th><th id="th_f">Ganancias</th></tr>

  <?php
    include_once "consulta.php";

    $consulta = new Consulta_db();

    $arreglo = $consulta->consulta();

     $unidadtotal=0;
     $cantidadtotal="Varios";
     $precio_ctotal=0;
     $precio_vtotal=0;
     $gananciatotal=0;

    foreach ($arreglo as $a) {
     $unidadtotal+=$a["Unidad"];
     $precio_ctotal+=$a["Precio_c"];
     $precio_vtotal+=$a["Precio_v"];
     $gananciatotal+=$a["Ganancia"];
     echo "<tr>
     <td class='td'>".$a["Nombre"]."</td>
     <td class='td'>".$a["Unidad"]."</td>
     <td class='td'>".$a["Cantidad"]."</td>
     <td class='td' style='color:red;'>".$a["Precio_c"].".ps</td>
     <td class='td' style='color:#00cc00;'>".$a["Precio_v"].".ps</td>
     <td id='td_f' style='color:#00cc00;'>".$a["Ganancia"].".ps</td>
     </tr>";
    }
    echo "<tr>
    <td class='td1'>Total</td>
    <td class='td1'>".$unidadtotal."</td>
    <td class='td1'>".$cantidadtotal."</td>
    <td class='td1' style='color:red';>".$precio_ctotal.".ps</td>
    <td class='td1' style='color:#00cc00;'>".$precio_vtotal.".ps</td>
    <td id='td_f1' style='color:#00cc00;'>".$gananciatotal.".ps</td>
    </tr>";

   ?>
 </table>
   </section>

   <script src="http://code.jquery.com/jquery-latest.js"></script>
   <script type="text/javascript" src="../menu.js">
   </script>
   <script src="script/default5.js"></script>
   <script src="script/default11.js"></script>

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
