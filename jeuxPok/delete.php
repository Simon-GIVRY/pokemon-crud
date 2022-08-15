<!-- Réference au supression des pokémons. -->

<?php

require("./conn.php");

if($connexion){
    $pokmnId = $_POST['hiddenField'];

    $execResult = $connexion->query("DELETE FROM pokemon_games WHERE pkmn_id = $pokmnId");
    var_dump($execResult);
}


?>