<?php session_start();
include_once 'connection.php';?>
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




          <!-- side bar section -->
          <div class="main-section-productlist">
            <div class="side_bar">
                
                <div class="product-catagory">
                    <ul>
                    <?php
$sqlquery11= "Select ProductCategory From productlist GROUP BY ProductCategory";
$result11 = mysqli_query($conn, $sqlquery11);
$resultcheck11 = mysqli_num_rows($result11) ;
if ($resultcheck11 > 0){
    while($row11 = mysqli_fetch_assoc($result11)){ 


?>
                      <a href="productlist.php?ProductCategory=<?php echo $row11['ProductCategory']; ?>"><li><?php echo $row11['ProductCategory']; ?></li></a>
<?php
    }
  }

?>
                    </ul>
                </div>

            </div>
      <!-- side bar end -->
              <!--  why us -->
              <div class="product-list">
                   <div class="product-listning">
                    <div class="product-listning-title">
                      <h2>Products</h2>
                      <div class="search-btn-group-bar">
                      <form>
                        <input  id="searchbox" type="text" class="search-input-field" placeholder="search product..."><input type="button" class="search-btn" value="search"onclick="searchFunction()"/>
                      </form>
                       
                      </div>
                    </div>
               <div class="inner-product-listning">
               <?php 
              if(isset($_GET['ProductCategory'])){
                $ProductCategory = $_GET['ProductCategory'];
                $sqlqueryProduct= "Select ProductID,ProductName,ProductPicture,ProductDescription From productlist WHERE ProductCategory = '$ProductCategory';";
               }elseif(isset($_GET['search'])){
                $searchvalue = $_GET['search'];
                $sqlqueryProduct= "Select ProductID,ProductName,ProductPicture,ProductDescription From productlist WHERE ProductName LIKE '%$searchvalue%';";
               }else{
                $sqlqueryProduct= "Select ProductID,ProductName,ProductPicture,ProductDescription From productlist";
               }
               
$resultProduct = mysqli_query($conn, $sqlqueryProduct);
$resultcheckProduct = mysqli_num_rows($resultProduct) ;
if ($resultcheckProduct > 0){
    while($rowProduct = mysqli_fetch_assoc($resultProduct)){ 
?>
                <a href="productdescription.php?ProductID=<?php echo $rowProduct['ProductID']; ?>">  
                <div class="product-boxes">
                       <div class="inner-product-boxes-img">
                           <img src="image/products/<?php echo $rowProduct['ProductPicture']; ?>"/>
                       </div>
                       <div class="inner-product-boxes-info">
                           <h4><?php echo $rowProduct['ProductName']; ?></h4>
                           <p><?php echo $rowProduct['ProductDescription']; ?></p>
                       </div>
                   </div>
                  </a>
                  <?php
    }
  }

?>

                 
               </div>

               
                   </div>
                </div>
              <!-- why us end -->
          </div>
          <div class="footer">
            <div class="footer-content">
              AVIAN CRUX STORE LTD &copy;
            </div>
          </div>
    </div>
 <!-- JavaScript Bundle with Popper -->
 <script>
function searchFunction() {
  var searchvalue = document.getElementById("searchbox").value;
  location.replace("./productlist.php?search="+searchvalue);
}
</script>
 <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
</body>
</html>