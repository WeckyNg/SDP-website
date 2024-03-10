<?php session_start();
include_once 'connection.php';


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Register Manager Form Page</title>
    <link href="allin1css.css" rel="stylesheet"  type="text/css"/>
    
</head>

<body>
    <center>
<div id="contain">
    <div id="header"><center><div id= "pagetype">Avian Crux</div></center></div>
    <div id="menu" class="welcome">Register Manager</div>
    <hr class="lining">
    <div id="menu" >
        <div id="firstconn"><a href="AdminManagerAccUpdate.php" class="deco">Return to Manager List<br>Without Changes</a></div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <form id="UpdateForm" action="AdminManagerRegisterForm.php" method="POST" >
<table id="UpdateProductform">
<tr>
    <td><label class="formlabel" for="UserEmail">Manager Email:</label></td>
    <td><input  class="forminput" type="text" name="UserEmail" ></input></td>
</tr><tr>
    <td><label class="formlabel" for="UserPassword">Password:</label></td>
    <td><input class="forminput" type="text" name="UserPassword" ></input></td>
</tr><tr>
<td><label class="formlabel">Permissions:</label></td><td></td>
</tr><tr>
<td></td><td><input type="checkbox" class="formcheck" name="UpdateProductList" value="Yes">
<label class="formlabel" for="UpdateProductList">Update Product List</label></td>
</tr><tr>
<td></td><td><input type="checkbox" class="formcheck" name="UpdatePurchaseList" value="Yes">
<label class="formlabel" for="UpdatePurchaseList">Update Customer Purchase List</label></td>
</tr><tr>
<td></td><td><input type="checkbox" class="formcheck" name="UpdateCompletedPurchaseList" value="Yes">
<label class="formlabel" for="UUpdateCompletedPurchaseList">Update Completed Customer Purchase List</label></td>
</tr><tr>
<td></td><td><input type="submit" name="Register Manager Info" value="Confirm" class="formbutton"></input>
</td>
</tr>
</table>
</form>
<?php
if((isset($_POST['UserEmail'])) AND (isset($_POST['UserPassword']))){
    $UserEmail = $_POST['UserEmail'];
    $UserPassword = $_POST['UserPassword'];
    if(isset($_POST['UpdateProductList']) && $_POST['UpdateProductList'] == "Yes"){
        $ManagerUpdateProductList = 1;
    }else{
        $ManagerUpdateProductList = 0;
    }
if(isset($_POST['UpdatePurchaseList']) && $_POST['UpdatePurchaseList'] == "Yes"){
$ManagerUpdatePurchaseList = 1;
}else{
$ManagerUpdatePurchaseList = 0;
}
if(isset($_POST['UpdateCompletedPurchaseList']) && $_POST['UpdateCompletedPurchaseList'] == "Yes"){
$ManagerUpdateCompletedPurchaseList = 1;
}else{
$ManagerUpdateCompletedPurchaseList = 0;
}
$sqlquery= "Insert Into user (UserEmail,UserPassword,UserType) VALUES ('$UserEmail','$UserPassword' , 'Manager')";
        mysqli_query($conn, $sqlquery);
      
$sqlquery2= "Insert Into managerpermission (UserEmail,UpdateProduct,UpdatePurchaseList,UpdateCompletedPurchaseList) VALUES ('$UserEmail',$ManagerUpdateProductList,$ManagerUpdatePurchaseList,$ManagerUpdateCompletedPurchaseList)";
        mysqli_query($conn, $sqlquery2);

echo '<script>function RegisterSuccess(){

    alert("Successful Register The Manager")
}
RegisterSuccess()
</script>';
        
}
?>
    <div style="height:90px;"></div>
    <hr class="lining">

</center>

</body>