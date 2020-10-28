let n = parseInt(prompt("Introduce número a adivinar"));
let n2 = parseInt(prompt("Introduce un número"));

while (n != n2) {
    if (n2 > n) {
        n2 = parseInt(prompt("Te has pasado. Introduce un número"));
    } else {
        n2 = parseInt(prompt("Te has quedado corto. Introduce un número"));
    }
}

if (n == n2) {
    alert("!Enhorabuena lo has adivinado!"); 
}