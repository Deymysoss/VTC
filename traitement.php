<?php
session_start();
include("connexion.php");
?>
<?php

// Connexion au serveur


$select = $conn->prepare("SELECT utilisateur.login FROM utilisateur WHERE login = :login AND mdp = :mdp");
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
            $_SESSION['loginutilisateur'] = $enreg->login;
        }


    }
} catch( Exception $e ){
    echo 'Erreur de requète : ', $e->getMessage();
}
?>





<?php
// Connexion au serveur

$sql = $conn->prepare('INSERT INTO utilisateur VALUES(:login, :mdp);');
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
header('Location: accueil.php');
?>

