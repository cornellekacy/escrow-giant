<?php include 'header2.php';
      ?>
    <!-- Header part end-->
    <!-- breadcrumb start-->

  <!-- ================ contact section start ================= -->
  <section class="contact-section section_padding">
    <div class="container">
      <div class="d-none d-sm-block mb-5 pb-4">



      <div class="row">
        <div class="col-12">

        </div>
        <div class="col-lg-3">
      
        </div>
        <div class="col-lg-6">
                                                              <?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
include 'conn.php';

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
if(isset($_POST['save'])){
 $email = mysqli_real_escape_string($link,$_POST['email']);
 $username = mysqli_real_escape_string($link,$_POST['username']);
 $password = mysqli_real_escape_string($link,$_POST['password']);


 if (empty($email)) {
    echo "<div class='alert alert-danger'>
    <strong>Failed!</strong>Email Cannot Be Empty.
    </div>";
}

elseif (empty($username)) {
    echo "<div class='alert alert-danger'>
    <strong>Failed!</strong> Username Cannot Be Empty.
    </div>";
}
elseif (empty($password)) {
    echo "<div class='alert alert-danger'>
    <strong>Failed!</strong> Password Cannot Be Empty.
    </div>";
}


else{
    $me = rand();
// Attempt insert query execution
    $sql = "INSERT INTO user (username,email,password) 
    VALUES ('$username','$email',MD5('$password'))";
    if(mysqli_query($link, $sql)){
        echo "<div class='alert alert-success'>
        <strong>Success!</strong> User Account Successfully Created.
        </div>";


//phpmailer ends here
    } else{
        // echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
   
       echo "<div class='alert alert-danger'>
        <strong>Error!</strong> Username already taken
        </div>";
    }
}
}
// Close connection
mysqli_close($link);

?>
          <form class=" " action="" method="post" >
            <div class="row">
             
          
              <div class="col-12">
                <div class="form-group">
                  <label><b>Username</b></label>
                  <input  class="form-control" name="username"  type="text"  >
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                   <label><b>Password</b></label>
                  <input class="form-control" name="password"  type="password">
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                   <label><b>Email</b></label>
                  <input class="form-control" name="email"  type="email" >
                </div>
              </div>
            </div>
            <div class="form-group mt-3">
              <button type="submit" name="save" class="button button-contactForm btn_4">Create Account</button>
            </div>
          </form>
          <p>Already have an account? <a href="login.php">Login</a></p>
        </div>
        <div class="col-lg-3">
      
        </div>
      </div>
    </div>
  </section>
  <!-- ================ contact section end ================= -->
