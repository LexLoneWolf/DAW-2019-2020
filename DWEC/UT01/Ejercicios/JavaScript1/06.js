let n1 = parseInt(prompt("Introduce número 1"));
let n2 = parseInt(prompt("Introduce número 2"));
let operacion = prompt("Tipo de operación");

if (operacion == "+") {
    document.write(n1+n2);
} else if (operacion == "-") {
    document.write(n1-n2);
} else if (operacion == "*") {
    document.write(n1*n2);
} else if (operacion == "/") {
    document.write(n1/n2);
} else {
    document.write("Operación no válida");
}