<?php

    require_once("../dbLog.php");


    $mail = $password = "";
    $errMail = $errPassword =  "";


    if (!empty($_POST)) {
        extract($_POST);
    }

    if (isset($_POST["connection"])) {
        $mail = trim($_POST["mail"]);
        $password = trim($_POST["userPassword"]);
    }


    /* verification mail */


    if (empty($mail)) {
        $errUserName = "Veuillez entrer votre adresse mail.";
    }

    /* verification mot de passe */

    if (empty($password)) {
        $errPassword = "Veuillez entrer votre mot de passe.";
    }



    if (empty($errMail) && empty($errPassword)) {
        
    }



?>




<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connection</title>
</head>
<body>

    <h1>Se connecter</h1>

    <form action="./connection.php" method="$_POST">


        <label for="mail">Votre adresse mail</label>
        <input type="text" name="mail" id="unsername">

        <br>

        <label for="mdp">Mot de passe</label>
        <input type="password" name="userPassword" id="mdp">

        <input type="submit" value="connection" name="connection">


    </form>
    
</body>
</html>