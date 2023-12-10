<?php
    session_start();
    
    #Limpia todas las variables de sesion
    session_unset();

    #Desruye la sesion
    session_destroy();

    header('location: index.php');
?>

<!Doctype html>
<html>

<head>
    <title> Ambiente Web Proyecto</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="styles/main.css">
</head>

<body>
    Closing session.....
</body>

</html>