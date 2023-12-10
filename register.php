<?php

include_once 'Controllers/UserController.php';

?>

<!Doctype html>
<html>
<head>
    <title>Proyecto Ambiente</title>
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
                <h1 class="register-title">Register</h1>
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
        <form class="registerForm" id="registerForm" name="registerForm" method="post">
    <fieldset>
        <input type="email" id="email" name="email" placeholder="Correo Electronico" required />
        <input type="password" id="password" name="password" placeholder="Contraseña" minlength="6" maxlength="12"
            required />
        <button class="botton-submit" type="submit" id="register" name="register">Register</button>
        <a class="a-botton" href="/index.php">Home</a>
    </fieldset>


</form>
        </section>
        <footer class="footer">Derechos Grupo 3</footer>
        <script src="scrips/main.js" type="text/javascript"></script>
    </body>
</html>


<script type="text/javascript">
    const email = document.getElementById("email");
    email.addEventListener("input", (event) => {
        if (email.validity.typeMismatch) {
            email.setCustomValidity("No es una dirección de correo electronico valida!");
        }
        else {
            email.setCustomValidity("");
        }
    });

    const password = document.getElementById("password");
    password.addEventListener("input", (event) => {
        if (password.validity.tooShort || password.validity.tooLong) {
            password.setCustomValidity("La contraseña no  es valida");
        }
        else {
            password.setCustomValidity("");
        }
    });

    const form = document.getElementById("registerForm");
    form.addEventListener("submit", (event) => {
        if (email.validity.valueMissing) {
            email.setCustomValidity("La direccion de correo electronico es obligatoria")
        }

        if (password.validity.valueMissing) {
            alert("La contraseña es obligatoria");
            event.preventDefault();
        }

        if (!email.validity.valid || !password.validity.valid) {
            event.preventDefault();
        }
    });

</script>