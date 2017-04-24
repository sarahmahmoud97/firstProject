<?php

$user='root';
$password='anabakrah7ali';
$dbname='statistics';
$db= new mysqli('localhost',$user,$password,$dbname);
if($db->error){
    echo "<script language='JavaScript'>alert('FAILED'); </script>";
}
echo "<script language='JavaScript'>alert('successfully connected'); </script>";

if(isset($_POST['donate'])){
    if (isset($_POST['carrier']))
        $name=$_POST['carrier'];
    if (isset($_POST['phoneNumber']))
        $phone=$_POST['phoneNumber'];
    if (isset($_POST['amount']))
        $amount=$_POST['amount'].' '.$_POST['type'];
    if (isset($_POST['comment']))
        $comment=$_POST['comment'];
    $query="INSERT INTO `donation`(`name`, `phone`, `amount`, `comment`) VALUES 
            ('$name','$phone','$amount','$comment')";
    $result=$db->query($query);
    if($result==true) {
        echo"<script language='JavaScript'>alert('done'); </script>";
        echo "<script>window.document.href='homePage.php';</script>";
    }
    else{
        echo"<script language='JavaScript'>alert('not done'); </script>";
        echo "<script>window.document.href='donation.html';</script>";
    }
}
/**
 * Created by PhpStorm.
 * User: GoogleTech
 * Date: 4/23/2017
 * Time: 8:12 PM
 */
?>