<?php session_start();
include_once 'connection.php';
$UserType = $_SESSION['usertype'];
if($UserType == "Admin"){

     ?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin View Customer Purchase list Page</title>
    <link href="allin1css.css" rel="stylesheet"  type="text/css"/>
    
</head>

<body>
    <center>
<div id="contain">
    <div id="header"><center><div id= "pagetype">Avian Crux</div></center></div>
    <div id="menu" class="welcome">Customer Purchase list(View only)</div>
    <hr class="lining">
    <div id="menu" >
        <div id="firstconn"><a href="AvianCruxAdminHome.php" class="deco">Admin Menu</a></div>


        
        

    </div>
    <div style="height:60px;"></div>
    <table class="choosable">
<tr class="choosable">
<td class="choosable">ID</td>
<td class="choosable">Email</td>
<td class="choosable">Product ID</td>
<td class="choosable">Product Name</td>
<td class="choosable">Product Quantity</td>
<td class="choosable">Current Status</td>
<td class="choosable">Purchase Date</td>
<td class="choosable"><font color="red"><b>Reference</b></font></td>
</tr>


    <?php 
    
    $sqlquery= "SELECT customerpurchaselist.PurchaseID,customerpurchaselist.UserEmail,customerpurchaselist.Quantity,customerpurchaselist.ProductID,customerpurchaselist.Status, customerpurchaselist.PurchaseDate,productlist.ProductName FROM `customerpurchaselist` LEFT JOIN productlist ON customerpurchaselist.ProductID = productlist.ProductID WHERE NOT customerpurchaselist.Status = 'InCart' ORDER BY PurchaseDate DESC";
    $result = mysqli_query($conn, $sqlquery);
    $resultcheck = mysqli_num_rows($result) ;
    if ($resultcheck >0){
        while($row = mysqli_fetch_assoc($result)){ 
            ?>
<tr class="choosable">
 <td class="choosable"> <?php echo $row['PurchaseID']; ?></td>
 <td class="choosable"> <?php echo $row['UserEmail']; ?></td>
 <td class="choosable"> <?php echo $row['ProductID']; ?></td>
 <td class="choosable"> <?php echo $row['ProductName']; ?></td>
 <td class="choosable"> <?php echo $row['Quantity']; ?></td>
 <td class="choosable"> <?php echo $row['Status']; ?></td>
 <td class="choosable"> <?php echo $row['PurchaseDate']; ?></td>
 <td class="choosable"> <a href="AdminCustomerPurchaseListDetail.php?PurchaseID=<?php echo $row['PurchaseID']; ?>" class="linkform">More Info</a></td>
 </tr>
<?php }
   }
    ?>
</table>
    <div style="height:60px;"></div>
    <hr class="lining">

</center>
</body>
<?php
}else{
    header("Location: Login.php");
}



?>