<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #DAF7A6;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }
        .container img {
            display: block;
            margin: 0 auto;
            margin-bottom: 20px;
        }
        .container form {
            display: flex;
            flex-direction: column;
        }
        .container form label {
            margin-bottom: 8px;
            color: #333;
        }
        .container form input[type="text"],
        .container form input[type="email"],
        .container form select {
            margin-bottom: 20px;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        .container form input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .container form input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .search-form,
        .delete-form {
            margin-top: 20px;
            display: flex;
            justify-content: space-between;
        }
        .search-form input[type="text"],
        .delete-form input[type="text"] {
            flex: 1;
            margin-right: 10px;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        .search-form input[type="submit"],
        .delete-form input[type="submit"] {
            padding: 8px 20px;
            border: none;
            border-radius: 3px;
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .search-form input[type="submit"]:hover,
        .delete-form input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>RUAS STUDENT MANAGEMENT SYSTEM</h2>
    <img src="logo.png" height="60" width="200" alt="RUAS Logo">
    <h2>Insert Student data</h2>
    <form action="w.php" method="post">
        <label for="Student_name">Student_name:</label>
        <input type="text" id="Student_name" name="Student_name" required>

        <label for="REG_NO">REG_NO:</label>
        <input type="text" id="REG_NO" name="REG_NO" required>

        <label for="Select_Branch">Select_Branch:</label>
        <select id="Select_Branch" name="Select_Branch">
            <option value=""disabled selected>Select the Branch</option>
            <option value="Computer Science and Engineering">Computer Science and Engineering</option>
            <option value="Information Science and Engineering">Information Science and Engineering</option>
            <option value="Artificial Inteligence and Machine Learning">Artificial Inteligence and Machine Learning</option>
            <option value="Mechanical Engineering">Mechanical Engineering</option>
            <option value="Civil Engineering">Civil Engineering</option>
            <option value="Electrical And Electronics Engineering">Electrical And Electronics Engineering</option>
        </select>

        <label for="Contact_Number">Contact_Number:</label>
        <input type="text" id="Contact_Number" name="Contact_Number" required>

        <label for="Email">Email:</label>
        <input type="Email" id="Email" name="Email" required>

        <label for="Student_address">Student_address:</label>
        <input type="text" id="Student_address" name="Student_address" required>

        <label for="Fee_Details">Fee_Details:</label>
        <label for="PaymentID">PaymentID:</label>
        <input type="text" id="PaymentID" name="PaymentID" required>

        <label for="Amount">Amount:</label>
        <input type="text" id="Amount" name="Amount" required>

        <input type="submit" >
    </form>
    <!-- Search Form -->
    <form action="" method="post" class="search-form">
        <label for="Search for Student Details">Search for Student Details:</label>
            <input type="text" name="searchReg_Number" placeholder="Enter Reg_Number to search">
            <input type="submit" value="Search">
        </form>
        <!-- Delete Form -->
<form action="" method="post" class="delete-form">
    <label for="Delete Student Details">Delete Student Details:</label>
    <input type="text" name="deleteReg_Number" placeholder="Enter Reg_Number to delete">
    <input type="submit" value="Delete">
</form>
</div>
<div class="container">
    <h2>Update Student data</h2>
    <form action="" method="post">
        <label for="Update_REG_NO">Enter REG_NO to Update:</label>
        <input type="text" id="Update_REG_NO" name="Update_REG_NO" required>

        <!-- Add fields you want to update -->
        <label for="Update_Student_name">Student_name:</label>
        <input type="text" id="Update_Student_name" name="Update_Student_name">

        <label for="Update_Select_Branch">Select_Branch:</label>
        <select id="Update_Select_Branch" name="Update_Select_Branch">
        <option value=""disabled selected>Select the Branch</option>
            <option value="Computer Science and Engineering">Computer Science and Engineering</option>
            <option value="Information Science and Engineering">Information Science and Engineering</option>
            <option value="Artificial Inteligence and Machine Learning">Artificial Inteligence and Machine Learning</option>
            <option value="Mechanical Engineering">Mechanical Engineering</option>
            <option value="Civil Engineering">Civil Engineering</option>
            <option value="Electrical And Electronics Engineering">Electrical And Electronics Engineering</option>
            <!-- Options for branches -->
        </select>

        <label for="Update_Contact_Number">Contact_Number:</label>
        <input type="text" id="Update_Contact_Number" name="Update_Contact_Number" required>

        <label for="Update_Email">Email:</label>
        <input type="Email" id="Update_Email" name="Update_Email" required>

        <!-- Add other fields to update -->

        <input type="submit" value="Update">
    </form>
</div>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "RUAS";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if the form for inserting data is submitted
    if (isset($_POST['Student_name']) && isset($_POST['REG_NO']) && isset($_POST['Select_Branch']) && isset($_POST['Contact_Number']) && isset($_POST['Email']) && isset($_POST['Student_address']) && isset($_POST['PaymentID']) && isset($_POST['Amount'])) {
        $Student_name = $_POST['Student_name'];
        $REG_NO = $_POST['REG_NO'];
        $Select_Branch = $_POST['Select_Branch'];
        $Contact_Number = $_POST['Contact_Number'];
        $Email = $_POST['Email']; // Corrected name attribute
        $Student_address = $_POST['Student_address'];
        $PaymentID = $_POST['PaymentID'];
        $Amount = $_POST['Amount'];

        $sql = "INSERT INTO tb_data (`S_NO.`, `Student_name`, `REG_NO`, `Select_Branch`, `Contact_Number`, `Email`, `Student_address`, `PaymentID`, `Amount`) 
                VALUES (NULL,'$Student_name', '$REG_NO', '$Select_Branch', '$Contact_Number', '$Email', '$Student_address', '$PaymentID', '$Amount')";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    // Check if form is submitted for search
    if (isset($_POST['searchReg_Number'])) {
        $searchReg_Number = $_POST['searchReg_Number'];

        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // SQL query to search for details based on Reg_Number
        $sql = "SELECT * FROM tb_data WHERE REG_NO='$searchReg_Number'";
        $result = $conn->query($sql);

        if ($result === false) {
            // Query execution failed
            echo "Error executing the query: " . $conn->error;
        } else {
            // Check if any rows were returned
            if ($result->num_rows > 0) {
                // Output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "<h2>Student Details:</h2>";
                    echo "<p><strong>Student_name:</strong> " . $row["Student_name"]. "</p>";
                    echo "<p><strong>REG_NO:</strong> " . $row["REG_NO"]. "</p>";
                    echo "<p><strong>Select_Branch:</strong> " . $row["Select_Branch"]. "</p>";
                    echo "<p><strong>Contact_Number:</strong> " . $row["Contact_Number"]. "</p>";
                    echo "<p><strong>Email:</strong> " . $row["Email"]. "</p>";
                    echo "<p><strong>Student_address:</strong> " . $row["Student_address"]. "</p>";
                    echo "<p><strong>PaymentID:</strong> " . $row["PaymentID"]. "</p>";
                    echo "<p><strong>Amount:</strong> " . $row["Amount"]. "</p>";
                }
            } else {
                echo "No results found for Reg_Number: $searchReg_Number";
            }
        }
    }

    // Check if form is submitted for deletion
    if (isset($_POST['deleteReg_Number'])) {
        $deleteReg_Number = $_POST['deleteReg_Number'];
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // SQL query to delete the row based on Reg_Number
        $sql = "DELETE FROM tb_data WHERE REG_NO='$deleteReg_Number'";
        if ($conn->query($sql) === TRUE) {
            echo "Record with Reg_Number: $deleteReg_Number deleted successfully";
        } else {
            echo "Error deleting record: " . $conn->error;
        }
    }
}
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "RUAS";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if form is submitted for updating
    if (isset($_POST['Update_REG_NO']) && isset($_POST['Update_Student_name']) && isset($_POST['Update_Select_Branch']) && isset($_POST['Update_Contact_Number']) && isset($_POST['Update_Email'])) {
        $Update_REG_NO = $_POST['Update_REG_NO'];
        $Update_Student_name = $_POST['Update_Student_name'];
        $Update_Select_Branch = $_POST['Update_Select_Branch'];
        $Update_Contact_Number = $_POST['Update_Contact_Number'];
        $Update_Email = $_POST['Update_Email'];

        // SQL query to update the row based on REG_NO
        $sql = "UPDATE tb_data SET Student_name='$Update_Student_name', Select_Branch='$Update_Select_Branch', Contact_Number='$Update_Contact_Number', Email='$Update_Email' WHERE REG_NO='$Update_REG_NO'";
        if ($conn->query($sql) === TRUE) {
            echo "Record with REG_NO: $Update_REG_NO updated successfully";
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }
    // Close the connection
    $conn->close();
}

?>
</body>
</html>
