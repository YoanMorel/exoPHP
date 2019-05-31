<!DOCTYPE html>
<html lang="fr" dir="ltr">

    <head>
        <meta charset="utf-8" />

        <!-- Bootstrap setting -->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
        <link rel="stylesheet" href="style.css" />
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.8/angular.min.js"></script>
        <title></title>
    </head>

    <body>
        <?php setlocale(LC_ALL, 'fr_FR.UTF-8'); ?>
        <div class="container">
            <form action="index.php" method="post">
                <div class="row">
                    <div class="col-6">
                        <label for="month">Mois</label>
                        <select class="form-control form-control-sm" name="month">
                            <option value="1">Janvier</option>
                            <option value="2">Février</option>
                            <option value="3">Mars</option>
                            <option value="4">Avril</option>
                            <option value="5">Mai</option>
                            <option value="6">Juin</option>
                            <option value="7">Juillet</option>
                            <option value="8">Août</option>
                            <option value="9">Septembre</option>
                            <option value="10">Octobre</option>
                            <option value="11">Novembre</option>
                            <option value="12">Décembre</option>
                        </select>
                    </div>
                    <div class="col-6">
                        <label id="year">Année</label>
                        <select class="form-control form-control-sm" name="year">
                            <?php
                            $minYear = 1970;
                            $maxYear = 2040;

                            while ($minYear <= $maxYear):
                                ?><option value="<?= $minYear ?>"><?= $minYear; ?></option>
                                <?php
                                $minYear++;
                            endwhile;
                            ?>
                        </select>
                    </div>
                    <div class="col-12 text-center p-2">
                        <input class="btn btn-success" type="submit" value="envoyer" />
                    </div>
                </div>
            </form>
        </div>

        <?php
        if ($_POST):
            $year = htmlspecialchars($_POST['year']);
            $month = htmlspecialchars($_POST['month']);
            $nbDay = date('t', mktime(0, 0, 0, $month, 1, $year)); // nbr de jours du mois en fonction de l'année
            $firstDay = date('N', mktime(0, 0, 0, $month, 1, $year)); // ISO du jour en fonction du mois et de l'année
            ?>
            <div class="container mx-auto">
                <table class="table table-bordered">
                    <caption><?= strftime('%B', mktime(0, 0, 0, $month, 1, 1970)) . ' ' . $year; ?></caption>
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
                        $xDay = 1; // xDay n'est qu'un compteur qu'on incrémente pour l'éxécution de la boucle for et des conditions à l'intérieur
                        $date = 1; // date est la date en fonction du jour

                        while ($date <= $nbDay): // Boucle while qui va créer lignes et cellules en fonction du nbr de jours dans le mois
                            ?><tr><?php
                                for ($i = 1; $i <= 7; $i++): // Boucle qui va créer les 7 cellules
                                    if ($xDay < $firstDay || $date > $nbDay): // Condition pour griser les cellules qui ne correspondent à aucun jours
                                        ?><td class="nothing"></td><?php
                                    else:
                                        ?><td class="alignText"><?= $date++; ?></td><?php
                                        endif;
                                        $xDay++;
                                    endfor;
                                    ?></tr><?php
                            endwhile;
                            ?>
                    </tbody>
                </table>
            <?php endif; ?>

            <!-- Optional JavaScript -->
            <!-- jQuery first, then Popper.js, then Bootstrap JS -->
            <script src="https://code.jquery.com/jquery-3.4.0.js" integrity="sha256-DYZMCC8HTC+QDr5QNaIcfR7VSPtcISykd+6eSmBW5qo=" crossorigin="anonymous"></script>
            <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js" integrity="sha256-0YPKAwZP7Mp3ALMRVB2i8GXeEndvCq3eSl/WsAl1Ryk=" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
            <!-- JSmaiSON -->
            <script type="text/javascript" src="assets/scripts/main.js"></script>
    </body>

</html>
