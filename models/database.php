<?php
function openDatabase()
{
//Este es mi conexion de Workbench, tienen que poner la que tienen ustedes ya sea en xamp o en su workbench
    #return mysqli_connect("127.0.0.1:3306", "usuario", "clave", "proyecto_ambiente");
    return mysqli_connect("127.0.0.1:3306", "root", "", "proyecto_ambiente");
}
function closeDatabase($database)
{
    mysqli_close($database);
}

function executeQuery($sql){
    $database = openDatabase(); 
    $recordset = mysqli_query($database, $sql);
    closeDatabase($database);

    return $recordset;  
}
?>