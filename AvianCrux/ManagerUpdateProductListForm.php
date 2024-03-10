<?php session_start();
include_once 'connection.php';
$UserType = $_SESSION['usertype'];
if($UserType == "Manager"){
}else{

    header("Location: Login.php");

}
if(isset($_GET['ProductID'])){
$ProductID=$_GET['ProductID'];
$sqlquery5= "Select * From productlist WHERE ProductID = $ProductID";
$result5 = mysqli_query($conn, $sqlquery5);
$resultcheck5 = mysqli_num_rows($result5) ;
if ($resultcheck5 == 1){
    $row = mysqli_fetch_assoc($result5);
    $ProductName = $row['ProductName'];
    $ProductStock = $row['ProductStock'];
    $ProductCategory = $row['ProductCategory'];
    $ProductDescription = $row['ProductDescription'];
    $ProductPicture = $row['ProductPicture'];
    $ProductCost = $row['ProductCost'];
    $ProductPrice = $row['ProductPrice'];
}}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manager Add product Form Page</title>
    <link href="allin1css.css" rel="stylesheet"  type="text/css"/>
    
</head>

<body>
    <center>
<div id="contain">
    <div id="header"><center><div id= "pagetype">Avian Crux</div></center></div>
    <div id="menu" class="welcome">Update Product</div>
    <hr class="lining">
    <div id="menu" >
        <div id="firstconn"><a href="ManagerUpdateProductList.php" class="deco">Product Update List</a></div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <form id="UpdateForm" action="ManagerUpdateProductList.php" method="POST" enctype ="multipart/form-data">
<table id="UpdateProductform">
<tr>
    <td><label class="formlabel" for="ProductID">Product ID:</label></td>
    <td><input id="disablednum" class="forminput" type="number" name="ProductID" value="<?php echo $ProductID ?>"></input></td>
</tr><tr>
    <td><label class="formlabel" for="ProductName">Product Name:</label></td>
    <td><input class="forminput" type="text" name="ProductName" value="<?php echo $ProductName; ?>"></input></td>
</tr><tr>
    <td><label class="formlabel" for="ProductStock">Stock:</label></td>
    <td><input class="forminput" type="number" name="ProductStock" value="<?php echo $ProductStock; ?>"></input></td>
</tr><tr>
    <td><label class="formlabel" for="ProductCategory">Category:</label></td>
    <td><input class="forminput" type="text" name="ProductCategory" value="<?php echo $ProductCategory; ?>"></input></td>
</tr><tr>
    <td><label class="formlabel" for="ProductDescription">Description:</label></td>
    <td><textarea id="longimput" class="forminput" name="ProductDescription" row="5" ><?php echo $ProductDescription; ?></textarea></td>
</tr><tr>
    <td><label class="formlabel" for="ProductCost">Cost(Per unit):</label></td>
    <td><input class="forminput" type="text" name="ProductCost" value="<?php echo $ProductCost ?>"></input></td>
</tr><tr>
    <td><label class="formlabel" for="ProductPrice">Price(Per unit):</label></td>
    <td><input class="forminput" type="text" name="ProductPrice" value="<?php echo $ProductPrice ?>"></input></td>
</tr><tr>
    <td><label class="formlabel" for="ProductPicture">Product Picture:</label></td>
    <td><div id ="imagePre"><img src="image/products/<?php echo $ProductPicture; ?>" id="imagePreIT" name="ProductPicture"></div></td>
</tr><tr>
    <td></td>
    <td><input type="file" name ="ProductPicture" id="formbuttonPic" class ="hidden" accept="image/*"><label for="formbuttonPic" class = "formpicbutton">Upload Picture<br>From Device</label></textarea></td>
</tr><tr>
    <td><label class="formlabel" for="UpdateComments">Personal Comments:</label></td>
    <td><input class="forminput" type="text" name="UpdateComments" required></input></td>
</tr><tr>
<td></td><td><input type="submit" name="Update Product" value="Confirm" class="formbutton"><a href="ManagerUpdateProductList.php" class="formbutton">Cancel</a></input>
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