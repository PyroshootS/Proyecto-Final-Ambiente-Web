<?php
include_once MODELS_PATH . '/database.php';


class User
{
    public $email;
    public $password;

    public function __construct($email, $password)
    {
        $this->email = $email;
        $this->password = $password;
    }

    public static function getAll()
    {
        $sql = "SELECT usuario FROM usuarios WHERE activo = 1";

        try {
            $recordset = executeQuery($sql);
            return $recordset;
        } catch (Exception $e) {
            // Implementacion del codigo que maneja el error
        }

        return NULL;
    }

    public static function delete($email)
    {

        $sql = "UPDATE usuarios SET activo = 0 WHERE usuario = '$email'";

        try {
            $result = executeQuery($sql);
            return $result;
        } catch (Exception $e) {
            // Implementacion del codigo que maneja el error
        }
        return false;
    }





}

class Identity extends User
{
    public function __construct($email, $password)
    {
        parent::__construct($email, $password);
    }

    public function validateUser($email, $password)
    {
        $database = openDatabase();
        $sql = "SELECT 1 FROM usuarios WHERE usuario = '$email' AND passwor = '$password'";

        try {
            $recordset = executeQuery($sql, );
            if (mysqli_num_rows($recordset) > 0) {
                return true;
            }
        } catch (Exception $e) {
            //implementacion del codigo que maneja el error
        
        }

        return false;

    }


    public function registerUser($email, $password)
    {
        $database = openDatabase();
        $sqlregister = "INSERT INTO proyecto_ambiente.usuarios (usuario, passwor, activo) VALUES ('$email', '$password', 1)";

        try {
            $recordset = executeQuery($sqlregister);
        } catch (Exception $e) {
            die('Error al registrar usuario: ' . $e->getMessage());
        }
    }



}
?>