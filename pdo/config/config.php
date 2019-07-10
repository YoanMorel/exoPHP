<?php

$PARAM_host     = 'localhost';
$PARAM_db_name  = ['colyseum', 'hospitalE2N'];
$PARAM_user     = 'yoan';
$PARAM_pwd      = 'a8x305j';

$PARAM_options  = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
    PDO::ATTR_EMULATE_PREPARES   => false
];

$PARAM_sections = [
    'ajout-patients'  => 'Ajout de patients',
    'liste-patients'  => 'Liste des Patients',
    'profil-patients' => 'Profil du patient',
    'rendez-vous'     => 'Liste des Rendez-vous'
];

 ?>
