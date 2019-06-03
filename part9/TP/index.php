<!DOCTYPE html>
<html lang="fr" dir="ltr">

    <head>
        <meta charset="utf-8" />

        <!-- Bootstrap setting -->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
        <link rel="stylesheet" href="style.css" />
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.8/angular.min.js"></script>
        <title>Calendrier</title>
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
                            $minYear = 1930;
                            $maxYear = 2070;

                            while ($minYear <= $maxYear):
                                ?><option value="<?= $minYear; ?>"><?= $minYear; ?></option>
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
        if ($_POST || $_GET):
            if ($_POST):
                $year = htmlspecialchars($_POST['year']);
                $month = htmlspecialchars($_POST['month']);
                unset($_POST);
            else:
                $year = htmlspecialchars($_GET['year']);
                $month = htmlspecialchars($_GET['month']);
                if ($_GET['when'] == 'previous'):
                    $month -= 1;
                else:
                    $month += 1;
                endif;
            endif;
            $nbDay = date('t', mktime(0, 0, 0, $month, 1, $year)); // nbr de jours du mois en fonction de l'année
            $firstDay = date('N', mktime(0, 0, 0, $month, 1, $year)); // ISO du jour en fonction du mois et de l'année

            ?>
            <div class="container mx-auto">
                <div class="row">
                    <div class="col-6 text-center">
                        <?php if ($month > 1): ?>
                        <a href="index.php?month=<?= $month; ?>&year=<?= $year; ?>&when=previous">Mois précédent</a>
                            <?php endif; ?>
                    </div>
                    <div class="col-6 text-center">
                        <?php if ($month < 12): ?>
                        <a href="index.php?month=<?= $month; ?>&year=<?= $year; ?>&when=next">Mois suivant</a>
                        <?php endif; ?>
                    </div>
                </div>
                <table class="table table-bordered">
                    <caption><span></span><?= strftime('%B', mktime(0, 0, 0, $month, 1, 1970)) . ' ' . $year; ?></caption>
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
                            ?><tr><?php
                                for ($i = 1; $i <= 7; $i++):
                                    if ($xDay < $firstDay || $date > $nbDay):
                                        $xDay++;
                                        ?><td class="nothing"></td><?php
                                    else:
                                        ?><td class="alignText"><?= $date++; ?></td><?php
                                        endif;
                                    endfor;
                                    ?></tr><?php
                            endwhile;
                            ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </div>



        <!--
        
            Ce calendrier s'éxécute grâce à 3 compteurs : xDay, date et i dans la boucle FOR.
            Tant que $date est inférieure ou égale au nombre de jours dans le mois sélectionné, la boucle FOR va incrémenter $i qui va afficher les 7 jours de la semaine ainsi que la varible xDay.
            $xDay sera testée par une condition pour griser les jours jusqu'au premier jour du mois en la comparant à la variable firstDay : si $xDay est inférieure à $firstDay alors on grise la case. Sinon, on commence à incrémenter $date.	12	13	14	15	16
17	
            Si $date est supérieure à $nbDay, alors les prochaines cases vont se griser jusqu'à la fin de l'éxécution de la boucle FOR. Logiquement, la boucle WHILE cesse alors de s'éxécuter dans la foulée.
        
        -->

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
