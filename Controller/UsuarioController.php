<?php  
//recordar las direcciones 
    include_once '/xampp/htdocs/Proyecto/models/UsuarioModel.php';

    if (isset($_POST["login"])){
        $email = $_POST["email"];
        $password = $_POST["password"];

        if(validarUsuario($email, $password)){
            $_SESSION["loggedIn"]=true;
            $_SESSION["email"] =$email;

            header("Location: /Proyecto/index.php");
        }
        else{
            $_POST["errorMessage"] = "La combinacion de usuario y contraseña no es valida.";
        }
    }