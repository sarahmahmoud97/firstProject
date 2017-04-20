<?php
session_start();
$user='root';
$password='anabakrah7ali';
$dbname='registerationdb';
$db= new mysqli('localhost',$user,$password,$dbname) or die("Unable to connect");
$fileNo='';
$password='';

if($_SERVER['REQUEST_METHOD']=='POST') {
    if (isset($_POST['login'])) {
        if (isset($_POST['fileNum']) && isset($_POST['password'])) {
            $password = $_POST['password'];
            $fileNo = $_POST['fileNum'];
        }
//in data base tables file number will be already exist
        $query = "SELECT * FROM `patients` WHERE  `fileno`='$fileNo' and `pass`='$password'";
        $result = $db->query($query);
        $row = mysqli_fetch_array($result);
        $rows = mysqli_num_rows($result);
        if (mysqli_num_rows($result) == 1) {

            if ($fileNo == $row['fileno'] and $password == $row['pass']) {
                if (isset($_POST['rem'])) {
                    setcookie('fileNumber', $fileNo, time() * 60 * 60 * 10); //save the file number 10 days only
                    setcookie('password', $password, time() * 60 * 60 * 10);
                }

                $_SESSION['user'] = 'patient';
                header('location: userProfile.html');
            }
         else {


            echo "<script language='javascript'> alert('لا يوجد لديك حساب ,تأكد من المعلومات المدخلة') </script>";
            echo "<script></script>";
             if ($fileNo == $row['fileno']) {
                 echo "<script>alert('رقم الملف او كلمة المرور غير صحيحة ,هل تريد استرجاع كلمة المرور ؟')</script>";

                 $email = $row['email'];
                 echo "<script> alert('$email')</script>";

                 $passwordd = $row['pass'];

                 header('location: resetPass.php');
             } else {
                 header('location: patientLogin.html');
             }
         }


        }
        $result->free();
    } else {
        header('location:patientLogin.html');
    }

}
$db->close();
?>
/**
 * Created by PhpStorm.
 * User: GoogleTech
 * Date: 4/14/2017
 * Time: 3:15 AM
 */