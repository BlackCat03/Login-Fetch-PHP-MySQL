
<?php

include_once ($_SERVER["DOCUMENT_ROOT"] . '/tp8efsi/dao/UsuarioDao.php');

$email = $_POST['email']; 
$clave = $_POST['clave']; 

if (isset($email) and isset($clave)){
$verificar = UsuarioDao::validarUsuario($email, $clave);
if ($verificar == true){
    echo json_encode("OK");
}

else{
    echo json_encode("NO");
}
}

$accion = isset($_POST['accion']) ? $_POST['accion'] : (isset($_GET['accion']) ? $_GET['accion'] : ''); //RECIBO EL PARAMETRO ACCION    

    switch ($accion) {
        case 'nuevo':            
            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
            $apellido = isset($_POST['apellido']) ? $_POST['apellido'] : '';
            $email = isset($_POST['email']) ? $_POST['email'] : '';
            $clave = isset($_POST['clave']) ? $_POST['clave'] : '';
            if(trim($nombre) == ''){
                echo json_encode('Debe completar el campo nombre');
                return;
            }
            if(trim($apellido) == ''){
                echo json_encode('Debe completar el campo apellido');
                return;
            }
            if(trim($email) == ''){
                echo json_encode('Debe completar el campo email');
                return;
            }
            if(trim($clave) == ''){
                echo json_encode('Debe completar el campo clave');
                return;
            }
            $per = new Usuario();
            $per->nombre = $nombre;
            $per->apellido = $apellido;
            $per->email = $email;
            $per->clave = $clave;
            $id = UsuarioDao::nuevo($per);
            if($id >0){
                echo json_encode('OK');
            }else{
                echo json_encode('No se pudo dar de alta');
            }
            break;

        case 'modificar':
            $id = isset($_POST['id']) ? $_POST['id'] : '';
            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
            $apellido = isset($_POST['apellido']) ? $_POST['apellido'] : '';
            $email = isset($_POST['email']) ? $_POST['email'] : '';
            $clave = isset($_POST['clave']) ? $_POST['clave'] : '';
            if($nombre == ''){
                echo json_encode('Debe completar el campo nombre');
                return;
            }
            if($apellido == ''){
                echo json_encode('Debe completar el campo nombre');
                return;
            }
            if($email == ''){
                echo json_encode('Debe completar el campo nombre');
                return;
            }
            if($clave == ''){
                echo json_encode('Debe completar el campo nombre');
                return;
            }
            $per = UsuarioDao::ObtenerPorID($id);
            $per->nombre = $nombre;
            $per->apellido = $apellido;
            $per->email = $email;
            $per->clave = $clave;
            UsuarioDao::modificar($per);
            echo json_encode('OK');
            break;

        case 'obtener':
            $id = isset($_GET['id']) ? $_GET['id'] : '';
            $per = UsuarioDao::ObtenerPorID($id);
            echo json_encode($per);
            break;
    }
?>