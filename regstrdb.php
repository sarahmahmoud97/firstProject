<?php
include 'patientReg.html';
if(isset($_POST['submitBTN'])) {
    $user = 'root';
    $password = 'anabakrah7ali';
    $dbname = 'registerationdb';
    $db = new mysqli('localhost', $user, $password, $dbname) or die("Unable to connect");
    echo "Great WOrk";

    $patname=$_POST['username'];
    $patpass=$_POST['password'];
    $patfileNo=$_POST['fileNum'];
    $patphone=$_POST['phone'];
    $pataddress=$_POST['address'];
    $patEmail=$_POST['email'];
    $patgender=$_POST['gender'];
    $patdesc=$_POST['descc'];
    $query="insert into patients(fileno,name,email,pass,phoneNo,address,gender,description) 
    VALUES ($patfileNo,$patname,$patEmail,$patpass,$patphone,$patgender,$patdesc)";
    $result=$db->query($query);
    if(!$result){
        alert("failed adding to database");
    }

}
?>
/**
 * Created by PhpStorm.
 * User: GoogleTech
 * Date: 3/23/2017
 * Time: 2:08 AM
 */