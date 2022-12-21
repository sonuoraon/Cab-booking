<?php

session_start();

include 'conn.php';

// $sql = mysqli_query($conn, "SELECT * FROM `user947`  WHERE email = '$email'");
// $row = mysqli_fetch_array($sql);


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['username'];
    $email = $_POST['email'];

    $current_user = $_SESSION['username'];
    $sql = "SELECT * FROM `user947` WHERE name = '$current_user'";

    $update = "UPDATE `user947` SET `name` = '$name', `email` = '$email' where `email` = '$email'";
    $result = mysqli_query($conn, $update);

    if ($update) {
        echo "<script>
        alert('Profile Updated Successfully');
        </script>";
    }else {
        echo mysqli_error($conn);
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
    <link rel="stylesheet" href="CSS/profile.css">
    <link rel="stylesheet" href="CSS/utils.css">
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <script src="JavaScript/main.js"></script>
    <title>Profile</title>
</head>

<body>
    <header>
        <div class="navbar">
            <ul class="nav-items ml-5">
                <!-- <a href="profile.php">
                    <h2>Profile</h2>
                </a> -->
                <li><a href="home.php">Home</a></li>
                <li><a href="bookcab.php">Book Cab</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="contact.php">Contact Us</a></li>
            </ul>
            <div class="icon">
                <a href="profile.php"><img src="Assets/images/man.png" alt="Profile"></a>
                <!-- <button type="button"><a href="logout.php">LOG OUT</a></button> -->
            </div>
        </div>
    </header>
    <div class="main">
        <section class="text-gray-600 body-font">
            <div class="container px-5 py-20 mx-auto flex flex-wrap items-center">
                <div class="lg:w-3/5 md:w-1/2 md:pr-16 lg:pr-0 pr-0">
                    <h1 class="title-font font-bold text-3xl text-black">Welcome To Ride With Me - Cab Service</h1>
                    <p class="leading-relaxed mt-4 text-black">Update Profile</p>
                </div>
                <form class="lg:w-2/6 md:w-1/2 bg-gray-100 rounded-lg p-8 flex flex-col md:ml-auto w-full mt-10 md:mt-0" name="myForm" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
                    <h2 class="text-gray-900 text-lg font-medium title-font mb-5">Update Profile</h2>
                    <div class="relative mb-4">
                        <label for="username" class="leading-7 text-sm text-gray-600">Name</label>
                        <input type="text" id="username" name="username" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" required value="<?php echo  $_SESSION['username']; ?>">
                    </div>
                    <div class="relative mb-4">
                        <label for="email" class="leading-7 text-sm text-gray-600">Email</label>
                        <input type="email" id="email" name="email" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" required value="<?php echo  $_SESSION['email']; ?>">
                    </div>
                    <!-- <div class="relative mb-4">
                        <label for="password" class="leading-7 text-sm text-gray-600">Password</label>
                        <input type="password" id="password" name="password" required class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" required minlength="6" maxlength="18" value="<?php echo  $_SESSION['password']; ?>">
                    </div> -->
                    <button class="btn text-white border-0 py-2 px-8 focus:outline-none rounded text-lg">Update Profile</button>
                    <button type="button" class="btn mt-2 text-white border-0 py-2 px-8 focus:outline-none rounded text-lg"><a href="logout.php">LOG OUT</a></button>
                    <a class="text-xs mx-auto text-gray-500 mt-3" href="changePassword.php">Change Password</a>
                </form>
            </div>
        </section>
    </div>
</body>

</html>