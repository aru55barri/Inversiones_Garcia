function sololetrasMa(e){
    var nombre = document.getElementById('inputFirstName');    
    key=e.keyCode || e.which;
    teclado=String.fromCharCode(key);
    /*letras="abcdefghijklmnopqrstuvwxyz";.toLowerCase()*/
    letras=" ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    especiales="8-37-38-46-164";
    teclado_especial=false;

    for(var i in especiales){
        if(key==especiales[i]){
            
            teclado_especial=true;break;
            
        }
    }
    if(letras.indexOf(teclado)==-1 && !teclado_especial ){
    document.querySelector('#button').disabled = true;
    $("#mensaje").text("Por favor solo ingrese letras Mayusculas").css("color","red");
    nombre.style.borderColor = "red";
    nombre.style.boxShadow = "0 0 10px red";
    return false;
    }else{
        $("#mensaje").text("").css("color","red");
        document.querySelector('#button').disabled = false;
        nombre.style.borderColor = "green";
        nombre.style.boxShadow = "0 0 10px green";

    }
}


function sololetrasAp(e){
    var apellido = document.getElementById('inputLastName');       
    key=e.keyCode || e.which;
    teclado=String.fromCharCode(key);
    letras=" ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    especiales="8-37-38-46-164";
    teclado_especial=false;
    for(var i in especiales){
        if(key==especiales[i]){
            
            teclado_especial=true;break;
            
        }
    }
    if(letras.indexOf(teclado)==-1 && !teclado_especial){
     document.querySelector('#button').disabled = true;
    $("#1mensaje").text("Por favor solo ingrese letras Mayusculas").css("color","red");
    apellido.style.borderColor = "red";
    apellido.style.boxShadow = "0 0 10px red";
    return false;
    }else{
        $("#1mensaje").text("").css("color","red");
        document.querySelector('#button').disabled = false;
        apellido.style.borderColor = "green";
        apellido.style.boxShadow = "0 0 10px green";
    }
}
function sololetrasUsu(e){
    var nombreUsuario = document.getElementById('txtUsuario');     
    key=e.keyCode || e.which;
    teclado=String.fromCharCode(key);
    letras="ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    especiales="8-37-38-46-164";
    teclado_especial=false;
    for(var i in especiales){
        if(key==especiales[i]){
            
            teclado_especial=true;break;
            
        }
    }
    if(letras.indexOf(teclado)==-1 && !teclado_especial){
    document.querySelector('#button').disabled = true;
    $("#usuariomensaje").text("Por favor solo ingrese letras Mayusculas").css("color","red");
    nombreUsuario.style.borderColor = "red";
    nombreUsuario.style.boxShadow = "0 0 10px red";
    return false;
    }else{
        $("#usuariomensaje").text("").css("color","red");
        document.querySelector('#button').disabled = false;
        nombreUsuario.style.borderColor = "green";
        nombreUsuario.style.boxShadow = "0 0 10px green";
    }
}

function solonumeros(e) {

    var Identidad = document.getElementById('txtID');
    key = e.keyCode || e.which;
    teclado = String.fromCharCode(key).toLowerCase();
    numeros = "0123456789";
    especiales = "8-37-38-46-164";
    teclado_especial = false;
    for (var i in especiales) {
        if (key == especiales[i]) {

            teclado_especial = true; break;

        }
    }
    if (numeros.indexOf(teclado) == -1 && !teclado_especial) {
        document.querySelector('#button').disabled = true;
        $("#2mensaje").text("Por favor solo ingrese numeros").css("color", "red");
        Identidad.style.borderColor = "red";
        Identidad.style.boxShadow = "0 0 10px red";
        return false;
    } else {
        $("#2mensaje").text("").css("color", "red");
        document.querySelector('#button').disabled = false;
        Identidad.style.borderColor = "green";
        Identidad.style.boxShadow = "0 0 10px green";
    }
}

function contra(e){
   
    var password = document.getElementById('ncontraseña');
    var password2 = document.getElementById('cncontraseña');
    
    password.onchange = password2.onkeyup = passwordMatch;

    function passwordMatch() {
        if(password.value !== password2.value){
            document.querySelector('#button').disabled = true;
            $("#contra2mensaje").text("Las contraseñas no coinciden").css("color","red");
        }   
        else{
            document.querySelector('#button').disabled = false;
            $("#contra2mensaje").text("Las contraseñas coinciden totalmente").css("color","green");
        }
    } 

}

