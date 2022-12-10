<?php 
    session_start();
    include('../config/db_connect.php');
    include('../config/functions.php');
    if(!isset($_SESSION['user'])){
        header("Location: ../login.php"); 
    }
    //get current user
    $user_res = get_user();
    $get_user_id = mysqli_fetch_assoc($user_res);
    $user_id = $get_user_id['id'];
    
    

    if(isset($_POST['kyc_submit'])){
        $epin = mysqli_real_escape_string($conn, $_POST['epin']);
        $bank_name = mysqli_real_escape_string($conn, $_POST['bank_name']);
        $account_number = mysqli_real_escape_string($conn, $_POST['account_number']);
        $ifsc_code = mysqli_real_escape_string($conn, $_POST['ifsc_code']);
        $account_holder_name = mysqli_real_escape_string($conn, $_POST['account_holder_name']);
        $upi = mysqli_real_escape_string($conn, $_POST['upi']);

        insert_kyc($user_id, $epin, $bank_name, $account_number, $ifsc_code, $account_holder_name, $upi);
    }

    $kyc_detls_query = "SELECT * FROM kyc WHERE user_id = '$user_id'";
    $kyc_res = mysqli_query($conn, $kyc_detls_query);
    $kyc_detls = mysqli_fetch_assoc($kyc_res); 
    $get_num_rows = mysqli_num_rows($kyc_res);

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
    
    <div class="container mx-auto lg:px-12 lg:pl-64 pt-6">
        <h2 class="text-2xl font-semibold text-gray-600">Update Kyc</h2>
        <div class="px-48 pt-6">
            <div class="bg-white p-10 rounded-lg">
                <form method="post" action=""> 
                    <!-- <h2 class="text-2xl font-semibold text-gray-600">Bank Details</h2> -->
                        <div>
                            <label for="epin" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-600">E-Pin</label>
                            <?php if($kyc_detls['epin'] != ''): ?>
                                <input type="text" id="epin" name="epin" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-slate-50 dark:border-gray-500 dark:placeholder-gray-500 dark:text-gray-600 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="E-Pin" value="<?php echo htmlspecialchars($kyc_detls['epin']); ?>" disabled required>
                                <?php else: ?>
                                    <input type="text" id="epin" name="epin" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-slate-50 dark:border-gray-500 dark:placeholder-gray-500 dark:text-gray-600 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="E-Pin" required>
                            <?php endif; ?>
                        </div>
                    <div class="grid gap-6 mb-6 md:grid-cols-2 pt-6">
                        <div>
                            <label for="bank_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-600">Bank name</label>
                            <?php if($kyc_detls['bank_name'] != ''): ?>
                                <input type="text" id="bank_name" name="bank_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-slate-50 dark:border-gray-500 dark:placeholder-gray-500 dark:text-gray-600 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Bank name" value="<?php echo htmlspecialchars($kyc_detls['bank_name']); ?>" disabled required>
                            <?php else: ?>
                                <input type="text" id="bank_name" name="bank_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-slate-50 dark:border-gray-500 dark:placeholder-gray-500 dark:text-gray-600 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Bank name" required>
                            <?php endif; ?>
                        </div>
                        <!-- <div>
                            <label for="branch_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-500">Branch name</label>
                            <input type="text" id="branch_name" name="branch_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-slate-50 dark:border-gray-500 dark:placeholder-gray-500 dark:text-gray-600 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Branch name" required>
                        </div> -->
                        <div>
                            <label for="account_number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-500">Account Number</label>
                            <?php if($kyc_detls['account_number'] != ''): ?>
                                <input type="text" id="account_number" name="account_number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-slate-50 dark:border-gray-500 dark:placeholder-gray-500 dark:text-gray-600 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="1234-5678-9123" value="<?php echo htmlspecialchars($kyc_detls['account_number']); ?>" disabled required>
                            <?php else: ?>
                                <input type="text" id="account_number" name="account_number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-slate-50 dark:border-gray-500 dark:placeholder-gray-500 dark:text-gray-600 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="1234-5678-9123" required>
                            <?php endif; ?>
                        </div>  
                        <div>
                            <label for="ifsc_code" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-500">IFSC Code</label>
                            <?php if($kyc_detls['ifsc_code'] != ''): ?>
                                <input type="text" id="ifsc_code" name="ifsc_code" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-slate-50 dark:border-gray-500 dark:placeholder-gray-500 dark:text-gray-600 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="ifsc code" value="<?php echo htmlspecialchars($kyc_detls['ifsc_code']); ?>" disabled required>
                            <?php else: ?>
                                <input type="text" id="ifsc_code" name="ifsc_code" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-slate-50 dark:border-gray-500 dark:placeholder-gray-500 dark:text-gray-600 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="ifsc code" required>
                            <?php endif; ?>
                        </div>
                        <div>
                            <label for="account_holder_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-500">Account Holder Name</label>
                            <?php if($kyc_detls['account_holder_name'] != ''): ?>
                                <input type="text" id="account_holder_name" name="account_holder_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-slate-50 dark:border-gray-500 dark:placeholder-gray-500 dark:text-gray-600 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Account holder name" value="<?php echo htmlspecialchars($kyc_detls['account_holder_name']); ?>" disabled required>
                            <?php else: ?>
                                <input type="text" id="account_holder_name" name="account_holder_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-slate-50 dark:border-gray-500 dark:placeholder-gray-500 dark:text-gray-600 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Account holder name" required>
                            <?php endif; ?>
                        </div>
                        <div>
                            <label for="upi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-500">UPI Id</label>
                            <?php if($kyc_detls['bank_name'] != ''): ?>
                                <input type="text" id="upi" name="upi" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-slate-50 dark:border-gray-500 dark:placeholder-gray-500 dark:text-gray-600 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="UPI Id" value="<?php echo htmlspecialchars($kyc_detls['upi']); ?>" disabled required>
                            <?php else: ?>
                                <input type="text" id="upi" name="upi" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-slate-50 dark:border-gray-500 dark:placeholder-gray-500 dark:text-gray-600 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="UPI Id" required>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php if($get_num_rows > 0): ?>
                        <p class="text-rose-800 font-bold italic">Contact Admin to change kyc details.</p>
                    <?php else: ?>
                        <button type="submit" name="kyc_submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                    <?php endif; ?>
                </form>
            </div>
        </div>
    </div>
    



    <!-- sidenav link -->
    <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>
</body>
</html>