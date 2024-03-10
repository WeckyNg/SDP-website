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
    <title>Admin Customer Acc Update Page</title>
    <link href="allin1css.css" rel="stylesheet"  type="text/css"/>
    
</head>

<body>
<?php 

if(isset($_GET['FeedbackID'])){

    if(isset($_GET["Reply"])){
        $Reply = $_REQUEST["Reply"];
    $TargetFeedbackID = $_GET['FeedbackID'];
$updateReplysql = "UPDATE `feedbacklist` SET `FeedbackReply` = '$Reply' WHERE FeedbackID = $TargetFeedbackID;";
mysqli_query($conn, $updateReplysql);

}else{
    echo '<script>
    function GETReplyMessage() {
      let Reply;
      let ReplyInput = prompt("Enter your Reply Message:", "");
      if (ReplyInput == null || ReplyInput == "") {
        Reply = null ;
      } else {
        Reply = ReplyInput ;
        location.replace(window.location.href+"&Reply="+Reply);
      }
    }
    GETReplyMessage();
    </script>';
}
}

?>
    <center>
<div id="contain">
    <div id="header"><center><div id= "pagetype">Avian Crux</div></center></div>
    <div id="menu" class="welcome">View Customer Feedback</div>
    <hr class="lining">
    <div id="menu" >
        <div id="firstconn"><a href="AvianCruxAdminHome.php" class="deco">Admin Menu</a></div>


        
        

    </div>
    <div style="height:60px;"></div>
    <table class="choosable">
<tr class="choosable">
<td class="choosable">ID</td>
<td class="choosable">Email</td>
<td class="choosable">Feedback</td>
<td class="choosable"><font color="red"><b>Reply</b></font></td>
</tr>


    <?php 
    
    $sqlquery= "Select * From feedbacklist Where FeedbackContent IS NOT NULL ORDER BY (CASE WHEN FeedbackReply IS NULL THEN 1 ELSE 0 END) DESC, FeedbackID DESC";
    $result = mysqli_query($conn, $sqlquery);
    $resultcheck = mysqli_num_rows($result) ;
    if ($resultcheck >0){
        while($row = mysqli_fetch_assoc($result)){ 

            if(isset($row['FeedbackReply'])){
                    $FeedbackReply = $row['FeedbackReply'];
                }else{
                    $FeedbackReply = "Pending Reply";
                    }

            
            ?>
<tr class="choosable">
 <td class="choosable"> <?php echo $row['FeedbackID']; ?></td>
 <td class="choosable"> <?php echo $row['UserEmail']; ?></td>
 <td class="choosable"> <?php echo $row['FeedbackContent']; ?></td>
 <td class="choosable"> <a href="AdminFeedback.php?FeedbackID=<?php echo $row['FeedbackID']; ?>" class="linkform"><?php echo $FeedbackReply; ?></a></td>
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