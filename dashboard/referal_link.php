<?php 
    session_start();
    include('../config/db_connect.php');
    include('../config/functions.php');
    if(!isset($_SESSION['user'])){
        header("Location: ../login.php"); 
    }
    //get current user referral id
    $user_res = get_user();
    $get_user = mysqli_fetch_assoc($user_res);
    $user_id = $get_user['id'];
    $ref_id = $get_user['ref_id'];
    

    //check current user epin purchase or not
    $sql = "SELECT * FROM epin WHERE user_id = '$user_id'";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($res);
    $epin_status = $row['status'];
    // while($row = mysqli_fetch_array($res)){
    //     if($)
    // }
    $num= mysqli_num_rows($res);
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Pin history</title>
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
    
    <section class="container mx-auto pl-64 pt-10">
        <div class=" flex flex-col items-center justify-center mt-12">
            <div class="flex flex-col bg-white shadow-md px-4 sm:px-6 md:px-8 lg:px-10 py-8 rounded-md w-full max-w-md">
                <div class="font-medium text-xl sm:text-2xl text-gray-800 text-center">Referal Link</div>
                <div class="mt-10">
                    <div class="flex flex-col mb-6">
                        <div class="relative p-4">
                            <?php if($num > 0): ?>
                                <?php if ($epin_status == "Approved"): ?>
                                <p id="referal_link" class="mb-1 p-4 text-lg sm:text-lg bg-slate-100 tracking-wide text-gray-900 w-full">https://printsmonk.com/register.php?ref_id=<?php echo $ref_id; ?></p>
                                <?php else: ?>
                                    <p class="text-rose-600">Purchase E-Pin to Unlock Referral Link.</p>
                                    <p class="">To Purchase <a href="./e-pin-generate.php" class="text-blue-600 underline">Click here</a></p>
                                <?php endif; ?>
                            <?php else: ?>
                                <p class="text-rose-600">Purchase E-Pin to Unlock Referral Link</p>
                                <p class="">To Purchase <a href="./e-pin-generate.php" class="text-blue-600 underline">Click here</a></p>
                            <?php endif; ?>
                            <!-- <textarea id="referal_link" cols="30" rows="10" value="http://localhost/mlm/dashboard/referal.php?ref_id=sskjhjje322"></textarea> -->
                        </div>
                    </div>

                    <div class="flex w-full p-4">
                    <?php if($num > 0): ?>
                                <?php if ($epin_status == "Approved"): ?>
                                    <button onclick="copyText()" name="" class="flex items-center justify-center focus:outline-none text-white text-sm p-4 text-center sm:text-xs bg-blue-600 hover:bg-blue-700 rounded py-2 w-full transition duration-150 ease-in">
                                        <span class="mr-2 uppercase">Copy Link</span>
                                        <span>
                                            <svg class="h-6 w-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                                <path d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                        </span>
                                    </button>
                                <?php else: ?>
                                    
                                <?php endif; ?>
                            <?php else: ?>
                            <?php endif; ?>
                        <!-- <button onclick="copyText()" name="" class="flex items-center justify-center focus:outline-none text-white text-sm p-4 text-center sm:text-xs bg-blue-600 hover:bg-blue-700 rounded py-2 w-full transition duration-150 ease-in">
                            <span class="mr-2 uppercase">Copy Link</span>
                            <span>
                            <svg class="h-6 w-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                <path d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            </span>
                        </button> -->
                    </div>

                </div>
            </div>
        </div>
    </section>



    <!-- sidenav link -->
    <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>
    <script>
        function copyText() {
            /* Copy text into clipboard */
            var ref_link = "https://printsmonk.com/register.php?ref_id=<?php echo $ref_id; ?>";
            navigator.clipboard.writeText(ref_link);
            
            // Alert the copied text
            alert("Copied the text: " + ref_link);
        }                                                                                   
    </script>
</body>
</html>