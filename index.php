<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 300px;
            text-align: center;
        }
        .logo {
            margin-bottom: 20px;
        }
        input[type="text"],
        input[type="password"],
        input[type="submit"] {
            width: calc(100% - 40px);
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="logo">
            <img src="logo.png" alt="Logo" width="250">
        </div>
        <h4>RUAS PORTAL</h4>
        <form action="" method="POST">
            <input type="text" name="username" placeholder="Username" required><br>
            <input type="password" name="password" placeholder="Password" required><br>
            <input type="submit" name="login" value="Login">
        </form>
        <hr>
        <h4>Register</h4>
        <form action="" method="POST">
            <input type="text" name="new_username" placeholder="New Username" required><br>
            <input type="password" name="new_password" placeholder="New Password" required><br>
            <input type="submit" name="register" value="Register">
        </form>
    </div>

    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ruas";

    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Handle login
        if (isset($_POST['login'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];

            // Check user credentials
            $query = "SELECT * FROM login WHERE username='$username' AND password='$password'";
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) == 1) {
                // Login successful
                echo "<script>alert('Login successful');</script>";
                // Redirect to dashboard or any other page
                header("Location: w.php");
            } else {
                // Login failed
                echo "<script>alert('Invalid username or password');</script>";
            }
        }

        // Handle registration
        if (isset($_POST['register'])) {
            $new_username = $_POST['new_username'];
            $new_password = $_POST['new_password'];

            // Check if the username is already taken
            $check_query = "SELECT * FROM login WHERE username='$new_username'";
            $check_result = mysqli_query($conn, $check_query);

            if (mysqli_num_rows($check_result) > 0) {
                // Username already exists
                echo "<script>alert('Username already exists. Please choose a different username.');</script>";
            } else {
                // Insert new user into the database
                $insert_query = "INSERT INTO login (username, password) VALUES ('$new_username', '$new_password')";
                if (mysqli_query($conn, $insert_query)) {
                    echo "<script>alert('Registration successful');</script>";
                } else {
                    echo "<script>alert('Error registering user');</script>";
                }
            }
        }
        // Close database connection
        mysqli_close($conn);
    }
    ?>
</body>
</html>
