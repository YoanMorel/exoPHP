<?php
setlocale(LC_ALL, 'fr_FR');

$dateMinus20 = time() - (3600 * 24 * 20);

echo strftime('%A %e %B %Y', $dateMinus20);
?>