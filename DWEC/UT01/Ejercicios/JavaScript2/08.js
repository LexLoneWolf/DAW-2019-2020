let base = parseFloat(prompt("Introduce la base"));
let exponente = parseInt(prompt("Introduce el exponente"));

let res = 1;

if (exponente == 0) {
    document.write(res);
    
} else if (exponente < 0) {
    
    document.write(res);
} else {
    for (let i = 0; i < exponente; i++) {
        res *= base;
    }
    document.write(res);
}