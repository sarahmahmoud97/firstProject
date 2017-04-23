<?php

$user='root';
$password='anabakrah7ali';
$dbname='registerationdb';
$db= new mysqli('localhost',$user,$password,$dbname);
if($db->error){
    echo "<script language='JavaScript'>alert('FAILED'); </script>";
}
echo "<script language='JavaScript'>alert('successfully connected'); </script>";


/**
 * Created by PhpStorm.
 * User: GoogleTech
 * Date: 4/23/2017
 * Time: 8:12 PM
 */
?>