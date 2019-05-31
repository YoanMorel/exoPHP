<?php
$requiredFieldsTab = ['civility', 'fname', 'lname', 'age', 'company'];
$invalidFieldTab = array();

$_POST = array_map('htmlspecialchars', $_POST);

function checkForm($requiredTabData) {

    for ($i = 0; $i < count($requiredTabData); $i++):
        $dataFieldName = $requiredTabData[$i];
        if (isset($_POST[$dataFieldName])):
            if (empty($_POST[$dataFieldName])):
                return false;
            endif;
        else:
            return false;
        endif;
    endfor;
    return true;
}

if (checkForm($requiredFieldsTab)):
    
    foreach ($_POST as $key => $fieldVal):
        $validField = false;
        foreach ($regexList as $fieldName => $regex):
            if (preg_match($regex, $fieldVal) && $fieldName == $key):
                $validField = true;
                $_SESSION[$key] = $fieldVal;
                break;
            endif;
        endforeach;
        if (!$validField):
            $invalidFieldTab[] = $key;
        endif;
    endforeach;

    if (count($invalidFieldTab)):
        echo "Les champs suivant sont invalides : \n\n";
        foreach ($invalidFieldTab as $value):
            echo "$value\n\n";
        endforeach;
    else:
        ?>

        <div class="container">
            <p>Tous les champs ont été remplis</p>
            <p>Voici le retour des valeurs :</p>
            <?php foreach ($_POST as $key => $value): ?>
                <p><?= $key; ?> : <?= $value; ?></p>
            <?php endforeach; ?>
        </div>

    <?php
    endif;
else:
    echo 'Tous les champs du formulaire doivent-être remplis pour valider l\'étape.';
endif;
?>