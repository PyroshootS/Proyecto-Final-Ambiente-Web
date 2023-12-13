<?php
    include_once('global.php');
    include_once('models/userModel.php');
    include_once('controllers/usercontroller.php');

    session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reportes - Proyecto Ambiente</title>
    <link rel="stylesheet" href="styles/styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="grid-container">
    <header class="header">
        <img class="logo" src="images/logo.png" alt="Logo">
        <div>
            <h1 class="login-title">Reportes</h1>
        </div>
    </header>
    <nav class="navbar">
        <ul>
            <li><a href="index.php">Principal</a></li>
            <br>
            <li><a href="index.php">Usuarios</a></li>
            <br>
            <li><a href="empleados.php">Empleados</a></li>
            <br>
            <li><a href="proyectos.php">Proyectos</a></li>
            <br>
            <li><a href="reportes.php">Reportes</a></li>
            <br>
        </ul>
    </nav>
    <section class="main">
        <main class="main">
            
            <h2>Listado de Tareas y Proyectos Asignados</h2>
            <?php
                bindTareasAndProyectosAsignados(); 
            ?>
        </main>
        <?php include 'Views/section.php'; ?>
    </section>
    <footer class="footer">Derechos Grupo 3</footer>
    <script src="scrips/main.js" type="text/javascript"></script>
</body>
</html>
