<?php

session_start();

include 'conn.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);

    $check_email = "SELECT * FROM `user947` WHERE email = '$email'";
    $email_query = mysqli_query($conn, $check_email);

    $email_count = mysqli_num_rows($email_query);

    if ($email_count > 0) {
        echo "<script>
        alert('Email Already Registered');
        </script>";
    } else {
        if ($password === $cpassword) {
            $pass = password_hash($password, PASSWORD_BCRYPT);
            $sql = "INSERT INTO `user947` (`name`, `email`, `password`) VALUES ('$name', '$email', '$pass')";

            $result = mysqli_query($conn, $sql);

            if ($result) {
                echo "<script>
                    alert('Account Created Successfully');
                    location = 'index.php';
                </script>";
            } else {
                echo "<script>
                    alert('Account not created');
                </script>";
            }
        } else {
            echo "<script>
                alert('Password doesn't match ');
            </script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="Assets/images/logo.png" type="image/x-icon">
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="CSS/login.css">
    <link rel="stylesheet" href="CSS/utils.css">
    <script src="JavaScript/main.js"></script>
    <title>Ride With Me - Signup</title>
</head>

<body>
    <div class="main">
        <!-- <header>
            <div class="navbar">
                <ul class="nav-items">
                    <a href="index.php">
                        <h2>Ride With Me</h2>
                    </a>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="bookcab.php">Book Cab</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="contact.php">Contact Us</a></li>
                </ul>
                <div class="icon">
                    <a href="login.html"><img src="Assets/images/man.png" alt="Profile"></a>
                    <button type="button"><a href="login.php">LOGIN</a></button>
                    <button type="button"><a href="signup.php">SIGN UP</a></button>
                </div>
            </div>
        </header> -->
        <section class="text-gray-600 body-font">
            <div class="container px-5 py-8 mx-auto flex flex-wrap items-center">
                <div class="lg:w-3/5 md:w-1/2 md:pr-16 lg:pr-0 pr-0">
                    <h1 class="title-font font-bold text-3xl text-black">Welcome To Ride With Me - Cab Service</h1>
                    <p class="leading-relaxed mt-4 text-black">Create an Account</p>
                </div>
                <form class="lg:w-2/6 md:w-1/2 bg-gray-100 rounded-lg p-8 flex flex-col md:ml-auto w-full mt-10 md:mt-0" name="myForm" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
                    <h2 class="text-gray-900 text-lg font-medium title-font mb-5">Sign Up</h2>
                    <div class="relative mb-4">
                        <label for="username" class="leading-7 text-sm text-gray-600">Full Name</label>
                        <input type="text" id="username" name="username" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" required>
                    </div>
                    <div class="relative mb-4">
                        <label for="email" class="leading-7 text-sm text-gray-600">Email</label>
                        <input type="email" id="email" name="email" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" required>
                    </div>
                    <div class="relative mb-4">
                        <label for="password" class="leading-7 text-sm text-gray-600">Password</label>
                        <input type="password" id="password" name="password" required class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" required minlength="6" maxlength="18">
                    </div>
                    <div class="relative mb-4">
                        <label for="cpassword" class="leading-7 text-sm text-gray-600">Confirm Password</label>
                        <input type="password" id="cpassword" name="cpassword" required class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" required minlength="6" maxlength="18">
                    </div>
                    <button type="submit" class="btn text-white border-0 py-2 px-8 focus:outline-none rounded text-lg">Create
                        Account</button>
                    <a class="text-xs mx-auto text-gray-500 mt-3" href="index.php">OR LOGIN</a>
                </form>
            </div>
        </section>
    </div>
    <!-- <script src="/JavaScript/signup.js"></script> -->
</body>

</html>