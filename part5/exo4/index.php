<?php

include('../exo1/index.php');

$key = array_search('aout', $month);

$month[$key] = 'août';

echo $month[$key];

?>