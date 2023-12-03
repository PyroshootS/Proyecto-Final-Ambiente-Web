<?php
    include_once 'Controller/UsuarioController.php';

    if (isset($_POST['errorMessage'])) {
        echo '<div class="alert">' . $_POST["errorMessage"] . ' </div>';
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" />
</head>

<body>
    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="row">
            <div class="container text-center">
                <h1 class="mx-auto">Inicio de sesión</h1>
            </div>
            <form id="loginForm" name="loginForm" method="post">
                <div class="mb-12">
                    
                    <label for="exampleInputEmail1" class="form-label">Correo electronico</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" name="exampleInputEmail1" aria-describedby="emailHelp" required />
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="exampleInputPassword1" minlength="6" maxlength="12" required />
                </div>
                <button type="submit" class="btn btn-primary">Ingresar</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

    <script type="text/javascript">

    const email = document.getElementById("exampleInputEmail1");
    email.addEventListener("input", (event) => {
        if (email.validity.typeMismatch) {
            email.setCustomValidity("No es una dirección de correo electronico valida!");
        }
        else {
            email.setCustomValidity("");
        }
    });

    const password = document.getElementById("exampleInputPassword1");
    password.addEventListener("input", (event) => {
        if (password.validity.tooShort || password.validity.tooLong) {
            password.setCustomValidity("La contraseña no  es valida");
        }
        else {
            password.setCustomValidity("");
        }
    });

    const form = document.getElementById("loginForm");
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
</body>

</html>