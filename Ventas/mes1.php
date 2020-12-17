<?php
echo "
<div class='container1'>";
echo "<form method='POST' class='form_eliminar' action='Dias/' id='form".$dia_p."'>
<input type='checkbox' id='$dia_p' name='mostrar' value='".$dia_p."' onchange='mostrarTodo(this)' style=' width: 0.0px;
 height: 0.0px;
 opacity: 0;
 overflow: hidden;
 position: absolute;
 z-index: -1;'>
<input type='hidden' name='nombre' value='".$vendedor."'>
<label for='$dia_p'>
 <h2>".$mes_mostrar[substr($dia_p,5,7)]."</h2>
</label>
";
echo "</form></div>";
echo "</div>";
 ?>
