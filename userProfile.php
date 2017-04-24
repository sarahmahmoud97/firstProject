<?php
session_start();
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->  
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->  
<!--[if !IE]><!--> <html > <!--<![endif]-->

<head>

    <title>user profile</title>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Responsive HTML5 Website landing Page for Developers">
    <meta name="author" content="3rd Wave Media">
    <link rel="shortcut icon" href="hope2.jpg">
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,300italic,400italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'> 
    <!-- Global CSS -->
    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">   
    <!-- Plugins CSS -->
    <link rel="stylesheet" href="assets/plugins/font-awesome/css/font-awesome.css">
    <!-- github acitivity css -->
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/octicons/2.0.2/octicons.min.css">
    <link rel="stylesheet" href="http://caseyscarborough.github.io/github-activity/github-activity-0.1.0.min.css">
    <link id="theme-style" rel="stylesheet" href="assets/css/styles.css">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

    <![endif]-->
    <?php

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $firstname = $_POST['name'];
    }

    ?>
</head> 

<body onload="" style="direction: rtl; text-align: right">
<?php
if(!$_SESSION)
    session_start();

$user='root';
$password='anabakrah7ali';
$dbname='registerationdb';
$db= new mysqli('localhost',$user,$password,$dbname) or die("Unable to connect");
echo "<script> alert('successfully connected');</script>" ;
$idOwner='';
$name='';
$email='';
$phone='';
$address='';
$gender='';
$drr='';
$desc='';
$add='';
$str='';
$result2='';
if ($_SESSION['user']=='patient'){
    $idOwner=$_SESSION['owner']; //file number
    $query="SELECT * FROM `patients` WHERE  `fileno`='$idOwner'";
    $query2="SELECT * FROM `specpat`";
    $result2=$db->query($query2);
    $result=$db->query($query);
    $row=mysqli_fetch_array($result);
    $name=$row['name'];
    $email=$row['email'];
    $phone=$row['phoneNo'];
    $address=$row['address'];
    $gender=$row['gender'];
    $drr=$row['specDR'];
    $desc=$row['description'];

}
else if($_SESSION['user']=='dr'){
    $idOwner=$_SESSION['owner'];
    $query="SELECT * FROM `doctors` WHERE  `ID`='$idOwner'";
    $query2="SELECT * FROM `specdr`";
    $result2=$db->query($query2);
    $result=$db->query($query);
    if(!$result)
        echo "<script> alert('FAILED');</script>";
    $row=mysqli_fetch_array($result);
    $name=$row['drname'];
    $email=$row['dremail'];
    $phone=$row['work'];
    $add=$row['hosname'];
    $gender=$row['gender'];
    $desc=$row['description'];
    $address=$row['address'];
    $drr='';

}

