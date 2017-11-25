<?php
require('connect1.db.php');
require('chat1.func.php');

$messages = get_msg();
foreach( $messages as $message){

	echo '<strong>'.$message['sender'].'  Sent</strong><br/>'; 
	echo $message['message'].'<br/><br/>'; 

}


?>