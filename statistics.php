<?php

include 'homePage.html';

if (isset($_POST['slct'])){
    $year= $_POST['statis'];
    $user='root';
    $password='anabakrah7ali';
    $dbname='statistics';
    $db= new mysqli('localhost',$user,$password,$dbname) or die("Unable to connect");

    echo "<script language='JavaScript'> alert('successfully connected');</script>";

    $query="SELECT `year`, `male`, `female`, `perA65`, `perB15`, `perBTW`, `qolon`, `thady`, `ri2a`, `westBank`, `gaza`, `maleDied`, `femaleDied` 
          FROM `statistics` WHERE `year`='$year'";
    $result=$db->query($query);
    if(!$result){
        echo "<script language='JavaScript'> alert('Failed');</script>";
    }
    echo "<script language='JavaScript'> alert('succeed');</script>";
    $data=mysqli_fetch_array($result);
    echo "<script language='JavaScript'> $('#femm').data('percent',".$data['female'].");</script>";
    echo "<script language='JavaScript'> document.getElementById('fem').setAttribute('data-percent',".$data['female']."%".")</script>";
    echo "<script language='JavaScript'> document.getElementById('mal').innerHTML="." ".$data['male']."%"."</script>";
    echo "<script language='JavaScript'> alert('succeed ".$data['male']."');"."</script> ";

}
/**
 * Created by PhpStorm.
 * User: GoogleTech
 * Date: 4/17/2017
 * Time: 7:10 PM
 */
?>