<?php 
    session_start();
    include('../config/db_connect.php');
    include('../config/functions.php');
    if(!isset($_SESSION['admin'])){
        header("Location: ./login.php"); 
    }

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $update_epin_status = "UPDATE withdrawal SET withdraw_status = 'Success' WHERE id = '$id'";
        $update_res = mysqli_query($conn, $update_epin_status); 
        if($update_res){
            echo "<script>alert('Withdrawal Request approved')</script>";
            // echo "<script>window.location('./index.php')</script>";
            header("Location: ./withdrawal.php");
        }else {
            echo "<script>alert('Something went wrong')</script>";
            // header("Location: ./index.php");
        }
    }


?>