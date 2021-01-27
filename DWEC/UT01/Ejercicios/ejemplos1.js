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


// let str = "tengo sueño, hambre y me quiero ir a casa";

// for (let i = 0; i < str.length; i++) {
//     console.log(str[i]);
// }
// console.log(str.replace(/o/g, "X"));
// console.log(" ");
// console.log(" ");
// console.log(" ");
// console.log(" ");

// function mostrar(array) {
//     console.log("El tamaño del array es:" + array.length);
//     for (let numero of array) {
//         console.log(numero);
//     }
// }

// let numeros = [];
// let mayor = 0;
// let pos = 0;
// for (let i = 0; i < 20; i++) {
//     numeros[i] = Math.floor(Math.random() * 100)+1;
//     if (mayor < numeros[i]) {
//         mayor = numeros[i];
//         pos = i;
//     }
// }

// for (let i = 0; i < numeros.length; i++) {
//     console.log(numeros[i]);
// }


// mayor = -1;
// pos = -1;

// for (let i in numeros) {
//     [mayor,pos]=numeros[i]>mayor?[numeros[i],i]:[mayor,pos];
// }

// console.log("El mayor número es "+ mayor + " en la posición " + pos);


// let array = [1,2,3];
// let array2 = ["a", "b", "c"];

// console.log(array);

// array.push(4);

// console.log(array);

// array.unshift(0);

// console.log(array);

// array.pop(4);

// array.shift(0);

// console.log(array.concat(array2));

// console.log(array.slice(1));

// console.log(array.splice(3,1));

/*function comparar(a, b) {
    if (a < b) {
        return -1;
    }

    if (a > b) {
        return 1;
    }

    return 0;
}*/

/*let personas = [
    ["Jose", 47, "Profesor"],
    ["Ana", 20, "Estudiante"],
    ["Pepe", 32, "Administrador"],
    ["Francisco", 25, "Estudiante"],
    ["Sebastian", 50, "Profesor"],
    ["Carlos", 35, "Estudiante"]   
];

function compararPorEdad(a,b) {
    if (a[1] < b[1]) {
        return -1;
    }

    if (a[1] > b[1]) {
        return 1;
    }
    return 0;
}

function comparar(a,b) {
    if (a[2] == "Administrador" && (b[2] != a[2])) {
        return -1;
    }
    if (a[2] != "") {
        
    }
}*/


/*
console.log(personas.reverse());

console.log(personas.sort());

let numeros = [800, 14, 600, 78, 190, 500];

console.log(numeros);

console.log(numeros.sort(comparar));

console.log(numeros.sort((a, b) => a - b));

console.log(personas.sort(compararPorEdad));*/

let notas = [
    ["Jose", 0],
    ["Ana", 8],
    ["Pepe", 7],
    ["Francisco", 9],
    ["Adrián", 6],
    ["Carlos", 9],
    ["Luisa", 8],
    ["María", 5],
    ["José Luis", 4],
    ["Severiano", 3],
    ["Ángeles", 9],
    ["Pedro", 4]   
];

// console.log(notas.every(nota =>nota[1]>=5));

// console.log(notas.some(nota =>nota[1]>=5));

// console.log(numeros.map(num=>num+10));

// console.log(notas.filter(nota=>nota[1]>=5));

// console.log(numeros.reduce((acum,item) =>acum+=item,-1000));


// notas.sort((a,b)=>a[1]-b[1]);

// document.write("<table border='1'>");

// notas.forEach(item => {
//     let tdRojo = "<tr><td style='color:red';>";
//     let tdVerde = "<tr><td style='color:green';>";
//     let tdAmarillo = "<tr><td style='color:yellow';>";
//     let cierraTd = document.write("</td></tr>"); 
//     if (item[1] < 5) {
//         document.write(tdRojo);
//         document.write(item);   
//         cierraTd;
//     } else if (item[1] < 7) {
//         document.write(tdAmarillo);
//         document.write(item);
//         cierraTd;
//     } else {
//         document.write(tdVerde);
//         document.write(item);
//         cierraTd; 
//     }
// });

// document.write("</table>");

// function pruebaRest(...numeros) {
//     let res = 0;
//     for (let i = 0; i < numeros.length; i++) {
//         res+= numeros[i];
//     }

//     return res;
// }

// function mediaRest(...notas) {

//     let suma = 0;
//     let media= 0;

//     console.log("Notas introducidas: "+notas.length);

//     for (let i = 0; i < notas.length; i++) {
//         suma+= notas[i];
//         console.log("Nota "+i+": "+notas[i]);
//     }
//     media = "La media es: " + (suma/notas.length);
//     return media;
// }

// console.log(pruebaRest(5,5,5,5));

// console.log(mediaRest(5,5,6,7,8,5,5,7));


function numeroMayor(...numeros) {
    let mayor = 0;

    console.log("Números introducidos: "+ numeros.length);

    for (let i = 0; i < numeros.length-1; i++) {
        if (numeros[i] > numeros[i+1]) {
            mayor = numeros[i];
        } else {
            mayor = numeros[i+1];
        }
    }
    console.log(mayor);
}

numeroMayor(1,2,3,4,5,6,7,8,9);




