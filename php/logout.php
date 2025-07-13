<?php
    session_start();
    if(isset($_SESSION['unique_id'])){
        include_once "config.php";
        $status = "Offline now";
        
        // Update status to offline
        $sql = mysqli_query($conn, "UPDATE users SET status = '{$status}' WHERE unique_id = {$_SESSION['unique_id']}");
        
        if($sql){
            session_unset();
            session_destroy();
            header("location: ../login.php");
        }
    }else{  
        header("location: ../login.php");
    }
?>
