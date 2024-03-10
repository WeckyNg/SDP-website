

<?php session_start();
include_once 'connection.php';
$UserType = $_SESSION['usertype'];
if($UserType == "Customer"){
    $UserEmail = $_SESSION['useremail'];
if(isset($_GET['Function'])){

  if($_GET['Function'] == "Delete"){
    $DeleteProductID = $_GET['ProductID'];
    $sqlquery02= "SELECT SUM(customerpurchaselist.Quantity) as totalQuantity From customerpurchaselist Where UserEmail = '$UserEmail' AND ProductID = '$DeleteProductID'";
    $result02 = mysqli_query($conn, $sqlquery02);
    $resultcheck02 = mysqli_num_rows($result02) ;
    if($resultcheck02 == 1){
    $row02 = mysqli_fetch_assoc($result02) ;
$recoverQuantity = $row02['totalQuantity'];
$sqlquery03= "SELECT ProductStock From productlist Where ProductID = '$DeleteProductID'";
$result03 = mysqli_query($conn, $sqlquery03);
$resultcheck03 = mysqli_num_rows($result03) ;
if($resultcheck03 == 1){
$row03 = mysqli_fetch_assoc($result03) ;
$PreRecoverStock = $row03['ProductStock'];
  }else{
    $PreRecoverStock=0;
  }
  $recoveredStock = $recoverQuantity +$PreRecoverStock;
  $sqlquery20= "UPDATE productlist SET ProductStock = '$recoveredStock' WHERE ProductID = $DeleteProductID";
mysqli_query($conn, $sqlquery20);
$sqlquery21= "DELETE FROM customerpurchaselist WHERE ProductID = $DeleteProductID AND Status = 'InCart' AND UserEmail = '$UserEmail'";
mysqli_query($conn, $sqlquery21);
  }
  }
  if($_GET['Function'] == "Pay"){
    $todaydate = $todaydate = date("Y-m-d");
    $sqlquery20= "UPDATE customerpurchaselist SET Status = 'Uncomplete', PurchaseDate = '$todaydate' WHERE Status = 'InCart' AND UserEmail = '$UserEmail'";
    mysqli_query($conn, $sqlquery20);
    echo '<script>function PaymentSuccess(){

      alert("Successfully Checked out, We look forward for your next purchase.")
  }
  PaymentSuccess()
  </script>';
  }
}



    $sqlquery= "SELECT SUM(customerpurchaselist.Quantity) as totalQuantity,customerpurchaselist.ProductID,productlist.ProductName,SUM(customerpurchaselist.Quantity*productlist.ProductPrice) as SingleTotal,productlist.ProductStock,productlist.ProductPicture FROM `customerpurchaselist` LEFT JOIN productlist ON customerpurchaselist.ProductID = productlist.ProductID WHERE customerpurchaselist.Status = 'InCart' AND customerpurchaselist.UserEmail = '$UserEmail' GROUP BY customerpurchaselist.ProductID";
    $result = mysqli_query($conn, $sqlquery);
    $resultcheck = mysqli_num_rows($result);
    $sqlquery3= "SELECT SUM(customerpurchaselist.Quantity*productlist.ProductPrice)as Subtotal FROM `customerpurchaselist` 
    LEFT JOIN productlist ON customerpurchaselist.ProductID = productlist.ProductID WHERE customerpurchaselist.Status = 'InCart' AND 
    customerpurchaselist.UserEmail = '$UserEmail' GROUP BY customerpurchaselist.UserEmail";
    $result3 = mysqli_query($conn, $sqlquery3);
    $row3 = mysqli_fetch_assoc($result3) ;
    if(isset($row3['Subtotal'])){
      $SubTotal = $row3['Subtotal'];

    }else{
      $SubTotal = 0;
    }
    
}else{
    header("Location: Login.php");
}
?>
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
    
    <div class="container-fluid">
      <!-- header start -->

      <nav class="navbar navbar-default">
        <div class="container-fluid">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand nav-logo" href="Redirect.php"><img src="./images/shoping-logo.jpg"/></a>
              </div>
          
              <!-- Collect the nav links, forms, and other content for toggling -->
              <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                  <li class="active"><a href="Home.php"><i class="fa fa-home"></i> Home <span class="sr-only">(current)</span></a></li>
                  <li><a href="productlist.php"><i class="fa fa-cc-discover"></i> Product List</a></li>
                  <li><a href="CustomerFeedback.php">Feedback</a></li>
                                    
                </ul>
                
                <ul class="nav navbar-nav navbar-right">
                  <li><a href="Register.php"><i class="fa fa-user-circle-o"></i> Register</a></li>
                  <li><a href="Login.php"><i class="fa fa-sign-in"></i> Login</a></li>
                  <li><a href="CustomerChangeInfo.php"><i class="fa fa-cog"></i> Setting</a></li>
                  <li><a href="CustomerCart.php"><div class="add-to-cart"><i class="fa fa-shopping-cart"></i></div><div class="qty-check"></div></a></li>
                </ul>
              </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
          </nav>

      <!-- header end -->
        
    
       <!-- add to cart page -->
       <div class="calculation">
         <div class="cal-header">Total</div>
         <div class="cal-box-section">
           <h5>Subtotal <span>RM<?php echo $SubTotal;?></span></h5>
          <a href="CustomerCart.php?Function=Pay">Proceed to Buy</a>
          </div>
       </div>
     
       <div class="add-to-cart-section">
      
        <div class="add-to-cart-row">

        <div class="cart-title-sec">
           <h4>Shopping Cart</h4>
         </div>

         <?php
         
         if ($resultcheck >0){

            while($row = mysqli_fetch_assoc($result)){ 
              $CurrentName =  $row['ProductName'];
              $CurrentQuantity = $row['totalQuantity'];
              $CurrentProductID = $row['ProductID'];
    $CurrentPrice = $PricePerUnit =  $row['SingleTotal'];
    $CurrentPicture =  $row['ProductPicture'];
    $sqlquery2= "SELECT ROUND(AVG(RatingScore),0) as AverageRatingScore From productratinglist WHERE ProductID = '$CurrentProductID'";
    $result2 = mysqli_query($conn, $sqlquery2);
    $resultcheck2 = mysqli_num_rows($result2) ;
    $rateCounter = 0;
    if($resultcheck2 > 0){
      $row2 = mysqli_fetch_assoc($result2);
    $RatingScore =  $row2['AverageRatingScore'];
  }else{
    $RatingScore = 0;
  }
         ?>
          <div class="cart-product">
                <div class="list-cart-product">
                     <div class="cart-product-description">
                       <div class="cart-pro-img-box">
                         <img src="./image/products/<?php  echo $CurrentPicture;  ?>" alt="">
                       </div>
                       <div class="cart-pro-field-box">
                         <div class="cart-pro-name"><?php echo $CurrentName;  ?></div>
                         <div class="cart-pro-rating">
                         <?php   while($rateCounter < $RatingScore){ ?>
                          <i class="fa fa-star"></i>
                          <?php  
                        $rateCounter ++ ;
                        }?>
                         </div>
                         <div class="cart-pro-inputfields">
                           <input type="number" value="<?php echo $CurrentQuantity;  ?>" name="CartNumber" readonly/><a href="CustomerCart.php?Function=Delete&ProductID=<?php echo $CurrentProductID?>">Delete</a>
                         </div>
                         <div class="price-mobile-view">
                          <span>RM<?php echo $CurrentPrice;  ?></span>
                         </div>
                       </div>
                     </div>
                     <div class="cart-product-price">
                       <span>RM<?php echo $CurrentPrice;  ?></span>
                     </div>
                </div>
          </div>
<?php

}}
?>


</div>
        
       </div>

       <!-- add to cart page end -->
           
          <div class="footer">
            <div class="footer-content">
              AVIAN CRUX STORE LTD &copy;
            </div>
          </div>
    </div>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
</body>
</html>