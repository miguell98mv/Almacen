<?php
echo "
<div class='container1'>";
echo "<form method='POST' class='form_eliminar' action='Dias/' id='form".$dia."'>
<input type='checkbox' id='$dia' name='mostrar' value='".$dia."' onchange='mostrarTodo(this)' style=' width: 0.0px;
 height: 0.0px;
 opacity: 0;
 overflow: hidden;
 position: absolute;
 z-index: -1;'>
<label for='$dia'>
 <h2>".$mes_mostrar[substr($dia,5,7)]."</h2>
</label>
";
echo "</form></div>";

echo "</div>";
 ?>
