<?php     
    $accion = isset($_GET['id']) ? 'modificar' : 'nuevo';
    $id = isset($_GET['id']) ? $_GET['id'] : 0;    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="script.js"></script>
    <link rel="stylesheet" href="styles.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body class="bg">
    <form id="formularioR" name="formularioR" align=center>
        <input type="hidden" id="accion" name="accion" value="<?php echo $accion; ?>" />
        <input type="hidden" id="id" name="id" value="<?php echo $id; ?>" />
        <label>Nombre:</label>
        <p id="alertaRN"></p>
        <input type="text" onkeyup="validarR()" name="nombre" id="nombre" >
        <br>
        <label>Apellido:</label>
        <p id="alertaRA"></p>
        <input type="text" onkeyup="validarR()" name="apellido" id="apellido" >
        <br>
        <label>Email:</label>
        <p id="alertaRE"></p>
        <input type="email" onkeyup="validarR()" name="email" id="email" >
        <br>
        <label>Clave:</label>
        <p id="alertaRC"></p>
        <input type="password" onkeyup="validarR()" name="clave" id="clave" >
        <br>
        <br>
        <a href="index.php">
            <input type="button" value="Registrar" onclick="Guardar()" />
        </a>
        
    </form>
    <div id="resultado"></div>

    <?php if($id>0){ ?>
    <script>
        fetch('controller/usuarioController.php?accion=obtener&id=<?php echo $id; ?>')
        .then(res=>res.json())
        .then(res=>{            
            document.getElementById('nombre').value = res.nombre;
            document.getElementById('apellido').value = res.apellido;
            document.getElementById('email').value = res.email;
            document.getElementById('clave').value = res.clave;
        });
    </script>
    <?php } ?>

    <script>
        function Guardar(){
            var formularioR = document.getElementById("formularioR");
            var dato = new FormData(formularioR);
            var resultado = document.getElementById("resultado");
            fetch('controller/usuarioController.php',{
                method: 'POST',
                body: dato
            })
            .then(res=> res.json())
            .then(dato=>{
                if(dato == 'OK'){
                    window.location = "index.php";
                }else{
                    resultado.innerHTML = dato;
                }
            });
        }
    </script>
</body>
</html>