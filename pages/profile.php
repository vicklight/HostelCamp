
<?php
session_start();
if (!($_SESSION['id'])){
    header("location:../index.php");
    exit(1);
}
$name=$_SESSION['id'];
$connection = mysqli_connect('localhost', 'root', '', 'camphostel');

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>My Profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/profile.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</head>


<body>
<header>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">CampHostel</a>
            </div>
            <ul class="nav navbar-nav">
                <li ><a href="home.php">Home</a></li>
                <li class="active"><a href="profile.php">My Profile</a></li>
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
        <div class="row panel-heading pan">
            <h2>Welcome to your personal profile</h2>
            <p>Check your status at the bottom</p>
            <hr>
        </div>

        <div class="row">
            <div class="col-lg-3 col-sm-2 col-xs-2">

                <img alt="profile photo" src="../images/<?php

                if (!($connection)) {
                    die('error, could  not connect to the database');
                }
                $select4= "SELECT * FROM registeration WHERE id='$name'";
                $query4=mysqli_query($connection,$select4);
                while($row=mysqli_fetch_array($query4)){
                    echo "<img src='../images/".$row['uploadPhoto']."' height='50px' width='50px' />";                }

                ?>
">
            </div>
            <div class="col-lg-5 col-sm-4 col-xs-2">
                <?php

                if (!($connection)) {
                    die('error, could  not connect to the database');
                }
                $select= "SELECT * FROM registeration WHERE id='$name'";
                $query=mysqli_query($connection,$select);
                while($row=mysqli_fetch_array($query)){
                    echo "<h4><strong>".$row['firstname']." ".$row['lastname']."</strong></h4>";
                }

                ?>
                <p>An enthisiastic student with love for technology and sports.I believe that I can achieve whatever I put my mind to.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-sm-2 col-xs-2">
                <h4>Level</h4>
            </div>
            <div class="col-lg-5 col-sm-4 col-xs-2">
                <h4><strong>:<?php
                        $select1= "SELECT * FROM registeration WHERE id='$name'";
                        $query1=mysqli_query($connection,$select1);

                        while ($row=mysqli_fetch_array($query1)){
                    echo $row['level'];
                }
                        ?></strong></h4>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-sm-2 col-xs-2">
                <h4>Mat-number</h4>
            </div>
            <div class="col-lg-5 col-sm-4 col-xs-2">
                <h4><strong>:<?php
                        $select2= "SELECT * FROM registeration WHERE id='$name'";
                        $query2=mysqli_query($connection,$select2);

                        while ($row=mysqli_fetch_array($query2)){
                            echo $row['matnum'];
                        }
                        ?>
                    </strong></h4>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-sm-2 col-xs-2">
                <h4>Department</h4>
            </div>
            <div class="col-lg-5 col-sm-4 col-xs-2">
                <h4><strong>:
                        <?php
                        $select3= "SELECT * FROM registeration WHERE id='$name'";
                        $query3=mysqli_query($connection,$select3);

                        while ($row=mysqli_fetch_array($query3)){
                            echo $row['dept'];
                        }
                        ?></strong></h4>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-sm-2 col-xs-2">
                <h4>Hostel</h4>
            </div>
            <div class="col-lg-5 col-sm-4 col-xs-2">
                <h4><strong>:<?php
                        $select3= "SELECT * FROM registeration WHERE id='$name'";
                        $query3=mysqli_query($connection,$select3);

                        while ($row=mysqli_fetch_array($query3)){
                            $mat=$row['matnum'];
                        }

                        $select2= "SELECT * FROM allocatelist  WHERE mat_number='$mat'";

                        $query2=mysqli_query($connection,$select2);

                        while ($row=mysqli_fetch_array($query2)){
                            $value=$row['allocatedhostel'];
                            if ($value=='no'){
                                echo "Not yet allocated";
                            }
                            else {
                                echo $value;
                            }
                        }

                        ?></strong></h4>
            </div>
        </div>
    </div>
<footer>

    <h4>CampHostel by Victor Nwauwa</h4>
    <p>all copyrights reserved</p>

</footer>


</body>