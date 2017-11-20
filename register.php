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
                    </div>
                </div>
                <div class="contenupage">

                        <p id="titrecreation" >Création d'un compte :</p></br>

                        <form id="formulairergst" method="post" action="traitement.php">

                            <p>login </br><input   type="text" name="login"></p>
                            <p>mot de passe </br><input type="text" name="mdp"></p>
                            <input type="hidden" name="option" value="creation"/>
                            <input id="btnvalider" class="btn" type="submit" name="valider" value="valider">
                        </form>


                </div>
            </div>

        </div>



</body>

