<?php session_start();
include_once 'connection.php';

if(isset($_SESSION['usertype'])){
if($_SESSION['usertype']=="Customer"){

    header("Location: Home.php");

}
if($_SESSION['usertype']=="Admin"){

    header("Location: AvianCruxAdminHome.php");
    
}
if($_SESSION['usertype']=="Manager"){

    header("Location: AvianCruxManagerHome.php");
    
}


}else{
    header("Location: Home.php");
}








?>