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
	font-family: 'Times New Roman', serif;
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
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title> HMS</title>
	
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
	<!--// Meta tag Keywords -->
		
	<!-- css files -->
	<link rel="stylesheet" href="web_home/css_home/bootstrap.css"> <!-- Bootstrap-Core-CSS -->
	<link rel="stylesheet" href="web_home/css_home/style.css" type="text/css" media="all" /> <!-- Style-CSS --> 
	<link rel="stylesheet" href="web_home/css_home/fontawesome-all.css"> <!-- Font-Awesome-Icons-CSS -->
	<!-- //css files -->
	
	<!-- web-fonts -->
	<link href="//fonts.googleapis.com/css?family=Poiret+One&amp;subset=cyrillic,latin-ext" rel="stylesheet">
	<!-- //web-fonts -->
	
</head>
<style type="text/css">
	.card-header{
		padding: 15px;
		font-size: 30px;
	}
	.card-body{
		padding: 15px;
	}
	.card-footer{
		text-align: left;
		padding: 15px;
	}
</style>

<body>

<!-- banner -->
<div class="inner-page-banner" id="home"> 	   
	<!--Header-->
	<header>
		<div class="container agile-banner_nav">
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
				
				<h1><a class="navbar-brand" href="home.php">IITG <span class="display"></span></a></h1>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item">
							<a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
						</li>
						
						<li class="nav-item">
							<a class="nav-link" href="services.php">Hostels</a>
						</li>
						<li class="nav-item active">
							<a class="nav-link" style=text-decoration:none; href="contact.php">Complaints</a>
						</li>
						<li class="nav-item">
						<a class="nav-link" style=text-decoration:underline; href="message_user.php">Message Received</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="https://www.iitg.ac.in/hab/">HAB</a>
					</li>
						<li class="dropdown nav-item">
						<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown"><?php echo $_SESSION['roll']; ?>
							<b class="caret"></b>
						</a>
						<ul class="dropdown-menu agile_short_dropdown">
							<li>
								<a href="profile.php">My Profile</a>
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

<?php
    $roll_no = $_SESSION['roll'];
    $query = "SELECT * FROM Message WHERE receiver_id ='$roll_no'";
    $result = mysqli_query($conn,$query);

    // Table header
    echo '
    <div class="container">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Subject</th>
                    <th>Message</th>
                    <th>Hostel Manager</th>
                    <th>Date</th>
                    <th>Time</th>
                </tr>
            </thead>
            <tbody>
    ';

    // Fetch and display each row in the table
    while ($row = mysqli_fetch_assoc($result)){  
        $hostel_id = $row['hostel_id'];
        $query6 = "SELECT * FROM Hostel WHERE Hostel_id = '$hostel_id'";
        $result6 = mysqli_query($conn,$query6);
        $row6 = mysqli_fetch_assoc($result6);
        $hostel_name = $row6['Hostel_name'];

        echo '
            <tr>
                <td>' . $row['subject_h'] . '</td>
                <td>' . $row['message'] . '</td>
                <td>' . $hostel_name . ' Hostel Manager</td>
                <td>' . $row['msg_date'] . '</td>
                <td>' . $row['msg_time'] . '</td>
            </tr>
        ';
    }

    // Close table
    echo '
            </tbody>
        </table>
    </div>
    ';
?>


<br>
<br>

<!-- footer -->
<footer class="py-5">
	<div class="container py-md-5">
		<div class="footer-logo mb-5 text-center">
			<a class="navbar-brand" href="http://www.iitg.ac.in/" target="_blank">IIT <span class="display"> Guwahati</span></a>
		</div>
		<div class="footer-grid">
			
			<div class="list-footer">
				<ul class="footer-nav text-center">
					<li>
						<a href="home.php">Home</a>
					</li>
					<li>
						<a href="services.php">Hostels</a>
					</li>
					
					<li>
						<a href="contact.php">Complaints</a>
					</li>
					<li>
						<a href="profile.php">Profile</a>
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