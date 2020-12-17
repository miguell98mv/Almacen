<?php
$t_unidad+=$valor["Unidad"];
$t_precio_c+=$valor["Precio_c"];
$t_precio_v+=$valor["Precio_v"];
$t_ganancias+=$valor["Ganancias"];
echo "<tr><td>".$valor["Nombre"]."</td><td>".$valor["Unidad"]."</td><td>".$valor["Cantidad"]."</td>
<td>".$valor["Precio_c"].".ps"."</td><td>".$valor["Precio_v"].".ps"."</td><td>".$valor["Ganancias"].".ps"."</td></tr>";

 ?>
