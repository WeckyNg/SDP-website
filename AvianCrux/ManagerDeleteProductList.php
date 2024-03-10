<?php session_start();
include_once 'connection.php';
$UserType = $_SESSION['usertype'];
if($UserType == "Manager"){
}else{

    header("Location: Login.php");

}?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Product from List</title>
    <link href="allin1css.css" rel="stylesheet"  type="text/css"/>
    
</head>

<body>
    <?php
    $UpdatePermission = $_SESSION['UpdateProduct'];
    if($UpdatePermission >= 1){
    if(isset($_GET['ProductID'])){

        if(isset($_GET['UpdateComments'])){
            $UserEmail = $_SESSION['useremail'];
            $ProductID = $_GET['ProductID'];
            $sqlquery10= "Select * From productlist Where ProductID = '$ProductID'";
            $result10 = mysqli_query($conn, $sqlquery10);
            $resultcheck10 = mysqli_num_rows($result10) ;       
            $OProductlist = mysqli_fetch_assoc($result10) ;
            $ProductName = $OProductlist['ProductName'];
            $ProductDescription = $OProductlist['ProductDescription'];
            $ProductCategory = $OProductlist['ProductCategory'];
            $ProductStock = $OProductlist['ProductStock'];
            $ProductCost = $OProductlist['ProductCost'];
            $ProductPrice = $OProductlist['ProductPrice'];
            $ProductPicture = $OProductlist['ProductPicture'];
            $todaydate = date("Y-m-d");
            $UpdateComments = $_GET['UpdateComments'];
            $deletePic = $ProductPicture;
            unlink('image/products/'.$deletePic);
            $sqlqueryInsertUpdate= "INSERT INTO `updatelist` ( `UserEmail`, `UpdateType`, `UpdateDate`, `UpdatedListName`, `UpdatedListColumn`, `StatusBeforeUpdate`, `StatusAfterUpdate`, `UpdateComments`) VALUES 
            ('$UserEmail', 'Delete Product', '$todaydate' , 'ProductList', 'ProductPicture', '$ProductPicture', NULL, '$UpdateComments');";
    mysqli_query($conn, $sqlqueryInsertUpdate);


        $sqlqueryInsertUpdate= "INSERT INTO `updatelist` ( `UserEmail`, `UpdateType`, `UpdateDate`, `UpdatedListName`, `UpdatedListColumn`, `StatusBeforeUpdate`, `StatusAfterUpdate`, `UpdateComments`) VALUES 
        ('$UserEmail', 'Delete Product', '$todaydate' , 'ProductList', 'ProductStock', '$ProductStock', NULL, '$UpdateComments');";
mysqli_query($conn, $sqlqueryInsertUpdate);

    $sqlqueryInsertUpdate= "INSERT INTO `updatelist` ( `UserEmail`, `UpdateType`, `UpdateDate`, `UpdatedListName`, `UpdatedListColumn`, `StatusBeforeUpdate`, `StatusAfterUpdate`, `UpdateComments`) VALUES 
    ('$UserEmail', 'Delete Product', '$todaydate' , 'ProductList', 'ProductCategory', '$ProductCategory', NULL, '$UpdateComments');";
mysqli_query($conn, $sqlqueryInsertUpdate);

        $sqlqueryInsertUpdate= "INSERT INTO `updatelist` ( `UserEmail`, `UpdateType`, `UpdateDate`, `UpdatedListName`, `UpdatedListColumn`, `StatusBeforeUpdate`, `StatusAfterUpdate`, `UpdateComments`) VALUES 
        ('$UserEmail', 'Delete Product', '$todaydate' , 'ProductList', 'ProductDescription', '$ProductDescription', NULL, '$UpdateComments');";
mysqli_query($conn, $sqlqueryInsertUpdate);


    

        $sqlqueryInsertUpdate= "INSERT INTO `updatelist` ( `UserEmail`, `UpdateType`, `UpdateDate`, `UpdatedListName`, `UpdatedListColumn`, `StatusBeforeUpdate`, `StatusAfterUpdate`, `UpdateComments`) VALUES 
        ('$UserEmail', 'Delete Product', '$todaydate' , 'ProductList', 'ProductName', '$ProductName', NULL, '$UpdateComments');";
mysqli_query($conn, $sqlqueryInsertUpdate);


        

            $sqlqueryInsertUpdate= "INSERT INTO `updatelist` ( `UserEmail`, `UpdateType`, `UpdateDate`, `UpdatedListName`, `UpdatedListColumn`, `StatusBeforeUpdate`, `StatusAfterUpdate`, `UpdateComments`) VALUES 
            ('$UserEmail', 'Delete Product', '$todaydate' , 'ProductList', 'ProductCost', '$ProductCost', NULL, '$UpdateComments');";
    mysqli_query($conn, $sqlqueryInsertUpdate);
      



           

                $sqlqueryInsertUpdate= "INSERT INTO `updatelist` ( `UserEmail`, `UpdateType`, `UpdateDate`, `UpdatedListName`, `UpdatedListColumn`, `StatusBeforeUpdate`, `StatusAfterUpdate`, `UpdateComments`) VALUES 
                ('$UserEmail', 'Delete Product', '$todaydate' , 'ProductList', 'ProductPrice', '$ProductPrice', NULL, '$UpdateComments');";
        mysqli_query($conn, $sqlqueryInsertUpdate);

            $sqlUpdateQuery = "DELETE FROM `productlist`
              WHERE `productlist`.`ProductID` = '$ProductID';" ;
            
            mysqli_query($conn, $sqlUpdateQuery);





            }else{
                echo '<script>
                var UpComments;
    function GETReplyMessage() {
      
      let UpCommentsInput = prompt("Enter the reason of Deleting:", "");
      if (UpCommentsInput == null || UpCommentsInput == "") {
        UpComments = "No Comments" ;
      } else {
        UpComments = UpCommentsInput ;
        
      }
      location.replace(window.location.href+"&UpdateComments="+UpComments);
    }
    
    function DoubleConfirm() {
        
        let ConfirmMessage = prompt("Enter word CONFIRM to Confirm the delete:", "");
        if (ConfirmMessage == "CONFIRM") {
            GETReplyMessage();
        } else {
          alert("No Product Delete had been made");
          
        }
  
      }
      DoubleConfirm();
    </script>';
                
}
  
                    
                    
                
        
    }
        
   }else{ header("Location: AvianCruxManagerHome.php?ErrorText=NoPermission");
                   
    

}
     ?>
    <center>
