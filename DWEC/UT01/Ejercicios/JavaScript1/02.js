let edad = prompt("Introduce edad");
let ciudad = prompt("Introduce Ciudad");

if ((edad >= 18 && edad <=35) && ciudad == "Alicante") {
    document.write("Puede acceder al carnet de empresarios emprendedores");
} else {
    document.write("No puede acceder al carnet de empresarios emprendedores")
}