<?php

$age = 18;
$gender = 'femme';

switch($gender):
    case 'homme':
        echo ($age >= 18) ? 'Vous êtes un homme et vous êtes majeur.' : 'Vous êtes un homme et vous êtes mineur.';
        break;
    case 'femme':
        echo ($age >= 18) ? 'Vous êtes une femme et vous êtes majeure.' : 'Vous êtes une femme et vous êtes mineure.';
        break;
    default:
        echo 'Vous êtes Bilal Hassani.';
endswitch;

?>