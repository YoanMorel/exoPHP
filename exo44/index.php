<?php

$nbr1 = 1;
$nbr2 = 2;

function useless($param1, $param2) {
    $chaine = '';
    if($param1 > $param2):
        $chaine = 'Le premier nombre est plus grand.';
    elseif($param1 < $param2):
        $chaine = 'Le premier nombre est plus petit';
    else:
        $chaine = 'Les deux nombres sont identique';
    endif;
    
    return $chaine;
}

useless($nbr1, $nbr2);

?>