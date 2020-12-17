<?php

include_once "autocompletar.php";

$modelo = new Autocompletar();//Inicializamos una clase de tipo Autocompletar

$texto = $_GET["resultado"];//Le asignamos el valor recibido de input tipo-mascota

$res = $modelo->buscar($texto);//Le asignamos el valor de la funcion buscar de la class
//modelo con la variable texto y en este caso devolvera un arreglo

echo json_encode($res);//El arreglo lo convertimos en arreglo de tipo javascript
 ?>
