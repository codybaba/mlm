<?php 
    session_start();
    include('../config/db_connect.php');
    include('../config/functions.php');
    if(!isset($_SESSION['user_email'])){
        header("Location: ../login.php"); 
    }

    //fetch user id
    $result_user_id = get_user();
    $user_row = mysqli_fetch_assoc($result_user_id);
    $user_id = $user_row['id'];

    if (isset($_POST['generate_epin'])){
        $epin_price = mysqli_real_escape_string($conn, $_POST['epin_price']);

        //access image
        $transcation_img = $_FILES['transcation_img']['name']; 
        //access image temp name
        $temp_transcation_img= $_FILES['transcation_img']['tmp_name']; 

        insert_epin($user_id, $epin_price, $transcation_img, $temp_transcation_img);
    }

    $sql = "SELECT * FROM epin WHERE user_id = '$user_id'";
    $query = mysqli_query($conn, $sql);
    $data = mysqli_fetch_assoc($query); 
    $get_num_rows = mysqli_num_rows($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generate E-Pin</title>
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
        <h2 class="pt-10 text-2xl font-bold">E-Pin</h2>
        <div class=" flex flex-col items-center justify-center mt-12">
            <div class="flex flex-col bg-white shadow-md px-4 sm:px-6 md:px-8 lg:px-10 py-8 rounded-md w-full max-w-md">
                <?php if($get_num_rows > 0): ?>
                    <p class="text-rose-700 font-bold text-center">E-Pin already purchased.</p>
                <?php else: ?>
                    <div class="font-medium text-xl sm:text-xl text-gray-800">Generate E-Pin</div>
                    <div class="mt-10">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="flex flex-col mb-6">
                                <label for="epin_price" class="mb-1 text-xs sm:text-sm tracking-wide text-gray-600">E-Pin Price:</label>
                                <div class="relative">
                                    <select onchange="getValue()" id="epin_price" name="epin_price" class="bg-slate-100 border border-gray-400 text-gray-500 placeholder-gray-500  text-sm rounded-lg focus:ring-blue-500 focus-visible:border-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-slate-100 dark:border-gray-400 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus-visible:border-blue-500 dark:focus:border-blue-500">
                                        <option selected>Choose Your price</option>
                                        <option value="10000">10,000</option>
                                        <option value="25000">25,000</option>
                                        <option value="50000">50,000</option>
                                        <option value="100000">10,00,00</option>
                                        <option value="500000">50,00,00</option>
                                    </select>
                                </div>
                            </div>
                            <div class="flex flex-col mb-6">
                                <label for="total_amount" class="mb-1 text-xs sm:text-sm tracking-wide text-gray-600">Total amount:</label>
                                <div class="relative">
                                    <input disabled id="total_amount" type="text" name="total_amount" class="text-sm sm:text-base bg-slate-100 placeholder-gray-500 pl-4 pr-4 rounded-lg border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400" placeholder="Total amount" />
                                </div>
                            </div>
                            <div class="flex flex-col mb-6">  
                                <label for="formFile" class="form-label inline-block mb-2 text-gray-700">Upload transcation img:</label>
                                <input name="transcation_img" class="form-control block w-full px-3 py-2 text-base font-normal text-gray-700 bg-slate-100 bg-clip-padding border border-solid border-gray-300 rounded-lg transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" type="file" id="formFile">
                                <p class="mt-1 text-sm text-gray-500 dark:text-gray-500" id="file_input_help">SVG, PNG, JPG or GIF (MAX. 800x400px).</p>
                            </div>
    
                            <div class="flex w-full p-4">
                                <button type="submit" name="generate_epin" class="flex items-center justify-center focus:outline-none text-white text-sm sm:text-base bg-blue-600 hover:bg-blue-700 rounded py-2 w-full transition duration-150 ease-in">
                                    <span class="mr-2 uppercase">Generate E-Pin</span>
                                    <span>
                                    <svg class="h-6 w-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                        <path d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    </span>
                                </button>
                            </div>
                        </form>
                    </div>
                <?php endif; ?>
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