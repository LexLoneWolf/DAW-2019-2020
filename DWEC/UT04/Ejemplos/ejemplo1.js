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


let pos = prompt("Elemento hijo sobre el que se le insertará el nuevo elemento");
let ol = document.querySelector("ol");
let li = document.createElement("li");
li.textContent = ("Hola");
ol.insertBefore(li, ol.children[pos-1]);

let posdel = prompt("Elemento que desesa borrar");

ol.removeChild(li, ol.children[pos-1]);

while (ol.hasChildNodes()) {
   ol.removeChild(ol.children[0]);
}






