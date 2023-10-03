<?php

    use PHPMailer\PHPMailer\PHPMailer;

    function EnvCode($email, $ModelAuth)
    {

        $nom = $ModelAuth->getNomByEmail($email)->nom ?? null;

        $num = rand(100000, 999999);

        session_start();
        $_SESSION['code'] = $num;

        require 'vendor/autoload.php';

        $mail = new PHPMailer(true);

        $mail->SMTPDebug =  0 ;
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'test.phpmailer11111@gmail.com';
        $mail->Password   = 'qkziludwlbobnuvl';
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        $mail->setFrom('test.phpmailer11111@gmail.com', 'YAZEED');
        $mail->addAddress($email, $nom);

        $mail->isHTML(true);
        $mail->Subject = "Confirmation de l'e-mail";
        $mail->Body    = "Le code de confirmation est : <b>$num</b>";
        $mail->send();
}