echo "
    <!-- ******HEADER****** --> 
    <header class=\"header\">
        <div class=\"container\">
            <!-- we put the profile picture according to six--->";

             if ($_SESSION['user'] == 'patient'){
                 $str='الدكتور المسؤول عني :';
                 if($row['gender']=='male')
                     echo "<img class='profile-image img-responsive pull-left' id='image' src='patman.ico' alt='James Lee' >";
                 else
                     echo "<img class='profile-image img-responsive pull-left' id='image' src='patwoman.ico' alt='James Lee' >";
             }
             else if($_SESSION['user'] == 'dr'){
                 $str='اسم المشفى الذي اعمل به : ';
                 if($row['gender']=='male')
                     echo "<img class='profile-image img-responsive pull-left' id='image' src='drmale.ico' alt='James Lee' >";
                 else
                     echo "<img class='profile-image img-responsive pull-left' id='image' src='doctor2.ico' alt='James Lee' >";

             }
            echo "
            <!--<img class=\"profile-image img-responsive pull-left\" id=\"image\" src=\"doctor2.ico\" alt=\"James Lee\" />-->

            <div class=\"profile-content pull-left\">
                <h1 class=\"name\" id=\"persoNname\">الإسم : $name </h1>
                <label for=\"personWork\" id=\"lab0\">رقم الملف\الرقم التعريفي : </label> $idOwner<h2 class=\"desc\" id=\"personWork\"></h2>
                <label for=\"phoneNumber\" id=\"lab1\">رقم الجوال\العمل : </label> $phone  <p id=\"phoneNumber\"></p>

                <ul class=\"social list-inline\">
                    <li><a href=\"#\"><i class=\"fa fa-twitter\"></i></a></li>                   
                    <li><a href=\"#\"><i class=\"fa fa-google-plus\"></i></a></li>
                    <li><a href=\"#\"><i class=\"fa fa-linkedin\"></i></a></li>
                    <li><a href=\"#\"><i class=\"fa fa-github-alt\"></i></a></li>                  
                    <li class=\"last-item\"><a href=\"#\"><i class=\"fa fa-hacker-news\"></i></a></li>                 
                </ul> 
            </div><!--//profile-->
            <a class=\"btn btn-cta-primary pull-right\" href=\"http://themes.3rdwavemedia.com/\" target=\"_blank\"><i class=\"fa fa-paper-plane\"></i>تواصل معي</a>              
        </div><!--//container-->
    </header><!--//header-->
    
    <div class=\"container sections-wrapper\">
        <div class=\"row\">
            <div class=\"primary col-md-8 col-sm-12 col-xs-12\">
                
                <section class=\"about section\">
                    <div class=\"section-inner\">
                        <h2 class=\"heading\">ملاحظات يومية :</h2>
                        
                        <div class=\"content\">
                            <textarea disabled name='ta' id=\"desc\" cols='80' rows='10'>  مبدئياً لا شيء </textarea>
                            
                        </div>
                        
                        <button style=\"width: 50px; height: 30px ; background-color: #f190bd;\" onclick=\"document.getElementsByName('ta')[0].disabled=false; \">تعديل</button>
                        <button style=\"width:50px; height: 30px; background-color: #f190bd;\" onclick=\"document.getElementsByName('ta')[0].disabled=true; \">حفظ</button><!--//content-->
                       
                    </div><!--//section-inner-->                 
                </section><!--//section-->

                <section class=\"experience section\">
                    <div class=\"section-inner\">
                        <h2 class=\"heading\">بياناتي المهمة :</h2>
                        <div class=\"content\">
                        ";
                        if($_SESSION['user']=='patient'){
                            foreach ($result2 as $item){
                            echo "<div class=\"item\">
                                <h3 class=\"title\">الدكتور المسؤول عني  - <span class=\"place\"><a href=\"#\">".$item['drName']."</a></span> <span class=\"year\"></span></h3>
                                   <p>رقم هاتف الدكتور :".$item['drMobile']."
                                <p>عنوان البريد الإلكتروني للدكتور :".$item['drEmail'].".</p> <br> <br> </div>
                                ";}}
                            else{
                            foreach ($result2 as $item){
                                echo "<div class=\"item\">
                                <h3 class=\"title\">اسم المريض : - <span class=\"place\"><a href=\"#\">".$item['patname']."</a></span> <span class=\"year\"></span></h3>
                                    <p>رقم ملف المريض : ".$item['patfileno'].".</p>
                                <p>الحالة الصحية للمريض : ".$item['patstatus'].".</p>
                            </div><!--//item-->";}

                            };
               echo "    </div>
                     </div>

               </section>
               </div>";

           echo" <div class=\"secondary col-md-4 col-sm-12 col-xs-12\">
                 <aside class=\"info aside section\">
                    <div class=\"section-inner\">
                        <h2 class=\"heading sr-only\">معلومات أساسية عني :</h2>
                        <div class=\"content\">
                            <ul class=\"list-unstyled\">
                                <li><i class=\"fa fa-map-marker\"></i><span class=\"sr-only\">العنوان:</span>$add</li>
                                <li><i class=\"fa fa-envelope-o\"></i><span class=\"sr-only\">عنوان البريد الإلكتروني:</span><a href=\"#\">$email</a></li>
                                <li><i class=\"fa fa-link\"></i><span class=\"sr-only\">$str</span><a href=\"#\">$address</a></li>
                            </ul>
                        </div><!--//content-->  
                    </div><!--//section-inner-->                 
                </aside><!--//aside-->
       " ;
             if($_SESSION['user']=='patient'){
                echo "<aside class=\"testimonials aside section\">
                    <div class=\"section-inner\">
                        <h2 class=\"heading\">اقتباس رائع :</h2>
                        <div class=\"content\">
                            <div class=\"item\">
                                <blockquote class=\"quote\">                                  
                                    <p><i class=\"fa fa-quote-left\"></i> تحية لكل الأشخاص الرائعين في حياتي وحياتكم , والذين يخوضون حربا ضد السرطان , ما يهم هو الحب وسوف نقهر هذا المرض في النهاية!</p>
                                </blockquote>                
                                <p class=\"source\"><span class=\"name\">اليسيا كايز</span><br /><span class=\"title\">مقولات المشاهير</span></p>                                                             
                            </div><!--//item-->
                            
                            <p><a class=\"more-link\" href=\"https://www.facebook.com/%D8%AD%D9%85%D9%84%D8%A9-%D8%A7%D9%84%D9%88%D9%82%D9%88%D9%81-%D9%85%D8%B9-%D9%85%D8%B1%D8%B6%D9%89-%D8%A7%D9%84%D8%B3%D8%B1%D8%B7%D8%A7%D9%86-110108659048103/\"><i class=\"fa fa-external-link\"></i> للمزيد على صفحة الفيسبوك</a></p> 
                            
                        </div><!--//content-->
                    </div><!--//section-inner-->
                </aside><!--//section-->
                "; }else {
                    echo "<aside class=\"testimonials aside section\">
                    <div class=\"section-inner\">
                        <h2 class=\"heading\">اقتباس رائع :</h2>
                        <div class=\"content\">
                            <div class=\"item\">
                                <blockquote class=\"quote\">                                  
                                    <p><i class=\"fa fa-quote-left\"></i> إن التقوى المنشودة ليست مسبحة درويش ولا عمامة متمشيخ ولا زاوية متعبد ,انها علم وعمل ودين ودنيا,وروح ومادة وتخطيط وتنظيم واتقان واحسان.</p>
                                </blockquote>                
                                <p class=\"source\"><span class=\"name\">ابو الحسن الندوي</span><br /><span class=\"title\">مقولات </span></p>                                                             
                            </div><!--//item-->
                            
                            <p><a class=\"more-link\" href=\"http://www.huffpostarabi.com/2016/08/18/story_n_11594106.html\"><i class=\"fa fa-external-link\"></i> اقرأ شيئا مفيداً</a></p> 
                            
                        </div><!--//content-->
                    </div><!--//section-inner-->
                </aside><!--//section-->";}
               echo "<aside class=\"education aside section\">
                    <div class=\"section-inner\">
                        <h2 class=\"heading\">معلومات عن علمي وشهاداتي :</h2>
                        <div class=\"content\">
                            <div class=\"item\">                      
                                <h3 class=\"title\"><i class=\"fa fa-graduation-cap\"></i> MSc Psychology and Computer Science</h3>
                                <h4 class=\"university\">University College London <span class=\"year\">(2011-2012)</span></h4>
                            </div><!--//item-->
                            <div class=\"item\">
                                <h3 class=\"title\"><i class=\"fa fa-graduation-cap\"></i> BSc Computer Science</h3>
                                <h4 class=\"university\">University of Bristol <span class=\"year\">(2008-2011)</span></h4>
                            </div><!--//item-->
                        </div><!--//content-->
                    </div><!--//section-inner-->
                </aside><!--//section-->
              
            </div><!--//secondary-->    
        </div><!--//row-->
    </div><!--//masonry-->
    
    <!-- ******FOOTER****** -->
 
    <!-- Javascript -->          
    <script type=\"text/javascript\" src=\"assets/plugins/jquery-1.11.1.min.js\"></script>
    <script type=\"text/javascript\" src=\"assets/plugins/jquery-migrate-1.2.1.min.js\"></script>
    <script type=\"text/javascript\" src=\"assets/plugins/bootstrap/js/bootstrap.min.js\"></script>    
    <script type=\"text/javascript\" src=\"assets/plugins/jquery-rss/dist/jquery.rss.min.js\"></script> 
    <!-- github activity plugin -->
    <script type=\"text/javascript\" src=\"http://cdnjs.cloudflare.com/ajax/libs/mustache.js/0.7.2/mustache.min.js\"></script>
    <script type=\"text/javascript\" src=\"http://caseyscarborough.github.io/github-activity/github-activity-0.1.0.min.js\"></script>
    <!-- custom js -->
    <script type=\"text/javascript\" src=\"assets/js/main.js\"></script>
 ";
?>

</body>
</html> 

