
<?php
function edit()
{
    session_start();
    require_once('loginphpPatient.php');
    require_once('loginphpDr.php');
    include 'userProfile.php';
    $user = 'root';
    $password = 'anabakrah7ali';
    $dbname = 'registerationdb';
    $db = new mysqli('localhost', $user, $password, $dbname) or die("Unable to connect");
    echo "<script> alert('successfully connected');</script>";

    if ($_SESSION['user'] == 'patient') {
        $filenoOwner = $_SESSION['owner'];
        $query = "SELECT * FROM `patients` WHERE  `fileno`='$filenoOwner'";
        $result = $db->query($query);
        $row = mysqli_fetch_array($result);
        ?>
        <script language="JavaScript">
            var fullname = '<?php $row['name']; ?>';
            var phone = '<?php $row['phoneNo']; ?>';
            var file = '<?php $row['fileno']; ?>';
            var address = '<?php $row['address']; ?>';
            var gender = '<?php $row['gender']; ?>';
            document.getElementById("lab0").innerHTML = "Adress: ";
            document.getElementById("lab1").innerHTML = "Phone Number: ";
            document.getElementById("lab2").innerHTML = "File Number: ";
            document.getElementById("phoneNumber").innerHTML = phone;
            document.getElementById("personName").innerHTML = fullname;
            document.getElementById("personWork").innerHTML = address;
            document.getElementById("fn").innerHTML = file;
            document.getElementById("desc").innerHTML = '<?php $row['description']; ?>'
            if (gender == "male")
                document.getElementById("image").src = 'patman.ico';
            else
                document.getElementById("image").src = 'patwoman.ico';
        </script>
        <?php
    }
    else if ($_SESSION['user'] == 'dr'){
        $idOwner = $_SESSION['owner'];
        $query = "SELECT * FROM `patients` WHERE  `ID`='$idOwner'";
        $result = $db->query($query);
        $row = mysqli_fetch_array($result);
        ?>
        <script language="JavaScript">

            var fullname = '<?php $row['drname']; ?>';
            var hospital = '<?php $row['hosname']; ?>';
            var Id = '<?php $row['ID']; ?>';
            var work = '<?php $row['work']; ?>';
            var gender = '<?php $row['gender']; ?>';
            document.getElementById("lab0").innerHTML = "Work: ";
            document.getElementById("lab1").innerHTML = "Hospital: ";
            document.getElementById("lab2").innerHTML = "ID Number: ";
            document.getElementById("phoneNumber").innerHTML = hospital;
            document.getElementById("personName").innerHTML = fullname;
            document.getElementById("personWork").innerHTML = work;
            document.getElementById("fn").innerHTML = Id;
            document.getElementById("desc").innerHTML = '<?php $row['description']; ?>'
            if (gender == "male")
                document.getElementById("image").src = 'drmale.ico';
            else
                document.getElementById("image").src = 'doctor2.ico';
        </script>

        <?php
    }

}
?>
