'use strict'

let numeroLargoA = [8,9,9,9,9,9,9,9,9,9,9,9,9,9,9,9,9,9];
let numeroLargoB = [2];

function sumarNumeroLargo(numeroLargoA, numeroLargoB) {
    let suma = 0;
    let acarreo = 0;
    let resultado = [];
    for (let i = 0; i < numeroLargoA.length; i++) {
        suma = numeroLargoA[i] + numeroLargoB[i] + acarreo;
        if (suma > 9) {
            acarreo = parseInt(suma/10);
            suma %= 10;
        }
    }
}