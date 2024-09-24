<!DOCTYPE html>
<html lang="en">

<head>
    <title>Student Login Page</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-image: url('6.jpg');
            background-size: cover;
            font-family: Arial, sans-serif;
        }

        h2 {
            text-align: center;
            font-family: 'Papyrus', sans-serif;
            font-size: 36px;
            color: #ffffff;
            font-weight: bold;
            margin-top: 50px;
            margin-right: 35px;
        }

        /* Navbar Styling */
        nav {
            background-color: rgba(0, 0, 0, 0.1);
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.5);
        }

        nav .logo img {
            height: 60px;
        }

        nav .nav-links {
            list-style-type: none;
            display: flex;
            gap: 30px;
        }

        nav .nav-links a {
            text-decoration: none;
            color: white;
            font-size: 20px;
            font-weight: bold;
            padding: 8px 8px;
            border-radius: 8px;
            transition: background-color 0.3s ease;
        }

        nav .nav-links a:hover {
            background-color: #1E90DA;
        }

        .login {
            background-color: rgba(0, 0, 0, 0.6);
            padding: 20px;
            border-radius: 15px;
            max-width: 400px;
            margin: auto;
            margin-top: 90px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.5);
        }

        label {
            font-size: 20px;
            color: #ffffff;
        }

        input {
            width: 90%;
            padding: 10px;
            margin-top: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #6E99DE;
            color: #fff;
        }

        .submit-btn {
            padding: 10px 10px;
            border-radius: 10px;
            font-size: 18px;
            border: none;
            background-color: #1E90DA;
            color: white;
            cursor: pointer;
            width: 30%;
            margin-left: 35%;
            margin-bottom: 20px;
            transition: background-color 0.3s ease;
        }

        .submit-btn:hover {
            background-color: #3B5998;
        }

        .signup-link {
            display: block;
            text-align: center;
            text-decoration: none;
            color: #FFD700;
            font-size: 18px;
            cursor: pointer;
            padding-top: 10px;
        }

        .signup-link:hover {
            text-decoration: underline;
        }

        img {
            height: 100px;
            float: left;
        }

        h1 {
            text-align: center;
            font-family: Lucida Console;
            color: yellow;
            font-size: 40px;
        }

    </style>
</head>

<body>
    <!-- Navbar -->
    <nav>
        <div class="logo">
            <img src="logo.png" alt="Logo">
        </div>
        <ul class="nav-links">
            <li><a href="index.php">Home</a></li>
            <li><a href="student_login.php">Student</a></li>
            <li><a href="admin_login.php">Admin</a></li>
	    <li><a href="allocation.php">Allocation</a></li>

        </ul>
    </nav>

    <h2>Admins Login Here!!</h2>

    <div class="login">
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" required>

            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required>

            <button type="submit" class="submit-btn" value="Signin">Sign In</button>
            <a class="signup-link" href="stud_sign_up.php">New user? Sign Up</a>
        </form>
    </div>

</body>

</html>
