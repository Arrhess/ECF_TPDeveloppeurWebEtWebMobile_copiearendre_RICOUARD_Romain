<?php
// On démarre la session

session_start();

// Si la session contient un utilisateur, on affiche un Header_connect, sinon on affiche le Header basique

    if (isset($_SESSION["conect"])){
        require_once "../Require/Header_connect.php";
    }else{
        require_once "../Require/Header.html";
}
?>

<!-- Contenu de la page Contact -->

<body>

<h2> Contacter le service client :</h2>

<section class="Contacte_sec">

<div id="Contacts">
<label id="Label_Contacts"> Email :</label>
<a id="Mailto" href="mailto:service-client@viteetgourmand.com">&nbsp service-client@viteetgourmand.com</a>
</div>

<div id="Contacts">
<label id="Label_Contacts"> Téléphone : </label>
<label>&nbsp01 23 45 67 89</label>
</div>

</section>


</body>

<?php

// On affiche le contenu du Footer

require_once "../Require/Footer.html";
?>