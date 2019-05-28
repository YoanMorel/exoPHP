<?php

$lastName = 'Morel';
$firstName = 'Yoan';
$age = 30;

function useless($param1, $param2, $param3) {
    return 'Bonjour '.$param1.' '.$param2.', tu as '.$param3.' ans';
}

echo useless($lastName, $firstName, $age);

?>