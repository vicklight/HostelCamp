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
</head>
<body>
<header>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">CampHostel</a>
            </div>
            <ul class="nav navbar-nav">
                <li ><a href="dashboard.php">Home</a></li>
                <li><a href="#">My Profile</a></li>
                <li><a href="#">Listing</a></li>
                <li class="active"><a href="dashboard.php"></a></li>
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
        <h3 style="color: white">Input student Details</h3>
        <form action="student" method="POST">
            <div class="field-wrap">
                <label>
                    First Name<span class="req">*</span>
                </label>
                <input type="text" required autocomplete="off" name="firstname" id="firstname" />
            </div>
            <div class="field-wrap">
                <label>
                    Last Name<span class="req">*</span>
                </label>
                <input type="text"required autocomplete="off" name="lastname" id="lastname"/>
            </div>

            <div class="field-wrap">
                <label>
                    Enter Matric Number<span class="req">*</span>
                </label>
                <input type="text"required autocomplete="off" name="matnum" id="matnum"/>
            </div>
            <div class="field-wrap">
                <label>
                    Department<span class="req">*</span>
                </label>
                <input type="text"required autocomplete="off" name="dept" id="dept"/>
            </div>

            <div class="field-wrap">
                <label>
                    Click to select Sex<span class="req">*</span>
                </label>
                <input list="sex" name="sex">
                <datalist id="sex">
                    <option value="Male">
                    <option value="Female">
                    <option value="Others">
                </datalist>
            </div>

            <div class="field-wrap">
                <label>
                    Click to select Level<span class="req">*</span>
                </label>
                <input list="level" name="level">
                <datalist id="level">
                    <option value="100 level">
                    <option value="200 level">
                    <option value="300 level">
                    <option value="400 level">
                    <option value="500 level">
                </datalist>
            </div>

            <div class="field-wrap">
                <label>
                    Are you Handicapped?<span class="req">*</span>
                </label>
                <input list="handicap" name="handicap">
                <datalist id="handicap">
                    <option value="Yes">
                    <option value="No">

                </datalist>
            </div>

            <div class="field-wrap">
                <label>
                    Email Address<span class="req">*</span>
                </label>
                <input type="email"required autocomplete="off" name="email" id="email"/>
            </div>

            <div class="field-wrap">
                <label>
                    Set A Password<span class="req">*</span>
                </label>
                <input type="password"required autocomplete="off" name="password" id="password"/>
            </div>

            <div class="field-wrap">
                <label>
                </label>
                <input type="file" name="uploadPhoto" id="uploadPhoto"><p>Upload photo</p>
            </div>
            <input type="submit" value="Register" id="reg">
        </form>
    </div>

</div>
</body>
</html>