<?php
session_start();
if(isset($_POST['reset'])) {
    ini_set("smtp_server","smtp.gmail.com");
    ini_set("smtp_port",587);
    $user='root';
    $password='anabakrah7ali';
    $dbname='registerationdb';
    $db= new mysqli('localhost',$user,$password,$dbname) or die("Unable to connect");

    $number=$_POST['idd'];
    if($_SESSION['user']=='patient')
        $queryy="SELECT * FROM `patients` WHERE  `fileno`='$number'";
    else
        $queryy="SELECT * FROM `doctors` WHERE  `ID`='$number'";
    $resultt=$db->query($queryy);
    $roww=mysqli_fetch_array($resultt);
    $to = $_POST['email'];
    $subject = 'استرجاع كلمة المرور';
    if($_SESSION['user']=='patient')
        $message = 'شكرا لك للاستعانة بنا لاستعاد كلمة المرور الخاصة بك وهي : '.$roww['pass'];
    else
        $message = 'شكرا لك للاستعانة بنا لاستعاد كلمة المرور الخاصة بك وهي : '.$roww['drpass'];
    $headers = 'From: sarahmahmoud97.sm@gmail.com' .
        '\n X-Mailer: PHP/' . phpversion();

    $res= mail($to, $subject, $message, $headers);

    if ($res) {
        echo "<script>alert('Recieved , check your email')</script>";
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