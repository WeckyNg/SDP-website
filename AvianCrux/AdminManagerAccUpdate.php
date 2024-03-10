<?php session_start();
include_once 'connection.php';
$UserType = $_SESSION['usertype'];
if($UserType == "Admin"){
    


    if(isset($_POST['UserEmail']) && isset($_POST['UserPassword'])){
$UserEmail = $_POST['UserEmail'];
$UserPassword = $_POST['UserPassword'];
$sqlquery= "Select * From user Where UserEmail = '$UserEmail'";
        $result = mysqli_query($conn, $sqlquery);
        $resultcheck = mysqli_num_rows($result) ;
        
        
$updateManagersql = "UPDATE `user` SET  `UserPassword` = '$UserPassword' WHERE `user`.`UserEmail` = '$UserEmail';";
mysqli_query($conn, $updateManagersql);
        
    

    }


        if(isset($_GET['UpdateProduct'])){
            $PermissionChange = $_GET['UpdateProduct'];
            $UserEmail = $_GET['UserEmail'];
if($PermissionChange == 0){
    $PermissionChange = 1 ;
}else{
    $PermissionChange = 0 ;
}
$updateManagersql2 = "UPDATE `managerpermission` SET  `UpdateProduct` = '$PermissionChange' WHERE `UserEmail` = '$UserEmail';";
mysqli_query($conn, $updateManagersql2);
        }
        if(isset($_GET['UpdatePurchaseList'])){
            $PermissionChange = $_GET['UpdatePurchaseList'];
            $UserEmail = $_GET['UserEmail'];
if($PermissionChange == 0){
    $PermissionChange = 1 ;
}else{
    $PermissionChange = 0 ;
}
$updateManagersql2 = "UPDATE `managerpermission` SET  `UpdatePurchaseList` = '$PermissionChange' WHERE `UserEmail` = '$UserEmail';";
mysqli_query($conn, $updateManagersql2);
        }if(isset($_GET['UpdateCompletedPurchaseList'])){
            $PermissionChange = $_GET['UpdateCompletedPurchaseList'];
            $UserEmail = $_GET['UserEmail'];
if($PermissionChange == 0){
    $PermissionChange = 1 ;
}else{
    $PermissionChange = 0 ;
}
$updateManagersql2 = "UPDATE `managerpermission` SET  `UpdateCompletedPurchaseList` = '$PermissionChange' WHERE `UserEmail` = '$UserEmail';";
mysqli_query($conn, $updateManagersql2);
        }


        



     ?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Manager Acc Update Page</title>
    <link href="allin1css.css" rel="stylesheet"  type="text/css"/>
    
</head>

<body>
    <center>
<div id="contain">
    <div id="header"><center><div id= "pagetype">Avian Crux</div></center></div>
    <div id="menu" class="welcome">True Admin Manager Account Update</div>
    <hr class="lining">
    <div id="menu" >
        <div id="firstconn"><a href="AvianCruxAdminHome.php" class="deco">Admin Menu</a></div>
        <div class="lastconn"><a href="AdminManagerAccDelete.php" class="deco">  Delete Mode </a></div>
        <div class="secondlastconn"><a href="AdminManagerRegisterForm.php" class="deco">   Register </a></div>


        
        

    </div>
    <div style="height:60px;"></div>
    <table class="choosable">
<tr class="choosable">
<td class="choosable">Email</td>
<td class="choosable">Password</td>
<td class="choosable"><font color="red"><b>Edit</b></font></td>
<td class="choosable"><font color="red"><b>Update Product<br>List</b></font></td>
<td class="choosable"><font color="red"><b>Customer<br> Purchase List<br>Update</b></font></td>
<td class="choosable"><font color="red"><b>Update Completed<br> Customer<br> Purchase<br>List</b></font></td>
</tr>


    <?php 
    
    $sqlquery= "Select user.UserEmail,user.UserPassword ,managerpermission.UpdateProduct , managerpermission.UpdatePurchaseList , 
    managerpermission.UpdateCompletedPurchaseList From user LEFT JOIN managerpermission ON user.UserEmail = managerpermission.UserEmail 
    Where user.UserType = 'Manager'";
    $result = mysqli_query($conn, $sqlquery);
    $resultcheck = mysqli_num_rows($result) ;
    if ($resultcheck >0){
        while($row = mysqli_fetch_assoc($result)){ 
            ?>
<tr class="choosable">
 <td class="choosable"> <?php echo $row['UserEmail']; ?></td>

 <td class="choosable"> <?php echo $row['UserPassword']; ?></td>
 <td class="choosable"> <a href="AdminManagerAccUpdateForm.php?UserEmail=<?php echo $row['UserEmail']; ?>" class="linkform">EDIT</a></td>
 <td class="choosable"> <a href="AdminManagerAccUpdate.php?UserEmail=<?php echo $row['UserEmail']; ?>&UpdateProduct=<?php echo $row['UpdateProduct']; ?>" class="<?php if($row['UpdateProduct'] == 1){echo 'linkform';}else{echo 'linkform2';}?>"><?php if($row['UpdateProduct'] == 1){echo 'Enabled';}else{echo 'Disabled';}?></a></td>
 <td class="choosable"> <a href="AdminManagerAccUpdate.php?UserEmail=<?php echo $row['UserEmail']; ?>&UpdatePurchaseList=<?php echo $row['UpdatePurchaseList']; ?>" class="<?php if($row['UpdatePurchaseList'] == 1){echo 'linkform';}else{echo 'linkform2';}?>"><?php if($row['UpdatePurchaseList'] == 1){echo 'Enabled';}else{echo 'Disabled';}?></a></td>
 <td class="choosable"> <a href="AdminManagerAccUpdate.php?UserEmail=<?php echo $row['UserEmail']; ?>&UpdateCompletedPurchaseList=<?php echo $row['UpdateCompletedPurchaseList']; ?>" class="<?php if($row['UpdateCompletedPurchaseList'] == 1){echo 'linkform';}else{echo 'linkform2';}?>"><?php if($row['UpdateCompletedPurchaseList'] == 1){echo 'Enabled';}else{echo 'Disabled';}?></a></td>
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