<div id="contain">
    <div id="header"><center><div id= "pagetype">Avian Crux</div></center></div>
    <div id="menu" class="welcome">Product Delete (Click on the ID to Delete)</div>
    <hr class="lining">
    <div id="menu" >
        <div id="firstconn"><a href="AvianCruxManagerHome.php" class="deco">Manager Menu</a></div>
        <div class="lastconn"><a href="ManagerAddProductListForm.php" class="deco"> &nbsp;&nbsp;&nbsp;  Add  &nbsp;&nbsp;&nbsp;   </a></div>
        <div class="secondlastconn"><a href="ManagerUpdateProductList.php" class="deco">  &nbsp;&nbsp; Update &nbsp;&nbsp;  </a></div>

        

    </div>
    <div style="height:60px;"></div>
    <table class="choosable">
<tr class="choosable">
<td class="choosable"><font color="red"><b>ID</b></font></td>
<td class="choosable">Product Name</td>
<td class="choosable">Stock</td>
<td class="choosable">Description</td>
<td class="choosable">Picture</td>
<td class="choosable">Category</td>
<td class="choosable">Cost(Per unit)</td>
<td class="choosable">Price(Per unit)</td>
</tr>
<?php
$sqlquery11= "Select * From productlist";
$result11 = mysqli_query($conn, $sqlquery11);
$resultcheck11 = mysqli_num_rows($result11) ;
if ($resultcheck11 > 0){
    while($row = mysqli_fetch_assoc($result11)){ 


?>
<tr class="choosable">
<td class="choosable"><a href="ManagerDeleteProductList.php?ProductID=<?php echo $row['ProductID']; ?>" class="linkform"><?php
echo $row['ProductID'];
?></a></td>
<td class="choosable"><?php echo $row['ProductName']; ?></td>
<td class="choosable"><?php echo $row['ProductStock']; ?></td>
<td class="choosable"><?php echo $row['ProductDescription']; ?></td>
<td class="choosable"><img src="image/products/<?php  echo $row['ProductPicture']; ?>" class = "ListImage"></td>
<td class="choosable"><?php echo $row['ProductCategory']; ?></td>
<td class="choosable"><?php echo $row['ProductCost']; ?></td>
<td class="choosable"><?php echo $row['ProductPrice']; ?></td>
</tr>






<?php }
   }
    ?>
</table>
    <div style="height:60px;"></div>
    <hr class="lining">

</center>
</body>