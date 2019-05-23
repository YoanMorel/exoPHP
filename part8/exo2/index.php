<?php

session_start();

$_SESSION['lastname']   = 'Morel';
$_SESSION['firstname']  = 'Yoan';
$_SESSION['age']        = 30;

?>

<a href="showSession.php">Show session value</a>