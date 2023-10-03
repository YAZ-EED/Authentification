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
        $viewAuth = new ViewAuthentification();
        $ModelAuth = new ModelAuthentification($con);

        session_start();

        if (isset($_POST['Reset'])) {

            if ($_SESSION['code'] == $_POST['code']) {

                try {

                    $ModelAuth->changePassword($_POST['password'], $_POST['email']);
                    $_SESSION['user'] = serialize($ModelAuth->getUserByEmailAndPassword($_POST['email'], $_POST['password']));
                    $_SESSION['aut'] = 'oui';
                    $_SESSION['modifier'] = 'oui';
                    header('location:home.php');
                    exit();
                    
                } catch (Exception $e) {

                    echo "<p class='alert alert-danger'>Le mot de passe n'a pas pu etre modifié, <b><a href='ControllerReset.php'>réessayer</a></b>.</p>";
                }
            } else {

                echo "<p class='alert alert-danger'>Le code de confirmation n'est pas valide, <b><a href='ControllerReset.php'>réessayer</a></b>.</p>";
            }
        }

        if (isset($_GET['enregistrée'])) {

            $email = $_SESSION['email'];
            echo "<p class='alert alert-success mt-2'>Le code de confirmation a été envoyé à <b>$email</b>.<p>";
            $viewAuth->formConfirmation();
        }

        if (isset($_POST['confirmer'])) {

            if ($_SESSION['code'] == $_POST['code']) {

                try {

                    $ModelAuth->addUser($_SESSION['nom'], $_SESSION['prenom'], $_SESSION['email'], $_SESSION['password']);
                    $_SESSION['user'] = serialize($ModelAuth->getUserByEmailAndPassword($_SESSION['email'], $_SESSION['password']));
                    $_SESSION['aut'] = 'oui';
                    $_SESSION['inscrit'] = 'oui';
                    header('location:home.php');
                    exit();
                } catch (Exception $e) {

                    echo "<p class='alert alert-danger'>Vous n'etes pas enregistré, <b><a href='ControllerRegistration.php'>réessayer</a></b>.</p>";
                }
            } else {

                echo "<p class='alert alert-danger'>Le code de confirmation n'est pas valide, <b><a href='ControllerRegistration.php'>réessayer</a></b>.</p>";
            }
        }

    ?>

</body>

</html>