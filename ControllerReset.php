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
        
        if(!isset($_GET['email'])){

            $viewAuth->formEnvoyerCode();
            
        }elseif (isset($_GET['email'])) {

            $email = $_GET['email'];

            if($ModelAuth->checkEmail($email)){

            try {

                EnvCode($email, $ModelAuth);
                echo "<p class='alert alert-success mt-2'>Le code de réinitialisation a été envoyé à <b>$email</b>.<p>";
                $viewAuth->formResetPassword($email);
        
            } catch (Exception $e) {
    
                echo "<p class='alert alert-danger mt-2'>Le code n'a pas été envoyé, veuillez réessayer.<p>";
                $viewAuth->formEnvoyerCode();
    
            }
                
            }else{

                echo "<p class='alert alert-danger mt-2'>Ladresse e-mail n'est pas enregistrée, <b><a href='ControllerRegistration.php?email=$email'>enregistrée?</a></b><p>";
                $viewAuth->formEnvoyerCode();

            }
            
        }

        ?>

</body>

</html>