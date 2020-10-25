"use strict"
// let a = 5;
// let b = 6;
// let c;
// c = a + b;


// function hola(name) {
//     console.log("Hola " + name);
// }

// hola();

// let iva = precio => precio * 1.21;
// console.log(iva(27));

// if (a == b) {
//     console.log(a + " y " + b + " son iguales");
// } else {
//     console.log(a + " y " + b + " son diferentes");
// }

// let dia = 3;

// switch (dia) {
//     case 1:
//         console.log("Es Lunes");
//         break;
//     case 2:
//         console.log("Es Martes");
//         break;
//     case 3:
//         console.log("Es Miércoles");
//         break;
//     case 4:
//         console.log("Es Jueves");
//         break;
//     case 5:
//         console.log("Es Viernes");
//         break;
//     case 6:
//         console.log("Es Sábado");
//         break;
//     case 7:
//         console.log("Es Domingo");
//         break;

//     default:
//         console.error("Día no válido");
//         break;
// }


// for (let i = 0; i < 10; i++) {
//     console.log(c - i);
// }

// let tam = prompt("Introduce tamaño");
// for (let i = 1; i <= tam; i++) {
//     for (let j = 1; j <= tam; j++) {
//         if (i%2==0 && j == 1) {
//             document.write("&nbsp;# ")
//         }  else {
//             document.write("# ")
//         }
//     }
//     document.writeln("<br />");
// }

// let tam = prompt("Introduce tamaño");

// if (tam % 2 == 0) {
//     tam++;
// }

// for (let i = 1; i <= tam; i++) {
//     for (let j = 1; j <= tam ; j++) {
//         if (i % 2 == 1 && j % 2 == 1) {
//             document.write("#");
//         } else if (i % 2 == 0 && j % 2 == 0) {
//             document.write("#");
//         } else {
//             document.write("*");
//         }
//     }
//     document.write("<br />");
// }

     
         
// for (let i = 1; i <= tam; i++) {
//     for (let j = 1; j <= tam ; j++) {
//         if ((i + j) % 2 == 0) {
//             document.write("#");
//         } else {
//             document.write("*")
//         }
//     }
//     document.write("<br />")
// }  

// let ext = parseInt(prompt("Tamaño exterior"));
// let int = parseInt(prompt("Tamaño interior"));

// let aux = (ext-int)/2; 

// for (let i = 1; i <= ext; i++) {
//     for (let j = 1; j <= ext; j++) {
//         if ((i <=  aux || i > aux + int) && (j <= aux || j > ext - aux))  {
//             document.write("░");
//         } else {
//             document.write("▓");
//         }
//     }
//     document.write("<br />");
// }

// document.write("<br />");

// for (let i = 1; i <= ext; i++) {
//     for (let j = 1; j <= ext; j++) {
//         if ((i <=  aux || i > aux + int) || (j <= aux || j > ext - aux))  {
//             document.write("░");
//         } else {
//             document.write("▓");
//         }
//     }
//     document.write("<br />");
// }