<?php
include("connexion_bdd.php");

if(isset($_GET["id"]) AND is_numeric($_GET["id"])){
    //Accès au modèle
    $id=htmlentities($_GET['id']);
    $ma_requete_SQL="SELECT OEUVRE.titre, OEUVRE.noOeuvre, OEUVRE.idAuteur, OEUVRE.dateParution
        FROM OEUVRE
        WHERE noOeuvre = ".$id.";";
    $reponse = $bdd->query($ma_requete_SQL);
    $donnees = $reponse->fetch();
}

?>

<form method="post" action="Oeuvre_edit.php">
    <div class="row">
        <fieldset>
            <legend>Modifier une oeuvre</legend>
            <!-- Champ caché avec l'id pour conserver la valeur de l'id lors de la validation !-->
            <input name="noOeuvre" type="hidden" value="<?php if(isset($donnees['titre'])) echo $donnees['dateParution']; ?>"/>
            
            <label>Titre
                <input name="titre" type="text" size="18" value="<?php if(isset($donnees['titre'])) echo $donnees['titre']; ?>"/>
            </label>

            <label>Date de parution
                <input name="dateParution" type="text" size="18" value="<?php if(isset($donnees['dateParution'])) echo $donnees['dateParution']; ?>"/>
            </label>

            <label>Identifiant de l'auteur
                <input name="idAuteur" type="text" size="18" value="<?php if(isset($donnees['idAuteur'])) echo $donnees['idAuteur']; ?>"/>
            </label>

            <input name="ModifierOeuvre" type="submit" value="Modifier" />
        </fieldset>
    </div>
</form>
