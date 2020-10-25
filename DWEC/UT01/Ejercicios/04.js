let mes = prompt("Introduzca número de més");

switch (true) {
    case mes == 2:
        document.write("el mes " + mes + " 28 días");
        break;
    case mes == 4 || mes == 6 || mes == 9 || mes == 11:
        document.write("el mes " + mes + " 30 días");
        break;
    case mes == 1 || mes == 3 || mes == 5 || mes == 7 || mes == 8 || mes == 10 || mes == 12:
        document.write("el mes " + mes + " 31 días");
        break;
    default:
        document.write("Mes introducido incorrecto");
        break;
}