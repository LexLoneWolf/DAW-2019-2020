let n = prompt("Introduce un número");
let par = n % 2;
let multiplo3 = n % 3;
let multiplo5 = n % 5;
let str = "El número " + n + " ";

if (par == 0) {
    str += "es par, ";
} else {
    str += "es impar, ";
}

if (multiplo3 == 0) {
    str += "es multiplo de 3, ";
}

if (multiplo5 == 0) {
    str += "es multiplo de 5.";
}

alert(str);