//FUNCIÓN BARAJA CARTAS
'use strict'
/*
    Se pide hacer un programa en javascript que mezcle una baraja francesa.
    Las cartas de la baraja francesa están numeradas del 1 al 13 y pueden
    ser de 4 palos (DIAMANTES, PICAS, CORAZONES, TREBOLES). La función se
    denominará barajar() y deberá devolver un array de pares [número,palo].
    Cada par [número, palo] representará una carta de la siguiente forma:

let ejemplo=[
	[1,”CORAZONES”],
	[10,”PICAS”]
	[7,”TREBOLES”],
	…etc
];

    La función deberá devolver un array de 52 cartas, asegurando que están
    todas y que ninguna se repite. Para ello, primero se imprimirá por
    consola el array barajado. A continuación se ordenará por números, de
    mayor a menor, sin importar el palo

let cartas_ordenadas=[
    [12, "PICAS"],
    [12, "TREBOL"],
    [12, "DIAMANTE"],
    [12, "CORAZON"],
    [11, "TREBOL"],
    [11, "PICAS"],
    [11, "DIAMANTE"],
    [11, "CORAZON"],
    [10, "DIAMANTE"],
    [10, "CORAZON"],
    …etc
];

    Criterios y valoración:
    -	Funcionalidades básicas (3 ptos)
        o	La función devolverá la baraja mezclada en forma de array
        o	Los números serán valores entre 1 y 13
        o	Las cartas no se repiten
        o	Las cartas se ordenarán para comprobar que están todas y no se repiten
    -	Funcionalidad adicional:
        o	Los números 1,11,12 y 13 en vez de ser números se
            representarán como AS, J, Q y R y la ordenación será (de mayor a menor):
            AS, R, Q, J, 10, 9,…, 4, 3, 2               (0,75 puntos)
    -	El código está correctamente documentado (0,25 puntos)

    NOTA: La función Math.random() genera un número decimal aleatorio
    entre 0 y 1 sin llegar nunca a 1. Para obtener, por ejemplo, un valor
    entero entre 0 y 10, se usa lo siguiente:

let a=parseInt(Math.random()*11);

*/

function barajar(){
    
    let baraja = [[]]; // Declaro array que contendrá todas las cartas
    let barajaMezclada = [];
    let palos = ["DIAMANTES", "PICAS", "CORAZONES", "TREBOLES"]; //declaro un array para indicar los palos.

    /*
    Por cada iteración del bucle anidado insertará en el array una carta única con su número y su palo correspondiente.
    Ejemplo: [1,DIAMANTES],[1,PICAS], [1,CORAZONES], [1TREBOLES], [2,DIAMANTES], [2,CORAZONES].... 
    */
    for (let i = 1; i <= 52; i++) {
        for (let j = 0; j < palos.length; i++) {
            if (i==1) {
                baraja.push("AS", palos[j]);
            } else if (i==11) {
                baraja.push("J", palos[j]);
            } else if (i==12) {
                baraja.push("Q", palos[j]);
            } else if (i==13){
                baraja.push("R", palos[j]);
            } else {
                baraja.push(i,palos[j]);
            }
        }
    }

    //Baraja las cartas de forma aleatoria.
    for (let i = 0; i < baraja.length; i++) {
        cartasIntroducidas = []; // almacena números de las cartas que ya ha introducido.
        let random = parseInt(Math.random()*53); // genera un número aleatorio entre 0 y 52
        
        /*Comprueba si el número generado ya ha sido introducido y genera uno nuevo 
        de forma recursiva hasta que genere un número que no haya sido introducido y lo inserta en el array*/
        while(true){
            if(random in cartasIntroducidas) { 
                let random = parseInt(Math.random()*53);
            } else {
                break;
            }
        }
        barajaMezclada.push(baraja[random]);
    }
    return barajaMezclada;
};

let cartas=barajar();

console.log(cartas);

/*Usamos una función arrow como criterio de ordenación para sort
odrdenará de mayor a menor*/
cartas.sort((a,b)=>a+b); 

console.log(cartas);