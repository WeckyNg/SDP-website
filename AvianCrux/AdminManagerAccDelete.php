




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Manager Acc Delete Page</title>
    <link href="allin1css.css" rel="stylesheet"  type="text/css"/>
    
</head>

<body>
<?php session_start();
include_once 'connection.php';
$UserType = $_SESSION['usertype'];
if($UserType == "Admin"){
    


    if(isset($_GET['Deleting'])){
if(isset($_GET['DeleteConfirm']) && $_GET['DeleteConfirm'] == "YES"){
$UserEmail = $_GET['Deleting'];
$sqlquery5= "SELECT ManagerID From managerpermission WHERE UserEmail = '$UserEmail'";
$result5 = mysqli_query($conn, $sqlquery5);
$ManagerID = mysqli_fetch_assoc($result5);
$sqlquery= "Delete From user WHERE UserEmail = '$UserEmail'";
mysqli_query($conn, $sqlquery);
$sqlquery= "Update customerpurchaselist SET Status = 'Uncomplete',ManagerID = NULL WHERE Status = 'Completed' AND ManagerID = '$ManagerID'";
$a = mysqli_query($conn, $sqlquery);
$sqlquery= "Delete From managerpermission WHERE UserEmail = '$UserEmail'";
mysqli_query($conn, $sqlquery);

echo '<script>function DeleteSuccess(){

    alert("Successful Removed The Manager, purchase record still remain record of manager")
}
DeleteSuccess()
</script>';

    }else{
        echo
        '<script>
        function DoubleConfirm() {
            
            let ConfirmMessage = prompt("Enter word CONFIRM to Confirm the delete:", "");
            if (ConfirmMessage == "CONFIRM") {
                location.replace(window.location.href+"&DeleteConfirm=YES");
            } else {
              alert("No Manager Delete had been made");
              
            }
      
          }
          DoubleConfirm();
    
          </script>';
    }
}

     ?>
    <center>
<div id="contain">
    <div id="header"><center><div id= "pagetype">Avian Crux</div></center></div>
    <div id="menu" class="welcome">True Admin Manager Account Delete</div>
    <hr class="lining">
    <div id="menu" >
        <div id="firstconn"><a href="AvianCruxAdminHome.php" class="deco">Admin Menu</a></div>
        <div class="lastconn"><a href="AdminManagerAccUpdate.php" class="deco">  Edit Mode </a></div>
        <div class="secondlastconn"><a href="AdminManagerRegisterForm.php" class="deco">   Register </a></div>



        
        

    </div>
    <div style="height:60px;"></div>
    <table class="choosable">
<tr class="choosable">
<td class="choosable">Email</td>
<td class="choosable">Password</td>
<td class="choosable"><font color="red"><b>Edit</b></font></td>
</tr>


    <?php 
    
    $sqlquery= "Select UserEmail,UserFullName,UserPassword From user Where UserType = 'Manager'";
    $result = mysqli_query($conn, $sqlquery);
    $resultcheck = mysqli_num_rows($result) ;
    if ($resultcheck >0){
        while($row = mysqli_fetch_assoc($result)){ 
            ?>
<tr class="choosable">
 <td class="choosable"> <?php echo $row['UserEmail']; ?></td>
 <td class="choosable"> <?php echo $row['UserPassword']; ?></td>
 <td class="choosable"> <a href="AdminManagerAccDelete.php?Deleting=<?php echo $row['UserEmail']; ?>" class="linkform2">Delete</a></td>
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