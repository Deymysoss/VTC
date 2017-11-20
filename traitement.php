<?php
session_start();
$option=$_POST['option'];

?>



<?php

// Connexion au serveur
include("connexion.php");
if ($option == "connexion"){


$select = $conn->prepare("SELECT compte.compteNom FROM compte WHERE compteNom = :login AND compteMdp = :mdp");
$select->bindParam(':login', $login);
$select->bindParam(':mdp', $mdp);
try {
    // Préparation des données

    $login = $_POST['login'];
    $mdp = $_POST['mdp'];
    // Envoi de la requête avec les données


    // Indication de la méthode utilisée pour la manipulation des données
    $select->setFetchMode(PDO::FETCH_OBJ);
    // Traitement du jeu de résultats

    $success = $select->execute();

    if( $success ) {
        while( $enreg = $select->fetch() )
        {
            $_SESSION['loginutilisateur'] = $enreg->compteNom;
            $_SESSION['connecte']=true;
        }


    }
} catch( Exception $e ){
    echo 'Erreur de requète : ', $e->getMessage();
}

$select->closeCursor();
header('Location: accueil.php');




}elseif ($option == "creation"){
    $nom=$_POST['login'];
    $test = $conn->query('SELECT compte.compteNom FROM compte WHERE compteNom=\''.$nom.'\';');
    $success = $test->execute();
    $test->setFetchMode(PDO::FETCH_OBJ);
    if( $success ) {
        while( $enreg = $test->fetch() )
        {
            $lenom = $enreg->compteNom;

        }
    }
    if ($nom == $lenom) {
        echo ("Ce produit existe déjà dans la base de données");
        exit;
    }else{
        $sql = $conn->prepare('INSERT INTO compte (compteNom, compteMdp)VALUES(:login, :mdp);');
        $sql->bindParam(':login', $login);
        $sql->bindParam(':mdp', $mdp);
        try {
            // Préparation des données
            $login = $_POST['login'];
            $mdp = $_POST['mdp'];
            // Envoi de la requête avec les données
            $success = $sql->execute();

            if( $success ) {

            }
        } catch( Exception $e ){
            echo 'Erreur de requète : ', $e->getMessage();
        }

        $sql->closeCursor();
    }



header('Location: index.php');
}
?>






