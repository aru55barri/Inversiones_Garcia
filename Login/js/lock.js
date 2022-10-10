//FUNCION MOSTRAR PASSWORD

function mostrarPassword() {
    var cambio = document.getElementById("clave");
    if (cambio.type == "password") {
        cambio.type = "text";
    } else {
        cambio.type = "password";
    }
}



function mostrarContra() {
    var cambio = document.getElementById("txtContra");
    if (cambio.type == "password") {
        cambio.type = "text";
    } else {
        cambio.type = "password";
    }
}


function mostrarContrasena() {
    var cambio = document.getElementById("txtConfirmarContra");
    if (cambio.type == "password") {
        cambio.type = "text";
    } else {
        cambio.type = "password";
    }
}

function mostrarPasswordN() {
    var cambi = document.getElementById("ncontrasena");
    if (cambi.type == "password") {
        cambi.type = "text";
    } else {
        cambi.type = "password";
    }
    
}

function mostrarPasswordC() {
    var camb = document.getElementById("cncontrasena");
    if (camb.type == "password") {
        camb.type = "text";
    } else {
        camb.type = "password";
    }
    
}
