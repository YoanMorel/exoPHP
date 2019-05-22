<?php

$gender = 'quentin';
$age = 30;

function useless($param1, $param2) {
    $chaine = '';
    switch($param1):
        case 'homme':
            $chaine = ($param2 >= 18) ? 'Vous êtes un homme et vous êtes majeur.' : 'Vous êtes un homme et vous êtes mineur.';
            break;
        case 'femme':
            $chaine = ($param2 >= 18) ? 'Vous êtes une femme et vous êtes majeure' : 'Vous êtes une femme et vous êtes mineure';
            break;
        default:
            $chaine = 'Vous êtes Quentinette et j\'espère que vous êtes majeure !';
    endswitch;
    
    return $chaine;
}

useless($gender, $age);

?>