
<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <script src="script.js"></script>
    <link rel="stylesheet" href="styles.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
  </head>
  <body class="bg">
    <div align=center>
        <h1>Login</h1>
        <form id="formulario" onsubmit="validarUsuario(); return false " name="formulario" method="POST">
        <label>Email:</label>
        <p id="alertaEmail" action="/tp8efsi/controller/usuarioController.php"></p>
        <input type="email" onkeyup="validar()" name="email" id="email" >
        <br> 
        <label>Clave:</label>
        <p id="alertaClave"></p>
        <input type="password" onkeyup ="validar()" name="clave" id="clave" > 
        <br>
        <input id="enviar" type="submit" value="Enviar" onclick="validarUsuario()" onmouseover="validar()" >  
    </form> 
    
  </p>
</div>
    <h3 id="validacion" align=center></h3>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>