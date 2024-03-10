
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


if(isset($_POST['FeedbackContent']) && $_POST['FeedbackContent'] != ""){
  $feedbackContent=$_POST['FeedbackContent'];
  if($feedbackContent != $feedbackContentCheck){
  $sqlqueryNEW= "UPDATE feedbacklist SET FeedbackContent = '$feedbackContent', FeedbackReply = NULL WHERE UserEmail = '$UserEmail';";
  mysqli_query($conn, $sqlqueryNEW);
  echo '<script>alert("Feedback Send Successful.")</script>';
}
}elseif(isset($_POST['FeedbackContent'])){
  echo '<script>function ContentPlease(){ alert("Pease enter the message you want to give feedback.")
  }
  ContentPlease();
  </script>';
}
$sqlquery= "Select * From feedbacklist WHERE UserEmail = '$UserEmail'";
$result = mysqli_query($conn, $sqlquery);
  $row = mysqli_fetch_assoc($result);
  $feedbackReply = $row['FeedbackReply'];
  $feedbackContentCheck = $row['FeedbackContent'];
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

      <!-- feedback start -->
<form action="CustomerFeedback.php" method="POST">
      <div class="feedback">
        <br>
          <div class="feedback-section">
              <div class="feedback-title"><p>AVIAN CRUX</p><P>YOUR FEEDBACK</P></div>
              <div class="feedback-box">
              <?php
              if(isset($feedbackReply)){
                
              }else{
                $feedbackReply="No Reply Yet";
              }

?>
                <textarea name="FeedbackContent" cols="120" placeholder="your feedback please" rows="7"><?php echo $feedbackContentCheck ;?></textarea>
              </div>
              <div class="btn-submit-feedback">
                <div class="button">
                  <input type="submit" value="Submit">
                  
                </div>
                
              </div>
              <textarea id="diabled" name="FeedbackReply" cols="120" placeholder="Reply Will be Here" rows="6"><?php echo $feedbackReply ;?></textarea>
          </div>
      </div>
    </form>
      <!-- feedback end -->
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