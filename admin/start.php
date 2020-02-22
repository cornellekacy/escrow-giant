<?php   include 'header.php'; ?>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
<?php   include 'sidebar.php'; ?>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                        
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a>
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                   
                </div>
            </div>
            <div class="container-fluid">
            
            <div class="row">
                <div class="col-md-2">
                    
                </div>
                 <div class="col-md-8">
                                                                                  <?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
include 'conn.php';

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
if(isset($_POST['save'])){
 $name = mysqli_real_escape_string($link,$_POST['name']);
 $username = mysqli_real_escape_string($link,$_POST['username']);
 $country = mysqli_real_escape_string($link,$_POST['country']);
 $email = mysqli_real_escape_string($link,$_POST['email']);

 $who = mysqli_real_escape_string($link,$_POST['who']);
 $what = mysqli_real_escape_string($link,$_POST['what']);
 $price = mysqli_real_escape_string($link,$_POST['price']);

 $bitcoinaddress = mysqli_real_escape_string($link,$_POST['bitcoinaddress']);
 $paypalemail = mysqli_real_escape_string($link,$_POST['paypalemail']);
 $expected = mysqli_real_escape_string($link,$_POST['expected']);

 $payment = mysqli_real_escape_string($link,$_POST['payment']);
 $description = mysqli_real_escape_string($link,$_POST['description']);


 if (empty($name)) {
    echo "<div class='alert alert-danger'>
    <strong>Failed!</strong>Email Cannot Be Empty.
    </div>";
}

elseif (empty($country)) {
    echo "<div class='alert alert-danger'>
    <strong>Failed!</strong> Username Cannot Be Empty.
    </div>";
}
elseif (empty($email)) {
    echo "<div class='alert alert-danger'>
    <strong>Failed!</strong> Password Cannot Be Empty.
    </div>";
}


else{
    $me = rand();
    $status = 'inactive';
// Attempt insert query execution
    $sql = "INSERT INTO transaction (trans_id,name,username,country,email,who,what,price,bitcoinaddress,paypalemail,expected,payment,descript,status) 
    VALUES ('$me','$name','$username','$country','$email','$who','$what','$price','$bitcoinaddress','$paypalemail','$expected','$payment','$description','$status')";
    if(mysqli_query($link, $sql)){
        echo "<div class='alert alert-success'>
        <strong>Success!</strong> Transaction Successfully Created.
        </div>";
        echo '   <script> window.location = "inactive.php";</script>';


//phpmailer ends here
    } else{
         echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
   
       
    }
}
}
// Close connection
mysqli_close($link);

?>
<?php  ?>
                    <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Start A New Transaction</h4>
                                <form class="mt-4" method="post">
                                    <div class="form-group">
                                    <label>Full Name</label>
                                        <input type="text" class="form-control"  id="maxval"
                                            aria-describedby="maxval" name="name" >
                                    </div>
                                      <div class="form-group">
                                    
                                        <input type="hidden" class="form-control"  id="maxval"
                                            aria-describedby="maxval" name="username" value="<?php echo $_SESSION['username']; ?>" >
                                    </div>
                                    <div class="form-group">
                                    <label>Country</label>
                                        <input type="text" class="form-control"  id="maxval"
                                            aria-describedby="maxval" name="country" >
                                    </div>
                                      <div class="form-group">
                                    <label>Email</label>
                                        <input type="email" class="form-control"  id="maxval"
                                            aria-describedby="maxval" name="email" >
                                    </div>
                                     <div class="form-group mb-4">
                                        <label for="exampleFormControlSelect1">Who Are You?</label>
                                        <select class="form-control" name="who" id="exampleFormControlSelect1">
                                            <option value="Buyer">Buyer</option>
                                            <option value="Seller">Seller</option>
                                        </select>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="exampleFormControlSelect1">What are you buying/selling?</label>
                                        <select class="form-control" name="what" id="exampleFormControlSelect1">
                                            <option value="Goods">Goods</option>
                                            <option value="Services">Services</option>
                                        </select>
                                    </div>
                                       <div class="form-group">
                                    <label>Price in USD</label>
                                        <input type="text" class="form-control" id="maxval"
                                            aria-describedby="maxval" name="price" >
                                    </div>
                                        <div class="form-group">
                                    <label>Refund Bitcoin Wallet Address</label>
                                        <input type="text" class="form-control" id="maxval"
                                            aria-describedby="maxval" name="bitcoinaddress" >
                                    </div>
                                          <div class="form-group">
                                    <label>Refund Paypal Email Address</label>
                                        <input type="email" class="form-control"  id="maxval"
                                            aria-describedby="maxval" name="paypalemail" >
                                    </div>

                                      <div class="form-group mb-4">
                                        <label for="exampleFormControlSelect1">Expected delivery Date/time</label>
                                        <select class="form-control" name="expected" id="exampleFormControlSelect1">
                                            <option value="1 day - 1 week">1 day - 1 week</option>
                                            <option value="2 weeks or more">2 weeks or more</option>
                                            <option value="1 month or more">1 month or more</option>
                                        </select>
                                    </div>
                                      <div class="form-group mb-4">
                                        <label for="exampleFormControlSelect1">Payment Method</label>
                                        <select class="form-control" name="payment" id="exampleFormControlSelect1">
                                            <option value="Bitcoin">Bitcoin</option>
                                            <option value="Paypal">Paypal</option>
                                        </select>
                                    </div>
                                       <div class="form-group">
                                         <label>Description, Full Address and Phone Number</label>
                                        <textarea class="form-control" name="description" rows="3" placeholder="Text Here..."></textarea>
                                        
                                    </div>
                                    <button name="save" class="btn btn-primary">Create Transaction</button>
                                </form>
                            </div>
                        </div> 
                </div>
                 <div class="col-md-2">
                    
                </div>
            </div>
                
            </div>
            <?php include 'footer.php'; ?>