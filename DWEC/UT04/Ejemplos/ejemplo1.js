'use strict'

// console.log(window.outerWidth + "-" + window.outerHeight);

// console.log(window.navigator.userAgent);

// //window.navigator.geolocation.getCurrentPosition(function(position) { console.log("Latitude: " + position.coords.latitude + ", Longitude: " + position.coords.longitude);});

// console.log("Hola");

// let contador = 0;
// setInterval(()=>console.log(contador++),1000);


// function multiply(n1, n2) {
//     console.log(n1*n2);
// }

// setTimeout(multiply, 5000, 5,8);

// confirm("Hola");

let elemento = document.getElementById("2");

let lista = document.getElementsByTagName("li");

for (let i = 0; i < lista.length; i++) {
   console.log(lista[i].textContent);
}


let nuevoLi = document.createElement("li");

//document.querySelector("ol").appendChild(nuevoLi).textContent = "Siete";


let nuevoOl = document.createElement("ul");

document.querySelector("div").appendChild(nuevoOl);

for (let i = 0; i < 5; i++) {
   nuevoLi = document.createElement("li");
   document.querySelector("ul").appendChild(nuevoLi).textContent = "Elemento " + (i+1);
}


// let pos = prompt("Elemento hijo sobre el que se le insertará el nuevo elemento");
// let ol = document.querySelector("ol");
// let li = document.createElement("li");
// li.textContent = ("Hola");
// // ol.insertBefore(li, ol.children[pos-1]);
// ol.replaceChild(li, ol.children[pos-1]);

// let posdel = prompt("Elemento que desesa borrar");

// ol.removeChild(li, ol.children[pos-1]);


// while (ol.hasChildNodes()) {
//    ol.removeChild(ol.children[0]);
// }



//  -------------------    ANIMACIÓN   --------------------------

// let cambio = document.querySelector("ol li:nth-child(4)");

// let div = document.createElement("div");

// div.style.position = "absolute";
// div.style.height = "200px";
// div.style.width = "200px";
// div.style.top = "0px";
// div.style.left = "200px";
// div.style.backgroundColor = "black";
// document.body.appendChild(div);

// let paso = 1;

// setInterval(()=>{
//    let posicion = parseInt(div.style.top);
//    if (posicion>=350) {
//       paso = -1;
//    }

//    if (posicion<=0) {
//       paso= 1;
//    }

//    div.style.top = parseInt(div.style.top)+paso+"px";
// }, 1);


//----------------------   EVENTOS  -------------------------


// let boton = document.getElementById("boton");

// OPCIÓN A
function prueba(evento) {
   //alert("Has pulsado el botón");
   let num = document.getElementById("numero").value;
   for (let i = 0, x = 0; i < num; i++) {
      
      let div = document.createElement("div");
      div.style.position = "absolute";
      div.style.height = "80px";
      div.style.width = "80px";
      div.style.top = (i*100)+"px";
      div.style.left = "425px";
      div.style.backgroundColor = "black";
      document.body.appendChild(div);
      div.addEventListener("click", function() {div.remove()});
   }

   
}

// boton.onclick = prueba;


// //OPCIÓN B

// boton.onclick = function(){
//    alert("Has pulsado");
// }


// boton.addEventListener('click', function(evento) {
//    alert("Has pulsado el evento " + evento.type);
// });

// boton.addEventListener('', function(evento) {
//    alert("Has pulsado el evento " + evento.type);
// });


// let div = document.createElement("div");

// div.style.position = "absolute";
// div.style.height = "200px";
// div.style.width = "200px";
// div.style.top = "0px";
// div.style.left = "200px";
// div.style.backgroundColor = "black";
// div.textContent = "0";
// div.style.fontSize = "170px";
// div.style.textAlign = "center";
// div.style.fontFamily = "Monospace";
// document.body.appendChild(div);


// div.addEventListener("click", prueba);

// let div2 = document.createElement("div");

// div2.style.position = "absolute";
// div2.style.height = "200px";
// div2.style.width = "200px";
// div2.style.top = "225px";
// div2.style.left = "200px";
// div2.textContent = "0";
// div2.style.fontSize = "170px";
// div2.style.textAlign = "center";
// div2.style.backgroundColor = "black";
// div2.style.fontFamily = "Monospace";
// document.body.appendChild(div2);


// div2.addEventListener("click", prueba);

// let div3 = document.createElement("div");

// div3.style.position = "absolute";
// div3.style.height = "200px";
// div3.style.width = "200px";
// div3.style.top = "450px";
// div3.style.left = "200px";
// div3.textContent = "0";
// div3.style.textAlign = "center";
// div3.style.fontSize = "170px";
// div3.style.backgroundColor = "black";
// div3.style.fontFamily = "Monospace";
// document.body.appendChild(div3);


boton.addEventListener("click", prueba);








