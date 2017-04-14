<?php
session_start();
$user='root';
$password='anabakrah7ali';
$dbname='registerationdb';
$db= new mysqli('localhost',$user,$password,$dbname) or die("Unable to connect");

echo "Great WOrk";
if(isset($_POST['login'])){
if(isset($_POST['fileNum']) && isset($_POST['password'])) {
    $password = $_POST['fileNum'];
    $fileNo = $_POST['password'];
}
//in data base tables file number will be already exist
$query="select * from patients WHERE  fileNum='$filNo' and pass='$password'";
$result=$db->query($query);
if(mysqli_num_rows($result)==1){
    $rows=mysqli_num_rows($result);
   $row = mysqli_fetch_row( $result );
    if($fileNo== $row['fileno'] and $password==$row['pass']){
        if(isset($_POST['rem'])){
            setcookie('fileNumber',$fileNo,time()*60*60*10) ; //save the file number 10 days only
            setcookie('password',$password,time()*60*60*10) ;
        }

        $_SESSION['filenum']=$fileNo;
    header('location: userProfile.html');
    }
    else
    {
        echo "<a href='trueLogin.html'>Try Again</a>";
    }
}
else{
    echo "<script language='javascript'> alert('لا يوجد لديك حساب ,تأكد من المعلومات المدخلة') </script>";
}
}
else
{
    header('location:patientLogin.html');
}

$result->free();
$db->close();
?>
/**
 * Created by PhpStorm.
 * User: GoogleTech
 * Date: 4/14/2017
 * Time: 3:15 AM
 */