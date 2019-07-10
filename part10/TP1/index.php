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
        include('allCountries.php');

        if (!$_POST):
            ?>

            <div class="container">
                <form action="index.php" method="post">
                    <fieldset>
                        <legend>Profil</legend>
                        <div class="form-row border rounded p-2">
                            <div class="col-md-4 mb-3">
                                <label for="validationServer01">Prénom</label>
                                <input type="text" class="form-control" id="validationServer01" placeholder="Prénom" name="fname" />
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="validationServer02">Nom</label>
                                <input type="text" class="form-control" id="validationServer02" placeholder="Nom" name="lname" required />
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="validationServer03">Date de Naissance</label>
                                <input type="date" class="form-control" id="validationServer03" name="birthD" required />
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="validationServer04">Pays de Naissance</label>
                                <select class="form-control" id="validationServer04" name="country" required>
                                    <?php foreach ($countryCode as list($code, $codeAlpha2, $codeAlpha3, $countryName)): ?>
                                        <option value="<?= $code ?>"><?= $countryName ?></option>
                                        <?php
                                    endforeach;
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="validationServer05">Nationalité</label>
                                <input type="text" class="form-control" id="validationServer05" placeholder="Nationalité" name="nationality" required />
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                        </div>
                    </fieldset>

                    <fieldset>
                        <legend>Contact</legend>
                        <div class="form-row border rounded p-2">
                            <div class="col-md-6 mb-3">
                                <label for="validationServer06">Adresse</label>
                                <input type="text" class="form-control" id="validationServer06" placeholder="N° de voie, type de voie et nom de voie" name="adress" required />
                                <div class="invalid-feedback">
                                    Please provide a valid adress.
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="validationServer07">Code Postal</label>
                                <input type="text" class="form-control" id="validationServer07" placeholder="Code Postal" name="zCode" required />
                                <div class="invalid-feedback">
                                    Please provide a valid zip code.
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="validationServer08">Ville</label>
                                <input type="text" class="form-control" id="validationServer08" placeholder="Ville" name="city" required />
                                <div class="invalid-feedback">
                                    Please provide a valid city.
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="validationServerMail">Adresse Mail</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupPrepend3">@</span>
                                    </div>
                                    <input type="text" class="form-control" id="validationServerMail" placeholder="Adresse Mail" aria-describedby="inputGroupPrepend3" name="email" required />
                                    <div class="invalid-feedback">
                                        Please provide a valid mail adress.
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="validationServer09">Téléphone</label>
                                <input type="tel" class="form-control" id="validationServer09" name="phone" required />
                                <div class="invalid-feedback">
                                    Please provide a valid phone number.
                                </div>
                            </div>
                        </div>
                    </fieldset>

                    <fieldset>
                        <legend>Informations administratives</legend>
                        <div class="form-row border rounded p-2">
                            <div class="col-md-4 mb-3">
                                <label for="validationServer10">Diplome</label>
                                <select class="form-control" id="validationServer10" name="degree" required>
                                    <option value="none">Sans</option>
                                    <option value="bac">BAC</option>
                                    <option value="bac+2">BAC+2</option>
                                    <option value="bac+3">BAC+3</option>
                                    <option value="higher">Supérieur</option>
                                </select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="validationServer11">Numéro Pôle Emploi</label>
                                <input type="text" class="form-control" id="validationServer11" placeholder="N° Pôle Emploi" name="peNbr" required />
                                <div class="invalid-feedback">
                                    Please provide a valid Pôle Emploi number.
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="validationServer12">Lien Codecademy</label>
                                <input type="text" class="form-control" id="validationServer12" placeholder="@codecademy" name="codecLink" required />
                                <div class="invalid-feedback">
                                    Please provide a valid link.
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend>Parlez-nous pas beaucoup de vous</legend>
                        <div class="form-row border rounded p-2">
                            <div class="col-12 mb-3" rows="6">
                                <label for="validationTextarea01">Si vous étiez un super héros/une super héroïne, qui seriez-vous et pourquoi?</label>
                                <textarea class="form-control" id="validationTextarea01" placeholder="Je serais Paupaul..." name="heroQtn" required></textarea>
                                <div class="invalid-feedback">
                                    Please enter a message in the textarea.
                                </div>
                            </div>
                            <div class="col-12 mb-3" rows="6">
                                <label for="validationTextarea02">Racontez-nous un de vos "hacks" (pas forcément technique ou informatique)</label>
                                <textarea class="form-control" id="validationTextarea02" placeholder="Une fois, j'ai mis un coussin péteur en dessous des fesses de ma maitresse..." name="hackQtn" required></textarea>
                                <div class="invalid-feedback">
                                    Please enter a message in the textarea.
                                </div>
                            </div>
                            <div class="col-12 mb-3" rows="6">
                                <label for="validationTextarea03">Avez vous déjà eu une expérience avec la programmation et/ou l'informatique avant de remplir ce formulaire ?</label>
                                <textarea class="form-control" id="validationTextarea03" placeholder="ALT-F4" name="expQtn" required></textarea>
                                <div class="invalid-feedback">
                                    Please enter a message in the textarea.
                                </div>
                            </div>
                        </div>


                        <button class="btn btn-primary m-2" type="submit">Submit form</button>
                </form>
            </div>

            <?php
        else:
            include('regexList.php');
            include('showMyForm.php');
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