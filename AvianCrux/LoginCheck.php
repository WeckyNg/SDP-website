
<?php session_start();
include_once 'connection.php';?>
<?php
     if(!empty($_POST['UserEmail'])){

        $UserEmail = $_POST['UserEmail'];
        $UserPassword = $_POST['UserPassword'];
        $sqlquery= "Select * From user Where UserEmail = '$UserEmail' AND UserPassword = '$UserPassword'";
        $result = mysqli_query($conn, $sqlquery);
        $resultcheck = mysqli_num_rows($result) ;
        if ($resultcheck == 1){
            $checklogin = mysqli_fetch_assoc($result) ;
                $_SESSION['userfullname']=$checklogin['UserFullName'];
                $_SESSION['useremail']=$checklogin['UserEmail'];
                if($checklogin['UserType']=="Admin"){
                    $_SESSION['UpdateProduct'] = 2;
                    $_SESSION['UpdatePurchaseList'] = 2;
                    $_SESSION['UpdateCompletedPurchaseList'] = 2;
                    $_SESSION['usertype']= "Admin";
                    header("Location: AvianCruxAdminHome.php");
                }elseif($checklogin['UserType']=="Manager"){

                    $_SESSION['usertype']= "Manager";
                    $sqlquery2= "Select * From managerpermission Where UserEmail = '$UserEmail'";
                    $result2 = mysqli_query($conn, $sqlquery2);
                    $resultcheck2 = mysqli_num_rows($result2) ;
                    $checkPermission = mysqli_fetch_assoc($result2) ;
                    $_SESSION['ManagerID'] =$checkPermission['ManagerID'];
                    $_SESSION['UpdateProduct'] = $checkPermission['UpdateProduct'];
                    $_SESSION['UpdatePurchaseList'] = $checkPermission['UpdatePurchaseList'];
                    $_SESSION['UpdateCompletedPurchaseList'] = $checkPermission['UpdateCompletedPurchaseList'];
                    header("Location: AvianCruxManagerHome.php");
                }else{
                    $_SESSION['UpdateProduct'] = 0;
                    $_SESSION['UpdatePurchaseList'] = 0;
                    $_SESSION['UpdateCompletedPurchaseList'] = 0;
                    $_SESSION['usertype']= "Customer"; 
                    header("Location: productlist.php");
                }
            
        }else{
            header("Location: Login.php");
            
        }}else{
        header("Location: Login.php");
    }

?>