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
            <?php 
include 'conn.php';
if($_GET['id']) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM transaction WHERE transaction_id = {$id}";
    $result = $link->query($sql);

    $data = $result->fetch_assoc();

}

?>
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="index.html">Make Payment</a>
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                   
                </div>
            </div>

                
                <div class="row">
                   <div class="col-md-3">
                       
                   </div> 
                   <div class="col-md-6">
                       <h2 align="center">Make Payment</h2>
                       <p align="center">Once we recieve payment we will start your transaction monitor the seller and buyer, once he or she finalazes the transaction, the money will be sent to him/her. If not we will refund the money back to you.</p>
                   
                   </div> 
                   <div class="col-md-3">
                       
                   </div> 
                </div>
                
        

            <div class="container-fluid">
                <div class="row">
                   <div class="col-md-3">
                       
                   </div> 
                   <div class="col-md-6">
                       <h2 align="center">Bitcoin</h2>
                       <p>Here is Our Bitcoin Wallet Address: <strong style="font-size: 25px; color: #000"><?php
             include 'conn.php';
// Check connection
             if (!$link) {
              die("Connection failed: " . mysqli_connect_error());
            }

            $sql = "SELECT * FROM payment";
            $result = mysqli_query($link, $sql);

            if (mysqli_num_rows($result) > 0) {
    // output data of each row
              while($row = mysqli_fetch_assoc($result)) {

                
                echo $row["bitcoin"];

            }
          } else {
            echo "0 results";
          }

          mysqli_close($link);
          ?></strong></p>
                       <p>bitcoin You Will Pay <b><?php echo $data["currency"];?> <?php echo $data["price"] ?> = <?php $url = "https://blockchain.info/stats?format=json";
          $stats = json_decode(file_get_contents($url), true);
          $btcValue = $stats['market_price_usd'];
          $usdCost =   $data["price"];

          $convertedCost = $usdCost / $btcValue;

          echo number_format($convertedCost, 8). " BTC"; ?></b> 
                       <br><hr><br>
                       <h2 align="center">PayPal</h2>
                       <p>Here is Our Paypal Email Address: <strong style="font-size: 25px; color: #000"><?php
             include 'conn.php';
// Check connection
             if (!$link) {
              die("Connection failed: " . mysqli_connect_error());
            }

            $sql = "SELECT * FROM payment";
            $result = mysqli_query($link, $sql);

            if (mysqli_num_rows($result) > 0) {
    // output data of each row
              while($row = mysqli_fetch_assoc($result)) {

                
                echo $row["paypal"];

            }
          } else {
            echo "0 results";
          }

          mysqli_close($link);
          ?></strong></p>
                       <p>Paypal You Will Pay <b><?php echo $data["currency"];?> <?php echo $data["price"];?></b></p>
                   </div> 
                   <div class="col-md-3">
                       
                   </div> 
                </div>
                
            </div>

 <?php include 'footer.php'; ?>