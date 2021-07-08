function validar(){
    validarEmail()
    validarClave()
}
function validarR(){
    validarRN()
    validarRA()
    validarRE()
    validarRC()
}

function validarEmail (){
    var a = document.getElementById('email').value ; 
    alertaEmail = document.getElementById('alertaEmail');
    if (a.includes("@") == false || a.includes(".com") == false) {
        alertaEmail.innerHTML = 'Introduzca un email';
        return false;
    }
    else {
        alertaEmail.innerHTML = '';
        return true; 
    }
}
function validarClave(){
    var b = document.getElementById('clave').value; 
    alertaClave = document.getElementById('alertaClave');
    if (b.length < 1){
        alertaClave.innerHTML = 'Introduzca una clave';
        return false;
    }
    else {
        alertaClave.innerHTML = '';
        return true; 
    }
}

function validarRN(){
    var i = document.getElementById('nombre').value; 
    alertaRN = document.getElementById('alertaRN');
    if (i.length < 1){
        alertaRN.innerHTML = 'El campo de nombre no puede estar vacio';
        return false;
    }
    else {
        alertaRN.innerHTML = '';
        return true; 
    }
}

function validarRA(){
    var j = document.getElementById('apellido').value; 
    alertaRA = document.getElementById('alertaRA');
    if (j.length < 1){
        alertaRA.innerHTML = 'El campo de apellido no puede estar vacio';
        return false;
    }
    else {
        alertaRA.innerHTML = '';
        return true; 
    }
}

function validarRE(){
    var a = document.getElementById('email').value ; 
    alertaRE = document.getElementById('alertaRE');
    if (a.includes("@") == false || a.includes(".com") == false) {
        alertaRE.innerHTML = 'Introduzca un email valido';
        return false;
    }
    else {
        alertaRE.innerHTML = '';
        return true; 
    }
}
function validarRC(){
    var k = document.getElementById('clave').value; 
    alertaRC = document.getElementById('alertaRC');
    if (k.length < 1){
        alertaRC.innerHTML = 'El campo no puede estar vacio';
        return false;
    }
    else {
        alertaRC.innerHTML = '';
        return true; 
    }
}

function validarUsuario(){
    var email = document.getElementById('email').value ; 
    var clave = document.getElementById('clave').value ; 
    var formulario = document.getElementById('formulario')
    var dato = new FormData(formulario)
    validacion = document.getElementById('validacion'); 
    emailVal = validarEmail(); 
    claveVal = validarClave();
    if (emailVal && claveVal){
    fetch('controller/usuarioController.php',{
        method: 'POST',
        body: dato
    })
    .then(res=> res.json())
    .then(dato => {
        if(dato == 'OK'){
            validacion.innerHTML = 'Su email y contraseña son válidos';
        }
        else{
            validacion.innerHTML = 'Su email y/o contraseña no son válidos';
        }
    });
}
}
