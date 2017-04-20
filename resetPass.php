<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>استرجع كلمة المرور</title>
    <link rel="shortcut icon" href="hope2.jpg">
    <link rel="stylesheet" href="trueloginCSS.css">
    <script type="text/javascript">
        $('.message a').click(function(){
            $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
        });
    </script>
</head>
<body >
<?php include 'loginphpPatient.php';?>
<div class="login-page">
    <div class="form">

        <form class="login-form" method="post" action="mailto:<?php $row['email'] ?>">
            <input type="email" placeholder=" عنوان البريد الالكتروني" name="email"/>
            <button style="direction: rtl;" name="login">استرجع كلمة المرور</button>

        </form>
    </div>
</div>
</body>
</html>