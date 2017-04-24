<?php
session_start();
$user='root';
$password='anabakrah7ali';
$dbname='registerationdb';
$db= new mysqli('localhost',$user,$password,$dbname) or die("Unable to connect");

$ID='';
$drPass='';
$row='';
$_SESSION['log']='12';
if($_SERVER['REQUEST_METHOD']=='POST') {
    if (isset($_POST['login'])) {
        if (isset($_POST['ID']) && isset($_POST['drPass'])) {
            $ID = $_POST['ID'];
            $drPass = $_POST['drPass'];
        }
        else{
            header('location: drLogin.html');
        }
//in data base tables file number will be already exist
        $query = "SELECT * FROM `doctors` WHERE  `ID`='$ID' OR `drpass`='$drPass'";
        $result = $db->query($query);
        if (!$result) {
            echo "<script language='JavaScript'>alert('FAILED'); </script>";
        }
        //$row = mysqli_fetch_array($result);
         foreach ($result as $item) {
             if ($ID == $item['ID'] and $drPass == $item['drpass']) {
                 if (isset($_POST['remm'])) {
                     setcookie('IDnumber', $ID, time() * 60 * 60 * 10); //save the file number 10 days only
                     setcookie('DRpass', $drPass, time() * 60 * 60 * 10);
                 }
                 $_SESSION['owner']=$ID;
                 $_SESSION['user'] = 'dr';
                 echo "<script>window.location.href='userProfile.php' </script>";
                 break;
             } else {
                 if ($ID == $item['ID']) {
                     $_SESSION['user'] = 'dr';
                     echo "<script language='JavaScript'>
                        var r = confirm(' هل تريد المحاولة مرة أخرى ؟؟ اكبس الغاء اذا كنت تريد استعادة كلمة المرور');
                        if (r == true) {
                            window.location.href='drLogin.html';
                         } else {
                             window.location.href='resetPass.html';
                          }

                        </script>";


                 }
                 else if ($ID != $item['ID'])
                     {
                     echo "<script>alert('الرقم الشخصي و كلمة المرور غير صحيحين , قم بإنشاء حساب من فضلك لتتمكن من تسجيل الدخول')</script>";
                     echo "<script>window.location.href ='doctorReg.html';</script>";

                 }
                 /*  echo "<script>alert('الرقم الشخصي او كلمة المرور غير صحيحة ,هل تريد استرجاع كلمة المرور ؟')</script>";

                   $email = $row['email'];
                   echo "<script> alert('$email');
                     window.location.href='resetPass.html';
                     </script>";

                   $passwordd = $row['pass'];*/
             }
         }

        $result->free();
    }
    else {
        header('location:drLogin.html');
    }
    echo "<script>alert('الرقم الشخصي و كلمة المرور غير صحيحين , قم بإنشاء حساب من فضلك لتتمكن من تسجيل الدخول')</script>";
    echo "<script>window.location.href ='doctorReg.html';</script>";
}
else
    echo "<script>alert('يوجد خلل , انت لم تأت من الصفحة المطلوبة , عذرا لن يتم طلبك')</script>";

$db->close();
?>
