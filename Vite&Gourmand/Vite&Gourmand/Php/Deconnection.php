<?php
// On démarre la session

    session_start();

//on déconnect l'utilisateur et on le redirige automatiquement vers la page d'accueil

    unset($_SESSION["conect"]);

    header("location: ../Php/index.php");
?>

<?php

// On affiche le contenu du Footer

require_once "../Require/Footer.html";
?>