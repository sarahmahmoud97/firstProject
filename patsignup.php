<?php
session_start();
include "patientReg.html";
$user='root';
$password='anabakrah7ali';
$dbname='registerationdb';
$db= new mysqli('localhost',$user,$password,$dbname);
if($db->error){
    echo "<script language='JavaScript'>alert('FAILED'); </script>";
}
echo "<script language='JavaScript'>alert('successfully connected'); </script>";

if (isset($_POST['submitBTN'])){

    $patname=$_POST['username'];
    $userr=$_POST['user'];
    $pass=$_POST['password'];
    $fileNo=$_POST['fileNum'];
    $phone=$_POST['phone'];
    $email=$_POST['email'];
    $gender=$_POST['gender'];
    $address=$_POST['address'];
    $descr=$_POST['descc'];

    $query="INSERT INTO `patients`(`fileno`, `name`, `email`, `pass`, `phoneNo`, `address`, `gender`, `description`) VALUES
            ('$fileNo','$patname','$email','$pass','$phone','$address','$gender','$descr')";
    $result=$db->query($query);
    if($result==true)
        "<script language='JavaScript'>alert('succeed'); </script>";
    else
        "<script language='JavaScript'>alert('failed'); </script>";
}
else if(isset($_POST['resetBTN'])){


}



/**
 * Created by PhpStorm.
 * User: GoogleTech
 * Date: 4/20/2017
 * Time: 7:28 AM
 */
?>