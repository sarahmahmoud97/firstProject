<?php
require('core.inc.php');?>
<?php
if(isset($_POST['send'])){
    if(send_msg($_POST['sender'],$_POST['message'])){

   echo ''; 
    }
else {
	echo ''; 
}

}

?> 
<!DOCTYPE html>
<html >
<head>
	<title>محادثة </title>
    <link rel="shortcut icon" href="hope2.jpg">
	<link rel="stylesheet" type="text/css" href="mainnn.css">
	<a   text-align = "center" id="back" href="homePage.php"> الرجوع للصفحة الرئيسية </a>
</head>
<body>

<div id="messages " style="border: 1px solid #ccc;
	width:470px ;
	height:400px;
	padding:5px ;
	margin:10px; 
	overflow:auto; ">
    <?php
    $messages = get_msg();
    foreach( $messages as $message){

        echo '<strong>'.$message['sender'].': </strong><br/>';
        echo $message['message'].'<br/><br/>';

    }
    ?>
	
</div>
<div id ="input" >
<form action="index.php" method="POST">
	   <input size= "65" style="border: 1px solid #ccc; display: :block ;  " type="text" name="sender" placeholder="your name" width="70" />
		<textarea style="  display:block ; border: 1px solid #ccc; " type="text" name="message" rows="4" cols="66" placeholder="type your message here .. "></textarea>
		<input type="submit"  name="send" value="Send "/ >
		
</form>
</div>



</body>
</html>
