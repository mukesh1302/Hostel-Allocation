


<style>
/* Table styling */
.table {
    width: 100%;
    margin-bottom: 1rem;
    color: #212529;
}

.table-hover tbody tr:hover {
    background-color: #f8f9fa; /* Light gray background on hover */
}

.table th,
.table td {
    padding: 1rem;
    vertical-align: top;
    border-top: 1px solid #dee2e6;
    text-align: left; /* Align text to the left */
	font-family: 'Times New Roman', serif; /* Different font for data */
    font-weight: normal; /* Normal weight for data */
    color: #000;
}

.table thead th {
    background-color: #007bff; /* Bootstrap primary color */
    color: white; /* White text */
    border-bottom: 2px solid #dee2e6;
}

.table tbody tr:nth-child(odd) {
    background-color: #f2f2f2; /* Light gray for odd rows */
}

.table tbody tr:nth-child(even) {
    background-color: #ffffff; /* White for even rows */
}

.table tfoot td {
    font-weight: bold; /* Make footer cells bold */
}

.table caption {
    margin-bottom: 0.5rem;
    font-size: 1.5rem; /* Larger caption font */
}
</style>
<?php
require 'includes/config.inc.php';
// Rest of your existing code continues below

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title> Empty Rooms</title>
	
	<!-- Meta tag Keywords -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	<meta name="keywords" content="Intrend Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
	Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script type="application/x-javascript">
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!--bootsrap -->

	<!--// Meta tag Keywords -->
		
	<!-- css files -->
	<link rel="stylesheet" href="web_home/css_home/bootstrap.css"> <!-- Bootstrap-Core-CSS -->
	<link rel="stylesheet" href="web_home/css_home/style.css" type="text/css" media="all" /> <!-- Style-CSS --> 
	<link rel="stylesheet" href="web_home/css_home/fontawesome-all.css"> <!-- Font-Awesome-Icons-CSS -->
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
				
				<h1><a class="navbar-brand" href="home_manager.php">IITG<span class="display"></span></a></h1>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item">
							<a class="nav-link" href="home_manager.php">Home <span class="sr-only">(current)</span></a>
						</li>
						<li class="nav-item">
						<a class="nav-link" href="allocate_room.php">Allocate Rooms</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="message_hostel_manager.php">Messages Received</a>
					</li>
					<li class="dropdown nav-item">
						<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">Rooms
							<b class="caret"></b>
						</a>
						<ul class="dropdown-menu agile_short_dropdown">
							<li>
								<a href="allocated_rooms.php">Allocated Rooms</a>
							</li>
							<li>
								<a href="empty_rooms.php">Empty Rooms</a>
							</li>
							<li>
								<a href="vacate_rooms.php">Vacate Rooms</a>
							</li>
						</ul>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="contact_manager.php">Contact</a>
					</li>
					<li class="dropdown nav-item">
						<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown"><?php echo $_SESSION['username']; ?>
							<b class="caret"></b>
						</a>
						<ul class="dropdown-menu agile_short_dropdown">
							<li>
								<a href="admin/manager_profile.php">My Profile</a>
							</li>
							<li>
								<a href="includes/logout.inc.php">Logout</a>
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
				<form action="empty_rooms.php" method="post">
					<div class="row">
					        <div class="col-md-9"> 
							<input type="text" placeholder="Search by Room Number" name="search_box" required>
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
   	   /*echo "<script type='text/javascript'>alert('<?php echo $search_box; ?>')</script>";*/
   	   $hostel_id = $_SESSION['hostel_id'];
   	   $query_search = "SELECT * FROM Room WHERE Room_No like '$search_box%' and Hostel_id = '$hostel_id' and Allocated = '0'";
   	   $result_search = mysqli_query($conn,$query_search);

   	   //select the hostel name from hostel table
       $query6 = "SELECT * FROM Hostel WHERE Hostel_id = '$hostel_id'";
       $result6 = mysqli_query($conn,$query6);
       $row6 = mysqli_fetch_assoc($result6);
       $hostel_name = $row6['Hostel_name'];
   	   ?>
   	   <div class="container">
   	   <table class="table table-hover">
    <thead>
      <tr>
        <th>Hostel Name</th>
        <th>Room Number</th>
      </tr>
    </thead>
    <tbody>
    <?php
   	   if(mysqli_num_rows($result_search)==0){
   	   	  echo '<tr><td colspan="4">No Rows Returned</td></tr>';
   	   }
   	   else{
   	   	  while($row_search = mysqli_fetch_assoc($result_search)){
         
      		echo "<tr><td>{$hostel_name}</td><td>{$row_search['Room_No']}</td></tr>\n";
   	   }
   }
   ?>
   </tbody>
  </table>
</div>
<?php
}
  ?>



