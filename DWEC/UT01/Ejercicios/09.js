let n = parseInt(prompt("Introduce un número"));
let res = n;

while (n > 2) {
    res *= n-1;
    n--;
    document.write(res + " ");
}

