<?php
session_start();
$min= 0;
$idvoiture = $_POST['vtc'];
$nomcpt = $_SESSION['loginutilisateur'];
$tableaudate=array();
$tableauconso=array();
$tableautemp=array();
include("connexion.php");
// Envoi de la requête
$select = $conn->query('SELECT historique.histDate, historique.consoBatterie, historique.temperatureMoteur, historique.voitureId FROM historique INNER JOIN voiture ON historique.voitureid = voiture.voitureid INNER JOIN compte on voiture.compteid = compte.compteid WHERE compte.compteNom = \''.$nomcpt.'\' and historique.voitureid = \''.$idvoiture.'\' ');
// Indication de la méthode utilisée pour la manipulation des données

try {
    /* $nomcompte = $_SESSION['loginutilisateur'];*/

    while ($ligne = $select->fetch()) {
        $dt_string = $ligne['histDate'];
        $dt=new DateTime($dt_string);

        if($min!=$dt->format('i')){
            $min=$dt->format('i');
            array_push($tableaudate,$min);
        }

        array_push($tableautemp,$ligne['temperatureMoteur']);
        array_push($tableauconso,$ligne['consoBatterie']);

    }

}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}






$ordonnee1 = $tableautemp;//températures (ne pas mettre de texte)
$abcisse1 = $tableaudate;//minutes (ne pas mettre de texte)
$titre1 = "Température moteur fonction du temps";
$label1 = "température";
$label_abcisse1 = "5 dernieres minutes d'utilisation";
$label_ordonnee1 = "température";




$ordonnee2 = $tableauconso;//températures (ne pas mettre de texte)
$abcisse2 = $tableaudate;//minutes (ne pas mettre de texte)
$titre2 = "Température moteur fonction du temps";
$label2 = "température";
$label_abcisse2 = "5 dernieres minutes d'utilisation 2";
$label_ordonnee2 = "température";



function echo_array($tab)
{
    $str_data = '[';
    foreach($tab as $value) 
    {
        $str_data = $str_data.$value.',';
    }
    $str_data = substr($str_data,0,-1).']';
    echo $str_data;
}
?>
<!doctype html>
<html>

<head>
    <title>Line Chart</title>
    <script src="resources/Chart.bundle.js"></script>
    <script src="resources/utils.js"></script>
    <style>
    canvas{
        -moz-user-select: none;
        -webkit-user-select: none;
        -ms-user-select: none;
    }
    </style>
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
                <input id="btndeconnexion" class="btn" type="button" value="Ajout véhicule" onclick="document.location.href='ajoutvoiture.php';">
            </div>

        </div>
        <div class="contenupage">


            <div style="width:100%;">
                <canvas id="canvas"></canvas>
            </div>
            <br>
            <br>

            <script>
                var MONTHS = <?php echo_array($abcisse1); ?>;
                var config = {
                    type: 'line',
                    data: {
                        labels: <?php echo_array($abcisse1); ?>,
                        datasets: [{
                            label: <?php echo '"'.$label1.'"'; ?>,
                            backgroundColor: window.chartColors.red,
                            borderColor: window.chartColors.red,
                            data: <?php echo_array($ordonnee1); ?>,
                            fill: false,
                        }]
                    },
                    options: {
                        responsive: true,
                        title:{
                            display:true,
                            text:<?php echo '"'.$titre1.'"'; ?>
                        },
                        tooltips: {
                            mode: 'index',
                            intersect: false,
                        },
                        hover: {
                            mode: 'nearest',
                            intersect: true
                        },
                        scales: {
                            xAxes: [{
                                display: true,
                                scaleLabel: {
                                    display: true,
                                    labelString: <?php echo '"'.$label_abcisse1.'"'; ?>
                                }
                            }],
                            yAxes: [{
                                display: true,
                                scaleLabel: {
                                    display: true,
                                    labelString: <?php echo '"'.$label_ordonnee1.'"'; ?>
                                }
                            }]
                        }
                    }
                };
                window.onload = function() {
                    var ctx = document.getElementById("canvas").getContext("2d");
                    window.myLine = new Chart(ctx, config);
                };




            </script>


        </div>

    </div>

</div>


</body>
</html>
