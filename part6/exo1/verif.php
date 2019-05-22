<?php

if(!empty($_GET['lastname']) AND !empty($_GET['firstname'])):
    echo 'lastname = '.htmlspecialchars($_GET['lastname']).' / firstname = '.htmlspecialchars($_GET['firstname']);
else:
    echo 'Erreur : les paramètres recherchés n\'existent pas';
endif;

?>

<a href="index.html">Retour</a>