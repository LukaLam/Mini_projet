<?php
/**
 * Created by PhpStorm.
 * User: llambalo
 * Date: 14/03/18
 * Time: 08:52
 */
include("connexion_bdd.php");

if(isset($_GET["id"]) AND is_numeric($_GET["id"]))
{
    $id=htmlentities($_GET['id']);
    $ma_requete_SQL="DELETE FROM OEUVRE WHERE noOeuvre = ".$id.";";
    echo $ma_requete_SQL;
    $bdd->exec($ma_requete_SQL);

    header("Location: Produit_show.php");
}