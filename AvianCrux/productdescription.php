


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

<link rel="stylesheet" href="./css/style3.css">
<!-- Latest compiled and minified JavaScript -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
</head>
<body>
<?php session_start();
include_once 'connection.php';

    $ProductID = $_GET['ProductID'];
    $sqlquery= "SELECT * From productlist Where ProductID = $ProductID";
$result = mysqli_query($conn, $sqlquery);
$resultcheck = mysqli_num_rows($result);
if($resultcheck > 0 ){
  $row = mysqli_fetch_assoc($result);
$ProductName = $row['ProductName'];
$ProductStock = $row['ProductStock'];
$ProductDescription = $row['ProductDescription'];
$ProductPicture = $row['ProductPicture'];
$ProductPrice = $row['ProductPrice'];
$ProductCategory = $row['ProductCategory'];

if(isset($_SESSION['useremail'])){
$UserEmail= $_SESSION['useremail'] ;
}else{
  $UserEmail = "Guest";
}
if(isset($_SESSION['usertype'])){
  $UserType = $_SESSION['usertype'];
  }

if(isset($_POST['AddtoCart']) && $UserEmail !="Guest" && $UserType == "Customer"){
  $todaydate = $todaydate = date("Y-m-d");
$Quantity = $_POST['AddtoCart'];
if($ProductStock >=$Quantity){
$sqlquery10= "INSERT INTO customerpurchaselist (UserEmail,Quantity,ProductID,Status,PurchaseDate) Values ('$UserEmail','$Quantity','$ProductID','InCart','$todaydate')";
$result10 = mysqli_query($conn, $sqlquery10);
$UpdatedStock = $ProductStock - $Quantity;
$sqlquery20= "UPDATE productlist SET ProductStock = '$UpdatedStock' WHERE ProductID = $ProductID";
mysqli_query($conn, $sqlquery20);
echo "<script>function DoneAddtoCart(){ alert('Successful Added '+'$Quantity'+' '+'$ProductName'+' to Cart Ready to purchase')
}
DoneAddtoCart();
</script>";

}else{
  echo '<script>function ExceedStock(){ alert("Sorry. But we do not have that much stock......")
  }
  ExceedStock();
  </script>';
}




}elseif($UserEmail =="Guest"){
  echo '<script>function LoginPlease(){ alert("You Need To Login to use the function")
  }
  LoginPlease();
  </script>';}
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
            <a class="navbar-brand nav-logo" href="#"><img src="./images/shoping-logo.jpg"/></a>
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
          <!-- product description -->
          <div class="product-description">
              <div class="box-product-description">
                  <div class="product-img-1">
                      <div class="img-box">
                        <input type="hidden" id = "FormCheckF" value = "NO">
                        <img src="./image/products/<?php echo $ProductPicture;?>" alt="">
                      </div>
                      <div class="add-to-cart-btn"><button onclick="AddtoCart()">add to cart</button></div><button onclick="IncreaseNum()"><i class="fa fa-chevron-up"></i></button><input type="number" value="1" name = "CartQuantity" id="CartQuantity" readonly/><button onclick="DecreaseNum()"><i class="fa fa-chevron-down"></i></button>
                  </div>
                  <div class="product-des-text">
                      <div class="inner-des">
                          <div class="p-name" id="productName"><b><?php echo $ProductName ;?></b></div>
                          <div class="p-des"><?php echo $ProductDescription;?></div>
                          <div class="rating">
                            <a href ="CustomerRating.php<?php echo "?ProductID=".$ProductID."&UserEmail=".$UserEmail;?>"><button type="button" class="rating-btn" >Rate Product</button></a>
                            <h4>Price:<span>RM <?php echo $ProductPrice ;?></span></h4>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <!-- product description end -->
    
          <!-- related product -->
<div class="related-section">

          <div class="related">
              <div class="title">Related Products</div>
            </div>
<?php 
 $sqlquery0= "SELECT * From productlist Where ProductCategory = '$ProductCategory' AND NOT ProductID = $ProductID ORDER BY ProductPrice DESC LIMIT 4";
$result0 = mysqli_query($conn, $sqlquery0);
$resultcheck0 = mysqli_num_rows($result0);
if($resultcheck0 > 0 ){
  while($row0 = mysqli_fetch_assoc($result0)){
    $RelatedProductID = $row0['ProductID'];
$RelatedProductName = $row0['ProductName'];
$RelatedProductStock = $row0['ProductStock'];
$RelatedProductDescription = $row0['ProductDescription'];
$RelatedProductPicture = $row0['ProductPicture'];


?>
            <div class="related-product">


            <a href = "productdescription.php?ProductID=<?php echo $RelatedProductID ?>">
              <div class="related-product-boxes">

                <div class="related-product-boxes-img">
                  
                   <img src="./image/products/<?php echo $RelatedProductPicture;?>" alt="">  

                </div>
                <div class="related-product-boxes-info">
                    <h4><?php echo $RelatedProductName; ?></h4>
                    <p><?php echo $RelatedProductDescription?></p>
                </div>
            </div>
            </a>
<?php
}
}
?>
            
            </div>

          </div>
          <!-- related product end -->
    
          <div class="footer">
            <div class="footer-content">
              AVIAN CRUX STORE LTD &copy;
            </div>
          </div>
    </div>
 <!-- JavaScript Bundle with Popper -->
 <script>
var Quantity = document.getElementById("CartQuantity").value;
   function IncreaseNum(){
    document.getElementById("CartQuantity").value ++;
    Quantity++;
   }
   function DecreaseNum(){
    document.getElementById("CartQuantity").value --;
    Quantity--;
   }
function AddtoCart(){
  if(Quantity > 0){
    document.body.innerHTML += '<form id="AddtoCart" action="productdescription.php?ProductID=<?php echo $ProductID; ?>" method="post"><input type="hidden" name="AddtoCart" value="'+Quantity+'"></form>';
    document.getElementById("AddtoCart").submit();
}else{
  alert("No Quantity Selected(Must be over 0)")
}
}

   
   </script>
 <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
</body>
</html>