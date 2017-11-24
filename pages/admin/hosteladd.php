<?php
session_start();
if (!($_SESSION['id'])){
    header("location:../index.php");
    exit(1);
}
$connection = mysqli_connect('localhost', 'root', '', 'camphostel');

?>


<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>Listing Form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/hostel.js"></script>
    <script src="../../js/index.js"></script>
</head>
<body>
<header>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">CampHostel</a>
            </div>
            <ul class="nav navbar-nav">
                <li class="active"><a href="dashboard.php">Home</a></li>
                <li><a href="../logout.php">Logout</a></li>
            </ul>
            <form class="navbar-form navbar-left">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search">
                    <div class="input-group-btn">
                        <button class="btn btn-default" type="submit">
                            <i class="glyphicon glyphicon-search"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </nav>
</header>
<div class="container">
    <div class="form">
        <h3 style="color: white">Input Hostel Details</h3>
        <form action="hosteladd.php" method="POST">
                        <div class="field-wrap">
                <label>
                    Hostel Name<span class="req">*</span>
                </label>
                <input style='color:white' type="text" required autocomplete="off" name="hostelname" id="hostelname"/>
            </div>

            <div class="field-wrap">
                <label>
                    Capacity<span class="req">*</span>
                </label>
                <input style='color:white' type="text"required autocomplete="off" name="capacity" id="capacity"/>
            </div>
            <div class="field-wrap">
                <label>
                    Hostel Type<span class="req">*</span>
                </label>
                <input style='color:white' list="hosteltype" name="hosteltype">
                <datalist id="hosteltype">
                    <option value="Male">
                    <option value="Female">
                </datalist>
            </div>
            <input type="submit" class="button button-block" name='create' value="Create Hostel" id="createhostel">

        </form>
        <?php
        if (isset($_POST['create'])){
            $name=$_POST['hostelname'];
            $capacity=$_POST['capacity'];
            $type=$_POST['hosteltype'];

           $selecthostel="SELECT hostelname FROM create_hostel where hostelname='$name'";
           $query=mysqli_query($connection,$selecthostel);
           if (mysqli_num_rows($query)>0){
               echo "<p style='color:red'>hostel already exists</p>";
           }
           else{
               $input="INSERT INTO create_hostel (hostelname,capacity,hosteltype,capacity2) VALUE ('$name','$capacity','$type','$capacity')";
               $query1=mysqli_query($connection,$input);
               echo "<p style='color:white'>hostel successfully created</p>";
           }

        }
        ?>
    </div>
    <footer>

        <h4>CampHostel by Victor Nwauwa</h4>
        <p>all copyrights reserved</p>

    </footer>

</body>