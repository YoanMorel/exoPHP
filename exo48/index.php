<?php

$nbr1 = 3;
$nbr2;
$nbr3 = 45;

function useless($param1 = 0, $param2 = 0, $param3 = 0) {
    return $param1 + $param2 + $param3;
}

echo useless($nbr1, $nbr2, $nbr3);

?>