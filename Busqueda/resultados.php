<div class="producto">
     <img src="../Añadir/imagenes/Completa/<?php echo $alias["Imagen"]; ?>" alt="">
     <h1 style="color:black;"><?php echo $alias["Nombre"]; ?></h1>
     <p>Undidad:<?php echo " "; echo $alias["Unidad"]; ?>,</p>
     <p>Cantidad:<?php echo " "; echo $alias["Cantidad"]; ?>,</p>
     <p>Precio_c:<?php echo " "; echo $alias["Precio_c"]; ?>.ps,</p>
     <p>Precio_v:<?php echo " "; echo $alias["Precio_v"]; ?>.ps,</p>
     <p>Ganancias:<?php echo " "; echo $alias["Ganancia"]; ?>.ps</p>
     <a href="#" class="menu">Ir a Ventas</a>
     <a href="#" class="menu">Ir a Facturas</a>
     <form action="Editar/" method="POST" class="menu">
       <input type="hidden" name="editar" value="<?php echo $alias["Nombre"]; ?>">
     <input  id="editar" type="submit" value="Editar"></form>
    </div>
