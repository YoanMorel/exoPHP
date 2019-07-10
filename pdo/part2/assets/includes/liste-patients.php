<?php
try {
    array_map('htmlspecialchars', $_GET);
    $min = ($_GET['page'] - 1) * 8;
    $connect = new PDO("mysql:host=$PARAM_host;dbname=$PARAM_db_name[1];", $PARAM_user, $PARAM_pwd, $PARAM_options);

    if (!$_POST):
      $results = $connect->prepare("SELECT COUNT(a.id) AS nbrA, p.id, p.lastname, p.firstname FROM appointments a RIGHT JOIN patients p ON p.id = a.idPatients GROUP BY p.lastname, p.firstname, p.id LIMIT :min, 8") or die(print_r($results->errorInfo()));
      $results->bindParam(':min', $min);
      $results->execute();

      $nbRows = $connect->query("SELECT * FROM patients")->rowCount();
    else:
      $results = $connect->prepare("SELECT COUNT(a.id) AS nbrA, p.id, p.lastname, p.firstname FROM appointments a RIGHT JOIN patients p ON p.id = a.idPatients WHERE (p.lastname LIKE :key OR p.firstname LIKE :key) GROUP BY p.lastname, p.firstname, p.id");

      $results->bindParam(':key', $key);
      $results->execute();
    endif;


} catch (Exception $error) {
    echo 'Error : '.$error->getMessage().'<br />'.$error->getCode();
}

?>

<div class="row">
  <div class="col">

<?php
$nbrP = $nbRow;
foreach ($results as $row):
?>
<div id="<?= $row->id; ?>" class="text-center fileName">
  <?= $row->lastname.' '.$row->firstname; ?>
</div>
<div class="panel text-center" data-patient="<?= $row->id; ?>">
  <p><a href="profil-patients/patient/<?= $row->id; ?>.html">Voir le profil du patient</a></p>
  <p><?php
  if ($row->nbrA):
    ?><a href="profil-patients/patient/<?= $row->id; ?>.html">Voir les rendez-vous avec le patient</a>
    <?php
  else:
    echo 'Pas de rendez-vous planifié avec ce patient';
endif; ?>
  </p>
</div>
<?php
endforeach;
$j = (int) $_GET['page'];
$previous = ($j > 1) ? $j - 1 : 1;
$next = $j + 1;
?>
</div>
</div>
<div class="row fixed-bottom">
<div class="col-12">
  <nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
      <li class="page-item"><a class="page-link" href="liste-patients/page-<?= $previous; ?>.html">Previous</a></li>
      <?php
        for ($i = 0; $i <= $nbrP; $i++):
          if ($i % 8 == 0):
            $j++;
            ?>
            <li class="page-item"><a class="page-link" href="liste-patients/page-<?= $j; ?>.html"><?= $j; ?></a></li>
            <?php
          endif;
        endfor;
       ?>
      <li class="page-item"><a class="page-link" href="liste-patients/page-<?= $next; ?>.html">Next</a></li>
    </ul>
  </nav>
</div>
</div>
