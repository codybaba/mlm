<?php 
    session_start();
    include('../config/db_connect.php');
    include('../config/functions.php');
    if(!isset($_SESSION['admin'])){
        header("Location: ./login.php"); 
    }


    $num=1;    

    $sql = "SELECT * FROM epin ORDER BY id DESC";
    $res = mysqli_query($conn, $sql);
    $record = mysqli_fetch_all($res, MYSQLI_ASSOC);

    // echo round((strtotime($row['enddate'])-strtotime($row['startdate']))/86400);


    $from_date = date("d");

    $to_date = $from_date + 200;

    $difference = $to_date - $from_date;

    // echo 'Difference: ' .$difference.' days';

    // print_r($difference);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin</title>
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
    <div class="container mx-auto lg:px-32 lg:pl-64 pt-12">
        <div class="flex flex-col">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white">
                            <thead class="border-b">
                                <tr>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                        Sl no
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                        User Name
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                        Package Amount
                                    </th>
                                    <!-- <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                        Transcation img
                                    </th> -->
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                        Status
                                    </th>
                                    <!-- <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                        Action
                                    </th> -->
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                        Date
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                        E-Pin
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if($record): ?>
                                    <?php foreach($record as $records): ?>
                                        <tr class="border-b">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                <?php echo $num++; ?>
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                <?php 
                                                    //get user name
                                                    $user_id = $records['user_id']; 

                                                    $name_sql = "SELECT * FROM user Where id = '$user_id'";
                                                    $name_res = mysqli_query($conn, $name_sql);
                                                    $name = mysqli_fetch_assoc($name_res);
                                                    echo $name['name'];
                                                ?>
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            <?php echo htmlspecialchars($records['pack_amount']); ?>
                                            </td>
                                            <!-- <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                <img class="w-10" src="./transcation_images/<?php echo htmlspecialchars($records['transcation_img']); ?>" alt="">
                                            </td> -->
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            <?php echo htmlspecialchars($records['status']); ?>
                                            </td>
                                            <!-- <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                <?php if($records['status'] == 'Approved'): ?>
                                                    <i class="fa-solid fa-check"></i>
                                                <?php else: ?>
                                                    <a href="./epin_approve.php?id=<?php echo htmlspecialchars($records['id']); ?>" class="rounded-lg bg-emerald-600 hover:bg-emerald-700 text-white p-2">Approve</a>
                                                <?php endif; ?>
                                            </td> -->
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            <?php echo htmlspecialchars($records['created_at']) ?>
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                <?php $records['e_pin'] != null ? print $records['e_pin'] : print 'nil'; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <!-- <p>No records found!</p> -->
                                    
                                <?php endif; ?>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- sidenav link -->
    <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>

</body>
</html>