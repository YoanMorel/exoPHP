<!DOCTYPE html>
<html lang="fr" dir="ltr">

    <head>
        <meta charset="utf-8" />

        <!-- Bootstrap setting -->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
        <link rel="stylesheet" href="assets/css/style.css" />
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.8/angular.min.js"></script>
        <title>Exo5</title>
    </head>

    <body>

        <?php
        if (isset($_GET['erase'])):
           unset($_POST);
        endif;

        if (!$_POST):
           ?>

           <form action="index.php" method="post" enctype="multipart/form-data">
               <div class="row">
                   <select class="form-control" name="gender">
                       <option value="man">Homme</option>
                       <option value="woman">Femme</option>
                   </select>
                   <div class="col">
                       <input type="text" class="form-control" placeholder="First name" name="fname">
                   </div>
                   <div class="col">
                       <input type="text" class="form-control" placeholder="Last name" name="lname">
                   </div>
                   <div class="custom-file">
                       <input type="file" class="custom-file-input" id="customFile" name="fileToUp">
                       <label class="custom-file-label" for="customFile">Choose file</label>
                   </div>
               </div>
               <input class="btn btn-danger" type="submit" value="Submit">
           </form>

           <?php
        else:
           
           $file = basename($_FILES['fileToUp']['name']);
           if(strtolower(pathinfo($file,PATHINFO_EXTENSION)) != 'pdf'):
              echo 'Le fichier n\'est pas au format PDF';
           endif;
           
           echo htmlspecialchars(print_r($_POST, true));
           
           ?>

           <a href="index.php?erase=1">Retour</a>

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
        <script type="text/javascript" src="assets/scripts/main.js"></script>
    </body>

</html>
