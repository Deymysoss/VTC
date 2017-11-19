<?php
session_start();
if(empty($_SESSION))
{
    session_start();
    if( isset($_SESSION['loginutilisateur']))
    {
        header("Location : accueil.php");
    }
}
?>
<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="manifest" href="site.webmanifest">
        <link rel="apple-touch-icon" href="icon.png">
        <!-- Place favicon.ico in the root directory -->
        <link rel="stylesheet" href="css/styles.css">

    </head>
    <body>
        <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

        <!-- Add your site or application content here -->
        <div class="page">
            <div class="contenu">
                <div class="header">
                    <div class="logo">

                    </div>
                    <div class="menu">
                        <input id="btnacceuil" class="btn" type="button" value="Accueil" onclick="document.location.href='index.php';">
                        <input id="btnregister" class="btn" type="button" value="Création d'un compte" onclick="document.location.href='register.php';">
                    </div>
                </div>
                <div class="contenupage">
                    <p id="titrecnx" >Connexion au compte :</p></br>
                        <form id="formulairecnx" method="post" action="traitement.php">

                            <p>login :</br><input  type="text" name="login"></p>
                            <p>mot de passe :</br><input type="password" name="mdp"></p>
                            </br>
                            <input id="btnvalider" class="btn" type="submit" name="envoyer" value="envoyer">

                        </form>
                    <?php

                    ?>
                </div>
            </div>

        </div>





        <script src="js/vendor/modernizr-3.5.0.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-3.2.1.min.js"><\/script>')</script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>

        <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
        <script>
            window.ga=function(){ga.q.push(arguments)};ga.q=[];ga.l=+new Date;
            ga('create','UA-XXXXX-Y','auto');ga('send','pageview')
        </script>
        <script src="https://www.google-analytics.com/analytics.js" async defer></script>






    </body>
</html>
