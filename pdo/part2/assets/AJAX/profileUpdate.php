<?php

require '../../../config/config.php';
array_map('htmlspecialchars', $_POST);
extract($_POST);

$frenchDate = explode('/', $birthdate);
$usDate = $frenchDate[2].'-'.$frenchDate[1].'-'.$frenchDate[0];

try {
  $connect = new PDO("mysql:host=$PARAM_host;dbname=$PARAM_db_name[1];", $PARAM_user, $PARAM_pwd, $PARAM_options);

  $results = $connect->prepare("UPDATE patients SET `birthdate` = ?, phone = ?, mail = ? WHERE id = ?");
  $results->bindParam(1, $usDate);
  $results->bindParam(2, $phone);
  $results->bindParam(3, $mail);
  $results->bindParam(4, $id);
  $results->execute();
} catch (Exception $error) {
  echo 'Error : '.$error->getMessage().'<br />'.$error->getCode();
}

$response = 'update completed...';
echo $response;

 ?>
