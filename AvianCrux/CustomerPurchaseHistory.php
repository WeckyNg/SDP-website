
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
if($UserType == "Customer"){
    $UserEmail = $_SESSION['useremail'];

}else{
    header("Location: Login.php");
}
?>
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
           
           <!-- purchase history -->

           <div class="purchase-history">

            <div class="purchase-history-box">
                <div class="input-date-field">
                    <form action="CustomerPurchaseHistory.php" method="POST">
                    <input type="date" name="historydate"><input type="submit">
                    </form>
                </div>
                <div class="history-record">
                      <div class="table-responsive">
                          <table class="table table-bordered">
                              <thead>
                                  <tr bg>
                                      <th style="text-align: center;">No</th>
                                      <th colspan="5" style="text-align: center;">Item</th>
                                      <th style="text-align: center;">Qty</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <?php
                                  if(isset($_POST['historydate'])){
                                    $dateForSearch = $_POST['historydate'];
                                    $sqlquery= "Select customerpurchaselist.ProductID, productlist.ProductName, customerpurchaselist.Quantity From customerpurchaselist LEFT JOIN productlist ON customerpurchaselist.ProductID = productlist.ProductID WHERE customerpurchaselist.UserEmail = '$UserEmail' AND customerpurchaselist.PurchaseDate = '$dateForSearch' AND NOT customerpurchaselist.Status = 'InCart' ";
                                $result = mysqli_query($conn, $sqlquery);
                                $resultcheck = mysqli_num_rows($result);
                                if($resultcheck > 0 ){
                                  while($row = mysqli_fetch_assoc($result)){
        
                                  ?>
                                  <tr>
                                      <td style="text-align: center;"><?php  echo $row['ProductID'] ; ?></td>
                                      <td colspan="5" style="text-align: center;"><?php  echo $row['ProductName'] ; ?></td>
                                      <td style="text-align: center;"><?php  echo $row['Quantity'] ; ?></td>
                                  </tr>
                                  <?php
                                  
                                }
                            }
                                ?>
                            </tbody>
                              <tfoot>
                                  <tr>
                                  <?php
                            
                                $sqlquerytotal= "Select SUM(productlist.ProductPrice*customerpurchaselist.Quantity) as TOTALPRICE From customerpurchaselist LEFT JOIN productlist ON customerpurchaselist.ProductID = productlist.ProductID WHERE customerpurchaselist.UserEmail = '$UserEmail' AND customerpurchaselist.PurchaseDate = '$dateForSearch' ";
                            $resulttotal = mysqli_query($conn, $sqlquerytotal);
                            $resultchecktotal = mysqli_num_rows($resulttotal);
                            if($resultchecktotal > 0 ){
                                $rowTotal = mysqli_fetch_assoc($resulttotal)
                                ?>
<td colspan="7" style="text-align: center;">Total Price: RM<?php echo   $rowTotal['TOTALPRICE']; ?></td>



                                <?php
                                }else{
                                    ?>
                                    <td colspan="7" style="text-align: center;">Total Price: RM0</td>

<?php
                                }

                            
                            }else{
                                $sqlquerydate= "Select customerpurchaselist.PurchaseDate FROM customerpurchaselist WHERE customerpurchaselist.UserEmail = '$UserEmail' GROUP BY PurchaseDate ";
                                $resultdate = mysqli_query($conn, $sqlquerydate);
                                $resultcheckdate = mysqli_num_rows($resultdate);
                                if($resultcheckdate > 0 ){
                                    while($rowDate = mysqli_fetch_assoc($resultdate)){

                                ?>
                                <tr>
                                      <td style="text-align: center;"></td>
                                      <td colspan="5" style="text-align: center;"><?php  echo $rowDate['PurchaseDate'] ; ?></td>
                                      <td style="text-align: center;"></td>
                                  </tr>
<?php 

}
                                }}
?>
                              
                                      
                                  </tr>
                              </tfoot>
                          </table>
                      </div>
                </div>
            </div>

           </div>

           <!-- purchase history end -->
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