<?php
include_once 'database.php';
function validarUsuario($email, $password)
{
    $database = openDatabase();
    $sql = "SELECT 1 FROM usuarios WHERE usuario = '$email' AND passwor = '$password'";

    try {
        $recordset = executeQuery($sql, );
        if (mysqli_num_rows($recordset) > 0) {
            return true;
        }
    } catch (Exception $e) {

    }

    return false;

}   
