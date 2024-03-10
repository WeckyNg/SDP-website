<?php session_start();
include_once 'connection.php';
$UserType = $_SESSION['usertype'];
if($UserType == "Manager"){
}else{

    header("Location: Login.php");

}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product Page</title>
    <link href="allin1css.css" rel="stylesheet"  type="text/css"/>
    
</head>

<body>
    <?php
    $UpdatePermission = $_SESSION['UpdateProduct'];
    if($UpdatePermission >= 1){
        $todaydate = date("Y-m-d");
        $UserEmail = $_SESSION['useremail'];
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

         move_uploaded_file($_FILES['ProductPicture']['tmp_name'],'image/products/'.$_FILES['ProductPicture']['name']);

         $ProductPicture = $_FILES['ProductPicture']['name'];
                $sqlqueryInsert= "INSERT INTO `updatelist` ( `UserEmail`, `UpdateType`, `UpdateDate`, `UpdatedListName`, `UpdatedListColumn`, `StatusBeforeUpdate`, `StatusAfterUpdate`, `UpdateComments`) VALUES 
                ('$UserEmail', 'Add new Product', '$todaydate' , 'ProductList', 'ProductPicture', NULL, '$ProductPicture', '$UpdateComments');";
        mysqli_query($conn, $sqlqueryInsert);

        }
        }else{
            echo '<script>alert("Failed to add Product, missing Picture.")</script>'; 
        }
        $ProductID = $_POST['ProductID'];
        if(isset($_POST['ProductStock'])){

            $ProductStock = $_POST['ProductStock'];
            
                $sqlqueryInsertUpdate= "INSERT INTO `updatelist` ( `UserEmail`, `UpdateType`, `UpdateDate`, `UpdatedListName`, `UpdatedListColumn`, `StatusBeforeUpdate`, `StatusAfterUpdate`, `UpdateComments`) VALUES 
                ('$UserEmail', 'Add new Product', '$todaydate' , 'ProductList', 'ProductStock', Null, '$ProductStock', '$UpdateComments');";
        mysqli_query($conn, $sqlqueryInsertUpdate);


            
    
        }
        
        if(isset($_POST['ProductCategory'])){
        $ProductCategory = $_POST['ProductCategory'];

            $sqlqueryInsertUpdate= "INSERT INTO `updatelist` ( `UserEmail`, `UpdateType`, `UpdateDate`, `UpdatedListName`, `UpdatedListColumn`, `StatusBeforeUpdate`, `StatusAfterUpdate`, `UpdateComments`) VALUES 
            ('$UserEmail', 'Add new Product', '$todaydate' , 'ProductList', 'ProductCategory', Null, '$ProductCategory', '$UpdateComments');";
    mysqli_query($conn, $sqlqueryInsertUpdate);


        }
        
        if(isset($_POST['ProductDescription'])){
            $ProductDescription = $_POST['ProductDescription'];
                $sqlqueryInsertUpdate= "INSERT INTO `updatelist` ( `UserEmail`, `UpdateType`, `UpdateDate`, `UpdatedListName`, `UpdatedListColumn`, `StatusBeforeUpdate`, `StatusAfterUpdate`, `UpdateComments`) VALUES 
                ('$UserEmail', 'Add new Product', '$todaydate' , 'ProductList', 'ProductDescription', Null, '$ProductDescription', '$UpdateComments');";
        mysqli_query($conn, $sqlqueryInsertUpdate);
            }

        if(isset($_POST['ProductName'])){
            $ProductName = $_POST['ProductName'];

                $sqlqueryInsertUpdate= "INSERT INTO `updatelist` ( `UserEmail`, `UpdateType`, `UpdateDate`, `UpdatedListName`, `UpdatedListColumn`, `StatusBeforeUpdate`, `StatusAfterUpdate`, `UpdateComments`) VALUES 
                ('$UserEmail', 'Add new Product', '$todaydate' , 'ProductList', 'ProductName', Null, '$ProductName', '$UpdateComments');";
        mysqli_query($conn, $sqlqueryInsertUpdate);
            }

            if(isset($_POST['ProductCost'])){
                $ProductCost = $_POST['ProductCost'];
 
                    $sqlqueryInsertUpdate= "INSERT INTO `updatelist` ( `UserEmail`, `UpdateType`, `UpdateDate`, `UpdatedListName`, `UpdatedListColumn`, `StatusBeforeUpdate`, `StatusAfterUpdate`, `UpdateComments`) VALUES 
                    ('$UserEmail', 'Add new Product', '$todaydate' , 'ProductList', 'ProductCost', Null, '$ProductCost', '$UpdateComments');";
            mysqli_query($conn, $sqlqueryInsertUpdate);
              
                }

        
                if(isset($_POST['ProductPrice'])){
                    $ProductPrice = $_POST['ProductPrice'];
                        $sqlqueryInsertUpdate= "INSERT INTO `updatelist` ( `UserEmail`, `UpdateType`, `UpdateDate`, `UpdatedListName`, `UpdatedListColumn`, `StatusBeforeUpdate`, `StatusAfterUpdate`, `UpdateComments`) VALUES 
                        ('$UserEmail', 'Add new Product', '$todaydate' , 'ProductList', 'ProductPrice', Null, '$ProductPrice', '$UpdateComments');";
                mysqli_query($conn, $sqlqueryInsertUpdate);
                  
                    }

                    $sqlUpdateQuery = "INSERT INTO `productlist` ( `ProductName`, `ProductDescription`, `ProductCategory`, `ProductStock`, `ProductCost`, `ProductPrice`, `ProductPicture`) VALUES 
                    ('$ProductName', '$ProductDescription', '$ProductCategory', '$ProductStock', '$ProductCost', '$ProductPrice', '$ProductPicture');" ;
                    
                    mysqli_query($conn, $sqlUpdateQuery);
                    header("Location: AvianCruxManagerHome.php");
    
    }
    
    
}else{header("Location: AvianCruxManagerHome.php?ErrorText=NoPermission");}

    ?>
    <center>
