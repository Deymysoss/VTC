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
                <input id="btnacceuil" class="btn" type="button" value="Accueil" onclick="document.location.href='accueil.php';">
                <input id="btndeconnexion" class="btn" type="button" value="Déconnexion" onclick="document.location.href='index.php';">
            </div>

        </div>
        <div class="contenupage">
            <?php
            echo"<p id=\"titreconnecte\" >Bonjour : </p>".$_SESSION['loginutilisateur'];

            ?>
            </br>




        </div>
    </div>

</div>



</body>

