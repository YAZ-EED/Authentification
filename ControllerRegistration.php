<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Css/bootstrap.css">
    <style>
        form {
            width: 95%;
            max-width: 300px;
        }
    </style>
</head>

<body class="bg-light">

    <?php

        require 'View.php';
        require 'Model.php';
        require 'Connect.php';
        require 'EnvoyerEmail.php';

        $viewAuth = new ViewAuthentification();
        $ModelAuth = new ModelAuthentification($con);

        if(isset($_POST['enregistrée'])){

            if($ModelAuth->checkEmail($_POST['email'])){

                echo "<p class='alert alert-danger mt-2'>Cet e-mail est déjà utilisée.<p>";

            }else{

                try{

                    EnvCode($_POST['email'], $ModelAuth);
                    session_start();
                    $_SESSION['nom'] = $_POST['nom'];
                    $_SESSION['prenom'] = $_POST['prenom'];
                    $_SESSION['email'] = $_POST['email'];
                    $_SESSION['password'] = $_POST['password'];

                    header('location:ControllerConfirmation.php?enregistrée');
                    exit();

                }catch(Exception $e){

                    echo "<p class='alert alert-danger mt-2'>Nous n'avouns pas pu envoyer le code de confirmation, veuillez réessayez.<p>";
                    $viewAuth->formRegistration($_POST['email'], $_POST['nom'], $_POST['prenom'], $_POST['password']);
                    exit();

                }

            }

        }

        if(isset($_GET['email'])){

            $viewAuth->formRegistration($_GET['email']);
            
        }else{
            
            $viewAuth->formRegistration();

        }

    ?>

</body>

</html>