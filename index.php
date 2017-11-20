 <?php
        session_start();
        if( isset( $_SESSION['connecte']))
        {
 ?>
            <meta http-equiv="refresh" content="0; url=accueil.php">
            <?php
        }
        else{
 ?>
            <meta http-equiv="refresh" content="0; url=pageconnexion.php">
            <?php

    }
 ?>
