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
<div class="page">
    <div class="contenu">
        <div class="header">
            <div class="logo">

            </div>
            <div class="menu">
                <input id="btnacceuil" class="btn" type="button" value="Accueil" onclick="document.location.href='index.php';">
            </div>
        </div>
        <div class="cont">
            <div class="contenupage">



                <form id="formulairecnx" method="post" action="traitement.php">

                    <p>type de la voiture  </br><input   type="text" name="typev"></p>
                    <p>mot de passe de la voiture </br><input type="text" name="mdpv"></p>
                    </br>
                    <input type="hidden" name="option" value="ajoutvoiture">
                    <input id="btnvalider" class="btnenvoi1" type="submit" name="valider" value="valider">
                </form>

            </div>
        </div>
    </div>

</div>



</body>

</html>