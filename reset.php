<?php
session_start();
if(isset($_POST['reset'])) {
    ini_set("smtp_server","smtp.gmail.com");
    ini_set("smtp_port",587);

    $to = $_POST['email'];
    $subject = 'استرجاع كلمة المرور';
    $message = 'شكرا لك للاستعانة بنا لاستعاد بريدك الالكتروني ';
    $headers = 'From: sarahmahmoud97.sm@gmail.com' .
        '\n X-Mailer: PHP/' . phpversion();

    $res= mail($to, $subject, $message, $headers);

    if ($res) {
        echo "<script>alert('recieved')</script>";
        if($_SESSION['user']=='patient')
            echo "<script>window.location.href='patientLogin.html' </script>";
        else
            echo "<script>window.location.href='drLogin.html' </script>";

    }
    else
        echo "<script>alert('Does not recieved')</script>";

}

?>

/**
 * Created by PhpStorm.
 * User: GoogleTech
 * Date: 4/21/2017
 * Time: 12:21 AM
 */
?>