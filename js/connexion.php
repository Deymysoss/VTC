<?php

session_start();

function autoloader($classname)
{
    require $classname.'.php';
}

try{
    $pdo=new pdo('mysql:host=localhost;dbname=voiturerc','root','root');

}
catch(PDOException $e)
{
    echo 'impossible de se connecter a la bdd'.$e->getmessage();
}

spl_autoload_register('autoloader');


$manager= new manager($pdo);


if (isset($_POST['envoyer'])) {

    $user=$manager->SelectUser($_POST['login'],$_POST['mdp']);

    if ($user) {
        $_SESSION['USER']=serialize($user);

        header('location:menu.php');
    }
    else
    {
        echo 'mot de passe incorrect';
    }

}


?>