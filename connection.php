<?php


    session_start();

    require_once("../dbLog.php");


    $mail = $password = "";
    $errMail = $errPassword =  "";


    if (!empty($_POST)) {
        extract($_POST);
    }

    if (isset($_POST["connection"])) {

        $mail = trim($_POST["mail"]);
        $password = trim($_POST["userPassword"]);

        /* verification mail */
    
    
        if (empty($mail)) {
            $errUserName = "Veuillez entrer votre adresse mail.";
        }
    
        /* verification mot de passe */
    
        if (empty($password)) {
            $errPassword = "Veuillez entrer votre mot de passe.";
        }
    
    
    
        if (empty($errMail) && empty($errPassword)) {
    
            $sql = "SELECT user_id, user_name, user_password  FROM users WHERE user_email = ?  ";
            
        }
    










            if($stmt = mysqli_prepare($link, $sql)){
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "s", $param_username);
                
                // Set parameters
                $param_username = $username;
                
                // Attempt to execute the prepared statement
                if(mysqli_stmt_execute($stmt)){
                    // Store result
                    mysqli_stmt_store_result($stmt);
                    
                    // Check if username exists, if yes then verify password
                    if(mysqli_stmt_num_rows($stmt) == 1){                    
                        // Bind result variables
                        mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                        if(mysqli_stmt_fetch($stmt)){
                            if(password_verify($password, $hashed_password)){
                                // Password is correct, so start a new session
                                session_start();
                                
                                // Store data in session variables
                                $_SESSION["loggedin"] = true;
                                $_SESSION["id"] = $id;
                                $_SESSION["username"] = $username;                            
                                
                                // Redirect user to welcome page
                                header("location: welcome.php");
                            } else{
                                // Password is not valid, display a generic error message
                                $login_err = "Invalid username or password.";
                            }
                        }
                    } else{
                        // Username doesn't exist, display a generic error message
                        $login_err = "Invalid username or password.";
                    }
                } else{
                    echo "Oops! Something went wrong. Please try again later.";
                }
    
                // Close statement
                mysqli_stmt_close($stmt);
            }
        }
        
        // Close connection
        mysqli_close($link);
    
        
    





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

    

    <p>Vous n'avez pas de compte? <a href="./inscription.php">Inscrivez vous maintenant.</a></p>


</body>
</html>