<?php session_start();
include_once 'connection.php';
$UserType = $_SESSION['usertype'];
if($UserType == "Admin"){
    


    if(isset($_POST['UserEmail']) && isset($_POST['UserPassword'])){
$UserEmail = $_POST['UserEmail'];
$UserPassword = $_POST['UserPassword'];

 
$updateCustomersql = "UPDATE `user` SET `UserPassword` = '$UserPassword' WHERE `user`.`UserEmail` = '$UserEmail';";
mysqli_query($conn, $updateCustomersql);

    

    }

     ?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Customer Acc Update Page</title>
    <link href="allin1css.css" rel="stylesheet"  type="text/css"/>
    
</head>

<body>
    <center>
<div id="contain">
    <div id="header"><center><div id= "pagetype">Avian Crux</div></center></div>
    <div id="menu" class="welcome">True Admin Customer Account Update</div>
    <hr class="lining">
    <div id="menu" >
        <div id="firstconn"><a href="AvianCruxAdminHome.php" class="deco">Admin Menu</a></div>


        
        

    </div>
    <div style="height:60px;"></div>
    <table class="choosable">
<tr class="choosable">
<td class="choosable">Email</td>
<td class="choosable">FullName</td>
<td class="choosable">Password</td>
<td class="choosable"><font color="red"><b>Edit</b></font></td>
</tr>


    <?php 
    
    $sqlquery= "Select UserEmail,UserFullName,UserPassword From user Where UserType = 'Customer'";
    $result = mysqli_query($conn, $sqlquery);
    $resultcheck = mysqli_num_rows($result) ;
    if ($resultcheck >0){
        while($row = mysqli_fetch_assoc($result)){ 
            ?>
<tr class="choosable">
 <td class="choosable"> <?php echo $row['UserEmail']; ?></td>
 <td class="choosable"> <?php echo $row['UserFullName']; ?></td>
 <td class="choosable"> <?php echo $row['UserPassword']; ?></td>
 <td class="choosable"> <a href="AdminCustomerAccUpdateForm.php?UserEmail=<?php echo $row['UserEmail']; ?>" class="linkform">EDIT</a></td>
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