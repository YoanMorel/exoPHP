<?php

$nbr1 = 2;
$nbr2 = 2;

function useless($param1, $param2) {
    $chaine = '';
    if($param1 > $param2):
        $chaine = 'Le premier nombre est plus grand.';
    elseif($param1 < $param2):
        $chaine = 'Le premier nombre est plus petit';
    else:
        $chaine = 'Les deux nombres sont identiqueS';
    endif;
    
    return $chaine;
}

echo useless($nbr1, $nbr2);

?>