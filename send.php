<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if(isset($_POST["send"])){
    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    // $mail->Username = ($_POST["Email"]);
    $mail->Username = 'fbyrron19@gmail.com';
    $mail->Password = 'credqjxlccslgyqy';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    $mail->setFrom('fbyrron19@gmail.com', $_POST["Name"]);
    // $mail->setFrom('sesame13579@gmail.com', 'Bldg126 Studio');

    $mail->addAddress('fbyrron19@gmail.com');
    // $mail->addAddress($_POST["Email"]);

    $mail->isHTML(true);

    $mail->Subject = $_POST["Concern"];
    $mail->Body =($_POST["Message"]. '<br><br> Email from <i>'.$_POST["Name"].'</i> ('.$_POST["Email"].')');

    // $mail->send();

    echo
    "
    <script>
    alert('Email Sent Successfully');
    document.location.href = 'index.html'
    </script>
    ";

    if($mail->Send()) {
        $autoRespond = new PHPMailer();
     
        $autoRespond->IsSMTP();
        $autoRespond->CharSet    = 'UTF-8';
        $autoRespond->SMTPDebug  = 0;
        $autoRespond->SMTPAuth   = TRUE;
        $autoRespond->SMTPSecure = "tls";
        $autoRespond->Port       = 587;
        $autoRespond->Username   = "fbyrron19@gmail.com";
        $autoRespond->Password   = "credqjxlccslgyqy";
        $autoRespond->Host       = 'smtp.gmail.com';
     
        $autoRespond->isHTML(true);
        $autoRespond->setFrom('fbyrron19@gmail.com', 'Bldg126 Studio');
        $autoRespond->addAddress($_POST["Email"]);
        $autoRespond->Subject = "Thank you for contacting us!"; 
        $autoRespond_template =
            'Dear <b>' .$_POST["Name"]. '</b>,<br><br>
            
            Thank you for contacting Bldg126 Studio. We appreciate you taking the time to reach out to us.<br><br>
            
            Regarding your message:<br>
            <i>"' .$_POST['Message']. '"</i><br><br>
            
            We have received your message and we are currently reviewing it. Our team will be in touch with you as soon as possible.<br><br>
            
            In the meantime, please feel free to browse our website <a href="https://bldg126studio.infuselibrary.tech">Bldg Studio</a> for more information about our products and services.<br><br>
            
            Thank you again for reaching out to us. We look forward in assisting you.<br><br>
            
            Best regards,<br>
            <b>Bldg126 Studio</b>';

        $autoRespond->Body= $autoRespond_template;    
     
        $autoRespond->Send(); 
     }
}
