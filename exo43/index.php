<?php

$chaine1 = 'coucou';
$chaine2 = 'cuicui';

function useless($param1, $param2) {
    return $param1.$param2;
}

echo useless($chaine1, $chaine2);

?>