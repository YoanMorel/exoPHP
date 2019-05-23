<?php

$currentDate   = new DateTime("now");
$previousDate  = new DateTime("2016-05-16");

$difference    = $currentDate->diff($previousDate);

echo $difference->days.' jours.';
?>