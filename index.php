<?php

    session_start();
?>
<!Doctype html>
<html>
<head>
    <title>Avance Semana08</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles/styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
     integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>
<body class="grid-container">
        <header class="header">
        <img class="logo" src="images/logo.png" alt="Logo">
            <div>
                
                <a class="login-anchor" href="login.php">Login</a>
            </div>
        </header>
        <nav class="navbar">
            <ul>
                <li>Principal</li>
                <br>
                <li>Usuarios</li>
                <br>
                <li>Empleados</li>
                <br>
                <li>Proyectos</li>
                <br>
                <li>Reportes</li>
                <br>
            </ul>
        </nav>
        <section class="main">
        <?php
            if (!isset($_SESSION['loggedIn'])) {
                include 'login.php';
            } else {
                include 'session.php';
            }
        ?>
        </section>
        <footer class="footer">Derechos Grupo 3</footer>
        <script src="scrips/main.js" type="text/javascript"></script>
    </body>
</html>