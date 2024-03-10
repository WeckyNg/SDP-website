<?php session_start();
include_once 'connection.php';
$UserEmail = $_GET['UserEmail'];
$sqlquery= "Select UserEmail,UserPassword From user Where UserEmail = '$UserEmail' ";
        $result = mysqli_query($conn, $sqlquery);
        $resultcheck = mysqli_num_rows($result) ;
        $UserBasicInfo = mysqli_fetch_assoc($result) ;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Change Manager info Form Page</title>
    <link href="allin1css.css" rel="stylesheet"  type="text/css"/>
    
</head>

<body>
    <center>
<div id="contain">
    <div id="header"><center><div id= "pagetype">Avian Crux</div></center></div>
    <div id="menu" class="welcome">True Admin Manager Account Update</div>
    <hr class="lining">
    <div id="menu" >
        <div id="firstconn"><a href="AdminManagerAccUpdate.php" class="deco">Return to Manager List<br>Without Changes</a></div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <form id="UpdateForm" action="AdminManagerAccUpdate.php" method="POST" >
<table id="UpdateProductform">
<tr>
    <td><label class="formlabel" for="UserEmail">Manager Email:</label></td>
    <td><input id="disablednum" class="forminput" type="text" name="UserEmail" value="<?php echo $UserBasicInfo['UserEmail'] ?>"required></input></td>
</tr><tr>
    <td><label class="formlabel" for="UserPassword">Password:</label></td>
    <td><input class="forminput" type="text" name="UserPassword" value = "<?php echo $UserBasicInfo['UserPassword'] ?>" required></input></td>
</tr><tr>
<td></td><td><input type="submit" name="Update Manager Info" value="Confirm Change" class="formbutton"></input>
</td>
</tr>
</table>
</form>
    <div style="height:90px;"></div>
    <hr class="lining">

</center>

</body>