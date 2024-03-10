<?php session_start();
include_once 'connection.php';
$UserType = $_SESSION['usertype'];
if($UserType == "Manager"){
    
}else{
    header("Location: Login.php");
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manager Home Page</title>
    <link href="allin1css.css" rel="stylesheet"  type="text/css"/>
    
</head>

<body>
    <?php
    if(isset($_GET['ErrorText'])){
        echo '<script>alert("You Do Not Access To That Page, Please Contact Admin For More Info.")</script>';
    }
    
    
    ?>
    <center>
<div id="contain">
    <div id="header"><center><a href = "Login.php"><div id= "pagetype">Avian Crux</div></a></center></div>
    <div id="menu" class="welcome">Manager Menu</div>
    <hr class="lining">

    <div style="height:20px;"></div>



    <div class= "Menutop">
    <div id = "FirstAd" class = "columnA1">
<div >
<div style="height:10px;"></div>
Product Management

</div>

<div>
<div style="height:15px;"></div>
<a href = "ManagerUpdateProductList.php" class="deco"><div class = "MainMenuButtonManager">Update Product detail</div></a></div>
<div style="height:15px;"></div>
<a href = "ManagerAddProductListForm.php" class="deco"><div class = "MainMenuButtonManager">Add New Product</div></a>
<div style="height:15px;"></div>
<a href = "ManagerDeleteProductList.php" class="deco"><div class = "MainMenuButtonManager">Delete existing Product</div></a>
<div style="height:15px;"></div>
<a href = "productlist.php" class="deco"><div class = "MainMenuButtonManager">Customer Product <br>Page</div></a>
<div style="height:10px;"></div>
</div>



<div id = "FirstAd" class = "columnA2">

<div >
<div style="height:20px;"></div>
Customer<br>Purchase<br>Management
</div>
<div style="height:70px;"></div>
<a href = "ManagerCustomerPurchaseList.php" class="deco"><div class = "MainMenuButtonManager">Update Customer<br> Purchase list</div></a>
<div style="height:50px;"></div>
<a href = "ManagerCompletedCustomerPurchaseList.php" class="deco"><div class = "MainMenuButtonManager">View Completed Customer purchase list</div></a>


</div>

</div>








    <div style="height:60px;"></div>
    <hr class="lining">
    </div>


</center>
</body>