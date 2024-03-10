<?php session_start();
include_once 'connection.php';

$UpdateID=$_GET['UpdateDetail'];
$sqlquery5= "Select updatelist.UpdateID ,updatelist.UserEmail as 'ManagerEmail',updatelist.UpdateType ,updatelist.UpdateDate ,updatelist.UpdatedListName ,updatelist.UpdatedListName ,updatelist.UpdatedListColumn ,updatelist.StatusBeforeUpdate ,updatelist.StatusAfterUpdate ,updatelist.UpdateComments ,updatelist.PurchaseID , customerpurchaselist.ProductID as ProductID ,customerpurchaselist.UserEmail as 'CustomerEmail' ,customerpurchaselist.Quantity ,customerpurchaselist.Status ,customerpurchaselist.PurchaseDate ,customerpurchaselist.DeliveryDate From updatelist LEFT JOIN customerpurchaselist ON updatelist.PurchaseID = customerpurchaselist.PurchaseID Where updatelist.UpdateID = $UpdateID;";
$result5 = mysqli_query($conn, $sqlquery5);
$resultcheck5 = mysqli_num_rows($result5) ;
if ($resultcheck5 == 1){
    $row = mysqli_fetch_assoc($result5);
    $ManagerEmail = $row['ManagerEmail'];
    $UpdateType = $row['UpdateType'];
    $ProductID = $row['ProductID'];
    $UpdateDate = $row['UpdateDate'];
    $UpdatedListName = $row['UpdatedListName'];
    $UpdatedListColumn = $row['UpdatedListColumn'];
    $StatusBeforeUpdate = $row['StatusBeforeUpdate'];
    $StatusAfterUpdate = $row['StatusAfterUpdate'];
    $UpdateComments = $row['UpdateComments'];
    if(!empty($row['CustomerEmail'])){
    $PurchaseID = $row['PurchaseID'];
    $CustomerEmail = $row['CustomerEmail'];
    $Quantity = $row['Quantity'];
    $Status = $row['Status'];
    $PurchaseDate = $row['PurchaseDate'];
    $DeliveryDate = $row['DeliveryDate'];
}}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Update Details</title>
    <link href="allin1css.css" rel="stylesheet"  type="text/css"/>
    
</head>

<body>
    <center>
<div id="contain">
    <div id="header"><center><div id= "pagetype">Avian Crux</div></center></div>
    <div id="menu" class="welcome">Update Details</div>
    <hr class="lining">
    <div id="menu" >
        <div id="firstconn"><a href="AdminUpdateList.php" class="deco">Back to Updates List</a></div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <form id="UpdateList" action="ManagerUpdateProductList.php" method="POST" enctype ="multipart/form-data">
<table id="UpdateList">
<tr>
    <td><label class="formlabel" for="UpdateID">Update ID:</label></td>
    <td><input id="disablednum" class="forminput" type="number" name="UpdateID" value="<?php echo $UpdateID ?>"></input></td>
</tr><tr>
    <td><label class="formlabel" for="ManagerEmail">Manager Email:</label></td>
    <td><input id="disablednum" class="forminput" type="text" name="ManagerEmail" value="<?php echo $ManagerEmail; ?>"></input></td>
</tr><tr>
    <td><label class="formlabel" for="UpdateType">Update Type:</label></td>
    <td><input id="disablednum" class="forminput" type="text" name="UpdateType" value="<?php echo $UpdateType; ?>"></input></td>
</tr><tr>
    <td><label class="formlabel" for="UpdateDate">Update Date:</label></td>
    <td><input id="disablednum" class="forminput" type="text" name="UpdateDate" value="<?php echo $UpdateDate; ?>"></input></td>
</tr><tr>
    <td><label class="formlabel" for="UpdatedListName">Updated List Name:</label></td>
    <td><input id="disablednum" class="forminput" type="text" name="UpdatedListName" value="<?php echo $UpdatedListName; ?>"></input></td>
</tr><tr>
    <td><label class="formlabel" for="UpdatedListColumn">Updated Column:</label></td>
    <td><input id="disablednum" class="forminput" type="text" name="UpdatedListColumn" value="<?php echo $UpdatedListColumn; ?>"></input></td>
</tr><tr>
    <td><label class="formlabel" for="StatusBeforeUpdate">Status Before Update:</label></td>
    <td><input id="disablednum" class="forminput" type="text" name="StatusBeforeUpdate" value="<?php echo $StatusBeforeUpdate; ?>"></input></td>
</tr><tr>
    <td><label class="formlabel" for="StatusAfterUpdate">Status After Update:</label></td>
    <td><input id="disablednum" class="forminput" type="text" name="StatusAfterUpdate" value="<?php echo $StatusAfterUpdate; ?>"></input></td>
</tr><tr>
    <td><label class="formlabel" for="UpdateComments">Comments by<br>Responsible<br>Manager:</label></td>
    <td><textarea id="longimput" class="forminput" name="UpdateComments" row="5" disabled><?php echo $UpdateComments; ?></textarea></td>
    
</tr><?php  if(!empty($PurchaseID)){  ?><tr>
    <center>
    <div style= "width: 840px;"><hr class="lining"></div>
</center>
    <td><label class="formlabel" for="PurchaseID">Reference<br>Purchase ID:</label></td>
    <td><input id="disablednum" class="forminput" type="text" name="PurchaseID" value="<?php echo $PurchaseID; ?>"></input></td>
</tr><tr>
    <td><label class="formlabel" for="CustomerEmail">Customer Email:</label></td>
    <td><input id="disablednum" class="forminput" type="text" name="CustomerEmail" value="<?php echo $CustomerEmail; ?>"></input></td>
</tr><tr>
    <td><label class="formlabel" for="ProductID">Product ID:</label></td>
    <td><input id="disablednum" class="forminput" type="text" name="ProductID" value="<?php echo $ProductID; ?>"></input></td>
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
    <td><label class="formlabel" for="DeliveryDate">Delivery Date:</label></td>
    <td><input id="disablednum" class="forminput" type="text" name="DeliveryDate" value="<?php echo $DeliveryDate; ?>"></input></td>
</tr>
<?php
}
?>
</table>
</form>
    <div style="height:90px;"></div>
    <hr class="lining">

</center>

</body>