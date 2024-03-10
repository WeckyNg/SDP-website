


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Latest compiled and minified CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">

<link rel="stylesheet" href="./css/style.css">
<!-- Latest compiled and minified JavaScript -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
</head>
<body>
<?php session_start();
include_once 'connection.php';

$UserType = $_SESSION['usertype'];
if($UserType == "Admin"){
  $thismonth = date("m");
}else{

  header("Location: Login.php");}
?>
    <div class="container-fluid">
      <!-- header start -->
   
      <!-- header end -->
        
    
       <!-- revenuereport start -->
      
      <div class="revenue-section">
          <div class="revenue-report">
              <div class="revenue-report-header">
                    <div class="company-name"><h3>Avian Crux</h3></div>
                    <div class="sub-heading"><p>Revenue Report</p></div>
              </div>
              <br>
              
              <div class="revenue-report-inner-box">
                  <div class="revenue-inner-box-header">
                    
                      <a href="AvianCruxAdminHome.php">Admin Menu</a>
                      <h5>Month:<span><?php  echo $thismonth;?></span></h5>
                  </div>
                  <div class="revenue-report-view">
                      <div class="table-responsive">
                          <table class="content-table">
                              <thead>
                                  <tr>
                                      <th>Product Name</th>
                                      <th>Cost per unit</th>
                                      <th>Price per unit</th>
                                      <th>Profit per unit</th>
                                      <th>Units sold</th>
                                      <th>Total profit</th>
                                  </tr>
                              </thead>
                              <tbody>

                              <?php 
    
    $sqlquery= "Select productlist.ProductName , productlist.ProductCost, productlist.ProductPrice , 
    SUM(customerpurchaselist.Quantity) as unitsold FROM customerpurchaselist LEFT JOIN productlist 
    on customerpurchaselist.ProductID = productlist.ProductID WHERE customerpurchaselist.Status = 'Delivered' AND 
    MONTH(customerpurchaselist.DeliveryDate) = $thismonth GROUP BY customerpurchaselist.ProductID";
    $result = mysqli_query($conn, $sqlquery);
    $resultcheck = mysqli_num_rows($result) ;
    if ($resultcheck >0){
        while($row = mysqli_fetch_assoc($result)){ 
          $cost = $row['ProductCost'];
          $price = $row['ProductPrice'];
          $profit = $price - $cost;
          $quantity = $row['unitsold'];
          $totalpprofit = $profit*$quantity;
            ?>
                                  <tr>
                                      <td class="body-table"><?php echo $row['ProductName']; ?></td>
                                      <td class="body-table">RM<?php echo $row['ProductCost']; ?></td>
                                      <td class="body-table">RM<?php echo $row['ProductPrice']; ?></td>
                                      <td class="body-table">RM<?php echo $profit ;?></td>
                                      <td class="body-table"><?php echo $row['unitsold']; ?></td>
                                      <td class="body-table">RM<?php echo $totalpprofit; ?></td>
                                  </tr>
                                  <?php }
   }
    ?>
                                 
                              </tbody>
                              <tfooter>
                                  <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <?php $sqlquerytotal= "Select  SUM(productlist.ProductCost*customerpurchaselist.Quantity) as totalCost, SUM(productlist.ProductPrice*customerpurchaselist.Quantity) as totalPrice FROM customerpurchaselist LEFT JOIN productlist on customerpurchaselist.ProductID = productlist.ProductID WHERE customerpurchaselist.Status = 'Delivered' AND MONTH(customerpurchaselist.DeliveryDate) = $thismonth ";
    $resulttotal = mysqli_query($conn, $sqlquerytotal);
    $rowtotal = mysqli_fetch_assoc($resulttotal);
    $totalcost = $rowtotal['totalCost'];
          $totalprice = $rowtotal['totalPrice'];
          $totalprofit = $totalprice -$totalcost;
    ?>
                                      <td class="footer-table" style="text-align: end;">
                                          Total Profit
                                      </td>
                                      <td class="footer-table">RM<?php echo $totalprofit ;?></td>
                                  </tr>
                              </tfooter>
                          </table>
                      </div>
                  </div>
              </div>
          </div>


           
          <div class="footer">
            <div class="footer-content">
              AVIAN CRUX STORE LTD &copy;
            </div>
          </div>
    </div>
    <!-- JavaScript Bundle with Popper -->
 <!-- JavaScript Bundle with Popper -->
 <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
</body>
</html>