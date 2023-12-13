<?php
include_once 'Controllers/UserController.php';

if (isset($_POST["errorMessage"])) {
    echo ("<div class='alert'>{$_POST['errorMessage']}</div>");
}

session_start();
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyecto ambiente</title>
    <link rel="stylesheet" href="styles/styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>

<body class="grid-container">
    <header class="header">
        <img class="logo" src="images/logo.png" alt="Logo">
        <div>
            <h1 class="register-title">Cambiar contraseña</h1>
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
     <h2>Correo:<?php echo $_SESSION["email"]; ?><h2>
        <form class="changepassword" id="changePasswordForm" name="changePasswordForm" action="" method="post">
            <input type="hidden" id="email_sent" name="email_sent" value="<?php echo $_SESSION["email"]; ?>">
            <input type="password" id="change_password" name="change_password" placeholder="Contraseña">
            <input type="password" id="change_passwordConfirm" name="change_passwordConfirm"
                placeholder="Confirmar Contraseña">
            <button class="botton-submit" type="submit" id="change" name="change">Confirmar</button>
        </form>
    </section>
    <aside class="sidebar"></aside>
    <footer class="footer">Derechos Grupo 3</footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/additional-methods.min.js"
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $("#changePasswordForm").validate({
                rules: {

                    change_password: {
                        required: true,
                        minlength: 6,
                        maxlength: 12
                    },
                    change_passwordConfirm: {
                        required: true,
                        minlength: 6,
                        maxlength: 12,
                        equalTo: "#change_password"

                    }
                },
                messages: {

                    change_password: {
                        required: "La contraseña es obligatoria",
                        maxlength: "La  contraseña no debe exceder los 12 caracteres.",
                        minlength: "La contraseña debe tener un mínimo de 6 caracteres"
                    },
                    change_passwordConfirm: {
                        required: "La contraseña es obligatoria",
                        minlength: "La confirmación de la contraseña debe tener almenos 6 caracteres.",
                        maxlength: "La confirmación de la contraseña no debe exceder los 12 caracteres.",
                        equalTo: "La confirmación de la contraseña debe ser igual a la contraseña."
                    }
                }
            }
            )
        })
    </script>
</body>

</html>