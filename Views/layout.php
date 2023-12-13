<?php
include_once(CONTROLLERS_PATH . '/userController.php');
bindUsers();

if (isset($_POST["actionMessage"])) {
    echo '<div class="alert">' . $_POST["actionMessage"] . '</div>';
}

?>
<div class="CambioCon-div">
    <h4 class="CambioCon-Titulo" >¿Desea cambiar la contraseña del usuario logeado? </h4>
    
    <a class="a-botton" href='../profile.php'>Cambiar contraseña</a>
</div>

<script>
    function ajax() {
        const php =
    }
</script>