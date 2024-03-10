
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
if(isset($_SESSION['usertype'])){
$UserType = $_SESSION['usertype'];
if($UserType == "Customer"){
    $UserEmail = $_GET['UserEmail'];

}else{
    $UserEmail="Guest";
}

}

if(isset($_GET['ProductID'])){
  $ProductID=$_GET['ProductID'];
  if($UserEmail != "Guest" && isset($_GET['star'])){
    $sqlquery2= "Select RatingScore From productratinglist WHERE ProductID = $ProductID AND UserEmail = '$UserEmail'";
    $result2 = mysqli_query($conn, $sqlquery2);
    $resultcheck2 = mysqli_num_rows($result2) ;
    if(isset($_GET['star'])){
      $newRateScore = $_GET['star'];
    }else{
      $newRateScore = 0;
    }
    if ($resultcheck2 == 1){
      
      
      $sqlquery3= "Update productratinglist SET RatingScore = $newRateScore WHERE ProductID = $ProductID AND UserEmail = '$UserEmail'";
      mysqli_query($conn, $sqlquery3);
  
  
    }else{
      $sqlquery4= "INSERT INTO productratinglist (UserEmail,ProductID,RatingScore) VALUES ('$UserEmail',$ProductID,$newRateScore)";
      mysqli_query($conn, $sqlquery4);
    }
    echo '<script>function RatingSuccess(){

      alert("Successful Rate the product, we are looking forward for more feedback :>")
  }
  RatingSuccess()
  </script>';
  }




  $sqlquery5= "Select ProductName,ProductPicture From productlist WHERE ProductID = $ProductID";
  $result5 = mysqli_query($conn, $sqlquery5);
  $resultcheck5 = mysqli_num_rows($result5) ;
  if ($resultcheck5 == 1){
      $row = mysqli_fetch_assoc($result5);
      $ProductName = $row['ProductName'];
      $ProductPicture = $row['ProductPicture'];

  }
  $sqlquery1= "Select RatingScore From productratinglist WHERE ProductID = $ProductID AND UserEmail = '$UserEmail'";
  $result1 = mysqli_query($conn, $sqlquery1);
  $resultcheck1 = mysqli_num_rows($result1) ;
  if ($resultcheck1 == 1){
      $row1 = mysqli_fetch_assoc($result1);
      $RatingScore = $row1['RatingScore'];


  }else{
    $RatingScore = 0;
  }

}

?>
    <div class="container-fluid">
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
          <!-- product description -->
          <div class="product-description">
              <div class="box-product-description">
                  <div class="product-img-1">
                      <div class="img-box">
                        <img src="./image/products/<?php echo $ProductPicture; ?>" alt="">
                      </div>
                      <!-- <div class="add-to-cart-btn"><button>add to cart</button></div> -->
                  </div>
                  <div class="product-des-text">
                      <div class="inner-des">
                      <form method="GET" action="CustomerRating.php">
                          <div class="p-name"><h3>Leave review for this:<?php echo $ProductName;?></h3></div>
                          
                          <!-- <div class="p-des">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Totam, a praesentium? Iure, suscipit tempore sapiente quasi quos odit dolorem provident voluptatibus voluptatem? Aliquid explicabo voluptatum qui soluta sapiente, cum, perspiciatis tempore error nostrum eius distinctio tenetur quae pariatur laudantium rerum aut iure! Nobis repellendus accusantium eveniet voluptatibus placeat nostrum recusandae!</div> -->
                          <div class="rating">
                            <input type="radio" name="star" value="5" id="star5" <?php if($RatingScore == 5){echo 'checked';}  ?>/><label for="star5"></label>
                            <input type="radio" name="star" value="4" id="star4"<?php if($RatingScore == 4){echo 'checked';}  ?>/><label for="star4"></label>
                            <input type="radio" name="star" value="3" id="star3"<?php if($RatingScore == 3){echo 'checked';}  ?>/><label for="star3"></label>
                            <input type="radio" name="star" value="2" id="star2"<?php if($RatingScore == 2){echo 'checked';}  ?>/><label for="star2"></label>
                            <input type="radio" name="star" value="1" id="star1"<?php if($RatingScore == 1){echo 'checked';}  ?>/><label for="star1"></label>
                            
                          </div>
                          
                      </div>
                      <input type="hidden" name="UserEmail" value="<?php echo $UserEmail ;?>">
                      <input type="hidden" name="ProductID" value="<?php echo $ProductID ;?>">
                      <input type="submit" class="submitRating" name="ratingStar"></input>
</form>
                  </div>
              </div>
          </div>
          <!-- product description end -->
    
          <!-- customer reviews -->
         <div class="review-section">
          <div class="review">
              <div class="title"><h2>Customer Reviews</h2></div>
            </div>

            <div class="customer-review">
                 <div class="customer-review-box-area">
                 <?php $sqlquery6= "Select productratinglist.RatingScore,user.UserFullName as FullName From productratinglist LEFT JOIN user ON productratinglist.UserEmail = user.UserEmail WHERE productratinglist.ProductID = $ProductID";
    $result6 = mysqli_query($conn, $sqlquery6);
    $resultcheck6 = mysqli_num_rows($result6) ;
    if($resultcheck6>0){
      while($row6 = mysqli_fetch_assoc($result6)){
        $rateCounter = 0;
        $RratingScore = $row6['RatingScore'];
$fullName = $row6['FullName'];

  
    ?>
                    <div class="review-boxes">
                         <div class="stars">
                           <?php   while($rateCounter < $RratingScore){ ?>
                          <i class="fa fa-star"></i>
                          <?php  
                        $rateCounter ++ ;
                        }?>
                         </div>
                         <div class="name"><?php echo $fullName;?></div>
                    </div>

<?php
    }
  }
?>

                   
                   
                 </div>
            </div>
          </div>
           
          <!-- customer reviews end -->
    
    </div>

</body>
</html>