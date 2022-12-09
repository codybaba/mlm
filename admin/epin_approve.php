<?php 
    session_start();
    include('../config/db_connect.php');
    include('../config/functions.php');
    if(!isset($_SESSION['admin'])){
        header("Location: ./login.php"); 
    }

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $user_id = $_GET['user_id'];
        $epin = uniqid();
        $update_epin_status = "UPDATE epin SET status = 'Approved', e_pin = '$epin' WHERE id = '$id'";
        $update_res = mysqli_query($conn, $update_epin_status); 
        if($update_res){
            

            //referral income generated for first level
            $user_query = "SELECT * FROM user WHERE id = '$user_id'";
            $user_res = mysqli_query($conn, $user_query);
            $user_row = mysqli_fetch_assoc($user_res);
            // $ref_id = $user_row['ref_id'];
            $sponser_id = $user_row['sponser_id'];
            if ($sponser_id != null){
                $sql = "SELECT * FROM user WHERE ref_id = '$sponser_id'";
                $res = mysqli_query($conn, $sql);
                $data = mysqli_fetch_assoc($res);
    
                $parent_user_id = $data['id'];
                $ref_id = $data['ref_id'];
                $ref_income = $data['ref_income'];
                // $level_income = $data['level_income'];
                $sponser_id_level1 = $data['sponser_id'];
                // echo $parent_user_id;
                // echo $ref_id;
                
                // //level 1
                // $sql_level1 = "SELECT * FROM user WHERE ref_id = '$sponser_id_level1'";
                // $res_level1 = mysqli_query($conn, $sql_level1);
                // $data_level1 = mysqli_fetch_assoc($res_level1);
                // $level1_user_id = $data_level1['id'];
                // $level_income = $data_level1['level_income'];
                
                referral_income_generated($parent_user_id, $ref_id, $ref_income);
                echo "<br>";
                echo "Refer income generate ends<br>";
                echo "<br>";
                echo "<br>";
                //level 1
                level2_income($ref_id, $sponser_id_level1);
                level3_income($ref_id, $sponser_id_level1);
                level4_income($ref_id, $sponser_id_level1);
                level5_income($ref_id, $sponser_id_level1);
                level6_income($ref_id, $sponser_id_level1);
                level7_income($ref_id, $sponser_id_level1);
                level8_income($ref_id, $sponser_id_level1);
                level9_income($ref_id, $sponser_id_level1);
                level10_income($ref_id, $sponser_id_level1);
            }

            echo "<script>alert('E-Pin Approved')</script>";
            // echo "<script>window.location('./index.php')</script>";
            header("Location: ./epin_approval.php");
        }else {
            echo "<script>alert('Something went wrong')</script>";
            // header("Location: ./index.php");
        }
    }


?>