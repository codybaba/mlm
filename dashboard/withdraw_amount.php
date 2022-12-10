<?php 
    session_start();
    include('../config/db_connect.php');
    include('../config/functions.php');
    if(!isset($_SESSION['user'])){
        header("Location: ../login.php"); 
    }
    //get current user
    $user_res = get_user();
    $data = mysqli_fetch_assoc($user_res);
    $user_id = $data['id'];
    $wallet = $data['wallet'];


    if (isset($_POST['withdraw_request'])){
        
        $withdrawal_amount = mysqli_real_escape_string($conn, $_POST['withdrawal_amount']);

        if($withdrawal_amount <= $wallet){
            $updated_bal = $wallet - $withdrawal_amount;
            $update_sql = "UPDATE `user` SET `wallet` = $updated_bal WHERE id = '$user_id'";
            $res = mysqli_query($conn, $update_sql);
            if($res){
                echo "<script>window.open('./withdraw_amount.php', '_self')</script>";
            }else {
                echo 'Query error' . mysqli_error($conn);
            }
            // mysqli_query($conn, "UPDATE `user` SET `wallet` = `wallet`-$withdrawal_amount WHERE id = '$user_id'");
            withdrawal_request($user_id, $withdrawal_amount);
        }

    }

    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Withdraw Amount</title>
    <!-- tailwind css -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.1/dist/flowbite.min.css" /> -->
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/index.min.css" />
    
</head>
<body class="bg-slate-100">
    <?php include('./sidebar.php'); ?>
    
    <section class="container mx-auto pl-64">
        <div class=" flex flex-col items-center justify-center pt-12">
            <div class="flex flex-col bg-white shadow-md px-4 sm:px-6 md:px-8 lg:px-10 py-8 rounded-md w-full max-w-md">
                <div class="font-medium text-xl sm:text-2xl text-gray-700 text-center underline">Withdraw Amount</div>
                <div class="mt-10">
                    <h2 class="text-xl text-gray-600 p-4 rounded mb-10 bg-slate-200">Wallet Amount : <span class="font-bold text-2xl">₹<?php echo $wallet ?></span></h2>
                    <?php if($wallet > 0):  ?>
                        <form action="" method="post">
                            <div class="flex flex-col mb-6">
                                <label for="withdrawal_amount" class="mb-1 text-xs sm:text-sm tracking-wide text-gray-600">Withrawal amount:</label>
                                <div class="relative">
                                    <input id="withdrawal_amount" type="text" name="withdrawal_amount" class="text-sm sm:text-base bg-slate-100 placeholder-gray-500 pl-4 pr-4 rounded-lg border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400" placeholder="Withrawal amount" />
                                </div>
                            </div>
                            <div class="flex w-full p-4">
                                <button type="submit" name="withdraw_request" class="flex items-center justify-center focus:outline-none text-white text-sm sm:text-base bg-blue-600 hover:bg-blue-700 rounded py-2 w-full transition duration-150 ease-in">
                                    <span class="mr-2 uppercase">Send Now</span>
                                    <span>
                                    <svg class="h-6 w-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                        <path d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    </span>
                                </button>
                            </div>
                        </form>
                    <?php else: ?>
                        <p class="text-rose-800">You don't have minimum balance for withdrawal</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
    



    <!-- sidenav link -->
    <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>
</body>
</html>