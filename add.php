
<?php
//fichier qui permettra d'ajouter des jeux pokemon

require("./conn.php");

if($connexion){

    $pkmn_game_name= $_POST["titre-poke-jeux"];
    $pkmn_generation = $_POST["generation"];
    $pkmn_release_date = $_POST["d-de-sortie"];
    $pkmn_support = $_POST["support-sortie"];
    
    $execResult = $connexion->query("INSERT INTO pokemon_games (pkmn_game_name,pkmn_generation,pkmn_release_date,pkmn_support) VALUE ('$pkmn_game_name',$pkmn_generation,$pkmn_release_date,'$pkmn_support')");
    var_dump($pkmn_game_name);
    // Parcours du tableau de résultats (afin d'afficher chaque utilisateur)
//     
}
?>