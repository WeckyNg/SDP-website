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
    <title>Admin Manager Acc Delete Page</title>
    <link href="allin1css.css" rel="stylesheet"  type="text/css"/>
    
</head>

<body>
    <center>
<div id="contain">
    <div id="header"><center><div id= "pagetype">Avian Crux</div></center></div>
    <div id="menu" class="welcome">Update(done by Managers) List</div>
    <hr class="lining">
    <div id="menu" >
        <div id="firstconn"><a href="AvianCruxAdminHome.php" class="deco">Admin Menu</a></div>


        
        

    </div>
    <div style="height:60px;"></div>
    <table class="choosable">
<tr class="choosable">
<td class="choosable">Type</td>
<td class="choosable">Date</td>
<td class="choosable">List Name</td>
<td class="choosable">List Column</td>
<td class="choosable">Manager Email</td>
<td class="choosable"><font color="red"><b>Reference</b></font></td>
</tr>


    <?php 
    
    $sqlquery= "Select UpdateID,UserEmail, UpdateType,UpdateDate,UpdatedListName,UpdatedListColumn From updatelist ORDER BY UpdateID DESC";
    $result = mysqli_query($conn, $sqlquery);
    $resultcheck = mysqli_num_rows($result) ;
    if ($resultcheck >0){
        while($row = mysqli_fetch_assoc($result)){ 
            ?>
<tr class="choosable">
 <td class="choosable"> <?php echo $row['UpdateType']; ?></td>
 <td class="choosable"> <?php echo $row['UpdateDate']; ?></td>
 <td class="choosable"> <?php echo $row['UpdatedListName']; ?></td>
 <td class="choosable"> <?php echo $row['UpdatedListColumn']; ?></td>
 <td class="choosable"> <?php echo $row['UserEmail']; ?></td>
 <td class="choosable"> <a href="AdminUpdateListDetail.php?UpdateDetail=<?php echo $row['UpdateID']; ?>" class="linkform">More Info</a></td>
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