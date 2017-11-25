<?php

function get_msg(){
    $db_host='localhost';
    $db_user='root';
    $db_pass='anabakrah7ali';
    $db_name='chat2';

    $db=new mysqli($db_host,$db_user,$db_pass,$db_name);

    if($db->errno)
        echo "<script>alert('Errror');</script>";

$query = "SELECT  `Sender`, `Message` FROM `chat` ORDER BY `MSG_ID` DESC";
$run = $db->query($query);
$messages=array(); 
while($message=mysqli_fetch_assoc($run)){
$messages[]=array('sender'=> $message['Sender'],
	              'message'=> $message['Message']);

}
return $messages; 

}

function send_msg($sender,$message){
    $db_host='localhost';
    $db_user='root';
    $db_pass='anabakrah7ali';
    $db_name='chat2';

    $db=new mysqli($db_host,$db_user,$db_pass,$db_name);

    if($db->errno)
        echo "<script>alert('Errror');</script>";
if(!empty($sender)&&!empty($message)){

	$sender=mysqli_real_escape_string($db,$sender);
	$message=mysqli_real_escape_string($db,$message);
	$query = "INSERT INTO `chat` VALUES ('$message',null,'{$sender}')";
	if($run=$db->query($query)){
		return true; 
	}  
	else {return false ; }
}
else{return false; }
}

?>