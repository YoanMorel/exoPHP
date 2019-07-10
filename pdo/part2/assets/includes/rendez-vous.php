<?php
try {
    $connect = new PDO("mysql:host=$PARAM_host;dbname=$PARAM_db_name[1];", $PARAM_user, $PARAM_pwd, $PARAM_options);

    $results = $connect->query("SELECT DISTINCT DATE(dateHour) as onlyDate FROM appointments");
} catch (Exception $error) {
    echo 'Error : '.$error->getMessage().'<br />'.$error->getCode();
}

  array_map('htmlspecialchars', $_GET);
  extract($_GET);
  setlocale(LC_ALL, 'fr_FR.UTF-8');

  $currentMonth = (int) $monthDate;
  $currentYear = date('Y', mktime(0, 0, 0, $currentMonth, 1, (int) $yearDate));

  if ($currentMonth > 12 || $currentMonth < 1):
    ($currentMonth > 12) ? $currentMonth = 1 : $currentMonth = 12;
  endif;

  $nextMonth = $currentMonth + 1;
  $previousMonth = $currentMonth - 1;

  $busyDays = [];
  $firstDay = date('N', mktime(0, 0, 0, $currentMonth, 1, $currentYear));
  $nbDay = date('t', mktime(0, 0, 0, $currentMonth, 1, $currentYear));

  foreach ($results as $row):
    $fetchDay = explode('-', $row->onlyDate);
    if ((int) $fetchDay[1] == (int) $currentMonth):
      $busyDays[(int) $fetchDay[2]] = $row->onlyDate;
    endif;
  endforeach;
?>
<div class="table-responsive-sm">
<table class="table table-bordered calendar">
  <caption>
    <?php if($currentMonth == date('n')):
      echo '';
      else:
        ?><a href="rendez-vous/calendrier/<?= $previousMonth; ?>-<?= $currentYear; ?>.html">Voir les RDV pour <?= strftime('%B', mktime(0, 0, 0, $previousMonth, 1, $currentYear)); ?> / </a>
      <?php
    endif; ?>
    <b><?= strftime('%B', mktime(0, 0, 0, $currentMonth, 1, $currentYear)) . ' ' . $currentYear;?></b> <a href="rendez-vous/calendrier/<?= $nextMonth; ?>-<?= $currentYear; ?>.html"> / Voir les RDV pour <?= strftime('%B', mktime(0, 0, 0, $nextMonth, 1, $currentYear)); ?></a></caption>
  <thead class="thead-dark">
    <tr class="text-center">
      <th>Lundi</th>
      <th>Mardi</th>
      <th>Mercredi</th>
      <th>Jeudi</th>
      <th>Vendredi</th>
      <th>Samedi</th>
      <th>Dimanche</th>
    </tr>
  </thead>
  <tbody>
  <?php
    $xDay = 1;
    $date = 1;
    while ($date <= $nbDay):
      ?>
      <tr>
      <?php
        for ($i = 1; $i <= 7; $i++):
          if ($xDay < $firstDay || $date > $nbDay):
            $xDay++;
            ?>
            <td class="nothing"></td>
            <?php
          else:
            if ($busyDays[$date]):
            ?>
              <td class="alignText appointment">
                <a href="#" class="rdvModal" data-toggle="modal" data-target="#rdvModal" data-rdv="<?= $busyDays[$date]; ?>">
                  <div class="h-100">
                    <p class="appointmentDot"><?= $date++; ?></p>
                  </div>
                </a>
              </td>
              <?php
            else:
              ?>
              <td class="alignText">
                <?= $date++; ?>
              </td>
              <?php
          endif;
        endif;
      endfor;
      ?>
      </tr>
    <?php endwhile; ?>
  </tbody>
</table>
</div>
<!-- Modal -->
<div class="modal fade" id="rdvModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="rdvModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body table-responsive-md">
        <div class="container">

        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
