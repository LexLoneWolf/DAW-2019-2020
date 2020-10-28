let n1 = parseInt(prompt("Introduce numero 1"));
let n2 = parseInt(prompt("Introduce numero 2"));
let n3 = parseInt(prompt("Introduce numero 3"));
let n4 = parseInt(prompt("Introduce numero 4"));

if (n1 > n2 && n1 > n3 && n1 > n4) {
    document.write("El mayor es " + n1);
} else if (n2 > n1 && n2 > n3 && n1 > n4) {
    document.write("El mayor es " + n2);
} else if (n3 > n1 && n3 > n2 && n3 > n4) {
    document.write("El mayor es " + n3);
} else {
    document.writeln("El mayor es " + n4);
}

document.write("<br />");

if (n1 < n2 && n1 < n3 && n1 < n4) {
    document.write("El menor es " + n1);
} else if (n2 < n1 && n2 < n3 && n1 < n4) {
    document.write("El menor es " + n2);
} else if (n3 < n1 && n3 < n2 && n3 < n4) {
    document.write("El menor es " + n3);
} else {
    document.writeln("El menor es " + n4);
}
