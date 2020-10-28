let n = parseInt(prompt("Introduza un número"));

for (let i = n; i > 0; i--) {
    if (n % i == 0) {
        document.write(i + "<br />");
    }
}