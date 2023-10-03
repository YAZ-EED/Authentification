<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Css/bootstrap.css">
</head>

<body class="bg-light text-center">

    <?php

        session_start();

        if(isset($_SESSION['aut'])){

            if(isset($_SESSION['modifier'])){
                
                echo "<p class='alert alert-success'>Le mot de passe a été modifié.</p>";
                unset($_SESSION['modifier']);
                
            }elseif(isset($_SESSION['inscrit'])){
                
                echo "<p class='alert alert-success'>Vous etes inscrit.</p>";
                unset($_SESSION['inscrit']);

            }

            require 'View.php';
            $viewAuth = new ViewAuthentification();

            $viewAuth->viewHome(unserialize($_SESSION['user']));

        }else{

            header('location:index.php');
            exit();

        }

    ?>

</body>

</html>