<?php session_start();
include_once 'connection.php';
$UserType = $_SESSION['usertype'];
if($UserType == "Admin"){
$PurchaseID=$_GET['PurchaseID'];
$sqlquery5= "SELECT customerpurchaselist.PurchaseID,customerpurchaselist.UserEmail as 'CustomerEmail',customerpurchaselist.Quantity,customerpurchaselist.ProductID,customerpurchaselist.Status, customerpurchaselist.PurchaseDate,customerpurchaselist.DeliveryDate, productlist.ProductName,user.UserAddress , managerpermission.UserEmail as 'ManagerEmail' FROM `customerpurchaselist` LEFT JOIN productlist ON customerpurchaselist.ProductID = productlist.ProductID LEFT JOIN user ON customerpurchaselist.UserEmail = user.UserEmail LEFT JOIN managerpermission ON customerpurchaselist.ManagerID = managerpermission.ManagerID WHERE customerpurchaselist.PurchaseID = $PurchaseID";
$result5 = mysqli_query($conn, $sqlquery5);
$resultcheck5 = mysqli_num_rows($result5) ;
if ($resultcheck5 == 1){
    $row = mysqli_fetch_assoc($result5);
    $CustomerEmail = $row['CustomerEmail'];
    $ManagerEmail = $row['ManagerEmail'];
    $Quantity = $row['Quantity'];
    $ProductID = $row['ProductID'];
    $Status = $row['Status'];
    $PurchaseDate = $row['PurchaseDate'];
    if(isset($row['DeliveryDate'])){
    $DeliveryDate = $row['DeliveryDate'];
}else{$DeliveryDate = "Not Yet Delivered";}
    $ProductName = $row['ProductName'];
    $UserAddress = $row['UserAddress'];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Customer Purchase List Detail</title>
    <link href="allin1css.css" rel="stylesheet"  type="text/css"/>
    
</head>

<body>
    <center>
<div id="contain">
    <div id="header"><center><div id= "pagetype">Avian Crux</div></center></div>
    <div id="menu" class="welcome">Customer Purchase List (View only)</div>
    <hr class="lining">
    <div id="menu" >
        <div id="firstconn"><a href="AdminCustomerPurchaseList.php" class="deco">Back to Customer<br>Purchase List</a></div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <form id="DisplayCustomerPurchaseList" action="ManagerUpdateProductList.php" method="POST" enctype ="multipart/form-data">
<table id="CustomerPurchaseList">
<tr>
    <td><label class="formlabel" for="PurchaseID">Purchase ID:</label></td>
    <td><input id="disablednum" class="forminput" type="number" name="PurchaseID" value="<?php echo $PurchaseID ?>"></input></td>
</tr><tr>
    <td><label class="formlabel" for="CustomerEmail">Customer Email:</label></td>
    <td><input id="disablednum" class="forminput" type="text" name="CustomerEmail" value="<?php echo $CustomerEmail; ?>"></input></td>
</tr><tr>
    <td><label class="formlabel" for="ProductID">Product ID:</label></td>
    <td><input id="disablednum" class="forminput" type="text" name="ProductID" value="<?php echo $ProductID; ?>"></input></td>
</tr><tr>
    <td><label class="formlabel" for="ProductName">Produc tName:</label></td>
    <td><input id="disablednum" class="forminput" type="text" name="ProductName" value="<?php echo $ProductName; ?>"></input></td>
</tr><tr>
    <td><label class="formlabel" for="Quantity">Quantity:</label></td>
    <td><input id="disablednum" class="forminput" type="text" name="Quantity" value="<?php echo $Quantity; ?>"></input></td>
</tr><tr>
    <td><label class="formlabel" for="PurchaseDate">Purchase Date:</label></td>
    <td><input id="disablednum" class="forminput" type="text" name="PurchaseDate" value="<?php echo $PurchaseDate; ?>"></input></td>
</tr><tr>
    <td><label class="formlabel" for="Status">Current Status:</label></td>
    <td><input id="disablednum" class="forminput" type="text" name="Status" value="<?php echo $Status; ?>"></input></td>
</tr><tr>
    <td><label class="formlabel" for="ManagerEmail">Last Updated<br>Manager Email:</label></td>
    <td><input id="disablednum" class="forminput" type="text" name="ManagerEmail" value="<?php echo $ManagerEmail; ?>"></input></td>
</tr><tr>
    <td><label class="formlabel" for="DeliveryDate">Delivery Date:</label></td>
    <td><input id="disablednum" class="forminput" type="text" name="DeliveryDate" value="<?php echo $DeliveryDate; ?>"></input></td>
    
</tr><tr>
    <td><label class="formlabel" for="UserAddress">Customer Address:</label></td>
    <td><textarea id="longimput" class="forminput" name="UserAddress" row="5" disabled><?php echo $UserAddress; ?></textarea></td>
    
</tr>
</table>
</form>
    <div style="height:90px;"></div>
    <hr class="lining">

</center>

</body>
<?php
}else{
    header("Location: Login.php");
}



?>