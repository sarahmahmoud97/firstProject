<?php 
$db_host='localhost';
$db_user='root';
$db_pass='anabakrah7ali';
$db_name='chat2';

$db=new mysqli($db_host,$db_user,$db_pass,$db_name);

if($db->errno)
    echo "<script>alert('Errror');</script>";

/*
if ($connection = new mysqli($db_host,$db_user,$db_pass)){
	$feedback[]=  'Connected to DB server<br/> ';
}
if ($database=new mysqli($db_name,$connection)){

$feedback[]='DB has been Selected <br/><br>' ; }


else {

	$feedback[]='Unable to connect to DB <br/>';
}
*/

?>