a=0;
function autocompletar(){
const inputMascota = document.querySelector("#tipo-mascota"); //Convertimos a la const imputMascota
//en un objeto htmlimput del elemento con el id tipo-mascota

let indexFocus = -1; //let es igual que el var pero esta se define una vez y se ejcuta solo dentro del
//campo donde se inicializo

inputMascota.addEventListener("input", function(){//Esta funcion se va a ejecutar cadavez que escribimos
  //en el input texto

  var tipoMascota = this.value; //Le asignamos el valor del imputMascota que seria el texto que
  //escribimos en el imput recordemos que le asignamos un objeto htmlimput elemento

  if(tipoMascota.length==0){
    cerrarLista();
  }
  tipoMascota = tipoMascota.toLowerCase().replace(/\b[a-z]/g, function(letra) {
    return letra.toUpperCase();//Funcion que sirve para colocar la primera letra en
    //mayuscula en cada palabra y el resto en minusculas
});

  if(!tipoMascota){ return false;//Si tipoMascota es diferente a true
  //mandara falso cuando el tipoMascotaeste vacio(sin texto en el input)
  cerrarLista();}

  const divList = document.createElement("div");//Creamos un div nuevo
  divList.setAttribute("id", this.id + "-lista-autocompletar");//Le asignamos un atributo a el div creado
  divList.setAttribute("class", "lista-autocompletar-items");//otro atributo
  this.parentNode.appendChild(divList);//solo acepta objetos e tipo Node

  //conexion a BD
  httpRequest("http://192.168.0.100/Proyectos1/Almacen%208%C2%B0/controller.php?resultado=" + tipoMascota, function(){//llamamos la funcion
    //y le damos los parametros a donde enviaremos la peticion y creamos una funcion para asignar los datos
    //recibidos a un arreglo
    //console.log(this.responseText);
    const arreglo = JSON.parse(this.responseText);

    if(arreglo.length == 0){ return false;//Si el arreglo es 0 manda false
    }else{
    let r=0;
    arreglo.forEach(item =>{//Recorre l arreglo
      if(r<2){
      if(item.substr(0, tipoMascota.length)== tipoMascota){//si el substring del index 0 al tamaño de char del index de
        //la variable tipoMascota es igual a tipo mascota
         const elementoLista = document.createElement("div");//Creamos un div nuevo
         elementoLista.innerHTML = `<strong>${item.substr(0, tipoMascota.length)}</strong>${item.substr(tipoMascota.length)}`;
         //A el div le asignamos un string el primero sera desde el index 0 a el tamaño de char del index tipoMascota
         //el segundo segundo sera desde tamaño de char del index tipoMascota hasta el total final
         elementoLista.addEventListener("click", function(){//Funcion click para cuando demos click
           //el inputMascota sera igual al elemento que le dio click
           inputMascota.value = this.innerText;//Le asignamos a el imput el texto del elemento
           if(a==0){cerrarLista();}//Y de ultimo se cierra si es igual a 0
           return false;
         });
         divList.appendChild(elementoLista);//en el div divList le asignamos el nuevo div elementoLista
         let e = divList.querySelectorAll("div");
         if(e.length >0){
           e[e.length-1].setAttribute("id", "index_f");
           if(e.length >1){
              e[e.length-2].setAttribute("id", "");
              r++;
              console.log(a);
           }
         }
   }
 }});
   }
  });

  //validar arreglos vs input

});

inputMascota.addEventListener("keydown", function(e){//para cuando precionemos botones
 const divList = document.querySelector("#" + this.id+ "-lista-autocompletar");
 let items;

  if(divList){
    items = divList.querySelectorAll("div");

    switch(e.keyCode){//Cuando percionemos botones

       case 40: //Si precionas la tecla de abajo
       indexFocus++;//PRECAUCION DEJAR CODIGO COMO ESTA PARA NO TENER ERROR DE SINTAXIS
       if(indexFocus > items.length-1) indexFocus = items.length -1;
       a=1;
       items[indexFocus].click();//Si le damo click el items va hacer igual que indexFocus y se cierra
       break;

       case 38: //Si precionas la tecla de arriba
       indexFocus--;//PRECAUCION DEJAR CODIGO COMO ESTA PARA NO TENER ERROR DE SINTAXIS
       if(indexFocus < 0) indexFocus = 0;
       a=1;
       items[indexFocus].click();
       e.preventDefault();
       break;

       case 13: //Si precionas la tacla enter
       document.submit();
       e.preventDefault();
       a=0;
       items[indexFocus].click();//Usamos la funcion click que creamos arriba elementoLista.addEventListener("click", function()
       indexFocus= -1;
       break;

       default:
       indexFocus = -1;
       cerrarLista();
       break;
    }

    seleccionar(items, indexFocus);
    return false;
    }
 });

 document.addEventListener("click", function(){//cuando pulsemos afuera se cierre el menu
  if(a==0){cerrarLista();}
 });
}

function seleccionar(items, indexFocus){//Sirve para dar class al div que sea igual a el indexFocus
if(!items || indexFocus == -1){return false;
}else{
  items.forEach(x => {x.classList.remove("autocompletar-active")});//Removemos la class de el anterior div seleccionado
  items[indexFocus].classList.add("autocompletar-active");//le asignamos la class a el nuevo div seleccionado
}}


function cerrarLista(){//Funcion para cerrar la clase de lista-autocompletar-items
  const items = document.querySelectorAll(".lista-autocompletar-items");
  //Le asignamos todos objetos que este adentro de nuestra clase lista-autocompletar-items
  items.forEach(item =>{//recorre los objetos de items y el recorrido se va a llamar item
    item.parentNode.removeChild(item);//borramos el objetos item
  });
  indexFocus = -1;
}

function httpRequest(url, callback){ //Funcion ajax esta funcion nos va a permitir enviar
  //url de tipo GET de la pagina en la que estamos que va acontener un dato que en este caso es el input tipo-mascota

  const http = new XMLHttpRequest(); //Inicializamos el pedido ajax de tipo XMLHttpRequest que sirve para
  //hacer peticion desde la url
  http.open("GET", url);//Le asignamos el tipo de envio que en este caso es GET
  //y la url que le vamos a enviar
  http.send();//Aqui se lo enviamos

   http.onreadystatechange = function(){//Sirve para definir una función que será llamada automáticamente cada vez que cambie la propiedad readyState del objeto.
     if(this.readyState == 4 && this.status == 200){//Verificamos si llego y el estado en que llego
       callback.apply(http);//Si es exitasa la peticion ejecutamos la funcion con callback
     }
   }
}


autocompletar();
