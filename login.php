<?php include 'header2.php'; ?>
    <!-- Header part end-->
    <!-- breadcrumb start-->

  <!-- ================ contact section start ================= -->

    <div class="container">
      <div class="d-none d-sm-block mb-5 pb-4">



      <div class="row">
        <div class="col-12">

        </div>
        <div class="col-lg-3">
      
        </div>
        <div class="col-lg-6">
          <?php
//our included config file
include "conn.php";
//starting our session to preserve our login


//check whether data with the session name username has already been created
//if so redirect to hhomepage
if (isset($_SESSION['username'])) {
    //redirecting if there is already a session with the name username
    // header("Location: home.php");
  echo '   <script> window.location = "admin/index.php";</script>';
   
}

//check whether data with the name username has been submitted
if (isset($_POST['save'])) {

    //variables to hold our submitted data with post
    $username = $_POST['username'];
        //Encrypting our login password
    $password = md5($_POST['password']);

$username = stripslashes($username);
$password = stripslashes($password);
$username = mysqli_real_escape_string($link, $username);
$password = mysqli_real_escape_string($link, $password);

    //our sql statement that we will execute
    $sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";

    //Executing the sql query with the connection
    $re = mysqli_query($link, $sql);

    //check to see if there is any record / row in the database
    //if there is then the user exists
    if (mysqli_num_rows($re)) {
        //echo "Welcome";
        //creating a session name with username ad inserting the submitted username
        $_SESSION['username'] = $username;
        $_SESSION['email'] = $email;

        //redirecting to homepage
       echo '   <script> window.location = "admin/index.php";</script>';
    }else{
        //display error if no record exists
        echo "<div class='alert alert-danger' role='alert' align='center'>
  <strong>Oh snap!</strong> check Your Credentials.
</div>";
    }
}
?>
<!--           <form class="" action="" method="post">
            <div class="row">
              <div class="col-12">
                <div class="form-group">
                  <label><b>Username</b></label>
                  <input class="form-control" name="username" type="text"  placeholder = 'Username' required="">
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                  <label><b>Password</b></label>
                  <input class="form-control" name="password"  type="password"  placeholder = 'password' required="">
                </div>
              </div>
            </div>
            <div class="form-group mt-3">
              <button type="submit" name="save" class="button button-contactForm btn_4">Login</button>
            </div>
          </form>
          <p>Don't have an account? <a href="register.php">Register</a></p>
        </div>
        <div class="col-lg-3">
      
        </div>
      </div>
    </div> -->
    <form action="/action_page.php">
  <div class="form-group">
    <label for="email">Email address:</label>
    <input type="email" class="form-control" id="email">
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" id="pwd">
  </div>
  <div class="checkbox">
    <label><input type="checkbox"> Remember me</label>
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form>

  <!-- ================ contact section end ================= -->
