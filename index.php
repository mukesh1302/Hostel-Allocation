<!DOCTYPE html>
<html lang="en">

<head>
    <title>Hostel Allocation Portal</title>
    <style>
        body {
            margin: 0;
            padding-bottom: 600px;
            background-image: url('12.jpg');
            background-size: cover;
            background-position: center;
            font-family: Arial, sans-serif;
            color: #fff;
            height: 30vh;
        }

        /* Updated nav bar styling */
        nav {
            background-color: #567d9e ;
            padding: 0px 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-radius: 1px;
            max-width: 100%;
         
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.4);
        }

        .logo img {
            height: 70px;
        }

        nav a {
            padding: 4px 15px;
            margin: 0 5px;
            text-decoration: none;
            color: yellow;
            font-family: 'Arial', sans-serif;
            font-size: 20px;
	    font-weight: bold;
            border: 2px solid transparent;
            transition: 0.3s ease;
        }

        nav a:hover {
            color: #fff;
            border-bottom: 2px solid #00FF7F;
        }

        h2 {
            text-align: center;
            font-family: 'verdana';
            color: skyblue;
            font-size: 35px;
            margin-top: 5px;
            text-shadow: 2px 2px 4px #000;
            margin-bottom: 0;
        }

        .container {
            display: flex;
            justify-content: space-around;
            align-items: center;
        }

        /* Heading in the center of the navbar */
        .heading {
            text-align: center;
            font-family: monospace;
            color: #62C3FA;
            font-size: 27px;
            text-shadow: 2px 2px 4px #000;
            margin-top: -20px ;
	    margin-bottom: -20px;
	   
        }

    </style>
</head>

<body>
    <nav class="home">
        <div class="logo">
            <img src="logo.png" alt="Hostel Logo">
        </div>
        <div class="heading">
            <p><h2>Hostel Allocation Portal</h2>
            IIT Guwahati</p>
        </div>
        <div class="container">
            <a href="index.php">Home</a>
            <a href="student_login.php">Student</a>
            <a href="admin_login.php">Admin</a>
	    <a href="allocation.php">Allocation</a>
        </div>
    </nav>
</body>

</html>
