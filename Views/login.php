<?php
include_once 'Controllers/UserController.php';

if (isset($_POST['errorMessage'])) {
    echo '<div class="alert">' . $_POST["errorMessage"] . ' </div>';
}
?>

<form class="loginForm" id="loginForm" name="loginForm" method="post">
    <fieldset>
        <input type="email" id="email" name="email" placeholder="Correo Electronico" required />
        <input type="password" id="password" name="password" placeholder="Contraseña" minlength="6" maxlength="12"
            required />
        <button class="botton-submit" type="submit" id="login" name="login"> Login </button>
        <a class="a-botton" href="register.php"> Register </a>
    </fieldset>
</form>

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