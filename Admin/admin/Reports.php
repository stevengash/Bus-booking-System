<!-- Show these admin pages only when the admin is logged in -->
<?php   require '../assets/partials/_admin-check.php';     ?>
   
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
        <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/d8cfbe84b9.js" crossorigin="anonymous"></script>
    <!-- CSS -->
    <?php
        require '../assets/styles/admin.php';
        require '../assets/styles/dashboard.php';
        $page="Reports";
    ?>
</head>
<body>
    <!-- Requiring the admin header files -->
    <?php require '../assets/partials/_admin-header.php';
        require '../assets/partials/_getJSON.php';
    //  Will have access to variables 
    //     1. routeJson
    //     2. customerJson
    //     3. seatJson
    //     4. busJson
    //     5. adminJson
    //     6. bookingJSON
    $routeData = json_decode($routeJson);
    $customerData = json_decode($customerJson);
    $seatData = json_decode($seatJson);
    $busData = json_decode($busJson);
    $adminData = json_decode($adminJson);
    $bookingData = json_decode($bookingJson);
    // $earningData = json_decode($earningJson);

    // echo "<pre>";
    // var_export(get_object_vars($adminData[0])["user_fullname"]);
    // var_export($adminData);
    // var_export($_SESSION);
    // echo "</pre>";

    ?>

            <section id="dashboard">
                
                <div id="status">
                <form>
                    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

                    <div >
                        <canvas id="myCharts" style="width: 600px"></canvas>
                    </div> <?php
                        $con = new mysqli('localhost','root','','sbtbsphp');
                      
                        
                        $querysa =mysqli_query($con, "SELECT customer_route, COUNT(booking_id) As num  FROM bookings GROUP BY customer_route");
                      
                        foreach ($querysa as $rows) {
                            $montq[]=$rows['customer_route'];
                            $monq[]=$rows['num'];
                        }//https://www.youtube.com/results?search_query=chartjs
                    ?>
                    <script>
                        const labels = <?php echo json_encode($montq)?>;
                        const data = {
                        labels: labels,
                        datasets: [{
                            label: 'Number of Cataegories',
                            data: <?php echo json_encode($monq)?>,
                            fill: false,
                            backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(255, 159, 64, 0.2)',
                            'rgba(255, 205, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(201, 203, 207, 0.2)'
                            ],
                            borderColor: [
                            'rgb(255, 99, 132)',
                            'rgb(255, 159, 64)',
                            'rgb(255, 205, 86)',
                            'rgb(75, 192, 192)',
                            'rgb(54, 162, 235)',
                            'rgb(153, 102, 255)',
                            'rgb(201, 203, 207)'
                            ],
                            borderWidth: 1
                        }]
                        };
                        const config = {
                        type: 'pie',
                        data: data,
                        options: {
                            plugins:{
                                tooltip:{
                                    //increasing size of imgae
                                    titleFont:{
                                        size:20
                                    },
                                    bodyFont:{
                                        size:20
                                    }
                                }

                            }
                        }
                        };
                        const myChart = new Chart(
                            document.getElementById('myCharts'),
                            config
                        );
                    </script>
                </form>
                    
                    <!-- <div id="Seat" class="info-box status-item">
                        <div class="heading">
                            <h5>Seats</h5>
                            <div class="info">
                                <i class="fas fa-th"></i>
                            </div>
                        </div>
                        <div class="info-content">
                            <p>Total Seats</p>
                            <p class="num" data-target="<?php 
                                    // echo 38 * count($busData);
                                ?>">
                                999
                            </p>
                        </div>
                        <a href="./seat.php">View More <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
                <!- <h3>User</h3> -->
                <!-- <div id="user">
                    <div id="Customer" class="info-box user-item">
                        <div class="heading">
                            <h5>Customers</h5>
                            <div class="info">
                                <i class="fas fa-users"></i>
                            </div>
                        </div>
                        <div class="info-content">
                            <p>Total Customers</p>
                            <p class="num" data-target="<?php 
                                    // echo count($customerData);
                                ?>">
                                999
                            </p>
                        </div> -->
                        <!-- <a href="./customer.php">View More <i class="fas fa-arrow-right"></i></a>
                    </div>
                    <div id="Admin" class="info-box user-item">
                        <div class="heading">
                            <h5>Admins</h5>
                            <div class="info">
                                <i class="fas fa-user-lock"></i>
                            </div>
                        </div>
                        <div class="info-content">
                            <p>Total Admins</p>
                            <p class="num" data-target="<?php 
                                    // echo count($adminData);
                                ?>">
                                999
                            </p>
                        </div>
                        <a href="#admin">View More <i class="fas fa-arrow-right"></i></a>
                    </div> -->

                    <!-- <div id="Earning" class="info-box user-item">
                        <div class="heading">
                            <h5>Earnings</h5>
                            <div class="info">
                                <i class="fas fa-dollar-sign"></i>
                            </div>
                        </div>
                        <div class="info-content">
                            <p>Total Earnings</p>
                            <p class="num" data-target="<?php 
                                    // $result = mysqli_query($conn, 'SELECT SUM(booked_amount) AS value_sum FROM bookings'); 
                                    // $row = mysqli_fetch_assoc($result); 
                                    // $sum = $row['value_sum'];
                                    // echo $sum;
                                ?>">
                                999
                            </p>
                        </div>
                        <a href="#">View More <i class="fas fa-arrow-right"></i></a>
                    </div> -->

                <!-- </div>
                <h4>Other Admin</h4>
                <div id="admin">
                    <?php 
                        // Loop through Admin Data and show the admins in boxes other than the existing admin which is $user_id  == $_SESSION["user_id"]
                        // foreach($adminData as $admin)
                        // {
                        //     $adminArr = get_object_vars($admin);
                        //     if($adminArr["user_id"] == $user_id) 
                        //         continue;
                        //     $username = $adminArr["user_name"];
                        ?>
                            <div class="info-box admin-item">
                                <img src="../assets/img/user-profile-min.png" height="100px" alt="Profile Pic">
                                <!- <h4><?php 
                                // echo $username; 
                                ?></h4> -->
                                <!-- <p class="bio">Other Admin</p> -->
                            </div> 
                        <?php 
                        // }
                    ?>
                </div> -->
            </section>
                <footer>
                    <p>
                        <i class="far fa-copyright"></i> <?php echo date('Y');?> - Dekut Bus Booking System | Made with  by Stephen Ng'ang'a
                        </p>
                </footer>
        </div>
    </main>
    <script src="../assets/scripts/admin_dashboard.js"></script>
</body>
</html>