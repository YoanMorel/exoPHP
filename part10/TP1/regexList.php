<?php

$text = '/^[a-zA-ZçéèÉÈôîêûÛÊÔÎùÙïöëüËÏÖÜ\']{2,17}[- \']?[a-zA-ZçéèÉÈôîêûÛÊÔÎùÙïöëüËÏÖÜ]{0,17}$/';
$zipCode = '/^[0-9]{5}|[9]{1}[7]{1}[1-6]{1}$/';
$birthDate = '/^([12]\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01]))$/';
$street = '/^[0-9]+[a-zA-ZéèÉÈôîêûÛÊÔÎùÙïöëüËÏÖÜ\' ]{2,15}[- \']?[a-zA-ZéèÉÈôîêûÛÊÔÎùÙïöëüËÏÖÜ ]{0,15}[a-zA-ZéèÉÈôîêûÛÊÔÎùÙïöëüËÏÖÜ ]{0,15}$/';
$mail = '/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/';
$phone = '/^[0][1-9]([-. ]?)(([0-9]{2})\1([0-9]{2}))(\1([0-9]{2})){2}|[+]33[0-9]([-. ]?)(([0-9]{2})\7([0-9]{2}))(\7([0-9]{2})){2}$/';
$peNumber = '/^[0-9]{7}[A-Z]$/';
$url = '/^(https?:\/\/(?:www\.|(?!www))[a-zA-Z0-9][a-zA-Z0-9-]+[a-zA-Z0-9]\.[^\s]{2,}|www\.[a-zA-Z0-9][a-zA-Z0-9-]+[a-zA-Z0-9]\.[^\s]{2,}|https?:\/\/(?:www\.|(?!www))[a-zA-Z0-9]+\.[^\s]{2,}|www\.[a-zA-Z0-9]+\.[^\s]{2,})$/';

?>