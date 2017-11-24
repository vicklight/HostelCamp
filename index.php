
<?php
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>Sign-Up/Login Form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-1.9.1.min.js"></script>
    <script src="js/hostel.js"></script>

    <style>
#signup input{
  color:white !important;
}
#login input{
  color:white !important;
}

</style>

</head>


<body>
    <header>
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php">CampHostel</a>
                </div>
                <ul class="nav navbar-nav">
                    <li class="active"><a href="index.php">Home</a></li>
                    <li><a href="pages/profile.php">My Profile</a></li>
                    <li><a href="pages/listing.php">Listing</a></li>
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

  <div class="form">
      
      <ul class="tab-group">
        <li class="tab active"><a href="#signup">Sign Up</a></li>
        <li class="tab"><a href="#login">Log In</a></li>
      </ul>
      
      <div class="tab-content">
        <div id="signup">   
          <h2 class="first-text">Enter Your Student Details</h2>
          
          <form action="index.php" method="post">
          
          <div class="top-row">
            <div class="field-wrap">
              <label class="glyph">
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
                      Age<span class="req">*</span>
                  </label>
                  <input type="number "required autocomplete="off" name="age" id="age"/>
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
                      <option value="100">
                      <option value="200">
                      <option value="300">
                      <option value="400">
                      <option value="500">
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

          <div id="uploaded"></div>
          <input type="submit" name='reg' value='Register' id="reg" class="button button-block">
          
          </form>
            <?php
            session_start();
            if (isset($_POST['reg'])) {
                $firstname = $_POST['firstname'];
                $lastname = $_POST['lastname'];
                $matnum = $_POST['matnum'];
                $dept = $_POST['dept'];
                $level = $_POST['level'];
                $sex = $_POST['sex'];
                $age=$_POST['age'];
                $handicap = $_POST['handicap'];
                $email = $_POST['email'];
                $uploadPhoto = $_POST['uploadPhoto'];
                $password = $_POST['password'];
                $password=sha1($password);

                $connection = mysqli_connect('localhost', 'root', '', 'camphostel');
                if (!($connection)) {
                    die('error, could  not connect to the database');
                }
                $select = "SELECT matnum FROM registeration WHERE matnum='$matnum'";
                $query = mysqli_query($connection, $select);
                if (mysqli_num_rows($query) > 0) {
                    echo "<p style='color:#4dff27'>matriculation number has already been registered</p>";
                } 
                else {
                    $insert = "INSERT INTO registeration(firstname,lastname,dept,sex,level,handicap,email,password,uploadPhoto,matnum,age) VALUES ('$firstname','$lastname','$dept','$sex','$level','$handicap','$email','$password','$uploadPhoto','$matnum','$age')";
                    $insert2 = "INSERT INTO allocatelist (firstname,lastname,email,mat_number,allocatedhostel) VALUES ('$firstname','$lastname','$email','$matnum','no')";


                    if (mysqli_query($connection, $insert)) {
                        echo "<p style='color:white'>Thank you for registering</p>";
                        mysqli_query($connection,$insert2);
                    }
                    else {
                      echo "failed to query database";
                    }
                }
            }
            ?>
        </div>
        
        <div id="login">
          <h2 class="first-text">Welcome Back!</h2>
          
          <form action="index.php" method="post">
          
            <div class="field-wrap">
            <label>
              Matric number<span class="req">*</span>
            </label>
            <input type="text"required autocomplete="off" name="matnum" id="matnum"/>
          </div>
          
          <div class="field-wrap">
            <label>
              Password<span class="req">*</span>
            </label>
            <input type="password"required autocomplete="off" name="password" id="password"/>
          </div>
          
          <p class="forgot"><a href="#">Forgot Password?</a></p>
          
          <input type='submit' name='login' id='login' value='Log in' class="button button-block"/>
          
          </form>

        </div>
        <?php
            if (isset($_POST['login'])) {
                $matnum = $_POST['matnum'];
                $password = sha1($_POST['password']);


                $connection = mysqli_connect('localhost', 'root', '', 'camphostel');
                if (!($connection)) {
                    die('error, could  not connect to the database');
                }
                $select = "SELECT * FROM registeration WHERE matnum='$matnum' AND password='$password'";
                $query = mysqli_query($connection, $select);
                if (mysqli_num_rows($query) > 0) {
                    while ($row = mysqli_fetch_array($query)) {
                        $_SESSION['id'] = $row['id'];
                        if ($row['matnum'] == 'u/0000/0000000') {
                            header('location:pages/admin/dashboard.php');
                        } else {
                            header("location:pages/home.php");
                        }
                    }
                }
                else {
                    echo "<p style='color:red'>matriculation number or password incorrect</p>";
                }
            }
            ?>
        
      </div><!-- tab-content -->
      
</div> <!-- /form -->
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script  src="js/index.js"></script>

    <script src="js/hostel.js"></script>

</body>
</html>
