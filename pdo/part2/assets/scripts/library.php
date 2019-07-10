<?php
  $fmt = new IntlDateFormatter(
    'fr_FR',
    NULL,
    NULL,
    NULL,
    NULL,
    'EEEE dd LLLL yyyy'
);
var_dump($t = $fmt->parse($convertDate), date('d/m/Y', $t));
?>
