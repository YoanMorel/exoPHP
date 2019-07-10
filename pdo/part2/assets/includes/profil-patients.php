<?php
if ($_GET):
  setlocale(LC_ALL, 'fr_FR.UTF-8');
  array_map('htmlspecialchars', $_GET);
  $idPatient = (int) $_GET['patient'];
try {
    $connect = new PDO("mysql:host=$PARAM_host;dbname=$PARAM_db_name[1];", $PARAM_user, $PARAM_pwd, $PARAM_options);

    $results = $connect->prepare("SELECT p.*, DATE_FORMAT(p.birthdate, '%d/%m/%Y') AS birthD, GROUP_CONCAT(a.dateHour) AS datesCombined FROM patients p LEFT JOIN appointments a ON a.idPatients = p.id WHERE p.id = ? GROUP BY p.id");
    $results->execute([$idPatient]);
} catch (Exception $error) {
    echo 'Error : '.$error->getMessage().'<br />'.$error->getCode();
}

foreach ($results as $row):
 ?>

<div class="row mx-auto">
  <div class="col">
    <div class="card">
  <div class="card-header">
    <p data-patient="<?= $row->id; ?>"><i class="far fa-user-circle"></i> Profil du Patient</p>
  </div>
  <div class="card-body">
    <h5 class="card-title"><i class="fas fa-user-tag"></i> <b><?= $row->firstname.' '.$row->lastname; ?></b></h5>
    <p class="card-text">
      <div class="table-responsive">
      <table class="table table-borderless profile">
        <tr>
          <td>Année de naissance : </td><td id="birthdate"><?= $row->birthD; ?></td>
        </tr>
        <tr>
          <td>Numéro de téléphone : </td><td id="phone"><?= $row->phone; ?></td>
        </tr>
        <tr>
          <td>Adresse eMail : </td><td id="mail"><?= $row->mail; ?></td>
        </tr>
      </table>
      </div>
      <h5 class="card-title"><i class="far fa-calendar-check"></i> <b>Les Rendez-Vous</b></h5>
      <div class="container">
        <?php
    if($row->datesCombined):
    $datesCombined = explode(',', $row->datesCombined);
    foreach($datesCombined as $aDate):
      $fetchDate = explode(' ', $aDate);
      $convertDate = strftime('%A %d %B %Y',strtotime($fetchDate[0]));
         ?>
        <div class="row">
        <div class="col-4">
          <p>Le <?= $convertDate; ?></p>
        </div>
        <div class="col-4">
          <p><?= $fetchDate[1]; ?></p>
        </div>
        </div>
        <?php
      endforeach;
         ?>
       </div>
       <?php
    else:
      ?>
      <div class="row text-center">
        <div class="col-12">
          <p>Pas de rendez-vous de fixé avec ce patient pas malade</p>
        </div>
      </div>
      <?php
    endif;
     ?>
    </p>
    <a id="profilBtn" href="liste-patients/page-1.html" class="btn btn-primary">Retour</a>
  </div>
</div>
</div>
</div>
<?php
endforeach;
else:

endif;
 ?>
