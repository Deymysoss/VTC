<!doctype html>
<html class="no-js" lang="">
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



            <form id="formulairecnx" method="post" action="traitement.php">

                <p>login :</br><input  type="text" name="login"></p>
                <p>mot de passe :</br><input type="password" name="mdp"></p>
                </br>
                <input type="hidden" name="option" value="connexion">
                <input id="btnvalider" class="btn" type="submit" name="envoyer" value="envoyer">
            </form>

            <?php
            session_start();
            if( isset( $_SESSION['connexionfail']))
            {

                echo "<p>". $_SESSION['message']."</p>";

            }
            else{

            }
            ?>
        </div>
    </div>

</div>






<!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
<script>
    window.ga=function(){ga.q.push(arguments)};ga.q=[];ga.l=+new Date;
    ga('create','UA-XXXXX-Y','auto');ga('send','pageview')
</script>
<script src="https://www.google-analytics.com/analytics.js" async defer></script>






</body>
</html>
