<?php
$fname=$lname=$program=$course=$rollno=$pass=$cpass="";
$password_pattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/';
$fnameerr=$lnameerr=$programerr=$courseerr=$rollnoerr=$passerr=$cpasserr="";

if($_SERVER["REQUEST_METHOD"] == "POST") {
    // First Name
    if(!empty($_POST["fname"])) {
        $fname = htmlspecialchars($_POST["fname"]);
    } else {
        $fnameerr = "Please Fill The Required Input";
    }

    // Last Name
    if(!empty($_POST["lname"])) {
        $lname = htmlspecialchars($_POST["lname"]);
    } else {
        $lnameerr = "Please Fill The Required Input";
    }

    // Program
    if(!empty($_POST["program"])) {
        $program = htmlspecialchars($_POST["program"]);
    } else {
        $programerr = "Please Fill The Required Input";
    }

    // Course
    if(!empty($_POST["course"])) {
        $course = htmlspecialchars($_POST["course"]);
    } else {
        $courseerr = "Please Fill The Required Input";
    }

    // Roll Number
    if(!empty($_POST["rollno"])) {
        $rollno = htmlspecialchars($_POST["rollno"]);
	if(!preg_match("/^[0-9]*$/",$rollno)){
	$rollnoerr="Enter Numeric Values only";
	} 
    } else {
        $rollnoerr = "Please Fill The Required Input";
    }

    // Password Validation
    if(!empty($_POST["password"])) {
        $pass = $_POST["password"];
        if(!preg_match($password_pattern, $pass)) {
            $passerr = "Password must be at least 8 characters long and contain at least 1 uppercase letter, 1 lowercase letter, 1 number, and 1 special character.";
        }
    } else {
        $passerr = "Please Fill The Required Input";
    }

    // Confirm Password Validation
    if(!empty($_POST["confirm_password"])) {
        $cpass = $_POST["confirm_password"];
        if($pass !== $cpass) {
            $cpasserr = "Passwords do not match.";
        }
    } else {
        $cpasserr = "Please Fill The Required Input";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Sign-Up</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
        }

        body {
            background: linear-gradient(135deg, #6A82FB, #FC5C7D);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 40px;
        }

        .formdetail {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 50px;
            border-radius: 15px;
            width: 400px;
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.3);
            text-align: center;
        }

        h1 {
            font-size: 30px;
            color: #444;
            margin-bottom: 40px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            font-size: 18px;
            color: #444;
            margin-bottom: 10px;
            text-align: left;
        }

        input {
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            transition: border-color 0.3s;
            font-size: 16px;
        }

        input:focus {
            border-color: #6A82FB;
        }

        span {
            color: red;
            font-size: 14px;
            margin-top: -15px;
            text-align: left;
            display: block;
        }

        .submit {
            background-color: #6A82FB;
            color: white;
            padding: 15px;
            font-size: 18px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            font-weight: bold;
        }

        .submit:hover {
            background-color: #FC5C7D;
        }

        .sign-up {
            margin-top: 20px;
            font-size: 16px;
            text-decoration: underline;
            color: #6A82FB;
            cursor: pointer;
        }

        .sign-up:hover {
            color: #FC5C7D;
        }
    </style>
</head>
<body>
    <div class="formdetail">
        <h1>Student Sign-Up</h1>
        <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
            <label for="fs">First Name:</label>
            <input id="fs" name="fname" type="text" placeholder="Enter First Name" value="<?php echo $fname; ?>">
            <span><?php echo $fnameerr; ?></span>
            
            <label for="ls">Last Name:</label>
            <input id="ls" name="lname" type="text" placeholder="Enter Last Name" value="<?php echo $lname; ?>">
            <span><?php echo $lnameerr; ?></span>

            <label for="program">Program:</label>
            <input id="program" name="program" type="text" placeholder="Enter Your Program" value="<?php echo $program; ?>">
            <span><?php echo $programerr; ?></span>

            <label for="course">Department:</label>
            <input id="course" name="course" type="text" placeholder="Enter Your Department" value="<?php echo $course; ?>">
            <span><?php echo $courseerr; ?></span>

            <label for="rollno">Roll Number:</label>
            <input id="rollno" name="rollno" type="text" placeholder="Enter Roll Number" value="<?php echo $rollno; ?>">
            <span><?php echo $rollnoerr; ?></span>

            <label for="password">Password:</label>
            <input id="password" name="password" type="password" placeholder="Create Password">
            <span><?php echo $passerr; ?></span>

            <label for="confirm_password">Confirm Password:</label>
            <input id="confirm_password" name="confirm_password" type="password" placeholder="Confirm Password">
            <span><?php echo $cpasserr; ?></span>

            <button class="submit" type="submit">Submit</button>
        </form>

        <div class="sign-up">
            <a href="student_login.php">Already have an account? Sign In</a>
        </div>
    </div>
</body>
</html>