<div id="contain">
    <div id="header"><center><div id= "pagetype">Avian Crux</div></center></div>
    <div id="menu" class="welcome">Add Product</div>
    <hr class="lining">
    <div id="menu" >
    <div id="firstconn"><a href="AvianCruxManagerHome.php" class="deco">Manager Menu</a></div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <form action="ManagerAddProductListForm.php" method="POST" enctype ="multipart/form-data">
<table id="AddProductform">
<tr>
    <td><label class="formlabel" for="ProductName">Product Name:</label></td>
    <td><input class="forminput" type="text" name="ProductName" required></input></td>
</tr><tr>
    <td><label class="formlabel" for="ProductStock">Stock:</label></td>
    <td><input class="forminput" type="number" name="ProductStock" required></input></td>
</tr><tr>
    <td><label class="formlabel" for="ProductCategory">Category:</label></td>
    <td><input class="forminput" type="text" name="ProductCategory" required></input></td>
</tr><tr>
    <td><label class="formlabel" for="ProductDescription">Description:</label></td>
    <td><textarea id="longimput" class="forminput" name="ProductDescription" row="5" required></textarea></td>
</tr><tr>
    <td><label class="formlabel" for="ProductCost">Cost(Per unit):</label></td>
    <td><input class="forminput" type="text" name="ProductCost" required></input></td>
</tr><tr>
    <td><label class="formlabel" for="ProductPrice">Price(Per unit):</label></td>
    <td><input class="forminput" type="text" name="ProductPrice" required></input></td>
</tr><tr>
    <td><label class="formlabel" for="ProductPicture">Product Picture:</label></td>
    <td><div id ="imagePre"><img src="" id="imagePreIT" name="ProductPicture"></div></td>
</tr><tr>
    <td></td>
    <td><input type="file" name ="ProductPicture" id="formbuttonPic" class ="hidden" accept="image/*"><label for="formbuttonPic" class = "formpicbutton">Upload Picture<br>From Device</label></textarea></td>
</tr><tr>
    <td><label class="formlabel" for="UpdateComments">Personal Comments:</label></td>
    <td><input class="forminput" type="text" name="UpdateComments" required></input></td>
</tr><tr>
<td></td><td><input type="submit" name="Add Product" value="Confirm" class="formbutton"><a href="AvianCruxManagerHome.php" class="formbutton">Cancel</a></input>
</td>
</tr>
</table>
</form>
    <div style="height:90px;"></div>
    <hr class="lining">

</center>
<script>
const formbuttonPic = document.getElementById("formbuttonPic");
const imagePre = document.getElementById("imagePre");
const previewImage = imagePre.querySelector("#imagePreIT");
formbuttonPic.addEventListener("change",function(){
const file = this.files[0];
console.log(file);

if(file){
const reader = new FileReader();
previewImage.style.display ="block";
reader.addEventListener("load",function(){
previewImage.setAttribute("src",this.result);

});
reader.readAsDataURL(file);
}
});
</script>
</body>