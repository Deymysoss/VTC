<?php
session_start();
?>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/styles.css">



</head>



<body>
<div class="page">
    <div class="contenu">
        <div class="header">
            <div class="logo">

            </div>
            <div class="menu">
                <input id="btnacceuil" class="btn" type="button" value="Accueil" onclick="document.location.href='index.php';">
                <input id="btndeconnexion" class="btn" type="button" value="Déconnexion" onclick="document.location.href='deconnexion.php';">
            </div>

        </div>
        <div class="contenupage">
            <table id="tableaudonnées">
                <tr>
                    <th>histDate</th>
                    <th>consoBatterie</th>
                    <th>temperatureMoteur</th>

                </tr>


            <?php
            $nomcpt = $_SESSION['loginutilisateur'];
            include("connexion.php");
            // Envoi de la requête
            $select = $conn->query('SELECT historique.histDate, historique.consoBatterie, historique.temperatureMoteur FROM historique INNER JOIN voiture ON historique.voitureid = voiture.voitureid INNER JOIN compte on voiture.compteid = compte.compteid WHERE compte.compteNom = \''.$nomcpt.'\';');
            // Indication de la méthode utilisée pour la manipulation des données

            try {
                /* $nomcompte = $_SESSION['loginutilisateur'];*/

                while ($ligne = $select->fetch()) {
                    ?>
                    <tr>
                        <th><?php echo $ligne['histDate'];?></th>
                        <th><?php echo $ligne['consoBatterie'];?></th>
                        <th><?php echo $ligne['temperatureMoteur'];?></th>
                    </tr>
                    <?php
                }

            }
            catch(Exception $e)
            {
                die('Erreur : '.$e->getMessage());
            }
            ?>

            </table>









        </div>
    </div>

</div>



</body>