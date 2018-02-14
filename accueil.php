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
        <div class="cont">
            <div class="contenupage">

                <?php
                if( isset( $_SESSION['loginutilisateur']))
                {



                }
                else{

                }
                $valeur= "<script language='Javascript'> document.write(selection); </script>";
                echo $valeur;

                ?>





                <form id="formulairecnx" action="temperature.php" method="post">
                <select  name="vtc" id="choixvehicule">
                    <option value="base" disabled selected>Choisir véhicule</option>
                    <?php
                            $nomcpt = $_SESSION['loginutilisateur'];
                            include("connexion.php");
                    // Envoi de la requête
                    $select = $conn->query('SELECT voiture.voitureId  
                    FROM voiture INNER JOIN compte on voiture.compteid = compte.compteid 
                    WHERE compte.compteNom = \''.$nomcpt.'\' order by voitureId ');
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

                    <p class="btnenvoi"><a href="temperature.php"><input type="submit" class="btnenvoi" value="Valider" name="Valider"></a></p>
                </form>















            </div>
        </div>
    </div>

</div>




<script src="js/main.js"></script>
</body>