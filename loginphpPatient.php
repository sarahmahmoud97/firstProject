<?php
session_start();
$user='root';
$password='anabakrah7ali';
$dbname='registerationdb';
$db= new mysqli('localhost',$user,$password,$dbname) or die("Unable to connect");
$fileNo='';
$password='';
$_SESSION['log']='12';
if($_SERVER['REQUEST_METHOD']=='POST') {
    if (isset($_POST['login'])) {
        if (isset($_POST['fileNum']) && isset($_POST['password'])) {
            $password = $_POST['password'];
            $fileNo = $_POST['fileNum'];
        }
        else{
            header('location: patientLogin.html');
        }
//in data base tables file number will be already exist
        $query = "SELECT * FROM `patients` WHERE  `fileno`='$fileNo' OR `pass`='$password'";
        $result = $db->query($query);
        if (!$result) {
            echo "<script language='JavaScript'>alert('FAILED'); </script>";
        }
        //$row = mysqli_fetch_array($result);
        foreach ($result as $item) {
            if ($fileNo == $item['fileno'] and $password == $item['pass']) {
                if (isset($_POST['rem'])) {
                    setcookie('fileNumber', $fileNo, time() * 60 * 60 * 10); //save the file number 10 days only
                    setcookie('password', $password, time() * 60 * 60 * 10);
                }
                $_SESSION['owner']=$fileNo;
                $_SESSION['user'] = 'patient';
                echo "<script>window.location.href='userProfile.php' </script>";
                break;
            }
         else {

             if ($fileNo == $item['fileno']) {
                 $_SESSION['user'] = 'patient';
                 echo "<script language='JavaScript'>
                        var r = confirm(' هل تريد المحاولة مرة أخرى ؟؟ اكبس الغاء اذا كنت تريد استعادة كلمة المرور');
                        if (r == true) {
                            window.location.href='patientLogin.html';
                         } else {
                             window.location.href='resetPass.html';
                          }

                        </script>";


             } else if ($ID != $item['ID']) {
                 echo "<script>alert('الرقم الشخصي و كلمة المرور غير صحيحين , قم بإنشاء حساب من فضلك لتتمكن من تسجيل الدخول')</script>";
                 echo "<script>window.location.href ='doctorReg.html';</script>";

             }
         }
        }
        $result->free();
    } else {
        header('location:patientLogin.html');
    }
    echo "<script>alert('الرقم الشخصي و كلمة المرور غير صحيحين , قم بإنشاء حساب من فضلك لتتمكن من تسجيل الدخول')</script>";
    echo "<script>window.location.href ='patientReg.html';</script>";

}
else
    echo "<script>alert('يوجد خلل , انت لم تأت من الصفحة المطلوبة , عذرا لن يتم طلبك')</script>";


$db->close();
?>
/**
 * Created by PhpStorm.
 * User: GoogleTech
 * Date: 4/14/2017
 * Time: 3:15 AM
 */