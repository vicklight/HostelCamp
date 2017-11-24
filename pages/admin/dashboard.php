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
    <title>Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/dashboard.css">
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
                <li class="active"><a href="../../index.php">Home</a></li>
                <li><a href="listing.php">Listing</a></li>
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
<h2 class="page-header">Admin dashboard</h2>
<div class="container stud-con">
    <h2>Student List</h2>


    <table class="table ">
        <thead>
        <tr>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Sex</th>
            <th>Age</th>
            <th>Email</th>
            <th>Mat-number</th>
            <th>Department</th>
            <th>Handicap</th>
            <th>Edit</th>
            <th>Remove</th>
        </tr>
        </thead>
        <tbody>
        <form method='post' action="dashboard.php">
        <?php
          $select="SELECT * FROM registeration where matnum <> 'u/0000/0000000'";
        $query=mysqli_query($connection,$select);
        while ($row=mysqli_fetch_array($query)){
            echo" <tr>
            <td>".$row['firstname']."</td>
            <td>".$row['lastname']."</td>
            <td>".$row['sex']."</td>
            <td>".$row['age']."</td>

            <td>".$row['email']."</td>
            <td>".$row['matnum']."</td>
            <td>".$row['dept']."</td>
            <td>".$row['handicap']."</td>
            <td><i class=\"glyphicon glyphicon-edit\"></i></td>
            <td><i class=\"glyphicon glyphicon-remove\"></i></td>

        </tr>";
        }
        ?>

               </tbody>

    </table>

    <input type="submit" value="Run allocation" name="run" class="btn btn-block btn-primary">
    </form>
    <?php

    if (isset($_POST['run'])){
         $a=1;
        $b=1;
        function getlevelboys($a){
            $a2=100 * $a;
            $a1=(string)$a2;
            return $a1;
        }
        function getlevelgirls($b){

            $c2=100 * $b;
            $c1=(string)$c2;
            return $c1;
        }

        function queryhostel($connection){
            $hostel="SELECT hostelname FROM create_hostel WHERE capacity >0 and capacity<=5 and hosteltype='Male' limit 1";
            $queryhostels=mysqli_query($connection,$hostel);
            if (mysqli_num_rows($queryhostels)>0) {
                while ($row = mysqli_fetch_array($queryhostels)) {
                    $found = $row['hostelname'];
                }
                return $found;
            }

        }


        function queryhostelgirls($connection){
            $hostel="SELECT hostelname FROM create_hostel WHERE capacity >0 and capacity<=5 and hosteltype='Female' limit 1";
            $queryhostels=mysqli_query($connection,$hostel);
            if (mysqli_num_rows($queryhostels)>0) {
                while ($row = mysqli_fetch_array($queryhostels)) {
                    $found = $row['hostelname'];
                }
                return $found;
            }


        }
    $select="SELECT * FROM create_hostel";
    $query=mysqli_query($connection,$select);
    while ($row=mysqli_fetch_array($query)){
        $value=$row['capacity2'];
        $get=$row['hostelid'];
        $reset="UPDATE create_hostel SET capacity=$value where capacity<>$value and hostelid='$get'";
        mysqli_query($connection,$reset);


    }
        $reset2="UPDATE allocatelist SET allocatedhostel='no' WHERE allocatedhostel<>'no'";

        mysqli_query($connection,$reset2);



        $boys="SELECT * FROM registeration where sex='Male'"; // male
        $queryboys=mysqli_query($connection,$boys);
        if (mysqli_num_rows($queryboys)>0){
            //genetic algorithm based on fittest for handicapped
            while ($row=mysqli_fetch_array($queryboys)){
                $criteria=getlevelboys($a); // for 100 level and beyond
                $fitness="SELECT * FROM registeration where handicap='YES' and sex='Male' and matnum<>'u/0000/00000'";
                $fitness3="SELECT * FROM registeration where handicap='No' and sex='Male' and matnum<>'u/0000/00000'";


                $queryfitness=mysqli_query($connection,$fitness);

                $queryfitness2=mysqli_query($connection,$fitness3);

                if (mysqli_num_rows($queryfitness)>0) {
                    while ($row=mysqli_fetch_array($queryfitness)) {
                        $name=$row['matnum'] ;
                        $status = queryhostel($connection);
                        $update = "UPDATE allocatelist SET allocatedhostel='$status' where mat_number='$name' and allocatedhostel='no'";
                        if(mysqli_query($connection,$update)){
                            $updated="SELECT * FROM create_hostel where hostelname='$status'";

                            $updated1=mysqli_query($connection,$updated);
                            while ($row=mysqli_fetch_array($updated1)){
                                $newlist=$row['capacity'];
                                $newlist=$newlist-1;
                                $updated2= "UPDATE Create_hostel SET capacity=$newlist where hostelname='$status'";
                                mysqli_query($connection,$updated2);
                            }


                        }

                    }

                }


                if (mysqli_num_rows($queryfitness2)>0) {
                    while ($row=mysqli_fetch_array($queryfitness2)) {
                        $name=$row['matnum'] ;
                        $status = queryhostel($connection);
                        $update = "UPDATE allocatelist SET allocatedhostel='$status' where mat_number='$name' and allocatedhostel='no'";
                        if(mysqli_query($connection,$update)){
                            $updated = "UPDATE Create_hostel SET capacity=capacity-1 where hostelname='$status'";
                            mysqli_query($connection,$updated);
                        }
                    }

                }
                $a=$a+1;
            }

        }

        $boys="SELECT * FROM registeration where sex='Female'"; // Female
        $queryboys=mysqli_query($connection,$boys);
        if (mysqli_num_rows($queryboys)>0){
            //genetic algorithm based on fittest for handicapped
            while ($row=mysqli_fetch_array($queryboys)){
                $criteria=getlevelgirls($b); // for 100 level and beyond
                $fitness="SELECT * FROM registeration where handicap='YES' and sex='Female'";
                $fitness3="SELECT * FROM registeration where handicap='No' and sex='Female'";


                $queryfitness=mysqli_query($connection,$fitness);

                $queryfitness2=mysqli_query($connection,$fitness3);

                if (mysqli_num_rows($queryfitness)>0) {
                    while ($row=mysqli_fetch_array($queryfitness)) {
                        $name=$row['matnum'] ;
                        $status = queryhostelgirls($connection);
                        $update = "UPDATE allocatelist SET allocatedhostel='$status' where mat_number='$name' and allocatedhostel='No'";
                        if(mysqli_query($connection,$update)){
                            $updated="SELECT * FROM create_hostel where hostelname='$status'";

                            $updated1=mysqli_query($connection,$updated);
                            while ($row=mysqli_fetch_array($updated1)){
                                $newlist=$row['capacity'];
                                $newlist=$newlist-1;
                                $updated2= "UPDATE Create_hostel SET capacity=$newlist where hostelname='$status'";
                                mysqli_query($connection,$updated2);
                            }


                        }

                    }
                                   }


                if (mysqli_num_rows($queryfitness2)>0) {
                    while ($row=mysqli_fetch_array($queryfitness2)) {
                        $name=$row['matnum'] ;
                        $status = queryhostelgirls($connection);
                        $update = "UPDATE allocatelist SET allocatedhostel='$status' where mat_number='$name' and allocatedhostel='No'";
                        if(mysqli_query($connection,$update)){
                            $updated = "UPDATE Create_hostel SET capacity=capacity-1 where hostelname='$status'";
                            mysqli_query($connection,$updated);
                        }
                    }

                }
                $b=$b+1;
            }

        }


    }




    ?>
</div>

<div class="container hos-con">
    <h2>Hostel List</h2>


    <table class="table ">
        <thead>
        <tr>
            <th>Hostel Id </th>
            <th>Hostel Name</th>
            <th>Capacity</th>
            <th>Hostel type</th>

        </tr>
        </thead>
        <tbody>
        <?php

        $select="SELECT * FROM create_hostel";
        $query=mysqli_query($connection,$select);
        while ($row=mysqli_fetch_array($query)){
        echo" <tr>
            <td>".$row['hostelid']."</td>
            <td>".$row['hostelname']."</td>

            <td>".$row['capacity2']."</td>
            <td>".$row['hosteltype']."</td>

        </tr>";
        }
        ?>

        </tbody>
    </table>
        <div class="row">
            <a type="button" class="button button-block" href="hosteladd.php">Add +</a>
        </div>
    </div>
<footer>

    <h4>CampHostel by Victor Nwauwa</h4>
    <p>all copyrights reserved</p>

</footer>


</body>
