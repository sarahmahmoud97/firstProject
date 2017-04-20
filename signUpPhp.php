<?php
session_start();
include "doctorReg.html";
$user='root';
$password='anabakrah7ali';
$dbname='registerationdb';
$db= new mysqli('localhost',$user,$password,$dbname);
if($db->error){
    echo "<script language='JavaScript'>alert('FAILED'); </script>";
}
echo "<script language='JavaScript'>alert('successfully connected'); </script>";

if (isset($_POST['reg'])) {
    if (isset($_POST['username']))
        $drname = $_POST['username'];
    if (isset($_POST['passs']))
        $drpass = $_POST['passs'];
    if (isset($_POST['idnumber']))
        $drID = $_POST['idnumber'];
    if (isset($_POST['work']))
        $drwork = $_POST['work'];
    if (isset($_POST['hosp']))
        $drHospital = $_POST['hosp'];
    if (isset($_POST['email']))
        $drEmail = $_POST['email'];
    if (isset($_POST['gender']))
        $drgender = $_POST['gender'];
    if (isset($_POST['descr']))
        $drdesc = $_POST['descr'];
    $query = "INSERT INTO `doctors` (`ID`, `drname`, `hosname`, `dremail`, `drpass`, `work`, `description`, `gender`) VALUES 
            ('$drID','$drname','$drHospital','$drEmail','$drpass','$drwork','$drdesc','$drgender')";
    $result = $db->query($query);
    if ($result == true) {
        echo "<script language='JavaScript'>alert('success'); </script>";
    } else
        echo "<script language='JavaScript'>alert('FAILED'); </script>";

}


?>