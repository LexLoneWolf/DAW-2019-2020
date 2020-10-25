let hermanos = prompt("Número de hermanos");
let cantidad = prompt("Cantidad");
let descuento = cantidad;
if ( hermanos <= 0 ) {
    document.write(cantidad);
} else if ( hermanos < 3 ) {
    descuento -= cantidad * 0.05;
    document.write(descuento);
} else  {
    descuento -= cantidad*0.15;
    document.write(descuento);   
}