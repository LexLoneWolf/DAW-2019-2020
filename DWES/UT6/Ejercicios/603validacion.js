'use strict'

function validarFormulario() {

    let formulario = document.getElementById("formulario");

    if (formulario.nombre.value == "") {
        alert("El campo Nombre es obligatorio");
        formulario.nombre.focus();
        document.getElementById("nombre").style.borderColor = "red";
        return "";
    }

    if (formulario.apellidos.value == "") {
        alert("El campo Apellidos es obligatorio");
        formulario.apellidos.focus();
        document.getElementById("apellidos").style.borderColor = "red";
        return "";
    }

    if (formulario.email.value == "") {
        alert("El campo email es obligatorio");
        formulario.email.focus();
        document.getElementById("email").style.borderColor = "red";
        return "";
    }

    if (formulario.url.value == "") {
        alert("El campo URL Página personal es obligatorio");
        formulario.url.focus();
        document.getElementById("url").style.borderColor = "red";
        return "";
    }

    if (formulario.convivientes.value == 0) {
        alert("El número de convivientes debe ser entre 1 y 10");
        formulario.convivientes.focus();
        document.getElementById("convivientes").style.borderColor = "red";
        formulario.convivientes.value = 0;
        return;
    }
}