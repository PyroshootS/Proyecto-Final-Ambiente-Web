<?php
    include_once  '/userController.php';
    if (isset($_POST["errorMessage"]))
{echo '<div class="alert">' . $_POST["errorMessage"] . '</div>';}
?>
<form id="registerForm" name="registerForm" method="post" autocomplete="off">
<fieldset>
<legend>Formulario de Registro</legend>
        <p>
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Correo Electrónico" />      
        </p>
        <p>
            <label for="register_password">Password</label>
            <input type="password" id="register_password" name="register_password" placeholder="Contraseña" />
        </p>
        <p>
                <label for="confirmPassword">Confirm Password</label>
                <input type="password" id="confirm_password" name="confirm_password" placeholder="Contraseña" />
        </p>
        <p>
            <button type="submit" id="register" name="register">Register</button>
        </p>
    </fieldset>
</form>
<script type="text/javascript">
    $(document).ready(function() {
        $("#registerForm").validate({
            rules: {
                email: {
                    required: true,
                    email: true
                },
                register_password: {
                    required: true,
                    minlength: 6,
                    maxlength: 12
                },
                confirm_password: {
                    required: true,
                    minlength: 6,
                    maxlength: 12,
                    equalTo: "#register_password"
                }
            },
            messages: {
                email: {
                    required: "El correo electrónico es obligatorio.",
                    email: "El correo electrónico no es válido."
                },
                register_password: {
                    required: "La contraseña es obligatoria.",
                    minlength: "la contraseña debe tener almenos 6 caracteres.",
                    maxlength: "La contraseña no debe exceder los 12 caracteres."
                },
                confirm_password: {
                    required: "La confirmación de la contraseña es obligatoria.",
                    minlength: "La confirmación de la contraseña debe tener almenos 6 caracteres.",
                    maxlength: "La confirmación de la contraseña no debe exceder los 12 caracteres.",
                    equalTo: "La confirmación de la contraseña debe ser igual a la contraseña."
                }
            }
        });
    });
</script>