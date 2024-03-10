
<?php session_start();
include_once 'connection.php';?>
<?php
     if(isset($_POST['UserEmail'])){
        $UserEmail = $_POST['UserEmail'];
        if($UserEmail == "Guest"){
            header("Location: Register.php?ErrorText=EmailExist");
        }
        $sqlquery10= "Select * From user Where UserEmail = '$UserEmail';";
        $result10 = mysqli_query($conn, $sqlquery10);
        
        if (mysqli_num_rows($result10) > 0 ){
            header("Location: Register.php?ErrorText=EmailExist");
        }

        $UserFullName = $_POST['UserFullName'];
        $UserCardNum = $_POST['UserCardNum'];
        $UserCardExpiredDate = $_POST['UserCardExpiredDate'];
        
        $UserPassword = $_POST['UserPassword'];
        $UserAddress = $_POST['UserAddress'];
        $UserCardSerial = $_POST['UserCardSerial'];
        $sqlqueryRegister = "INSERT INTO `user` (`UserEmail`, `UserFullName`, `UserPassword`, `UserType`, `UserAddress`, `UserCardNum`, `UserCardSerial`, `UserCardExpiredDate`) 
        VALUES ('$UserEmail', '$UserFullName', '$UserPassword', 'Customer', '$UserAddress', '$UserCardNum', '$UserCardSerial', '$UserCardExpiredDate');";
        mysqli_query($conn, $sqlqueryRegister);
        $sqlqueryRegisterFeedback = "INSERT INTO feedbacklist (UserEmail) VALUES ('$UserEmail')";
        mysqli_query($conn, $sqlqueryRegisterFeedback);
        $sqlquery= "Select * From user Where UserEmail = '$UserEmail' AND UserPassword = '$UserPassword'";
        $result = mysqli_query($conn, $sqlquery);
        $resultcheck = mysqli_num_rows($result) ;
        if ($resultcheck == 1){
            $checklogin = mysqli_fetch_assoc($result) ;
                $_SESSION['userfullname']=$checklogin['UserFullName'];
                $_SESSION['useremail']=$checklogin['UserEmail'];

                    $_SESSION['usertype']= "Customer"; 
                    header("Location: productlist.php");

            
        }else{
            header("Location: Register.php?ErrorText=EmailExist");
        }}else{
        header("Location: Register.php");
    }

?>