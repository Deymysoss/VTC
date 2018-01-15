<?php
session_start();
?>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

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
                <input id="btndeconnexion" class="btn" type="button" value="Ajout véhicule" onclick="document.location.href='ajoutvoiture.php';">
            </div>

        </div>
        <div class="contenupage">

            <?php
            if( isset( $_SESSION['loginutilisateur']))
            {

                echo "<p>". $_SESSION['message']."</p>";

            }
            else{

            }
            $valeur= "<script language='Javascript'> document.write(selection); </script>";
            echo $valeur;

            ?>






            <span class="custom-dropdown custom-dropdown--white">

            <select class="custom-dropdown__select custom-dropdown__select--white" name="vtc" id="choixvehicule" onchange="RecuperationId();">
                <option value="base" disabled selected>Choisir véhicule</option>
                <?php
                        $nomcpt = $_SESSION['loginutilisateur'];
                        include("connexion.php");
                // Envoi de la requête
                $select = $conn->query('SELECT voiture.voitureId  FROM voiture INNER JOIN compte on voiture.compteid = compte.compteid WHERE compte.compteNom = \''.$nomcpt.'\' order by voitureId ');
                // Indication de la méthode utilisée pour la manipulation des données

                try {
                /* $nomcompte = $_SESSION['loginutilisateur'];*/

                while ($ligne = $select->fetch()) {


                    echo '<option value="'.$ligne[voitureId].'">'.$ligne[voitureId].'</option>';

                    }

                }
                catch(Exception $e)
                {
                    die('Erreur : '.$e->getMessage());
                }

                ?>


            </select>
            </span>













        </div>
    </div>

</div>




<script src="js/main.js"></script>
</body>