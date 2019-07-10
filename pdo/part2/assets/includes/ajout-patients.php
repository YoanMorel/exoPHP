<?php
if (!$_POST) {
  ?>
  <form action="index.php?section=ajout-patients" method="post" class="needs-validation" novalidate>
  <div class="form-row">
    <div class="col-md-6 mb-3">
      <label for="validationCustom01">Prénom</label>
      <input type="text" class="form-control" id="validationCustom01" placeholder="Prénom" value="" name="firstName" required>
    </div>
    <div class="col-md-6 mb-3">
      <label for="validationCustom02">Nom</label>
      <input type="text" class="form-control" id="validationCustom02" placeholder="Nom" value="" name="lastName" required>
    </div>
    <div class="col-md-6 mb-3">
      <label for="validationCustom04">Année de naissance</label>
      <input type="date" class="form-control" id="validationCustom04" placeholder="Année de Naissance" name="birthD" required>
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-6 mb-3">
      <label for="validationCustom03">N° de téléphone</label>
      <input type="text" class="form-control" id="validationCustom03" placeholder="N° de téléphone" name="phone" required>
    </div>
    <div class="col-md-12 mb-3">
      <label for="validationCustomUsername">Adresse eMail</label>
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroupPrepend">@</span>
        </div>
        <input type="text" class="form-control" id="validationCustomUsername" placeholder="Adresse eMail" name="mail" aria-describedby="inputGroupPrepend" required>
      </div>
    </div>
  </div>
  <button id="addPatient" class="btn btn-success" type="submit">Enregistrer un nouveau patient</button>
</form>

<?php
} else {
  array_map('htmlspecialchars', $_POST);
  extract($_POST);

  try {
    $connect = new PDO("mysql:host=$PARAM_host;dbname=$PARAM_db_name[1];", $PARAM_user, $PARAM_pwd, $PARAM_options);

    $results = $connect->prepare("INSERT INTO patients (lastname, firstname, birthdate, phone, mail) VALUES (?,?,?,?,?)");
    $results->bindParam(1, $lastName);
    $results->bindParam(2, $firstName);
    $results->bindParam(3, $birthD);
    $results->bindParam(4, $phone);
    $results->bindParam(5, $mail);
    $results->execute();

  } catch (Exception $error) {
    unset($_POST);
    echo 'Error : '.$error->getMessage().'<br />'.$error->getCode();
  }

  ?>
  <div class="alert alert-success" role="alert">
  <h4 class="alert-heading">Nouveau patient ajouté !</h4>
  <p>Le patient <?= $firstName.' '.$lastName; ?> a bien été enregistré dans la liste des patients de l'hopital. Pour consulter la liste des patients, veuillez cliquer sur le bouton ci-dessous.</p>
  <hr>
  <p class="mb-0 text-center"> <a href="index.php?section=liste-patients" class="btn btn-success" name="button">Liste de pas cyan</a> </p>
  </div>
  <?php
  unset($_POST);
}

?>
