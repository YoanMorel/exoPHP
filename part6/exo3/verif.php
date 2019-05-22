<?php

if(!empty($_GET['startDate']) && !empty($_GET['endDate'])):
    echo htmlspecialchars($_GET['startDate']).' '.htmlspecialchars($_GET['endDate']);
else:
    echo'Erreur GET : le paramètre n\'existe pas';
endif;

?>

