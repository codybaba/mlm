<?php 
    session_start();
    include('../config/db_connect.php');
    include('../config/functions.php');
    if(!isset($_SESSION['admin'])){
        header("Location: ./login.php"); 
    }

    if (isset($_POST['update_roi'])){
        $roi_in_percent = mysqli_real_escape_string($conn, $_POST['roi_in_percent']);

        $sql = "SELECT user_id, pack_amount, status FROM epin";
        $query = mysqli_query($conn, $sql);
        $datas = mysqli_fetch_all($query, MYSQLI_ASSOC);
        $total_roi = 0;
        foreach($datas as $data){
            $user_id = $data['user_id'];
            $pack_amount = $data['pack_amount'];
            $status = $data['status'];

            if($status == "Approved"){
                $cal = ($pack_amount * $roi_in_percent) / 100;
                // $package_expiry;
                $up_query = "UPDATE user SET todays_roi = '$cal', total_roi = total_roi + '$cal', roi_updated_at = NOW(), package_expiry = package_expiry - 1 WHERE id = '$user_id'";
                $res_update = mysqli_query($conn, $up_query);
                if($res_update){
                    echo "success"; 
                    $up_query = "UPDATE user SET wallet = wallet + total_roi WHERE id = '$user_id'";
                    $res_update = mysqli_query($conn, $up_query);
                }else {
                    // echo mysqli_error($conn);
                }
            }

            
        }

    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Today's ROI</title>
    <!-- tailwind css -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.1/dist/flowbite.min.css" /> -->
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/index.min.css" />
    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    
</head>
<body class="bg-slate-100">
    <?php include('./sidebar.php'); ?>

    <section class="container mx-auto pl-64">
        <h2 class="pt-10 text-2xl font-bold text-gray-600">ROI</h2>
        <div class=" flex flex-col items-center justify-center mt-12">
            <div class="flex flex-col bg-white shadow-md px-4 sm:px-6 md:px-8 lg:px-10 py-8 rounded-md w-full max-w-md">
                <div class="font-medium text-xl sm:text-xl text-gray-800">Today's ROI</div>
                <div class="mt-10">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="flex flex-col mb-6">
                            <label for="roi_in_percent" class="mb-1 text-xs sm:text-sm tracking-wide text-gray-600">Today's ROI <span>eg(10%)</span>:</label>
                            <div class="relative">
                                <input id="roi_in_percent" type="text" name="roi_in_percent" class="text-sm sm:text-base bg-slate-100 placeholder-gray-500 pl-4 pr-4 rounded-lg border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400" placeholder="Today's ROI in (%)" />
                            </div>
                        </div>
                        <div class="flex w-full p-4">
                            <button type="submit" name="update_roi" class="flex items-center justify-center focus:outline-none text-white text-sm sm:text-base bg-blue-600 hover:bg-blue-700 rounded py-2 w-full transition duration-150 ease-in">
                                <span class="mr-2 uppercase">Submit</span>
                                <span>
                                <svg class="h-6 w-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                    <path d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                </span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- sidenav link -->
    <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>

    <script>
        function getValue(){
            var valSelect = $("#epin_price").val();
            $("#total_amount").val(valSelect);
        }
    </script>
</body>
</html>