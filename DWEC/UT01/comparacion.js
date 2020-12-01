let personas = [
    ["Jose", 47, "Profesor"],
    ["Ana", 20, "Estudiante"],
    ["Pepe", 32, "Administrador"],
    ["Francisco", 25, "Estudiante"],
    ["Sebastian", 50, "Profesor"],
    ["Carlos", 35, "Estudiante"]   
];

function compararPorEdad(a,b) {
    if (a[1] < b[1]) {
        return -1;
    }

    if (a[1] > b[1]) {
        return 1;
    }
    return 0;
}