<!-- Référence au modification pokémon. -->
 
<?php 

    require("./conn.php");

    if($connexion){
        if($_GET && $_GET["pkmn_id"]){
            $pkmnId = $_GET["pkmn_id"];

            //On selection tout de la table pokemon games qui on un identifiant
            $execResult = $connexion->query("SELECT * FROM pokemon_games WHERE pkmn_id=$pkmnId");

            //Permet de pouvoir afficher le resultat.
            $result = $execResult->fetchAll(PDO::FETCH_ASSOC);
        }

        else{
                $pkmnId = $_POST["pkmn_id"];
                $newName = $_POST["titre"];
                $newGen = $_POST["generation"];
                $newReDate = $_POST["ddesortie"];
                $newSupp = $_POST["supportsortie"];
                $newIm = $_POST["image"];

                $execResult = $connexion->query("UPDATE pokemon_games SET pkmn_game_name = '$newName', pkmn_generation ='$newGen' , pkmn_support = '$newSupp', pkmn_release_date ='$newReDate' WHERE pkmn_id = '$pkmnId'");
                var_dump($execResult);
        }
    }

?>

<form method="POST" action="./update.php">
        <input type="hidden" name="pkmn_id" value="<?php if(isset($result)){ echo $_GET["pkmn_id"];} ?>">
        <div>
            <label for="titre-de-jeux">Titre de jeux pokémon: </label>
            <input type="text" name="titre" id="titre-de-jeux" value="<?php if(isset($result)){ echo $result[0]["pkmn_game_name"];}?>">
        </div>

        <div>
            <label for="gener">Génération: </label>
            <input type="number" name="generation" id="gener" value="<?php if(isset($result)){ echo $result[0]["pkmn_generation"];}?>">
        </div>

        <div>
            <label for="supp-sortie">Support de sortie : </label>
            <input type="text" name="supportsortie" id="supp-sortie" value="<?php if(isset($result)){ echo $result[0]["pkmn_support"];}?>">
        </div>

        <div>
            <label for="date-de-sortie">Date de sortie Européenne : </label>
            <input type="date" name="ddesortie" id="date-de-sortie" value="<?php if(isset($result)){ echo $result[0]["pkmn_release_date"];}?>">
        </div>

        <input type="submit" value="Ajouter">
    </form>
    <a href="./read.php" title="Redirection vers la liste">Retourner à la liste pokemon</a>