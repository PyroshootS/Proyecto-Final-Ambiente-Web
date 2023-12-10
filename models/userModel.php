<?php
include_once 'database.php';
function validateUser($email, $password)
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
        // backoff with jitter=> reintentar la ejecucion despues de un tiempo dado  o un tiempo aleatorio
    }

    return false;

}   

function registerUser($email, $password){
    $database = openDatabase();
    $sqlregister = "INSERT INTO proyecto_ambiente.usuarios (usuario, passwor, activo) values
    ('$email','$password',1);";

    try {
        $recordset = executeQuery($sqlregister, );
    } catch (Exception $e) {
    }
}
?>