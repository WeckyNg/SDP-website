
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
  $sqlquery= "Select * From user Where UserEmail = '$UserEmail' ";
  $result = mysqli_query($conn, $sqlquery);
  $UserInfo = mysqli_fetch_assoc($result) ;
  

  if(isset($_POST['UserEmail'])){
    $UserEmailup=$_POST['UserEmail'];
    $UserFullName=$_POST['UserFullName'];
  $UserAddress=$_POST['UserAddress'];
  $UserCardNum= $_POST['UserCardNum'];
  $UserCardSerial=$_POST['UserCardSerial'];
  $UserCardExpiredDate=$_POST['UserCardExpiredDate'];
  $UserPassword=$_POST['UserPassword'];
  $sqlUpdatequery= "UPDATE `user` SET `UserPassword` = '$UserPassword', UserAddress = '$UserAddress', UserCardNum = '$UserCardNum', 
  UserCardSerial = '$UserCardSerial', UserCardExpiredDate= '$UserCardExpiredDate',UserFullName ='$UserFullName' WHERE `UserEmail` = '$UserEmailup';";
$abc= mysqli_query($conn, $sqlUpdatequery);
echo '<script>alert("Update Success.")</script>';

  }else{
    $UserFullName=$UserInfo['UserFullName'];
  $UserAddress=$UserInfo['UserAddress'];
  $UserCardNum= $UserInfo['UserCardNum'];
  $UserCardSerial=$UserInfo['UserCardSerial'];
  $UserCardExpiredDate=$UserInfo['UserCardExpiredDate'];
  $UserPassword=$UserInfo['UserPassword'];
  }


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
              <li><a href="CustomerPurchaseHistory.php"><i class="fa fa-user-circle-o"></i> Purchase History</a></li>
              <li><a href="CustomerChangeInfo.php"><i class="fa fa-cog"></i> Setting</a></li>
              <li><a href="CustomerCart.php"><div class="add-to-cart"><i class="fa fa-shopping-cart"></i></div><div class="qty-check"></div></a></li>
            </ul>
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>
       <!-- header end -->

     <!-- start edit information -->

     <div class="personal-info">
         <div class="info-title">
             <h1>AVIAN CRUX STORE CHANGE PERSONAL INFORMATION</h1>
         </div>
         <div class="person-logo">
            <div class="img-person-box">
                <img src="./images/shoping-logo.jpg"/>
            </div>
         </div>
         <div class="info-edit-form">
           <div class="form-start">
            
            <div class="content">
                <form action="CustomerChangeInfo.php" method="POST">
                  <div class="user-details">
                    <div class="input-box">
                      <span class="details">Full Name</span>
                      <input name="UserFullName" type="text" placeholder="Enter your name" required value="<?php echo  $UserFullName; ?>">
                    </div>
                    <div class="input-box">
                      <span class="details">Card Number</span>
                      <input name="UserCardNum" type="text" placeholder="0000 0000 0000 0000" required value="<?php echo  $UserCardNum; ?>">
                    </div>
                    <div class="input-box">
                      <span class="details">Email</span>
                      <input name="UserEmail" class="diabled" type="text" placeholder="Enter your email" value="<?php echo  $UserEmail; ?>">
                    </div>
                    <div class="input-box">
                      <span class="details">Expiry Date</span>
                      <input name="UserCardExpiredDate" type="text" placeholder="MM/YY" required value="<?php echo  $UserCardExpiredDate; ?>">
                    </div>
                    <div class="input-box">
                      <span class="details">Password</span>
                      <input name="UserPassword" type="password" placeholder="Enter your password" required value="<?php echo  $UserPassword; ?>">
                    </div>
                    <div class="input-box">
                      <span class="details">CVV</span>
                      <input name="UserCardSerial" type="text" placeholder="000" required value="<?php echo  $UserCardSerial; ?>">
                    </div>

                    <div class="input-box">
                      <span class="details">Address</span>
                      <textarea name="UserAddress" placeholder="Address" cols="10" rows="10" required aria-setsize="false" ><?php echo  $UserAddress; ?></textarea>
                    </div>
                    <div class="input-box">

                    </div>
                    <div class="button">
                      <input type="submit" name="ChangeInfo" style="margin:0 20px" value="Update">
                    </div>
                </form>
              </div>

         </div>
       
     </div>

     <!-- end edit information -->
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