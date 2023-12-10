<?php  
    include_once 'models/userModel.php';
    # Valida si la variable login ha sido enviada por medio del metodo POST 
    if (isset($_POST["login"])){
        $email = $_POST["email"];


        $password = $_POST["password"];

        if(validateUser($email, $password)){
            $_SESSION["loggedIn"]=true;
            $_SESSION["email"] =$email;

            header("Location: index.php");
        }
        else{
            $_POST["errorMessage"] = "La combinacion de usuario y contraseña no es valida.";
        }
    }

    if (isset($_POST["register"])){
        $email = $_POST["email"];
        $password = $_POST["password"];

        if(registerUser($email, $password)){
            $_POST["RegisterMessage"] = "Registro Exitoso";
        }
        else{
            $_POST["errorMessage"] = "La combinacion de usuario y contraseña no es valida.";
        }
    }

    # asi se comenta 1 linea en php
    // asi se comenta tambien  1 linea
    /*  asi se comenta pero mas lineas*/  
?>








