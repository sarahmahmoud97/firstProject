<?php
session_start();
$user='root';
$password='anabakrah7ali';
$dbname='registerationdb';
$db= new mysqli('localhost',$user,$password,$dbname) or die("Unable to connect");

echo "Great WOrk";
$ID='';
$drPass='';
$row='';
if(isset($_POST['login'])){
    if(isset($_POST['ID']) && isset($_POST['drPass'])) {
        $ID = $_POST['ID'];
        $drPass = $_POST['drPass'];
    }
//in data base tables file number will be already exist
    $query="SELECT * FROM `doctors` WHERE  `ID`='$ID' and `drpass`='$drPass'";
    $result=$db->query($query);
    if(!$result){
        echo "<script language='JavaScript'>alert('FAILED'); </script>";
    }
    if(mysqli_num_rows($result)==1){
        $row = mysqli_fetch_array( $result );
        if($ID== $row['ID'] and $drPass==$row['drpass']){
            if(isset($_POST['remm'])){
                setcookie('IDnumber',$ID,time()*60*60*10) ; //save the file number 10 days only
                setcookie('DRpass',$drpass,time()*60*60*10) ;
            }

            $_SESSION['user']='dr';
            header('location: userProfile.html');
        }
        else
        {
            echo "<a href='drLogin.html'>Try Again</a>";
        }
    }
    else{
        echo "<script language='javascript'> alert('لا يوجد لديك حساب ,تأكد من المعلومات المدخلة') </script>";
    }
    $result->free();
}
else
{
    header('location:drLogin.html');
}


$db->close();
?>
/**
* Created by PhpStorm.
* User: GoogleTech
* Date: 4/14/2017
* Time: 3:15 AM
*/