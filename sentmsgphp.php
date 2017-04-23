<?php

if($_SERVER['REQUEST_METHOD']=='POST') {
    if (isset($_POST['sendMessage'])) {
        ini_set("smtp_server","smtp.gmail.com");
        ini_set("smtp_port",587);

        $to = 'sarahmahmoud97@hotmail.com';
        $subject = 'Message From a visitor to Cancer site : ' . $_POST['carrier']; ;
        $message = $_POST['smsMessage'];
        $headers = 'From: sarahmahmoud97.sm@gmail.com' .
            '\n X-Mailer: PHP/' . phpversion();

        $res= mail($to, $subject, $message, $headers);

        if ($res) {
            echo "<script>alert('recieved')</script>";
            echo "<script>window.location.href='homePage.php' </script>";

        }
        else
            echo "<script>alert('Does not recieved')</script>";

    }


}

?>