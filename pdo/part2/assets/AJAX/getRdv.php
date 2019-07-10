<?php
require '../../../config/config.php';
setlocale(LC_ALL, 'fr_FR.UTF-8');
array_map('htmlspecialchars', $_POST);
extract($_POST);

try {
  $connect = new PDO("mysql:host=$PARAM_host;dbname=$PARAM_db_name[1];", $PARAM_user, $PARAM_pwd, $PARAM_options);

  $results = $connect->prepare("SELECT a.dateHour, p.id, p.lastname, p.firstname FROM appointments a JOIN patients p ON p.id = a.idPatients WHERE DATE(a.dateHour) = ?");
  $results->bindParam(1, $rdv);
  $results->execute();

  $convertDate;
  while ($date = $results->fetch(PDO::FETCH_ASSOC)):
    $fetchDate = explode(' ', $date['dateHour']);
    $convertDate = strftime('%A %d %B %Y',strtotime($fetchDate[0]));
    $rdvTab[] = $date['id'].'-'.$date['lastname'].'-'.$date['firstname'].'-'.$convertDate.'-'.$fetchDate[1];
  endwhile;

  $response = implode('/', $rdvTab);
  echo $response;

} catch (Exception $error) {
    echo 'Error : '.$error->getMessage().'<br />'.$error->getCode();
}
