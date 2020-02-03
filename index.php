<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<?php
require_once 'secure.php';
require_once 'vendor/form/formbuilder.php';
require_once 'vendor/validator/validator.php';

$form = new FormBuilder();


echo $form->startForm('col-6 container border py-2');

echo $form->label('Nom:');//on appel la function label de la classe form builder
echo $form->input('text', '','nom');//C'est une méthode

echo '<br>';

echo $form->label('Prénom:');
echo $form->input('text', '','prénom');

echo '<br>';

echo $form->label('Votre adresse mail:');
echo $form->input('email','','email');

echo '<br>';

echo $form->label('Votre mot de passe:  ','','');
echo $form->input('password','','mdp');

echo '<br>';

echo $form->label('Numéro de téléphone: ');
echo $form->input();

echo '<br>';

echo $form->label('Date de naissance:');
echo $form->input('date');

echo '<br>';

echo '<div class="d-flex col-8">';
echo '<div class="d-flex col-10">';
echo $form->label('Sexe:','');
echo $form->input('checkbox', 'sexe','','','','sexe');
echo $form->label('Homme','sexe');
echo $form->input('checkbox', 'sexe','','','','sexe2');
echo $form->label('Femme','sexe2');
echo '</div>';
echo '</div>';

echo '<br>';

echo '<div class="d-flex col-5">';
echo $form->label('Votre nationnalité:');
$tabPays = ["choix"=>"--Choisissez--",
    "fr"=>"France",
    "be"=>"Belgique"];
echo $form->select('tableau', $tabPays,'selectpicker');
echo '</div>';

echo '<br>';

echo $form->file();

echo '<br>';

echo $form->buttonSend('buttonSend','Envoyer le formulaire','submit','btn btn-primary mx-auto mt-2');
echo $form->endForm();


if(isset($_POST['buttonSend'])) {

    $valid = new Validator();
    $valid->setName('nom');//J'affecte le nom pr faire des test. IMPORTANT: le mettre avant la valeur concerné
    $valid->setValue($_POST['nom']);
    $valid->isText();



    $valid->setName('prénom');
    $valid->setValue($_POST['prénom']);//J'affecte le prenom pr faire des test
    $valid->isText();

    foreach ($valid->getErrors() as $key => $value){
        echo '<span>'.$value.'</span><br>';
    }

    $valid->setName('email');
    $valid->setValue($_POST['email']);
    $valid->isEmail();

    $valid->setLabel('Mot de passe');
    $valid->setValue($_POST['mdp']);
    $valid->maxLength(8);













}





?>
</body>
</html>