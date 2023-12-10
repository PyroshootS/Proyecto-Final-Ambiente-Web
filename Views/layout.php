<?php
include_once(CONTROLLERS_PATH . '/userController.php');
bindUsers();

if (isset($_POST["actionMessage"])) {
    echo '<div class="alert">' . $_POST["actionMessage"] . '</div>';
}
?>