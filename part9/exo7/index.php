<?php
setlocale(LC_ALL, 'fr_FR');

$datePlus20 = time() + (3600 * 24 * 20);

echo strftime('%A %e %B %Y', $datePlus20);

?>