<?php

session_start();

echo $_SESSION['lastname'].' '.$_SESSION['firstname'].' '.$_SESSION['age'];

?>