<?php

class Miniatura{




function copiarImagen($origen, $destino){
      move_uploaded_file($origen, $destino);
  }

function crearMiniatura($nombreArchivo){

  $directorio = "imagenes/";
  $archivo = $directorio . basename($_FILES["file"]["name"]);//Devuelve el texto despues de "/"
  $tipoArchivo =basename($_FILES["file"]["type"]); //FORMA DE OBTENER EL TIPO DE ARCHIVO
  $tamaño=$_FILES["file"]["size"];

   if($tamaño > 12){
     $checarSiImagen = getimagesize($_FILES["file"]["tmp_name"]);
     //var_dump($size);
     if($checarSiImagen != false){

       $finalWidth    = 250;
       $dirFullImage  = "imagenes/Completa/";
       $dirThumbImage = "imagenes/Miniatura/";
       $tmpName       = $_FILES['file']['tmp_name'];
       $finalName     = $dirFullImage . $_FILES['file']['name'];

       $size = $_FILES["file"]["size"];

       if($size > 50000000){
           echo "<p class='incorrecto'>Erro el archivo tiene que ser menor a 50MB<p>";

    }else{
      move_uploaded_file($_FILES['file']['tmp_name'],  $dirFullImage.$_FILES['file']['name']);

    $im = null;
     if(preg_match('/[.](jpg)$/', $nombreArchivo)) {
         $im = imagecreatefromjpeg($dirFullImage . $nombreArchivo);
     } else if (preg_match('/[.](gif)$/', $nombreArchivo)) {
         $im = imagecreatefromgif($dirFullImage . $nombreArchivo);
     } else if (preg_match('/[.](png)$/', $nombreArchivo)) {
         $im = imagecreatefrompng($dirFullImage . $nombreArchivo);
     }else if (preg_match('/[.](jpeg)$/', $nombreArchivo)) {
         $im = imagecreatefromjpeg($dirFullImage . $nombreArchivo);
     }else{
       echo "<p class='incorrecto'>Error solo se admiten archivos jpg, gif, png, jpeg<p>";
     }

     $width = imagesx($im);
     $height = imagesy($im);

     $miniWidth = $finalWidth;
     $miniHeight = floor($height * ($finalWidth / $width));

     $imageTrueColor = imagecreatetruecolor($miniWidth, $miniHeight);

     $color = imagecolorallocatealpha($imageTrueColor, 255, 255, 255, 1);//Usar es importante para
     //archivos png quita fondos negros
     imagefill($imageTrueColor, 0, 0, $color);//Usar es importante para
     //archivos png quita fondos negros

     imagecopyresized($imageTrueColor, $im, 0,0,0,0,$miniWidth,$miniHeight,$width,$height);//Los colores que forma a la imagen la reduce tambien
     //para que no se deforme la imagen es necesarios cuando reduscamos una imagen

    if(!file_exists($dirThumbImage)){
        if(!mkdir($dirThumbImage)){
            echo "<p class='incorrecto'>Hubo un problema! vuélvelo a intentar</p>";
        }
    }



       if(isset($_POST["text_producto"]) && isset($_POST["text_unidad"]) && isset($_POST["text_cantidad"])
       && isset($_POST["text_precio_c"]) && isset($_POST["text_precio_v"]) && isset($_POST["text_ganancias"])){

        if(is_string($_POST["text_producto"]) && is_string($_POST["text_cantidad"])){

           if(is_numeric($_POST["text_unidad"]) && is_numeric($_POST["text_precio_c"])
            && is_numeric($_POST["text_precio_v"]) && is_numeric($_POST["text_ganancias"])){

            if(imagejpeg($imageTrueColor, $dirThumbImage . $nombreArchivo)){ //Mueve la imagen a la carpeta thumb

            $imagen = $_FILES["file"]["name"];
            $producto = ucwords(mb_strtolower($_POST["text_producto"]));
            $unidad = $_POST["text_unidad"];
            $cantidad = ucwords(mb_strtolower($_POST["text_cantidad"]));
            $precio_c = $_POST["text_precio_c"];
            $precio_v = $_POST["text_precio_v"];
            $ganancias = $_POST["text_ganancias"];
            include_once "añadir.php";
            $añadir = new Anadir();

            if($añadir->revisar_nombre($producto)){
            if($añadir->revisar_imagen($imagen)){
            if($añadir->añadir($producto,$unidad,$cantidad,$precio_c,$precio_v,$ganancias,$imagen)){
              echo "<p class='correcto'>Nuevo producto insertado</p>";
            }else{
              echo "<p class='incorrecto'>Error nuevo producto no insertado</p>";
            }

          }else{
              echo "<p class='incorrecto'>Error ya hay una imagen con el mismo nombre</p>";
            }

          }else{
              echo "<p class='incorrecto'>Error ya hay un producto con el mismo nombre</p>";
            }

          }else{
            echo "<p class='incorrecto'>Error al guardar imagen</p>";
          }
        }else{
           echo "<p class='incorrecto'>Error solos los campos nuevo producto y cantidad puede contener texto</p>";

        }
      }else{
          echo "<p class='incorrecto'>Error los campos nuevo producto y cantidad solo pueden contener texto</p>";
      }
     }else{
       echo "<p class='incorrecto'>Error datos no recibidos</p>";
   }}
   }else{
     echo "<p class='incorrecto'>Error el documento no es una imagen</p>";
   }
}else{
   echo "<p class='incorrecto'>Error el tamaño del archivo tiene que se mayor a 11 bytes";
 }


}}

 ?>
