<?php

$nbr1 = 1;
$nbr2 = 1;
$nbr3;

function useless($param1 = 0, $param2 = 0, $param3 = 1) {
    return $param1 + $param2 + $param3;
}

echo useless($nbr1, $nbr2);

?>