<?php
require '../includes/config.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Allocated Rooms</title>

    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="keywords" content="Intrend Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script type="application/x-javascript">
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);
        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- bootsrap -->

    <!-- //Meta tag Keywords -->

    <!-- css files -->
    <link rel="stylesheet" href="../web_home/css_home/bootstrap.css"> <!-- Bootstrap-Core-CSS -->
    <link rel="stylesheet" href="../web_home/css_home/style.css" type="text/css" media="all" /> <!-- Style-CSS -->
    <link rel="stylesheet" href="../web_home/css_home/fontawesome-all.css"> <!-- Font-Awesome-Icons-CSS -->
    <!-- //css files -->

    <!-- web-fonts -->
    <link href="//fonts.googleapis.com/css?family=Poiret+One&amp;subset=cyrillic,latin-ext" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">
    <!-- //web-fonts -->

</head>

<body>

<!-- banner -->
<div class="inner-page-banner" id="home">
    <!--Header-->
    <header>
        <div class="container agile-banner_nav">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">

                <h1><a class="navbar-brand" href="admin_home.php">IITG<span class="display"> </span></a></h1>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="admin_home.php">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="create_hm.php">Appoint Hostel Manager</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="students.php">Students</a>
                        </li>
                        <li class="dropdown nav-item">
                            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown"><?php echo $_SESSION['username']; ?>
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu agile_short_dropdown">
                                <li>
                                    <a href="admin_profile.php">My Profile</a>
                                </li>
                                <li>
                                    <a href="../includes/logout.inc.php">Logout</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>
    <!--Header-->
</div>
<!-- //banner -->
<br><br><br>

<section class="contact py-5">
    <div class="container">
        <div class="mail_grid_w3l">
            <form action="students.php" method="post">
                <div class="row">
                    <div class="col-md-9">
                        <input type="text" placeholder="Search by Roll Number" name="search_box">
                    </div>
                    <div class="col-md-3">
                        <input type="submit" value="Search" name="search"></input>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

<?php
if (isset($_POST['search'])) {
    $search_box = $_POST['search_box'];
    $hostel_id = $_SESSION['hostel_id'];
    $query_search = "SELECT * FROM Student WHERE Student_id LIKE '$search_box%'";
    $result_search = mysqli_query($conn, $query_search);
    $has_results = false;

    // Check if any student has a room allocated
    while ($row_search = mysqli_fetch_assoc($result_search)) {
        $room_id = $row_search['Room_id'];
        if (!empty($room_id)) {
            $has_results = true;
            break;
        }
    }

    if ($has_results) {
        mysqli_data_seek($result_search, 0); // Reset the pointer to fetch results again
        ?>
        <div class="container">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Student Name</th>
                        <th>Student ID</th>
                        <th>Contact Number</th>
                        <th>Hostel</th>
                        <th>Room Number</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                while ($row_search = mysqli_fetch_assoc($result_search)) {
                    $room_id = $row_search['Room_id'];
                    if (!empty($room_id)) {
                        $studentHID = $row_search['Hostel_id'];
                        $query7 = "SELECT * FROM Room WHERE Room_id = '$room_id'";
                        $result7 = mysqli_query($conn, $query7);
                        $row7 = mysqli_fetch_assoc($result7);
                        $query88 = "SELECT * FROM Hostel WHERE Hostel_id = '$studentHID'";
                        $result88 = mysqli_query($conn, $query88);
                        $row88 = mysqli_fetch_assoc($result88);
                        $room_no = $row7['Room_No'];
                        $hostel_name = $row88['Hostel_name'];
                        $student_name = $row_search['Fname'] . " " . $row_search['Lname'];

                        echo "<tr><td>{$student_name}</td><td>{$row_search['Student_id']}</td><td>{$row_search['Mob_no']}</td><td>{$hostel_name}</td><td>{$room_no}</td></tr>\n";
                    }
                }
                ?>
                </tbody>
            </table>
        </div>
        <?php
    } else {
        echo "<div class='container'><p>No students with allocated rooms found.</p></div>";
    }
}
?>

<div class="container">
    <h2 class="heading text-capitalize mb-sm-5 mb-4">Rooms Allotted</h2>
    <?php
    $query1 = "SELECT * FROM Student";
    $result1 = mysqli_query($conn, $query1);
    $rooms_allotted = false;

    // Check if any student has a room allocated
    while ($row1 = mysqli_fetch_assoc($result1)) {
        $room_id = $row1['Room_id'];
        if (!empty($room_id)) {
            $rooms_allotted = true;
            break;
        }
    }

    if ($rooms_allotted) {
        mysqli_data_seek($result1, 0); // Reset the pointer to fetch results again
        ?>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Student Name</th>
                    <th>Student ID</th>
                    <th>Contact Number</th>
                    <th>Hostel</th>
                    <th>Room Number</th>
                </tr>
            </thead>
            <tbody>
            <?php
            while ($row1 = mysqli_fetch_assoc($result1)) {
                $room_id = $row1['Room_id'];
                if (!empty($room_id)) {
                    $HID = $row1['Hostel_id'];
                    $query7 = "SELECT * FROM Room WHERE Room_id = '$room_id'";
                    $result7 = mysqli_query($conn, $query7);
                    $row7 = mysqli_fetch_assoc($result7);
                    $room_no = $row7 ? $row7['Room_No'] : 'None';

                    $query99 = "SELECT * FROM Hostel WHERE Hostel_id = '$HID'";
                    $result99 = mysqli_query($conn, $query99);
                    $row99 = mysqli_fetch_assoc($result99);
                    $HNM = $row99 ? $row99['Hostel_name'] : 'None';

                    $student_name = $row1['Fname'] . " " . $row1['Lname'];

                    echo "<tr><td>{$student_name}</td><td>{$row1['Student_id']}</td><td>{$row1['Mob_no']}</td><td>{$HNM}</td><td>{$room_no}</td></tr>\n";
                }
            }
            ?>
            </tbody>
        </table>
        <?php
    } else {
        echo "<p>No rooms allocated to students.</p>";
    }
    ?>
</div>

<br>
<br>
<br>

<!-- footer -->
<footer class="py-5">
    <div class="container py-md-3">
        <div class="footer">
            <div class="row">
                <div class="col-12 text-center">
                    <p>© 2018 Intrend. All Rights Reserved | Design by <a href="http://w3layouts.com/" target="_blank">W3layouts</a></p>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- //footer -->

<!-- js-scripts -->
<!-- js -->
<script type="text/javascript" src="../web_home/js/jquery-2.2.3.min.js"></script>
<script type="text/javascript" src="../web_home/js/bootstrap.js"></script>
<!-- //js -->

</body>
</html>
