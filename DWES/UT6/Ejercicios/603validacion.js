'use strict'

function validarFormulario() {
    if (document.getElementById("formulario").nombre.value == "") {
        alert("El campo Nombre es obligatorio");
        document.getElementById(formulario).nombre.focus();
        return 0;
    }

    if (document.getElementById("formulario").apellidos.value == "") {
        alert("El campo Apellidos es obligatorio");
        document.getElementById(formulario).apellidos.focus();
        return 0;
    }

    if (document.getElementById("formulario").email.value == "") {
        alert("El campo email es obligatorio");
        document.getElementById(formulario).email.focus();
        return "";
    } else {
        let patronEmail = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;

        if (!patronEmail.test(document.getElementById("formulario").email.value)) {
            alert("formato de email incorrecto");
            document.getElementById(formulario).email.focus();
            return "";
        }
    }

    if (document.getElementById("formulario").url.value == "") {
        alert("El campo URL Página personal es obligatorio");
        document.getElementById(formulario).url.focus();
        return "";
    }

    document.getElementById("formulario").submit();
}