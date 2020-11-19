"usestrict"

let arrayNum = new Array(0); // Creo array de números de tamaño 0 
let n = parseInt(prompt("Introduce un número")); // Pido número
while (n != -1) {
    if (arrayNum.length == 0) { // Compruebo que el array no tenga elementos y le asigno el número pedido
        arrayNum[0] = n;
    } else { // Si no está vacío creo un array auxiliar con el tamaño del array de números con una posición más
        let aux = new Array(arrayNum.length+1);
        let insertado = false;  
        for (let i = 0; i < arrayNum.length; i++) { // Recorro el array de números comprobando si ha insertado número
            if (!insertado) { // si no inserto número 
                if (n < arrayNum[i]) { // Compruebo si n es menor que el número en el array
                    aux[i] = n; // inserto el valor de n en el array auxiliar
                    aux[i+1] = arrayNum[i]; // paso n en el array a la siguiente posición del array auxiliar
                    insertado = true; // indico que he insertado número
                } else { // si no es menor
                    aux[i]= arrayNum[i]; // n está en la misma posición en ambos arrays
                }
            } else { // Si inserta
                aux[i+1] = arrayNum[i]; // paso n en el array a la siguiente posición del array auxiliar
            }
        } 
        if(!insertado) { // si no inserta
            aux[aux.length-1] = n; // pongo n en la última posición del array auxiliar
        }
        arrayNum = aux; // igualo los arrays
    }
    n = parseInt(prompt("Introduce un número")); // vuelvo a pedir un nuevo número
} 

for (let i = 0; i < arrayNum.length; i++) { // imprimo el array con los números ordenados
    console.log(arrayNum[i]);
}