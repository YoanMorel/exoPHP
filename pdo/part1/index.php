<?php

  require '../config/config.php';

  try {
    $connect = new PDO("mysql:host=$PARAM_host;dbname=$PARAM_db_name[0]", $PARAM_user, $PARAM_pwd, $PARAM_options);

    $resultsPart1 = $connect->query("SELECT * FROM clients");
    while($row = $resultsPart1->fetch()):
      echo $row->lastName.'<br />';
    endwhile;

    $resultsPart1->closeCursor();

    // PART 2
    echo '<hr />';

    $resultsPart2 = $connect->query("SELECT * FROM showTypes");
    while($row = $resultsPart2->fetch()):
      echo $row->type.'<br />';
    endwhile;

    // PART 3
    echo '<hr />';

    $resultsPart3 = $connect->query("SELECT * FROM clients LIMIT 20");
    while($row = $resultsPart3->fetch()):
      echo $row->lastName.'<br />';
    endwhile;

    // PART 4
    echo '<hr />';

    $resultsPart4 = $connect->query("SELECT lastName FROM clients WHERE card");
    while($row = $resultsPart4->fetch()):
      echo $row->lastName.'<br />';
    endwhile;

    // PART 5
    echo '<hr />';

    $resultsPart5 = $connect->query("SELECT lastName, firstName FROM clients WHERE lastName LIKE 'M%' ORDER BY lastName ASC");
    while ($row = $resultsPart5->fetch()):
      echo 'Nom : '.$row->lastName.'<br />Prénom : '.$row->firstName.'<br />';
    endwhile;

    // PART 6
    echo '<hr />';

    $resultsPart6 = $connect->query("SELECT title, performer, `date`, startTime FROM shows");
    while ($row = $resultsPart6->fetch()):
      echo $row->title.' - '.$row->performer.' le '.$row->date.' à '.$row->startTime.'<br />';
    endwhile;

    // PART 7
    echo '<hr />';

    $resultsPart7 = $connect->query("SELECT *, DATE_FORMAT(`birthDate`, '%d/%m/%Y') as `bDATE` FROM clients");
    while ($row = $resultsPart7->fetch()):
      echo 'Nom : '.$row->lastName.'<br />Prénom : '.$row->firstName.'<br />Date de Naissance : '.$row->bDATE.'<br />Carte : ';
      echo ($row->card) ? 'Oui<br />Numéro de carte : '.$row->cardNumber.'<br /><br />' : 'Non<br /><br />';
    endwhile;

  } catch (Exception $error) {
    echo 'Error : '.$error->getMessage().'<br />N ° : '.$error->getCode();
  }

 ?>
