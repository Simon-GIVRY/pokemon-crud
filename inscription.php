<?php

    require_once("../dbLog.php");


   /*  $username = $mail = $password = $confirmedPassword = $userPfp = ""; */
    $errUserName = $errPassword = $errConfirmedPassword = $errMail = $errPfp = "";

    $aa ="";  /* var test to delete */

    if ($connexion) {

        $query=$connexion->prepare("INSERT INTO users (user_name, user_email, user_password, user_img) VALUES (?, ?, ?, ?)");
        /*   if (!empty($_POST)) {
            extract($_POST);
        }  */
        
        
        if (isset($_POST["inscription"])) {

            foreach ($_POST as $fields => $values){
    
                if ($fields == "user_name" ){
                    
                    $username = trim($values);
        
                    /* verification username */
                    if (empty($username)) {
                        $errUserName = "Ce champ doit être rempli";
                    }

                    elseif (!preg_match('/^[a-zA-Z0-9_]/', $username)) {
                            $errUserName = "Le nom d'utilisateur peut seulement contenir des lettres, des nombres et des underscores";
                    }
                    else {
                        $query->mysqli_stmt_bind_param($query, "s", $username);
                    }
                    
                    
                }
                
                
                if ($fields === "user_mail") {
                    $mail = trim($values);
                    
                    /* verification mail */ 
                    if (empty($mail)) {
                        $errMail = "Ce champ doit être rempli";
                    } 
                    elseif (!filter_var($mail, FILTER_VALIDATE_EMAIL))  {
                        $errMail = "Votre adresse email n'est pas conforme.";
                        
                    }
                    else {
                        $query->mysqli_stmt_bind_param($query, "s", $mail);
                    }
                }
                
                if ($fields === "user_password") {
                    
                    $password = trim($values);

                    /* Password verification */
                    if (empty($password)) {
                        $errPassword = "Ce champ doit être rempli.";
                    } 
                    else {

                        /* Verify if password has more than 8 characters */
                        if (strlen($password) <= 8) {
                            $errPassword = "Votre mot de passe doit au moins faire 8 charactère de long.";
                        }

                        /* Verify if password has at least one uppercase letter, one number and one  */
                        if (!preg_match('/[A-Z]/', $password)  || !preg_match('/\d/', $password) || !preg_match("/[$&+,:;=?@#|'<>.-^*()%!]/", $password) ) {
                            $errPassword = "Votre mot de passe doit contenir au moins une majuscule et au moins un chiffre.";
                        }

                    
                    }
                    /* Verify if there's any error so we can hash the password for the query */
                    if (empty($errPassword)) {
                        $hashedPassword=hash('sha512', htmlspecialchars($password) );

                    }
                }
    
                if ($fields === "user_confirmedPassword") {
                
                    $confirmedPassword = trim($values);

                    /* confirmed password verification */
                    if (empty($confirmedPassword)) {
                        $errConfirmedPassword = "Ce champ doit être rempli.";
                    } 
                    elseif ($password != $confirmedPassword) {
                        $errConfirmedPassword = "Vos mots de passes ne correspondent pas.";
                    }
                    else {                   
                        $query->mysqli_stmt_bind_param($query, 's', $hashedPassword);
                    }
                }
            

            
            
    
                

            

    
                if ($fields === "user_img"){
        
                    $userPfp = trim($values);
        
                    /* verification pfp */
                    if (!empty($userPfp)) {
                        
                        if (!filter_var($userPfp, FILTER_VALIDATE_URL)) {
                            $errPfp = "Votre url n'est pas conforme.";
                        }
                        else {
                            $query->mysqli_stmt_bind_param($query, "s", $userPfp);
                        }
                    }
                    
                }
                
                /* var_dump($username); */
                /* var_dump($_POST); */
                /* var_dump($fields); */
                /* var_dump($values); */
                /* var_dump($username);
                var_dump($password);
                var_dump($mail); */
            }
            
            
            /* ENVOIE REQUETE */
            if (empty($errUserName) && empty($errMail) && empty($errPassword) && empty($errConfirmedPassword) && empty($errPfp)) {
                $query->execute();
                
                header("Location: ./inscriptionReussi.php");
            }
        
        }

        
        
    } 



   

    

    
    
?>




<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
</head>

<body>

    <form action="./inscription.php" method="post">

        <label for="name">Entrez votre nom&nbsp;:</label>
        <div> <?php echo $errUserName ?> </div>
        <input type="text" name="user_name" value="<?php if (isset($username)) { echo $username; } ?>" id="name">
        <br>


        <label for="email">Entrez votre adresse mail&nbsp;:</label>
        <div> <?php echo $errMail ?></div>
        <input type="email" name="user_mail" value="<?php if (isset($mail)) { echo $mail; } ?>"  id="email">
        <br>

        <label for="password">Entrez votre mot de passe&nbsp;:</label>
        <div> <?php echo $errPassword ?> </div>
        <input type="password" name="user_password" id="password">
        <br>

        <label for="cconfirmedPassword">Vérifiez votre mot de passe&nbsp;:</label>
        <div> <?php echo $errConfirmedPassword ?> </div>
        <input type="password" name="user_confirmedPassword" id="confirmedPassword">
        <br>


        <label for="pfp">Entrez l'url de votre image de profil&nbsp;:</label>
        <div>
            <p>Ce champ n'est pas obligatoire et peut etre rempli plus tard</p>
        </div>
        <input type="url" name="user_img" value="" id="pfp">

        <br>
        <input type="submit" name="inscription" value="S'inscrire">


<br>
        <p> <?php echo $aa ?> </p>

    </form>


</body>

</html>





