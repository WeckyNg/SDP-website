<?php session_start();
include_once 'connection.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Product List</title>
    <link href="allin1css.css" rel="stylesheet"  type="text/css"/>
    
</head>

<body>
    <?php
    $UpdatePermission = $_SESSION['UpdateProduct'];
    if($UpdatePermission >= 1){
    if(isset($_POST['ProductID'])){
        $ProductID = $_POST['ProductID'];


        $sqlquery10= "Select * From productlist Where ProductID = '$ProductID'";
        $result10 = mysqli_query($conn, $sqlquery10);
        $resultcheck10 = mysqli_num_rows($result10) ;
        
        $UserEmail = $_SESSION['useremail'];
            $OProductlist = mysqli_fetch_assoc($result10) ;
        $ProductName = $OProductlist['ProductName'];
        $ProductDescription = $OProductlist['ProductDescription'];
        $ProductCategory = $OProductlist['ProductCategory'];
        $ProductStock = $OProductlist['ProductStock'];
        $ProductCost = $OProductlist['ProductCost'];
        $ProductPrice = $OProductlist['ProductPrice'];
        $ProductPicture = $OProductlist['ProductPicture'];
        $todaydate = date("Y-m-d");
        if(isset($_POST['UpdateComments'])){
            $UpdateComments = $_POST['UpdateComments'];
        
            }else{
                $UpdateComments = "No Comments";
            }
         if(isset($_FILES['ProductPicture'])){
            $PError = false;
            $extenPass = array('jpg','gif','png','jpeg');
            $fileExtends = explode('.',$_FILES['ProductPicture']['name']);
            $fileExtends = end($fileExtends);
            if(!in_array($fileExtends, $extenPass)){
                $PError = true;
                
            }
            if($_FILES['ProductPicture']['error']== 0){
                if($PError){
                    echo '<script>alert("Wrong Image format!!! Not Acceptable")</script>';
                }else{
                    $deletePic = $ProductPicture;
                    unlink('image/products/'.$deletePic);
             move_uploaded_file($_FILES['ProductPicture']['tmp_name'],'image/products/'.$_FILES['ProductPicture']['name']);

             $newProductPicture = $_FILES['ProductPicture']['name'];
                    $sqlqueryInsertUpdate= "INSERT INTO `updatelist` ( `UserEmail`, `UpdateType`, `UpdateDate`, `UpdatedListName`, `UpdatedListColumn`, `StatusBeforeUpdate`, `StatusAfterUpdate`, `UpdateComments`) VALUES 
                    ('$UserEmail', 'Update Product', '$todaydate' , 'ProductList', 'ProductPicture', '$ProductPicture', '$newProductPicture', '$UpdateComments');";
            mysqli_query($conn, $sqlqueryInsertUpdate);
    
            }
            }else{
                echo '<script>alert("No Picture Uploaded.")</script>'; 
                $newProductPicture = $ProductPicture;
            }
            
        
        }else{
            $newProductPicture = $ProductPicture;
        }
        
        


        if(isset($_POST['ProductStock'])){

            $newProductStock = $_POST['ProductStock'];
            if($newProductStock != $ProductStock){
                $sqlqueryInsertUpdate= "INSERT INTO `updatelist` ( `UserEmail`, `UpdateType`, `UpdateDate`, `UpdatedListName`, `UpdatedListColumn`, `StatusBeforeUpdate`, `StatusAfterUpdate`, `UpdateComments`) VALUES 
                ('$UserEmail', 'Update Product', '$todaydate' , 'ProductList', 'ProductStock', '$ProductStock', '$newProductStock', '$UpdateComments');";
        mysqli_query($conn, $sqlqueryInsertUpdate);


            }
    
        }else{
            $newProductStock = $ProductStock;
        }
        if(isset($_POST['ProductCategory'])){
        $newProductCategory = $_POST['ProductCategory'];
        if($newProductCategory != $ProductCategory){
            $sqlqueryInsertUpdate= "INSERT INTO `updatelist` ( `UserEmail`, `UpdateType`, `UpdateDate`, `UpdatedListName`, `UpdatedListColumn`, `StatusBeforeUpdate`, `StatusAfterUpdate`, `UpdateComments`) VALUES 
            ('$UserEmail', 'Update Product', '$todaydate' , 'ProductList', 'ProductCategory', '$ProductCategory', '$newProductCategory', '$UpdateComments');";
    mysqli_query($conn, $sqlqueryInsertUpdate);


        }
        }else{
            $newProductCategory = $ProductCategory;
        }
        if(isset($_POST['ProductDescription'])){
            $newProductDescription = $_POST['ProductDescription'];
            if($newProductDescription != $ProductDescription){
                $sqlqueryInsertUpdate= "INSERT INTO `updatelist` ( `UserEmail`, `UpdateType`, `UpdateDate`, `UpdatedListName`, `UpdatedListColumn`, `StatusBeforeUpdate`, `StatusAfterUpdate`, `UpdateComments`) VALUES 
                ('$UserEmail', 'Update Product', '$todaydate' , 'ProductList', 'ProductDescription', '$ProductDescription', '$newProductDescription', '$UpdateComments');";
        mysqli_query($conn, $sqlqueryInsertUpdate);
            }
        }else{
            $newProductDescription = $ProductDescription;
        }
        if(isset($_POST['ProductName'])){
            $newProductName = $_POST['ProductName'];
            if($newProductName != $ProductName){
                $sqlqueryInsertUpdate= "INSERT INTO `updatelist` ( `UserEmail`, `UpdateType`, `UpdateDate`, `UpdatedListName`, `UpdatedListColumn`, `StatusBeforeUpdate`, `StatusAfterUpdate`, `UpdateComments`) VALUES 
                ('$UserEmail', 'Update Product', '$todaydate' , 'ProductList', 'ProductName', '$ProductName', '$newProductName', '$UpdateComments');";
        mysqli_query($conn, $sqlqueryInsertUpdate);
            }
        }else{
            $newProductName = $ProductName;
        }
            if(isset($_POST['ProductCost'])){
                $newProductCost = $_POST['ProductCost'];
                if($newProductCost != $ProductCost){
                    $sqlqueryInsertUpdate= "INSERT INTO `updatelist` ( `UserEmail`, `UpdateType`, `UpdateDate`, `UpdatedListName`, `UpdatedListColumn`, `StatusBeforeUpdate`, `StatusAfterUpdate`, `UpdateComments`) VALUES 
                    ('$UserEmail', 'Update Product', '$todaydate' , 'ProductList', 'ProductCost', '$ProductCost', '$newProductCost', '$UpdateComments');";
            mysqli_query($conn, $sqlqueryInsertUpdate);
              
                }
            }else{
                $newProductCost = $ProductCost;
            }
        
                if(isset($_POST['ProductPrice'])){
                    $newProductPrice = $_POST['ProductPrice'];
                    if($newProductPrice != $ProductPrice){
                        $sqlqueryInsertUpdate= "INSERT INTO `updatelist` ( `UserEmail`, `UpdateType`, `UpdateDate`, `UpdatedListName`, `UpdatedListColumn`, `StatusBeforeUpdate`, `StatusAfterUpdate`, `UpdateComments`) VALUES 
                        ('$UserEmail', 'Update Product', '$todaydate' , 'ProductList', 'ProductPrice', '$ProductPrice', '$newProductPrice', '$UpdateComments');";
                mysqli_query($conn, $sqlqueryInsertUpdate);
                  
                    }
                    }
                    else{
                        $newPrice = $ProductPrice;
                    }
                    $sqlUpdateQuery = "UPDATE `productlist` SET
                     `ProductName` = '$newProductName', 
                     `ProductDescription` = '$newProductDescription', 
                     `ProductCategory` = '$newProductCategory', 
                     `ProductStock` = '$newProductStock', 
                     `ProductCost` = '$newProductCost', 
                     `ProductPrice` = '$newProductPrice',
                      `ProductPicture` = '$newProductPicture' 
                      WHERE `productlist`.`ProductID` = '$ProductID';" ;
                    
                    mysqli_query($conn, $sqlUpdateQuery);
                    
                    
        
    }
        
   }else{ header("Location: AvianCruxManagerHome.php?ErrorText=NoPermission");
                   
    

}
     ?>
    <center>
<div id="contain">
    <div id="header"><center><div id= "pagetype">Avian Crux</div></center></div>
    <div id="menu" class="welcome">Product Update (Click on the ID to Update)</div>
    <hr class="lining">
    <div id="menu" >
        <div id="firstconn"><a href="AvianCruxManagerHome.php" class="deco">Manager Menu</a></div>
        <div class="lastconn"><a href="ManagerDeleteProductList.php" class="deco">   &nbsp;  Delete  &nbsp;   </a></div>
        <div class="secondlastconn"><a href="ManagerAddProductListForm.php" class="deco">  &nbsp;&nbsp;&nbsp;  Add  &nbsp;&nbsp;&nbsp;  </a></div>

        

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
<td class="choosable"><a href="ManagerUpdateProductListForm.php?ProductID=<?php echo $row['ProductID']; ?>" class="linkform"><?php
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