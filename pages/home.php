<?php
session_start();
if (!($_SESSION['id'])){
    header("location:../index.php");
    exit(1);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CampHostel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/home.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/hostel.js"></script>

</head>
<body>
<header>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="../index.php">CampHostel</a>
            </div>
            <ul class="nav navbar-nav">
                <li class="active"><a href="home.php">Home</a></li>
                <li id="profile"><a href="../pages/profile.php">My Profile</a></li>
                <li><a href="logout.php">Logout</a></li>
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
<div class="container con">
    <div class="row row1">
        <div class="welcome">
            <h2>Welcome to CampHostel Portal</h2>
            <p>The best platform for campus hostel allocation</p>
        </div>
    </div>
    <div class="row">
        <div class="col col-lg-4">
            <div class="panel-heading panhead">
                <i class="glyphicon glyphicon-user"></i>
                <a href="profile.php">Profile</a>
            </div>
            <div class="panel-body panbody">
                <p>This directs you to your user profile page. Click to view. </p>
            </div>
        </div>
        <div class="col col-lg-4">
            <div class="panel-heading panhead">
                <i class="glyphicon glyphicon-list"></i>
                <a href="listing.php">Allocation list</a>
            </div>
            <div class="panel-body panbody">
                <p>This directs you to a list containing students,their details and their allocated room. </p>
            </div>
        </div>
        <div class="col col-lg-4">
            <div class="panel-heading panhead">
                <i class="glyphicon glyphicon-alert"></i>
                <a href="#">Support</a>
            </div>
            <div class="panel-body panbody">
                <p>In case of any issues,click on support to see a list of our FAQs </p>
            </div>
        </div>


    </div>
</div>
<footer>

    <h4>CampHostel by Victor Nwauwa</h4>
    <p>all copyrights reserved</p>

</footer>
</body>
</html>