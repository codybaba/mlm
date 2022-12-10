<?php
include 'db_connect.php';


    function referral_income_generated($current_user_id, $ref_id, $ref_income){

        global $conn;

        $total_ref_income = 0;
        $ref_income_row = 0;

        //level 1
        $sql = "SELECT * FROM user WHERE sponser_id = '$ref_id'";
        $res = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_array($res)){
            // $name = $row['name'];
            // $email = $row['email'];
            // echo $name;
            // echo $email;
            // echo "<br>";
            // $ref_income = $row['ref_income'];
            $user_id = $row['id'];

            $q = "SELECT * FROM epin WHERE user_id = '$user_id' && status = 'Approved'";
            $r = mysqli_query($conn, $q);

            $epin_row = mysqli_fetch_all($r, MYSQLI_ASSOC);
            foreach($epin_row as $epin){
                $pack_amount = $epin['pack_amount'];
                $ref_income_row = ($pack_amount * 10) / 100;
                $total_ref_income= $total_ref_income + $ref_income_row;
                echo $ref_income_row;
                echo "<br>";
            }
        
        }
        echo "total refer income : " . $total_ref_income;
        // echo "<br>";
        $update_ref_income = "UPDATE user SET ref_income = '$total_ref_income', wallet = wallet + '$total_ref_income' WHERE id = '$current_user_id'";
        $update_res = mysqli_query($conn, $update_ref_income);
        // echo $ref_income;
        // $tot =  $ref_income + $total_ref_income;
        // echo "<br><br>";
        // echo $tot;

        if($update_res){
            // echo "success";
        }
    }

    function level2_income($ref_id, $sponser_id_level){
        global $conn;

        $level_income_row = 0;
        $total_level_income = 0;


        //level 2
        $sql = "SELECT * FROM user WHERE sponser_id = '$ref_id'";
        $res = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_array($res)){
            // $name = $row['name'];
            // $email = $row['email'];
            // echo $name;
            // echo $email;
            // echo "<br>";
            // $ref_income = $row['ref_income'];
            $user_id = $row['id'];

            $q = "SELECT * FROM epin WHERE user_id = '$user_id' && status = 'Approved'";
            $r = mysqli_query($conn, $q);

            $epin_row = mysqli_fetch_all($r, MYSQLI_ASSOC);
            foreach($epin_row as $epin){
                $pack_amount = $epin['pack_amount'];
                $level_income_row = ($pack_amount * 5) / 100;
                $total_level_income= $total_level_income + $level_income_row;
                echo $level_income_row;
                echo "<br>";
            }
        
        }


         // level 2
         $sql_level = "SELECT * FROM user WHERE ref_id = '$sponser_id_level'";
         $res_level = mysqli_query($conn, $sql_level);
         $data_level = mysqli_fetch_assoc($res_level);
         $level1_user_id = $data_level['id'];
        //  $level_income = $data_level1['level_income'];
        //  $ref_lev_id = $data_level1['ref_id'];


        echo "total level income : " . $total_level_income;
        // echo "<br>";
        $update_ref_income = "UPDATE user SET level_income = '$total_level_income', wallet = wallet + '$total_level_income' WHERE id = '$level1_user_id'";
        $update_res = mysqli_query($conn, $update_ref_income);

        if($update_res){
            // echo "success";
        }

    }



    function level3_income($ref_id, $sponser_id_level){
        global $conn;

        $level_income_row = 0;
        $total_level_income = 0;


        //level 3
        $sql = "SELECT * FROM user WHERE sponser_id = '$ref_id'";
        $res = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_array($res)){
            // $name = $row['name'];
            // $email = $row['email'];
            // echo $name;
            // echo $email;
            // echo "<br>";
            // $ref_income = $row['ref_income'];
            $user_id = $row['id'];

            $q = "SELECT * FROM epin WHERE user_id = '$user_id' && status = 'Approved'";
            $r = mysqli_query($conn, $q);

            $epin_row = mysqli_fetch_all($r, MYSQLI_ASSOC);
            foreach($epin_row as $epin){
                $pack_amount = $epin['pack_amount'];
                $level_income_row = ($pack_amount * 4) / 100;
                $total_level_income= $total_level_income + $level_income_row;
                echo $level_income_row;
                echo "<br>";
            }
        
        }


         // level 3
         $sql_level = "SELECT * FROM user WHERE ref_id = '$sponser_id_level'";
         $res_level = mysqli_query($conn, $sql_level);
         $data_level = mysqli_fetch_assoc($res_level);
         $sponser_id_level2 = $data_level['sponser_id'];

         //level 3
         $sql_level = "SELECT * FROM user WHERE ref_id = '$sponser_id_level2'";
         $res_level = mysqli_query($conn, $sql_level);
         $data_level = mysqli_fetch_assoc($res_level);
         $level3_user_id = $data_level['id'];
        //  $level_income = $data_level1['level_income'];
        //  $ref_lev_id = $data_level1['ref_id'];


        echo "total level income : " . $total_level_income;
        // echo "<br>";
        $update_ref_income = "UPDATE user SET level_income = level_income + '$total_level_income', wallet = wallet + '$total_level_income' WHERE id = '$level3_user_id'";
        $update_res = mysqli_query($conn, $update_ref_income);

        if($update_res){
            // echo "success";
        }

    }

    function level4_income($ref_id, $sponser_id_level){
        global $conn;

        $level_income_row = 0;
        $total_level_income = 0;


        //level 4
        $sql = "SELECT * FROM user WHERE sponser_id = '$ref_id'";
        $res = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_array($res)){
            // $name = $row['name'];
            // $email = $row['email'];
            // echo $name;
            // echo $email;
            // echo "<br>";
            // $ref_income = $row['ref_income'];
            $user_id = $row['id'];

            $q = "SELECT * FROM epin WHERE user_id = '$user_id' && status = 'Approved'";
            $r = mysqli_query($conn, $q);

            $epin_row = mysqli_fetch_all($r, MYSQLI_ASSOC);
            foreach($epin_row as $epin){
                $pack_amount = $epin['pack_amount'];
                $level_income_row = ($pack_amount * 3) / 100;
                $total_level_income= $total_level_income + $level_income_row;
                echo $level_income_row;
                echo "<br>";
            }
        
        }


         // level 1
         $sql_level = "SELECT * FROM user WHERE ref_id = '$sponser_id_level'";
         $res_level = mysqli_query($conn, $sql_level);
         $data_level = mysqli_fetch_assoc($res_level);
         $sponser_id_level2 = $data_level['sponser_id'];

         //level 3
         $sql_level = "SELECT * FROM user WHERE ref_id = '$sponser_id_level2'";
         $res_level = mysqli_query($conn, $sql_level);
         $data_level = mysqli_fetch_assoc($res_level);
         $sponser_id_level3 = $data_level['sponser_id'];

         //level 4
         $sql_level = "SELECT * FROM user WHERE ref_id = '$sponser_id_level3'";
         $res_level = mysqli_query($conn, $sql_level);
         $data_level = mysqli_fetch_assoc($res_level);
         $level4_user_id = $data_level['id'];


        echo "total level income : " . $total_level_income;
        // echo "<br>";
        $update_ref_income = "UPDATE user SET level_income = level_income + '$total_level_income', wallet = wallet + '$total_level_income' WHERE id = '$level4_user_id'";
        $update_res = mysqli_query($conn, $update_ref_income);

        if($update_res){
            // echo "success";
        }

    }


    function level5_income($ref_id, $sponser_id_level){
        global $conn;

        $level_income_row = 0;
        $total_level_income = 0;


        //level 1
        $sql = "SELECT * FROM user WHERE sponser_id = '$ref_id'";
        $res = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_array($res)){
            // $name = $row['name'];
            // $email = $row['email'];
            // echo $name;
            // echo $email;
            // echo "<br>";
            // $ref_income = $row['ref_income'];
            $user_id = $row['id'];

            $q = "SELECT * FROM epin WHERE user_id = '$user_id' && status = 'Approved'";
            $r = mysqli_query($conn, $q);

            $epin_row = mysqli_fetch_all($r, MYSQLI_ASSOC);
            foreach($epin_row as $epin){
                $pack_amount = $epin['pack_amount'];
                $level_income_row = ($pack_amount * 2) / 100;
                $total_level_income= $total_level_income + $level_income_row;
                echo $level_income_row;
                echo "<br>";
            }
        
        }


         // level 2
         $sql_level = "SELECT * FROM user WHERE ref_id = '$sponser_id_level'";
         $res_level = mysqli_query($conn, $sql_level);
         $data_level = mysqli_fetch_assoc($res_level);
         $sponser_id_level2 = $data_level['sponser_id'];

         //level 3
         $sql_level = "SELECT * FROM user WHERE ref_id = '$sponser_id_level2'";
         $res_level = mysqli_query($conn, $sql_level);
         $data_level = mysqli_fetch_assoc($res_level);
         $sponser_id_level3 = $data_level['sponser_id'];

         //level 4
         $sql_level = "SELECT * FROM user WHERE ref_id = '$sponser_id_level3'";
         $res_level = mysqli_query($conn, $sql_level);
         $data_level = mysqli_fetch_assoc($res_level);
         $sponser_id_level4 = $data_level['sponser_id'];

         //level 5
         $sql_level = "SELECT * FROM user WHERE ref_id = '$sponser_id_level4'";
         $res_level = mysqli_query($conn, $sql_level);
         $data_level = mysqli_fetch_assoc($res_level);
         $level5_user_id = $data_level['id'];


        echo "total level income : " . $total_level_income;
        // echo "<br>";
        $update_ref_income = "UPDATE user SET level_income = level_income + '$total_level_income', wallet = wallet + '$total_level_income' WHERE id = '$level5_user_id'";
        $update_res = mysqli_query($conn, $update_ref_income);

        if($update_res){
            // echo "success";
        }

    }


    function level6_income($ref_id, $sponser_id_level){
        global $conn;

        $level_income_row = 0;
        $total_level_income = 0;


        //level 1
        $sql = "SELECT * FROM user WHERE sponser_id = '$ref_id'";
        $res = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_array($res)){
            // $name = $row['name'];
            // $email = $row['email'];
            // echo $name;
            // echo $email;
            // echo "<br>";
            // $ref_income = $row['ref_income'];
            $user_id = $row['id'];

            $q = "SELECT * FROM epin WHERE user_id = '$user_id' && status = 'Approved'";
            $r = mysqli_query($conn, $q);

            $epin_row = mysqli_fetch_all($r, MYSQLI_ASSOC);
            foreach($epin_row as $epin){
                $pack_amount = $epin['pack_amount'];
                $level_income_row = ($pack_amount * 1) / 100;
                $total_level_income= $total_level_income + $level_income_row;
                echo $level_income_row;
                echo "<br>";
            }
        
        }


         // level 2
         $sql_level = "SELECT * FROM user WHERE ref_id = '$sponser_id_level'";
         $res_level = mysqli_query($conn, $sql_level);
         $data_level = mysqli_fetch_assoc($res_level);
         $sponser_id_level2 = $data_level['sponser_id'];

         //level 3
         $sql_level = "SELECT * FROM user WHERE ref_id = '$sponser_id_level2'";
         $res_level = mysqli_query($conn, $sql_level);
         $data_level = mysqli_fetch_assoc($res_level);
         $sponser_id_level3 = $data_level['sponser_id'];

         //level 4
         $sql_level = "SELECT * FROM user WHERE ref_id = '$sponser_id_level3'";
         $res_level = mysqli_query($conn, $sql_level);
         $data_level = mysqli_fetch_assoc($res_level);
         $sponser_id_level4 = $data_level['sponser_id'];

         //level 5
         $sql_level = "SELECT * FROM user WHERE ref_id = '$sponser_id_level4'";
         $res_level = mysqli_query($conn, $sql_level);
         $data_level = mysqli_fetch_assoc($res_level);
         $sponser_id_level5 = $data_level['sponser_id'];

         //level 6
         $sql_level = "SELECT * FROM user WHERE ref_id = '$sponser_id_level5'";
         $res_level = mysqli_query($conn, $sql_level);
         $data_level = mysqli_fetch_assoc($res_level);
         $level6_user_id = $data_level['id'];

        echo "total level income : " . $total_level_income;
        // echo "<br>";
        $update_ref_income = "UPDATE user SET level_income = level_income + '$total_level_income', wallet = wallet + '$total_level_income' WHERE id = '$level6_user_id'";
        $update_res = mysqli_query($conn, $update_ref_income);

        if($update_res){
            // echo "success";
        }

    }


    function level7_income($ref_id, $sponser_id_level){
        global $conn;

        $level_income_row = 0;
        $total_level_income = 0;


        //level 1
        $sql = "SELECT * FROM user WHERE sponser_id = '$ref_id'";
        $res = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_array($res)){
            // $name = $row['name'];
            // $email = $row['email'];
            // echo $name;
            // echo $email;
            // echo "<br>";
            // $ref_income = $row['ref_income'];
            $user_id = $row['id'];

            $q = "SELECT * FROM epin WHERE user_id = '$user_id' && status = 'Approved'";
            $r = mysqli_query($conn, $q);

            $epin_row = mysqli_fetch_all($r, MYSQLI_ASSOC);
            foreach($epin_row as $epin){
                $pack_amount = $epin['pack_amount'];
                $level_income_row = ($pack_amount * 0.5) / 100;
                $total_level_income= $total_level_income + $level_income_row;
                echo $level_income_row;
                echo "<br>";
            }
        
        }


         // level 2
         $sql_level = "SELECT * FROM user WHERE ref_id = '$sponser_id_level'";
         $res_level = mysqli_query($conn, $sql_level);
         $data_level = mysqli_fetch_assoc($res_level);
         $sponser_id_level2 = $data_level['sponser_id'];

         //level 3
         $sql_level = "SELECT * FROM user WHERE ref_id = '$sponser_id_level2'";
         $res_level = mysqli_query($conn, $sql_level);
         $data_level = mysqli_fetch_assoc($res_level);
         $sponser_id_level3 = $data_level['sponser_id'];

         //level 4
         $sql_level = "SELECT * FROM user WHERE ref_id = '$sponser_id_level3'";
         $res_level = mysqli_query($conn, $sql_level);
         $data_level = mysqli_fetch_assoc($res_level);
         $sponser_id_level4 = $data_level['sponser_id'];

         //level 5
         $sql_level = "SELECT * FROM user WHERE ref_id = '$sponser_id_level4'";
         $res_level = mysqli_query($conn, $sql_level);
         $data_level = mysqli_fetch_assoc($res_level);
         $sponser_id_level5 = $data_level['sponser_id'];

         //level 6
         $sql_level = "SELECT * FROM user WHERE ref_id = '$sponser_id_level5'";
         $res_level = mysqli_query($conn, $sql_level);
         $data_level = mysqli_fetch_assoc($res_level);
         $sponser_id_level6 = $data_level['sponser_id'];

         //level 7
         $sql_level = "SELECT * FROM user WHERE ref_id = '$sponser_id_level6'";
         $res_level = mysqli_query($conn, $sql_level);
         $data_level = mysqli_fetch_assoc($res_level);
         $level7_user_id = $data_level['id'];


        echo "total level income : " . $total_level_income;
        // echo "<br>";
        $update_ref_income = "UPDATE user SET level_income = level_income + '$total_level_income', wallet = wallet + '$total_level_income' WHERE id = '$level7_user_id'";
        $update_res = mysqli_query($conn, $update_ref_income);

        if($update_res){
            // echo "success";
        }

    }


    function level8_income($ref_id, $sponser_id_level){
        global $conn;

        $level_income_row = 0;
        $total_level_income = 0;


        //level 1
        $sql = "SELECT * FROM user WHERE sponser_id = '$ref_id'";
        $res = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_array($res)){
            // $name = $row['name'];
            // $email = $row['email'];
            // echo $name;
            // echo $email;
            // echo "<br>";
            // $ref_income = $row['ref_income'];
            $user_id = $row['id'];

            $q = "SELECT * FROM epin WHERE user_id = '$user_id' && status = 'Approved'";
            $r = mysqli_query($conn, $q);

            $epin_row = mysqli_fetch_all($r, MYSQLI_ASSOC);
            foreach($epin_row as $epin){
                $pack_amount = $epin['pack_amount'];
                $level_income_row = ($pack_amount * 0.5) / 100;
                $total_level_income= $total_level_income + $level_income_row;
                echo $level_income_row;
                echo "<br>";
            }
        
        }


         // level 2
         $sql_level = "SELECT * FROM user WHERE ref_id = '$sponser_id_level'";
         $res_level = mysqli_query($conn, $sql_level);
         $data_level = mysqli_fetch_assoc($res_level);
         $sponser_id_level2 = $data_level['sponser_id'];

         //level 3
         $sql_level = "SELECT * FROM user WHERE ref_id = '$sponser_id_level2'";
         $res_level = mysqli_query($conn, $sql_level);
         $data_level = mysqli_fetch_assoc($res_level);
         $sponser_id_level3 = $data_level['sponser_id'];

         //level 4
         $sql_level = "SELECT * FROM user WHERE ref_id = '$sponser_id_level3'";
         $res_level = mysqli_query($conn, $sql_level);
         $data_level = mysqli_fetch_assoc($res_level);
         $sponser_id_level4 = $data_level['sponser_id'];

         //level 5
         $sql_level = "SELECT * FROM user WHERE ref_id = '$sponser_id_level4'";
         $res_level = mysqli_query($conn, $sql_level);
         $data_level = mysqli_fetch_assoc($res_level);
         $sponser_id_level5 = $data_level['sponser_id'];

         //level 6
         $sql_level = "SELECT * FROM user WHERE ref_id = '$sponser_id_level5'";
         $res_level = mysqli_query($conn, $sql_level);
         $data_level = mysqli_fetch_assoc($res_level);
         $sponser_id_level6 = $data_level['sponser_id'];

         //level 7
         $sql_level = "SELECT * FROM user WHERE ref_id = '$sponser_id_level6'";
         $res_level = mysqli_query($conn, $sql_level);
         $data_level = mysqli_fetch_assoc($res_level);
         $sponser_id_level7 = $data_level['sponser_id'];

         //level 8
         $sql_level = "SELECT * FROM user WHERE ref_id = '$sponser_id_level7'";
         $res_level = mysqli_query($conn, $sql_level);
         $data_level = mysqli_fetch_assoc($res_level);
         $level8_user_id = $data_level['id'];
         

        echo "total level income : " . $total_level_income;
        // echo "<br>";
        $update_ref_income = "UPDATE user SET level_income = level_income + '$total_level_income', wallet = wallet + '$total_level_income' WHERE id = '$level8_user_id'";
        $update_res = mysqli_query($conn, $update_ref_income);

        if($update_res){
            // echo "success";
        }

    }


    function level9_income($ref_id, $sponser_id_level){
        global $conn;

        $level_income_row = 0;
        $total_level_income = 0;


        //level 1
        $sql = "SELECT * FROM user WHERE sponser_id = '$ref_id'";
        $res = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_array($res)){
            // $name = $row['name'];
            // $email = $row['email'];
            // echo $name;
            // echo $email;
            // echo "<br>";
            // $ref_income = $row['ref_income'];
            $user_id = $row['id'];

            $q = "SELECT * FROM epin WHERE user_id = '$user_id' && status = 'Approved'";
            $r = mysqli_query($conn, $q);

            $epin_row = mysqli_fetch_all($r, MYSQLI_ASSOC);
            foreach($epin_row as $epin){
                $pack_amount = $epin['pack_amount'];
                $level_income_row = ($pack_amount * 0.5) / 100;
                $total_level_income= $total_level_income + $level_income_row;
                echo $level_income_row;
                echo "<br>";
            }
        
        }


         // level 2
         $sql_level = "SELECT * FROM user WHERE ref_id = '$sponser_id_level'";
         $res_level = mysqli_query($conn, $sql_level);
         $data_level = mysqli_fetch_assoc($res_level);
         $sponser_id_level2 = $data_level['sponser_id'];

         //level 3
         $sql_level = "SELECT * FROM user WHERE ref_id = '$sponser_id_level2'";
         $res_level = mysqli_query($conn, $sql_level);
         $data_level = mysqli_fetch_assoc($res_level);
         $sponser_id_level3 = $data_level['sponser_id'];

         //level 4
         $sql_level = "SELECT * FROM user WHERE ref_id = '$sponser_id_level3'";
         $res_level = mysqli_query($conn, $sql_level);
         $data_level = mysqli_fetch_assoc($res_level);
         $sponser_id_level4 = $data_level['sponser_id'];

         //level 5
         $sql_level = "SELECT * FROM user WHERE ref_id = '$sponser_id_level4'";
         $res_level = mysqli_query($conn, $sql_level);
         $data_level = mysqli_fetch_assoc($res_level);
         $sponser_id_level5 = $data_level['sponser_id'];

         //level 6
         $sql_level = "SELECT * FROM user WHERE ref_id = '$sponser_id_level5'";
         $res_level = mysqli_query($conn, $sql_level);
         $data_level = mysqli_fetch_assoc($res_level);
         $sponser_id_level6 = $data_level['sponser_id'];

         //level 7
         $sql_level = "SELECT * FROM user WHERE ref_id = '$sponser_id_level6'";
         $res_level = mysqli_query($conn, $sql_level);
         $data_level = mysqli_fetch_assoc($res_level);
         $sponser_id_level7 = $data_level['sponser_id'];

         //level 8
         $sql_level = "SELECT * FROM user WHERE ref_id = '$sponser_id_level7'";
         $res_level = mysqli_query($conn, $sql_level);
         $data_level = mysqli_fetch_assoc($res_level);
         $sponser_id_level8 = $data_level['sponser_id'];
        
         //level 9
         $sql_level = "SELECT * FROM user WHERE ref_id = '$sponser_id_level8'";
         $res_level = mysqli_query($conn, $sql_level);
         $data_level = mysqli_fetch_assoc($res_level);
         $level9_user_id = $data_level['id'];
         

        echo "total level income : " . $total_level_income;
        // echo "<br>";
        $update_ref_income = "UPDATE user SET level_income = level_income + '$total_level_income', wallet = wallet + '$total_level_income' WHERE id = '$level9_user_id'";
        $update_res = mysqli_query($conn, $update_ref_income);

        if($update_res){
            // echo "success";
        }

    }
    
    function level10_income($ref_id, $sponser_id_level){
        global $conn;

        $level_income_row = 0;
        $total_level_income = 0;


        //level 1
        $sql = "SELECT * FROM user WHERE sponser_id = '$ref_id'";
        $res = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_array($res)){
            // $name = $row['name'];
            // $email = $row['email'];
            // echo $name;
            // echo $email;
            // echo "<br>";
            // $ref_income = $row['ref_income'];
            $user_id = $row['id'];

            $q = "SELECT * FROM epin WHERE user_id = '$user_id' && status = 'Approved'";
            $r = mysqli_query($conn, $q);

            $epin_row = mysqli_fetch_all($r, MYSQLI_ASSOC);
            foreach($epin_row as $epin){
                $pack_amount = $epin['pack_amount'];
                $level_income_row = ($pack_amount * 0.5) / 100;
                $total_level_income= $total_level_income + $level_income_row;
                echo $level_income_row;
                echo "<br>";
            }
        
        }


         // level 2
         $sql_level = "SELECT * FROM user WHERE ref_id = '$sponser_id_level'";
         $res_level = mysqli_query($conn, $sql_level);
         $data_level = mysqli_fetch_assoc($res_level);
         $sponser_id_level2 = $data_level['sponser_id'];

         //level 3
         $sql_level = "SELECT * FROM user WHERE ref_id = '$sponser_id_level2'";
         $res_level = mysqli_query($conn, $sql_level);
         $data_level = mysqli_fetch_assoc($res_level);
         $sponser_id_level3 = $data_level['sponser_id'];

         //level 4
         $sql_level = "SELECT * FROM user WHERE ref_id = '$sponser_id_level3'";
         $res_level = mysqli_query($conn, $sql_level);
         $data_level = mysqli_fetch_assoc($res_level);
         $sponser_id_level4 = $data_level['sponser_id'];

         //level 5
         $sql_level = "SELECT * FROM user WHERE ref_id = '$sponser_id_level4'";
         $res_level = mysqli_query($conn, $sql_level);
         $data_level = mysqli_fetch_assoc($res_level);
         $sponser_id_level5 = $data_level['sponser_id'];

         //level 6
         $sql_level = "SELECT * FROM user WHERE ref_id = '$sponser_id_level5'";
         $res_level = mysqli_query($conn, $sql_level);
         $data_level = mysqli_fetch_assoc($res_level);
         $sponser_id_level6 = $data_level['sponser_id'];

         //level 7
         $sql_level = "SELECT * FROM user WHERE ref_id = '$sponser_id_level6'";
         $res_level = mysqli_query($conn, $sql_level);
         $data_level = mysqli_fetch_assoc($res_level);
         $sponser_id_level7 = $data_level['sponser_id'];

         //level 8
         $sql_level = "SELECT * FROM user WHERE ref_id = '$sponser_id_level7'";
         $res_level = mysqli_query($conn, $sql_level);
         $data_level = mysqli_fetch_assoc($res_level);
         $sponser_id_level8 = $data_level['sponser_id'];
        
         //level 9
         $sql_level = "SELECT * FROM user WHERE ref_id = '$sponser_id_level8'";
         $res_level = mysqli_query($conn, $sql_level);
         $data_level = mysqli_fetch_assoc($res_level);
         $sponser_id_level9 = $data_level['sponser_id'];
         
          //level 10
          $sql_level = "SELECT * FROM user WHERE ref_id = '$sponser_id_level9'";
          $res_level = mysqli_query($conn, $sql_level);
          $data_level = mysqli_fetch_assoc($res_level);
          $level10_user_id = $data_level['id'];

        echo "total level income : " . $total_level_income;
        // echo "<br>";
        $update_ref_income = "UPDATE user SET level_income = level_income + '$total_level_income', wallet = wallet + '$total_level_income' WHERE id = '$level10_user_id'";
        $update_res = mysqli_query($conn, $update_ref_income);

        if($update_res){
            // echo "success";
        }

    }
















    function user_signup($name, $phone_no, $email, $password, $ref_id, $sponser_id, $ref_income) {

        global $conn;

        $sql = "SELECT * FROM user WHERE phone_no = '$phone_no' || email = '$email'";
        $result= mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);

        if($num > 0){
            echo "<script>alert('Mobile number or Email is already exist!')</script>";
            // $_SESSION['status'] = "Username is already exist!";
            // $_SESSION['status_code'] = "warning";
        }else {

            $sql = "INSERT INTO user(name, phone_no, email, password, ref_id, sponser_id, ref_income)
            VALUES ('$name', '$phone_no', '$email', '$password', '$ref_id', '$sponser_id', '$ref_income')";

            $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));

            if($res) {
                // echo "Successfully registered";
                header("Location: login.php");

                //generate refferal income for first leve(10%) 

            }else{
                echo 'Query error' . mysqli_error($conn);
            }
        }
    }

    function user_login($phone_no, $password) {

        global $conn;
    
        $sql = "SELECT phone_no, password FROM user WHERE phone_no = '$phone_no' && password = '$password'";
    
            $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
            $count = mysqli_num_rows($res);
            if($count > 0){
    
                //created user session
                $_SESSION['user'] = $phone_no;
                
                header('Location: ./dashboard/index.php');
                // echo "Successfully logged in";
            }else {
                echo '<script>alert("Invalid username or password")</script>';
                // $_SESSION['status'] = "Invalid Username or Password!";
                // $_SESSION['status_code'] = "error";
                // header('location: login.php');
            }
    }

    function admin_login($username, $password){
        global $conn;
    
        $sql = "SELECT username, password FROM admin WHERE username = '$username' && password = '$password'";
    
            $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
            $count = mysqli_num_rows($res);
            if($count > 0){
    
                //created user session
                $_SESSION['admin'] = $username;
                
                header('Location: ./index.php');
                // echo "Successfully logged in";
            }else {
                echo '<script>alert("Invalid username or password")</script>';
            }
    }

    function get_user(){
        global $conn;

        //get current user
        $user = $_SESSION['user'];
        $user_query = "SELECT * FROM user WHERE phone_no = '$user'";
        $user_res = mysqli_query($conn, $user_query);

        return $user_res;
    }

    function insert_epin($user_id, $epin_price, $transcation_img, $temp_transcation_img){
        global $conn;

        //image upload
        $img_transc = move_uploaded_file($temp_transcation_img, "../admin/transcation_images/" . $transcation_img);

        $sql = "INSERT INTO epin(user_id, pack_amount, transcation_img, status) VALUES ('$user_id', '$epin_price', '$transcation_img', 'pending')";
        $result_query = mysqli_query($conn, $sql);

        if ($result_query) {
            echo "<script>alert('Sucessfully inserted the epin details.')</script>";
        }else{
            echo "<script>alert('Something went Wrong!')</script>";
            echo mysqli_error($conn);
        }

    }

    function insert_kyc($user_id, $epin, $bank_name, $account_number, $ifsc_code, $account_holder_name, $upi){
        global $conn;

            $sql = "INSERT INTO kyc(user_id, epin, bank_name, account_number, ifsc_code, account_holder_name, upi)
            VALUES ('$user_id', '$epin', '$bank_name', '$account_number', '$ifsc_code', '$account_holder_name', '$upi')";

            $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));

            if($res) {
                // echo "Successfully registered";
                echo "<script>alert('KYC updated successfully')</script>";
                // header("Location: login.php");

            }else{
                echo "<script>alert('Something went wrong!')</script>";
                echo 'Query error' . mysqli_error($conn);
            }
        }

        function insert_todays_roi($user_id, $pack_amount, $todays_roi, $total_roi){
            global $conn;

            $sql = "INSERT INTO roi (user_id, pack_amount, todays_roi, total_roi) VALUES ('$user_id', '$pack_amount', '$todays_roi', '$total_roi')";
            $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
            if($res) {
                // echo "Successfully registered";
                echo "<script>alert('ROI updated successfully')</script>";
                // header("Location: login.php");

            }else{
                echo "<script>alert('Something went wrong!')</script>";
                echo 'Query error' . mysqli_error($conn);
            }
        }

        function withdrawal_request($user_id, $withdrawal_amount){
            global $conn;

            $sql = "INSERT INTO withdrawal (user_id, withdrawal_amount, withdraw_status, withdrawal_date) VALUES ('$user_id', $withdrawal_amount, 'pending', NOW())";
            $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
            if($res) {
                // echo "Successfully registered";
                echo "<script>alert('Withdrawal amount requested successfully')</script>";
                // header("Location: login.php");

            }else{
                echo "<script>alert('Something went wrong!')</script>";
                echo 'Query error' . mysqli_error($conn);
            }
        }


?>