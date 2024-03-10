<?php session_start();
include_once 'connection.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add task from List</title>
    <link href="allin1css.css" rel="stylesheet"  type="text/css"/>
    
</head>

<body>
    <?php
    $UpdatePermission = $_SESSION['UpdatePurchaseList'];
    if($UpdatePermission >= 1){
    if(isset($_GET['PurchaseID'])){
        $PurchaseID = $_GET['PurchaseID'];
        if(isset($_GET['UpdateComments'])){
            $UserEmail = $_SESSION['useremail'];
            
            $sqlquery10= "Select ManagerID From managerpermission Where UserEmail = '$UserEmail'";
            $result10 = mysqli_query($conn, $sqlquery10);    
            $OProductlist = mysqli_fetch_assoc($result10) ;
            $ManagerID = $OProductlist['ManagerID'];
            $todaydate = date("Y-m-d");
            $UpdateComments = $_GET['UpdateComments'];


        

            $sqlqueryInsertUpdate= "INSERT INTO `updatelist` ( `UserEmail`, `UpdateType`, `UpdateDate`, `UpdatedListName`, `UpdatedListColumn`, `StatusBeforeUpdate`, `StatusAfterUpdate`, `UpdateComments`, `PurchaseID`) VALUES 
            ('$UserEmail', 'Complete CP', '$todaydate' , 'CustomerPurchaseList', 'Status', 'Uncomplete', 'Completed', '$UpdateComments' , '$PurchaseID');";
    mysqli_query($conn, $sqlqueryInsertUpdate);

    

            $sqlUpdateQuery = "Update customerpurchaselist SET Status = 'Completed', ManagerID = '$ManagerID' WHERE PurchaseID = $PurchaseID" ;
            
            mysqli_query($conn, $sqlUpdateQuery);





            }else{
                echo '<script>
    function GETReplyMessage() {
      let UpComments;
      let UpCommentsInput = prompt("Comments:", "");
      if (UpCommentsInput == null || UpCommentsInput == "") {
        UpComments = "No Comments" ;
        
      } else {
        UpComments = UpCommentsInput ;
        
      }
      location.replace(window.location.href+"&UpdateComments="+UpComments);
    }
    GETReplyMessage();
    </script>';
                
}
  
                    
                    
                
        
    }
        
   }else{ header("Location: AvianCruxManagerHome.php?ErrorText=NoPermission");
                   
    

}
     ?>
    <center>
<div id="contain">
    <div id="header"><center><div id= "pagetype">Avian Crux</div></center></div>
    <div id="menu" class="welcome">Update Customer Purchase List</div>
    <hr class="lining">
    <div id="menu" >
        <div id="firstconn"><a href="AvianCruxManagerHome.php" class="deco">Manager Menu</a></div>
        <div class="lastconn"><a href="ManagerCompletedCustomerPurchaseList.php" class="deco"> Move to 'Completed<br>Customer List'    </a></div>


        

    </div>
    <div style="height:60px;"></div>
    <table class="choosable">
<tr class="choosable">
<td class="choosable">ID</td>
<td class="choosable">Email</td>
<td class="choosable">Product<br>ID</td>
<td class="choosable">Product<br>Name</td>
<td class="choosable">Product<br>Quantity</td>
<td class="choosable">Current<br>Status</td>
<td class="choosable">Purchase<br>Date</td>
<td class="choosable"><font color="red"><b>Add to<br>Task</b></font></td>
</tr>
<?php
$sqlquery11= "Select customerpurchaselist.* , productlist.ProductName From customerpurchaselist LEFT JOIN productlist ON customerpurchaselist.ProductID = productlist.ProductID WHERE customerpurchaselist.Status = 'Uncomplete'";
$result11 = mysqli_query($conn, $sqlquery11);
$resultcheck11 = mysqli_num_rows($result11) ;
if ($resultcheck11 > 0){
    while($row = mysqli_fetch_assoc($result11)){ 


?>
<tr class="choosable">
<td class="choosable"><?php
echo $row['PurchaseID'];
?></td>
<td class="choosable"><?php echo $row['UserEmail']; ?></td>
<td class="choosable"><?php echo $row['ProductID']; ?></td>
<td class="choosable"><?php echo $row['ProductName']; ?></td>
<td class="choosable"><?php echo $row['Quantity']; ?></td>
<td class="choosable"><?php echo $row['Status']; ?></td>
<td class="choosable"><?php echo $row['PurchaseDate']; ?></td>
<td class="choosable"><a href="ManagerCustomerPurchaseList.php?PurchaseID=<?php echo $row['PurchaseID']; ?>" class="linkform">Yes</a></td>
</tr>






<?php }
   }
    ?>
</table>
    <div style="height:60px;"></div>
    <hr class="lining">

</center>
</body>