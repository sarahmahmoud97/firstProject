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

<body onload="">
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
if ($_SESSION['user']=='patient'){
    $idOwner=$_SESSION['owner']; //file number
    $query="SELECT * FROM `patients` WHERE  `fileno`='$idOwner'";
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
    $query="SELECT * FROM `patients` WHERE  `ID`='$idOwner'";
    $result=$db->query($query);
    $row=mysqli_fetch_array($result);
    $name=$row['drname'];
    $email=$row['dremail'];
    $phone=$row['work'];
    $address=$row['hosname'];
    $gender=$row['gender'];
    $desc=$row['description'];

}

echo "
    <!-- ******HEADER****** --> 
    <header class=\"header\">
        <div class=\"container\">
            <!-- we put the profile picture according to six--->";

             if ($_SESSION['user'] == 'patient'){
                 if($row['gender']=='male')
                     echo "<img class='profile-image img-responsive pull-left' id='image' src='patman.ico' alt='James Lee' >";
                 else
                     echo "<img class='profile-image img-responsive pull-left' id='image' src='patwoman.ico' alt='James Lee' >";
             }
             else if($_SESSION['user'] == 'dr'){
                 if($row['gender']=='male')
                     echo "<img class='profile-image img-responsive pull-left' id='image' src='drmale.ico' alt='James Lee' >";
                 else
                     echo "<img class='profile-image img-responsive pull-left' id='image' src='doctor2.ico' alt='James Lee' >";

             }
            echo "
            <!--<img class=\"profile-image img-responsive pull-left\" id=\"image\" src=\"doctor2.ico\" alt=\"James Lee\" />-->

            <div class=\"profile-content pull-left\">
                <h1 class=\"name\" id=\"persoNname\">Name : $name </h1>
                <label for=\"personWork\" id=\"lab0\">ID/File No. : </label> $idOwner<h2 class=\"desc\" id=\"personWork\"></h2>
                <label for=\"phoneNumber\" id=\"lab1\">Phone/work : </label> $phone  <p id=\"phoneNumber\"></p>

                <ul class=\"social list-inline\">
                    <li><a href=\"#\"><i class=\"fa fa-twitter\"></i></a></li>                   
                    <li><a href=\"#\"><i class=\"fa fa-google-plus\"></i></a></li>
                    <li><a href=\"#\"><i class=\"fa fa-linkedin\"></i></a></li>
                    <li><a href=\"#\"><i class=\"fa fa-github-alt\"></i></a></li>                  
                    <li class=\"last-item\"><a href=\"#\"><i class=\"fa fa-hacker-news\"></i></a></li>                 
                </ul> 
            </div><!--//profile-->
            <a class=\"btn btn-cta-primary pull-right\" href=\"http://themes.3rdwavemedia.com/\" target=\"_blank\"><i class=\"fa fa-paper-plane\"></i> Contact Me</a>              
        </div><!--//container-->
    </header><!--//header-->
    
    <div class=\"container sections-wrapper\">
        <div class=\"row\">
            <div class=\"primary col-md-8 col-sm-12 col-xs-12\">
                <section class=\"about section\">
                    <div class=\"section-inner\">
                        <h2 class=\"heading\">About Me</h2>
                        <div class=\"content\">
                            <p id=\"desc\"> $desc 
                        </div><!--//content-->
                    </div><!--//section-inner-->                 
                </section><!--//section-->

                <section class=\"experience section\">
                    <div class=\"section-inner\">
                        <h2 class=\"heading\">Work Experience</h2>
                        <div class=\"content\">
                            <div class=\"item\">
                                <h3 class=\"title\">Co-Founder & Lead Developer - <span class=\"place\"><a href=\"#\">Startup Hub</a></span> <span class=\"year\">(2014 - Present)</span></h3>
                                <p>Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt.</p>
                            </div><!--//item-->
                            <div class=\"item\">
                                <h3 class=\"title\">Software Engineer - <span class=\"place\"><a href=\"#\">Google</a></span> <span class=\"year\">(2013 - 2014)</span></h3>
                                <p>Vivamus a tortor eu turpis pharetra consequat quis non metus. Aliquam aliquam, orci eu suscipit pellentesque, mauris dui tincidunt enim. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna.</p>
                            </div><!--//item-->

                            <div class=\"item\">
                                <h3 class=\"title\">Software Engineer - <span class=\"place\"><a href=\"#\">eBay</a></span> <span class=\"year\">(2012 - 2013)</span></h3>
                                <p>Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum.</p>
                            </div><!--//item-->

                        </div><!--//content-->
                    </div><!--//section-inner-->
                </section><!--//section-->
            </div><!--//primary-->
            <div class=\"secondary col-md-4 col-sm-12 col-xs-12\">
                 <aside class=\"info aside section\">
                    <div class=\"section-inner\">
                        <h2 class=\"heading sr-only\">Basic Information</h2>
                        <div class=\"content\">
                            <ul class=\"list-unstyled\">
                                <li><i class=\"fa fa-map-marker\"></i><span class=\"sr-only\">Location:</span>San Francisco, US</li>
                                <li><i class=\"fa fa-envelope-o\"></i><span class=\"sr-only\">Email:</span><a href=\"#\">jameslee@website.com</a></li>
                                <li><i class=\"fa fa-link\"></i><span class=\"sr-only\">Website:</span><a href=\"#\">http://www.website.com</a></li>
                            </ul>
                        </div><!--//content-->  
                    </div><!--//section-inner-->                 
                </aside><!--//aside-->
                
                <aside class=\"testimonials aside section\">
                    <div class=\"section-inner\">
                        <h2 class=\"heading\">Testimonials</h2>
                        <div class=\"content\">
                            <div class=\"item\">
                                <blockquote class=\"quote\">                                  
                                    <p><i class=\"fa fa-quote-left\"></i>James is an excellent software engineer and he is passionate about what he does. You can totally count on him to deliver your projects!</p>
                                </blockquote>                
                                <p class=\"source\"><span class=\"name\">Tim Adams</span><br /><span class=\"title\">Curabitur commodo</span></p>                                                             
                            </div><!--//item-->
                            
                            <p><a class=\"more-link\" href=\"#\"><i class=\"fa fa-external-link\"></i> More on Linkedin</a></p> 
                            
                        </div><!--//content-->
                    </div><!--//section-inner-->
                </aside><!--//section-->
                
                <aside class=\"education aside section\">
                    <div class=\"section-inner\">
                        <h2 class=\"heading\">Education</h2>
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

