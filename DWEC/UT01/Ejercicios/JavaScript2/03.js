let n = parseInt(prompt("Introduce número"));
let divPares = 0;
for (let i = n; i > 0; i--) {
    if (n % i == 0 && i % 2 == 0) {
        document.write(i);
        divPares++;
    }
}
document.write("<br />La cantidad de divisores pares de " + n + " es " + divPares);