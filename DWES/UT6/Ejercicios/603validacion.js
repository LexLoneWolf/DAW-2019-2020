'use strict'

function validarFormulario() {

    let formulario = document.getElementById("formulario");

    if (formulario.nombre.value == "") {
        alert("El campo Nombre es obligatorio");
        formulario.nombre.focus();
        document.getElementById("nombre").style.borderColor = "red";
        return;
    } else {
        let cadena = /^[a-zA-Z ]*$/;
        if (!formulario.nombre.value.match(cadena)) {
            alert("Formato de nombre incorrecto");
            formulario.nombre.focus();
            document.getElementById("nombre").style.borderColor = "red";
            return;
        }
    }

    if (formulario.apellidos.value == "") {
        alert("El campo Apellidos es obligatorio");
        formulario.apellidos.focus();
        document.getElementById("apellidos").style.borderColor = "red";
        return;
    } else {
        let cadena = /^[a-zA-Z ]*$/;
        if (!formulario.apellidos.value.match(cadena)) {
            alert("Formato de apellidos incorrecto");
            formulario.apellidos.focus();
            document.getElementById("apellidos").style.borderColor = "red";
            return;
        }
    }

    if (formulario.email.value == "") {
        alert("El campo email es obligatorio");
        formulario.email.focus();
        document.getElementById("email").style.borderColor = "red";
        return;
    } else {
        let patronEmail = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;

        if (!formulario.email.value.match(patronEmail)) {
            alert("formato de email incorrecto");
            formulario.email.focus();
            document.getElementById("email").style.borderColor = "red";
            return;
        }
    }

    if (formulario.url.value == "") {
        alert("El campo URL Página personal es obligatorio");
        formulario.url.focus();
        document.getElementById("url").style.borderColor = "red";
        return "";
    } else {
        let expRegUrl = /https?:\/\/(www\.)?[-a-zA-Z0-9@:%._\+~#=]{1,256}\.[a-zA-Z0-9()]{1,6}\b([-a-zA-Z0-9()@:%_\+.~#?&//=]*)/;
        if (!formulario.url.value.match(expRegUrl)) {
            alert("Formato de URL incorrecto");
            formulario.url.focus();
            document.getElementById("url").style.borderColor = "red";
            return;
        }
    }

    if (formulario.convivientes.value < 0 || formulario.convivientes.value > 10) {
        alert("El número de convivientes debe ser estre 0 y 10");
        formulario.convivientes.focus();
        document.getElementById("convivientes").style.borderColor = "red";
        formulario.convivientes.value = 0;
        return;
    }

    formulario.submit();
}