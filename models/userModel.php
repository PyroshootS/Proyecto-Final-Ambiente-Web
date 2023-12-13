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
        $sql = "SELECT usuario, activo FROM usuarios";

        try {
            $recordset = executeQuery($sql);
            return $recordset;
        } catch (Exception $e) {
            // Implementacion del codigo que maneja el error
        }

        return NULL;
    }
    function delete($email)
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
    public static function getAllProjects()
    {
        $sql = "SELECT * FROM proyectos";

        try {
            $recordset = executeQuery($sql);
            return $recordset;
        } catch (Exception $e) {
            // Implementación del código que maneja el error
        }

        return NULL;
    }
    public static function getAllEmpleados()
    {
        $sql = "SELECT * FROM empleados";

        try {
            $recordset = executeQuery($sql);
            return $recordset;
        } catch (Exception $e) {
            // Implementación del código que maneja el error
        }

        return NULL;
    }
    public static function getAllTareas()
    {
        $sql = "SELECT * FROM tareas";

        try {
            $recordset = executeQuery($sql);
            return $recordset;
        } catch (Exception $e) {
            // Implementación del código que maneja el error
        }

        return NULL;
    }
    public static function getProyectosAsignados()
    {
        $sql = "SELECT pa.id_asignacion, pa.id_proyecto, p.nombre_proyecto, pa.id_empleado
                FROM ProyectosAsignados pa
                INNER JOIN proyectos p ON pa.id_proyecto = p.id_proyecto";

        try {
            $recordset = executeQuery($sql);
            return $recordset;
        } catch (Exception $e) {
            // Implementación del código que maneja el error
        }

        return NULL;
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
            header("location: " . ROOT);
        } catch (Exception $e) {
            die('Error al registrar usuario: ' . $e->getMessage());
        }
    }



}

function password_change($email, $password)
{
    $sql = "UPDATE  proyecto_ambiente.usuarios SET passwor='$password' where usuario='$email'";
    try {
        $recordSet = ExecuteQuery($sql);
        return $recordSet;
    } catch (Exception $e) {

    }


    return False;
}


?>