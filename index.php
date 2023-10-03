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
        $ViewAuth = new ViewAuthentification();

        if (isset($_POST['login'])) {

            require 'Connect.php';
            require 'Model.php';
            $ModelAuth = new ModelAuthentification($con);

            $email = $_POST['Email'];
            $password = $_POST['Password'];

            $user = $ModelAuth->getUserByEmailAndPassword($email, $password);

            if ($user) {
                session_start();
                $_SESSION['user'] = serialize($user);
                $_SESSION['aut'] = 'oui';
                header('location:home.php');
                exit();
            };

            $EmailExist = $ModelAuth->checkEmail($email);
            if ($EmailExist) {
                $ViewAuth->formLogin(true, true, $email);
                exit();
            } else {
                $ViewAuth->formLogin(true, false);
                exit();
            }
        }
        $ViewAuth->formLogin()
    
    ?>

</body>

</html>