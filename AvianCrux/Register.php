
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Registration Page </title>
    <link rel="stylesheet" href="style2.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
<?php session_start();
include_once 'connection.php';
if(isset($_GET['ErrorText'])){
echo '<script>alert("Email Exist, Please Use Another Email.")</script>';

}


?>
  <div class="container">
    <div class="title">Registration</div>
    <div class="content">
      <form action="RegisterCustomerCheck.php" method="POST">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Full Name</span>
            <input name = "UserFullName" type="text" placeholder="Enter your name" required>
          </div>
          <div class="input-box">
            <span class="details">Card Number</span>
            <input name = "UserCardNum" type="number" placeholder="0000 0000 0000 0000" required>
          </div>
          <div class="input-box">
            <span class="details">Email</span>
            <input name = "UserEmail" type="text" placeholder="Enter your email" required>
          </div>
          <div class="input-box">
            <span class="details">Expiry Date</span>
            <input name = "UserCardExpiredDate" type="text" placeholder="MM/YY" required>
          </div>
          <div class="input-box">
            <span class="details">Password</span>
            <input name="UserPassword" type="password" placeholder="Enter your password" required>
          </div>
          <div class="input-box">
            <span class="details">CVV</span>
            <input name="UserCardSerial" type="number" placeholder="000" required>
          </div>
          <div class="input-box">
            <span class="details">Address</span>
            <textarea name ="UserAddress" placeholder="address" cols="10" rows="4" required aria-setsize="false"></textarea>
          </div>
          <div class="input-box">
 
          </div>
        <div class="button">
          <input type="submit" value="Register">
        </div>
      </form>
    </div>
  </div>

</body>
</html>
