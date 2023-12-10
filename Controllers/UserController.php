<?php  
    include_once 'global.php';
    
    include_once 'models/userModel.php';
    
    
     
    # Valida si la variable login ha sido enviada por medio del metodo POST 
    if (isset($_POST["login"])){
        $email = $_POST["email"];
        $password = $_POST["password"];
        $credentials = new Identity($email, $password);

        if($credentials->validateUser($email, $password)){
            $_SESSION["loggedIn"] = true;
            $_SESSION["email"] = $email;

            header("Location: index.php");
        } else {
            $_POST["errorMessage"] = "La combinación de usuario y contraseña no es válida.";
        }
    }

    $credentials = new Identity("", ""); 

    if (isset($_POST["register"])) {
        $email = $_POST["email"];
        $password = $_POST["password"];

        // Actualizar la instancia de $credentials con los datos reales
        $credentials->email = $email;
        $credentials->password = $password;

        if ($credentials->registerUser($email, $password)) {
            $_POST["RegisterMessage"] = "Registro Exitoso";
        } else {
            $_POST["errorMessage"] = "La combinación de usuario y contraseña no es válida.";
        }
    }

    function bindUsers()
    {
        $recordset = User::getAll();

        if (is_null($recordset) || mysqli_num_rows($recordset) == 0)
        {
            $_POST['actionMessage'] = 'No se han encontrado usuarios.';
            return;
        }

        echo "<table>";
        echo "<tr><th>Correo electrónico</th><th>Activo</th><th>Acciones</th></tr>";
        while ($record = mysqli_fetch_assoc($recordset)) {
            echo "<tr><td>" . $record["usuario"] . "</td>";
        
            // Verificar si la clave 'activo' está definida antes de intentar acceder a ella
            $activo = isset($record["activo"]) ? $record["activo"] : "";
        
            echo "<td>" . $activo . "</td>";
            echo "<td><button type='button' onclick='Delete(\"" . $record["usuario"] . "\")'>Borrar</button></td></tr>";
        }
        
        echo "</table>";
    }

    # asi se comenta 1 linea en php
    // asi se comenta tambien  1 linea
    /*  asi se comenta pero mas lineas*/  
?>
