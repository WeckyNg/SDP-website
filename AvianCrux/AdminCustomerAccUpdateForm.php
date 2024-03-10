<?php session_start();
include_once 'connection.php';
$UserType = $_SESSION['usertype'];
if($UserType == "Admin"){
$UserEmail = $_GET['UserEmail'];
$sqlquery= "Select UserEmail,UserPassword From user Where UserEmail = '$UserEmail' ";
        $result = mysqli_query($conn, $sqlquery);
        $UserBasicInfo = mysqli_fetch_assoc($result) ;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Change Customer info Form Page</title>
    <link href="allin1css.css" rel="stylesheet"  type="text/css"/>
    
</head>

<body>
    <center>
<div id="contain">
    <div id="header"><center><div id= "pagetype">Avian Crux</div></center></div>
    <div id="menu" class="welcome">True Admin Customer Account Update</div>
    <hr class="lining">
    <div id="menu" >
        <div id="firstconn"><a href="AdminCustomerAccUpdate.php" class="deco">Return to Customer List<br>Without Changes</a></div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <form id="UpdateForm" action="AdminCustomerAccUpdate.php" method="POST" >
<table id="UpdateProductform">
<tr>
    <td><label class="formlabel" for="UserEmail">Customer Email:</label></td>
    <td><input id="disablednum"  class="forminput" type="text" name="UserEmail" value="<?php echo $UserBasicInfo['UserEmail'] ?>"></input></td>
</tr><tr>
    <td><label class="formlabel" for="UserPassword">Password:</label></td>
    <td><input class="forminput" type="text" name="UserPassword" value = "<?php echo $UserBasicInfo['UserPassword'] ?>"></input></td>
</tr><tr>
<td><input type="hidden" name="OriginalEmail" value="<?php echo $UserBasicInfo['UserEmail'] ?>"></td><td><input type="submit" name="Update Customer Info" value="Confirm Change" class="formbutton"></input>
</td>
</tr>
</table>
</form>
    <div style="height:90px;"></div>
    <hr class="lining">

</center>

</body>
<?php
}else{
    header("Location: Login.php");
}



?>