<!-- Pagination and Room Display -->
<div class="container">
    <h2 class="heading text-capitalize mb-sm-5 mb-4"> Empty Rooms </h2>

    <?php
    // Pagination and Room Limit Logic
    $limit_options = [10, 25, 50]; // Options for number of entries per page
    $limit = isset($_POST['limit']) ? (int)$_POST['limit'] : 10; // Default 10 entries per page
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;       // Current page number
    $start = ($page - 1) * $limit;                               // Starting index for SQL query

    $hostel_id = $_SESSION['hostel_id'];
    $query_total = "SELECT COUNT(*) as total FROM Room WHERE Hostel_id = '$hostel_id' AND Allocated = '0'";
    $result_total = mysqli_query($conn, $query_total);
    $total_rows = mysqli_fetch_assoc($result_total)['total'];

    $query6 = "SELECT * FROM Hostel WHERE Hostel_id = '$hostel_id'";
    $result6 = mysqli_query($conn, $query6);
    $row6 = mysqli_fetch_assoc($result6);
    $hostel_name = $row6['Hostel_name'];

    $query_rooms = "SELECT Room_No FROM Room WHERE Hostel_id = '$hostel_id' AND Allocated = '0' LIMIT $start, $limit";
    $result_rooms = mysqli_query($conn, $query_rooms);
    ?>

    <!-- Entries per page form -->
    <form action="empty_rooms.php" method="post" class="form-inline mb-3">
        <label for="limit" class="mr-2">Show entries:</label>
        <select name="limit" id="limit" class="form-control mr-2">
            <?php foreach ($limit_options as $option) { ?>
                <option value="<?php echo $option; ?>" <?php echo ($limit == $option) ? 'selected' : ''; ?>><?php echo $option; ?></option>
            <?php } ?>
        </select>
        <button type="submit" class="btn btn-primary">Apply</button>
    </form>

    <!-- Room Table -->
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Hostel Name</th>
                <th>Room Number</th>
            </tr>
        </thead>
        <tbody>
        <?php
        if (mysqli_num_rows($result_rooms) == 0) {
            echo '<tr><td colspan="2">No Rooms Available</td></tr>';
        } else {
            while ($row = mysqli_fetch_assoc($result_rooms)) {
                echo "<tr><td>{$hostel_name}</td><td>{$row['Room_No']}</td></tr>";
            }
        }
        ?>
        </tbody>
    </table>

    <!-- Pagination Links -->
    <?php
    $total_pages = ceil($total_rows / $limit); // Total number of pages
    if ($total_pages > 1) {
        echo '<nav><ul class="pagination justify-content-center">';
        for ($i = 1; $i <= $total_pages; $i++) {
            echo '<li class="page-item ' . ($page == $i ? 'active' : '') . '">';
            echo '<a class="page-link" href="empty_rooms.php?page=' . $i . '">' . $i . '</a>';
            echo '</li>';
        }
        echo '</ul></nav>';
    }
    ?>
</div>

<br><br><br>

<!-- footer -->
<footer class="py-5">
	<div class="container py-md-5">
		<div class="footer-logo mb-5 text-center">
			<a class="navbar-brand" href="http://www.iitg.ac.in/" target="_blank">IIT <span class="display">Guwahati</span></a>
		</div>
		<div class="footer-grid">
			<div class="list-footer">
				<ul class="footer-nav text-center">
					<li>
						<a href="home_manager.php">Home</a>
					</li>
					<li>
						<a href="allocate_room.php">Allocate</a>
					</li>
					<li>
						<a href="contact_manager.php">Contact</a>
					</li>
					<li>
						<a href="admin/manager_profile.php">Profile</a>
					</li>
				</ul>
			</div>
			
		</div>
	</div>
</footer>
<!-- footer -->

<!-- js-scripts -->

	<!-- js -->
	<script type="text/javascript" src="web_home/js/jquery-2.2.3.min.js"></script>
	<script type="text/javascript" src="web_home/js/bootstrap.js"></script> <!-- Necessary-JavaScript-File-For-Bootstrap -->
	<!-- //js -->

	<!-- banner js -->
	<script src="web_home/js/snap.svg-min.js"></script>
	<script src="web_home/js/main.js"></script> <!-- Resource jQuery -->
	<!-- //banner js -->

	<!-- flexSlider --><!-- for testimonials -->
	<script defer src="web_home/js/jquery.flexslider.js"></script>
	<script type="text/javascript">
		$(window).load(function(){
		  $('.flexslider').flexslider({
			animation: "slide",
			start: function(slider){
			  $('body').removeClass('loading');
			}
		  });
		});
	</script>
	<!-- //flexSlider --><!-- for testimonials -->

	<!-- start-smoth-scrolling -->
	<script src="web_home/js/SmoothScroll.min.js"></script>
	<script type="text/javascript" src="web_home/js/move-top.js"></script>
	<script type="text/javascript" src="web_home/js/easing.js"></script>
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			$(".scroll").click(function(event){
				event.preventDefault();
				$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
			});
		});
	</script>
	<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear'
				};
			*/

			$().UItoTop({ easingType: 'easeOutQuart' });

			});
	</script>
	<!-- //here ends scrolling icon -->
	<!-- start-smoth-scrolling -->

<!-- //js-scripts -->

</body>
</html>

