<?php

    require '_functions.php';
    $conn = db_connect();

    // Getting user details
    // $user_id = $_SESSION['user_id'];
    // $sql = "SELECT * FROM users WHERE user_id = $user_id";
    // $result = mysqli_query($conn, $sql);
    // if($row = mysqli_fetch_assoc($result))
    // {
    //     $user_fullname = $row["user_fullname"];
    //     $user_name = $row["user_name"];
    // }
?>

<!-- <header>
        <nav id="navbar">
            <ul>
                <li class="nav-item">
                    <?php 
                        echo $user_name;
                    ?>
                </li>
                <li class="nav-item">
                    <img class="adminDp" src="../assets/img/admin_pic.jpg" alt="Admin Profile Pic" width="22px" height="22px">
                </li>
            </ul>
        </nav>
    </header> -->
    <main id="container">
        <div id="main-content">
            <section id="welcome">
                <ul>
                    <li class="welcome-item">
                        <span id="USER">
                            <?php 
                                
                            ?>
                        </span>
                    </li>
                    <li class="welcome-item">
                    </li>
                </ul>
            </section>