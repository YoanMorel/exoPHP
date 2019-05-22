<?php

$lastName = 'Morel';
$firstName = 'Yoan';
$age = 30;

function useless($param1, $param2, $param3) {
    return 'Bonjour '.$lastName.' '.$firstName.', tu as '.$age.' ans';
}

useless($lastName, $firstName, $age);

?>