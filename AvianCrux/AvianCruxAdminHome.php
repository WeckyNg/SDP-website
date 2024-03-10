<?php session_start();
include_once 'connection.php';
$UserType = $_SESSION['usertype'];
if($UserType == "Admin"){
    
}else{
    header("Location: Login.php");
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Home Page</title>
    <link href="allin1css.css" rel="stylesheet"  type="text/css"/>
    
</head>

<body>
    <center>
<div id="contain">
    <div id="header"><center><a href = "Login.php"><div id= "pagetype">Avian Crux</div></a></center></div>
    <div id="menu" class="welcome">True Admin Menu</div>
    <hr class="lining">

    <div style="height:20px;"></div>



    <div class= "Menutop">
    <div id = "FirstAd" class = "columnA1">
<div >
<div style="height:10px;"></div>
Manager User Account

</div>

<div>
<div style="height:10px;"></div>
    <div class = "MenuText">Customer
    <div style="height:15px;"></div>
    <a href = "AdminCustomerAccUpdate.php" class="deco"><div class = "MainMenuButton">Customer Account Update</div></a></div>
<div style="height:15px;"></div>
</div>
<div class = "MenuText">Manager
<div style="height:15px;"></div>
<a href = "AdminManagerAccUpdate.php" class="deco"><div class = "MainMenuButton">Manager Account Update</div></a>
<div style="height:15px;"></div>
<a href = "AdminManagerRegisterForm.php" class="deco"><div class = "MainMenuButton">Register New Manager</div></a>
<div style="height:15px;"></div>
<a href = "AdminManagerAccDelete.php" class="deco"><div class = "MainMenuButton">Delete Manager Account</div></a>
<div style="height:10px;"></div>
</div>
</div>



<div id = "FirstAd" class = "columnA2">

<div >
<div style="height:20px;"></div>
Display List
</div>
<div style="height:50px;"></div>
<a href = "AdminUpdateList.php" class="deco"><div class = "MainMenuButton">List Updates(Done by managers)</div></a>
<div style="height:50px;"></div>
<a href = "AdminCustomerPurchaseList.php" class="deco"><div class = "MainMenuButton">Customer Purchase list</div></a>
<div style="height:50px;"></div>
<a href = "productlist.php" class="deco"><div class = "MainMenuButton">Customer Product page</div></a>

</div>

</div>

<br>

<div class= "Menubtm">
<div id = "SecondAd" class = "columnA1">
<div>
<div style="height:10px;"></div>
Feedbacks
</div >
<div style="height:10px;"></div>
<a href = "AdminFeedback.php" class="deco"><div class = "MainMenuButton">View and reply feedbacks</div></a>
</div>



<div id = "SecondAd" class = "columnA2">
<div>
<div style="height:10px;"></div>
Generate Reports
</div>
<div style="height:10px;"></div>
<a href = "AdminRevenue.php" class="deco"><div class = "MainMenuButton">Revenue of the month</div></a>
</div>


</div>

    <div style="height:60px;"></div>
    <hr class="lining">
    </div>


</center>
</body>