 <?php 
include_once ($_SERVER["DOCUMENT_ROOT"] . '/tp8efsi/model/usuario.php');

class UsuarioDao{
    public static function nuevo($item) {        
        $DBH = new PDO("mysql:host=127.0.0.1;dbname=sistema", "root", "");
        $query = 'INSERT INTO usuario (nombre,apellido,email,clave) values(:nombre,:apellido,:email,:clave)';
        $STH = $DBH->prepare($query);
        $STH->setFetchMode(PDO::FETCH_ASSOC);
        $params = array(                                
            "nombre" => $item->nombre,
            "apellido" => $item->apellido,
            "email" => $item->email,
            "clave" => $item->clave

        );
        $STH->execute($params);

        return $DBH->lastInsertId();
    }

    public static function modificar($item) {
        $DBH = new PDO("mysql:host=127.0.0.1;dbname=sistema", "root", "");
        $query = 'UPDATE usuario SET nombre = :nombre, apellido = :apellido, email = :email, clave = :clave WHERE id = :id';
        $STH = $DBH->prepare($query);
        $STH->setFetchMode(PDO::FETCH_ASSOC);
        $params = array(                                
            ":nombre" => $item->nombre,
            ":apellido" => $item->apellido,
            ":email" => $item->email,
            ":clave" => $item->clave,
            ":id" => $item->id
        );
        $STH->execute($params);
    }

    public static function validarUsuario($email, $clave){
        $DBH = new PDO("mysql:host=127.0.0.1;dbname=sistema", "root", "");
        $query = 'SELECT * FROM usuario WHERE email= :email AND clave= :clave';
        $STH = $DBH->prepare($query); 
        $STH->setFetchMode(PDO::FETCH_ASSOC); 
        $params = array(
            ":email" => $email,
            ":clave" => $clave
        );
        $STH->execute($params);
        if ($STH-> rowCount() > 0){
            return true;
        }
        else {
            return false; 
        }
    }
    
}

 ?>