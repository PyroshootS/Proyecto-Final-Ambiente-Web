<?php
    
    include_once 'UsuarioModel.php';

    function authorizeUser($email)
    {
        $_SESSION['loggedIn'] = true;
        $_SESSION['email'] = $email;

        header('Location: ' . ROOT . '/index.php' );
    }
    /*
    function bindUsers(){
        $recordset = User.getAll();

        if (is_null($recordset) || mysqli_num_rows($recordset) == 0)
        {
            $_POST['actionMessage'] = 'No se han encontrado usuarios.';
            return;
        }

        echo "<table>";
        echo "<tr><th>Correo electrónico</th><th>Activo</th><th>Acciones</th></tr>";
        while ($record = mysqli_fetch_assoc($recordset)) 
        {
            echo "<tr><td>" . $record["usuario"] . "</td>
                <td>" . $record["activo"] . "</td>
                <td><a href='" . ROOT . "/profile.php'>Cambiar contraseña</a></td></tr>";
        }
        echo "</table>";
    }
    */

    # Valida si la variaqble login ha sido enviada al servidor por medio del metodo POST
    if (isset($_POST['login']))
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $credentials = new Identity($email, $password);

        if ($credentials->validate())
        {
            authorizeUser($email);
        }
        else
        {
            $_POST['errorMessage'] = 'La combinación de usuario y contraseña no es válida.';
        }
    }

    if (isset($_POST['register']))
    {
        $email = $_POST['email'];
        $password = $_POST['register_password'];
        $confirmPassword = $_POST['confirm_password'];

        if ($password !== $confirmPassword)
        {
            $_POST["errorMessage"] = 'Las contraseñas deben ser exactamente iguales.';
        }
        else
        {
            $credentials = new Identity($email, $password);
            if (!$credentials->register())
            {
                $_POST["errorMessage"] = 'El usuario no pudo ser registrado.';
            }
            else
            {
                authorizeUser($email);
            }
        }
    }
?>
