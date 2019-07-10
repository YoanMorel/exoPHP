<?php  require '../config/config.php'; ?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <base href="http://www.pdo.com/part2/" />
    <meta charset="utf-8" />
    <!-- Bootstrap setting -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
    <script src="https://kit.fontawesome.com/eaadffbb2b.js"></script>
    <link rel="stylesheet" href="assets/css/style.css" />
    <title>Hopital E2N</title>
  </head>
  <body>

  <nav class="navbar navbar-expand-lg navbar-light bg-success">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
    <a class="navbar-brand" href="#">Hopital E2N</a>
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item">
        <a href="index.php" class="btn btn-success"><i class="fas fa-h-square"></i> Accueil</a>
      </li>
      <li class="nav-item">
        <a href="ajout-patients.html" class="btn btn-success"><i class="fas fa-plus"></i> Ajouter un nouveau patient</a>
      </li>
      <li class="nav-item">
        <a href="liste-patients/page-1.html" class="btn btn-success"><i class="fas fa-stream"></i> Liste des patients</a>
      </li>
      <li class="nav-item">
        <a href="rendez-vous/calendrier/<?= date('n'); ?>-<?= date('Y'); ?>.html" class="btn btn-success"><i class="fas fa-calendar-check"></i> Les rendez-vous</a>
      </li>
    </ul>
    <?php
    if ($_GET['page']): ?>
    <form method="POST" action="liste-patients/page-1.html" class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
    </form>
    <?php endif; ?>
  </div>
  </nav>
  <?php
    if ($_GET):
      array_map('htmlspecialchars', $_GET);

    ?>
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item" aria-current="page">Accueil</li>
      <li class="breadcrumb-item active" aria-current="page"><?= $PARAM_sections[$_GET['section']]; ?></li>
    </ol>
  </nav>
  <div class="container">
  <?php
    endif;

    if ($_GET):
      $linkSection;
      foreach ($PARAM_sections as $index => $section):
        if ($_GET['section'] == $index):
          $linkSection = $index;
        endif;
      endforeach;
      include 'assets/includes/'.$linkSection.'.php';
    else:
      echo 'coucou';
    endif;

     ?>
   </div>

     <!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.4.0.js" integrity="sha256-DYZMCC8HTC+QDr5QNaIcfR7VSPtcISykd+6eSmBW5qo=" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js" integrity="sha256-0YPKAwZP7Mp3ALMRVB2i8GXeEndvCq3eSl/WsAl1Ryk=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="assets/scripts/main.js"></script>


  </body>
</html>
