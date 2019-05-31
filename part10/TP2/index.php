<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">

    <head>
        <meta charset="utf-8" />

        <!-- Bootstrap setting -->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
        <link rel="stylesheet" href="assets/css/style.css" />
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.8/angular.min.js"></script>
        <title></title>
    </head>

    <body>
        <?php
        if (isset($_GET['reset'])):
            unset($_POST, $_SESSION);
        endif;
        ?>

        <div class="container mx-auto">
            <form action="index.php" method="post">
                <fieldset>
                    <legend>Profil</legend>
                    <div class="form-row border rounded p-2">
                        <div class="col-6 mb-3">
                            <label for="validationServer01">Civilité</label>
                            <select class="form-control" id="validationServer01" name="civility" required>
                                <option value="Madame" <?= (isset($_SESSION['civility']) && $_SESSION['civility'] == 'Madame') ? ' selected' : '' ?>>Madame</option>
                                <option value="Monsieur" <?= (isset($_SESSION['civility']) && $_SESSION['civility'] == 'Monsieur') ? ' selected' : '' ?>>Monsieur</option>
                                <option value="Autre" <?= (isset($_SESSION['civility']) && $_SESSION['civility'] == 'Autre') ? ' selected' : '' ?>>Autre</option>
                            </select>
                        </div>
                        <div class="col-6 mb-3">
                            <label for="validationServer02">Prénom</label>
                            <input type="text" class="form-control" id="validationServer02" placeholder="Prénom" name="fname" value="<?= isset($_SESSION['fname']) ? $_SESSION['fname'] : '' ?>" />
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-6 mb-3">
                            <label for="validationServer03">Nom</label>
                            <input type="text" class="form-control" id="validationServer03" placeholder="Nom" name="lname" value="<?= isset($_SESSION['lname']) ? $_SESSION['lname'] : '' ?>" required />
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-6 mb-3">
                            <label for="validationServer04">Age</label>
                            <input type="text" class="form-control" id="validationServer03" name="age" placeholder="age" value="<?= isset($_SESSION['age']) ? $_SESSION['age'] : '' ?>" required />
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-6 mb-3">
                            <label for="validationServer05">Société</label>
                            <input type="text" class="form-control" id="validationServer05" placeholder="Société" name="company" value="<?= isset($_SESSION['company']) ? $_SESSION['company'] : '' ?>" required />
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                    </div>
                </fieldset>
                <button class="btn btn-primary m-2" type="submit">Submit form</button>
            </form>
        </div>

        <?php
        if ($_POST):
            include('regexList.php');
            include('showMyForm.php');
            ?>

            <div class="container mx-auto">
                <a class="btn btn-danger" href="index.php?reset">Effacer</a>
            </div>

            <?php
        endif;
        ?>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.4.0.js" integrity="sha256-DYZMCC8HTC+QDr5QNaIcfR7VSPtcISykd+6eSmBW5qo=" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js" integrity="sha256-0YPKAwZP7Mp3ALMRVB2i8GXeEndvCq3eSl/WsAl1Ryk=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <!-- JSmaiSON -->
        <script type="text/javascript" src="main.js"></script>
    </body>

</html>

