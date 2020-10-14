"use strict"
let a = 5;
let b = 6;
let c;
c = a + b;


function hola(name) {
    console.log("Hola " + name);
}

hola();

let iva = precio => precio * 1.21;
console.log(iva(27));

if (a == b) {
    console.log(a + " y " + b + " son iguales");
} else {
    console.log(a + " y " + b + " son diferentes");
}

let dia = 3;

switch (dia) {
    case 1:
        console.log("Es Lunes");
        break;
    case 2:
        console.log("Es Martes");
        break;
    case 3:
        console.log("Es Miércoles");
        break;
    case 4:
        console.log("Es Jueves");
        break;
    case 5:
        console.log("Es Viernes");
        break;
    case 6:
        console.log("Es Sábado");
        break;
    case 7:
        console.log("Es Domingo");
        break;

    default:
        console.error("Día no válido");
        break;
}


for (let i = 0; i < 10; i++) {
    console.log(c - i);
}

document.write("Se acabó");