<?php
            session_start();

            $idvoiture = $_POST['select'];
            $nomcpt = $_SESSION['loginutilisateur'];
            include("connexion.php");
            // Envoi de la requête
            $select = $conn->query('SELECT historique.histDate, historique.consoBatterie, historique.temperatureMoteur, historique.voitureId FROM historique INNER JOIN voiture ON historique.voitureid = voiture.voitureid INNER JOIN compte on voiture.compteid = compte.compteid WHERE compte.compteNom = \''.$nomcpt.'\' and historique.voitureid = \''.$idvoiture.'\' ');
            // Indication de la méthode utilisée pour la manipulation des données

            try {
                /* $nomcompte = $_SESSION['loginutilisateur'];*/

                while ($ligne = $select->fetch()) {
                        $tableaudonnees = array(
                            array($ligne['histDate'] , $ligne['consoBatterie'],$ligne['temperatureMoteur'])

                        );
                        echo $ligne['consoBatterie'];



                }

            }
            catch(Exception $e)
            {
                die('Erreur : '.$e->getMessage());
            }





?>