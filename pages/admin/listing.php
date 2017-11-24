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
    <title>Sign-Up/Login Form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/listing.css">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
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
                <li ><a href="dashboard.php">Home</a></li>
                <li><a href="profile.php">My Profile</a></li>
                <li class="active"><a href="listing.php">Listing</a></li>
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
<div class="container con table-responsive">
    <h2>Hostel Allocation List</h2>
    <p>Confirm your details on the list:</p>
    <table class="table ">
        <thead>
        <tr>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Email</th>
            <th>Mat-number</th>
            <th>allocation</th>
        </tr>
        </thead>
        <tbody>
            <?php
            $select="SELECT * FROM allocatelist";
            $query=mysqli_query($connection,$select);
            while ($row=mysqli_fetch_array($query)){
                echo" <tr>
            <td>".$row['firstname']."</td>
            <td>".$row['lastname']."</td>

            <td>".$row['email']."</td>
            <td>".$row['mat_number']."</td>
            <td>".$row['allocatedhostel']."</td>

        </tr>";
            }
            ?>

        </tbody>

    </table>

</div>
<footer>

    <h4>CampHostel by Victor Nwauwa</h4>
    <p>all copyrights reserved</p>

</footer>

</body>