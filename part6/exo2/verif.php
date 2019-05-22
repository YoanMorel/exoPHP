<?php

if(isset($_GET['age'])):
    echo htmlspecialchars($_GET['age']);
else:
    echo 'Erreur $_GET : le paramètre n\'éxiste pas.';
endif;

?>

<a href="index.html">Retour</a>