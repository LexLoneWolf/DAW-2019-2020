let arrayNum = [];
for (let i = 0; i < 10; i++) {
    let n = parseInt(prompt("introduce número " + i));
    arrayNum[i] = n;
}
arrayNum.sort(function(a, b){return a - b});

let tam = arrayNum.length;
for (let i = 0; i < tam; i++) {
    document.write(arrayNum[i] + " <br />");
}