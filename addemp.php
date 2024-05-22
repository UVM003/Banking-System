<?php
session_start();
if(!isset($_SESSION['branch_no'])){ header('location:login.php');}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Employee Enrollment - YSVP Bank</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }
      
        .container {
            margin-top:60px;
            width: 35%;
            text-align: center;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        label {
            margin-bottom: 8px;
        }

        input {
            width: 50%;
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border: none;
            border-radius: 5px;
            background-color: #4caf50;
            color: white;
            font-weight: bold;
        }
    </style>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <?php
     $con = new mysqli('localhost', 'root', '', 'bankmini');
     
     if ($con->connect_error) {
         die("Connection failed: " . $con->connect_error);
     }
     
     if (isset($_POST['employeeId'])) {
         
         $employeeName = $_POST["employeeName"];
         $address = $_POST["address"];
         $mobileNo = $_POST["mobileNo"];
         $branchName = $_POST["branchName"];
         $branchId = $_POST["branchId"];
         $employeeId = $_POST["employeeId"];
         $username = $_POST["username"];
         $salary = $_POST["salary"];
         $password = $_POST["password"];

         $sql=$con->query("Insert into employee(emp_id, emp_name, address, mobileno, salary, branch_no) values('$employeeId', '$employeeName', '$address', '$mobileNo', '$salary', '$branchId')");
         $insertLoginQuery = "INSERT INTO login (login_id, username, password, type) 
        VALUES (?, ?, ?, 'employee')";
        $stmtLogin = $con->prepare($insertLoginQuery);
        $stmtLogin->bind_param("iss", $employeeId, $username, $password);
        $loginInserted = $stmtLogin->execute();
        if ($sql&& $loginInserted) {
            echo "<div>Customer Enrollment completed successfully!</div>";
            echo "<script>
            setTimeout(function() {
                window.location.href = 'addemp.php';
            }, 2000); // Reload after 3 seconds (3000 milliseconds)
        </script>";
        } else {
            echo "<div>Error: " . $con->error . "</div>";
        }
        }
    ?>
</head>
<body>
<a href="mindex.php"><button type="button" class="btn btn-info" style="margin-top:30px;margin-left:10px;position: absolute; top: 0; left: 0;">Back</button></a>

    <div style="margin-top:80px;" class="container">
        <h2><center>New Employee Enrollment</center></h2>
        <br>
        <br>
        <form  method="post">
            <label for="employeeName">Employee Name:</label>
            <input type="text" id="employeeName" name="employeeName" required>

            <label for="employeeId">Employee ID:</label>
            <input type="text" id="employeeId" name="employeeId" required>
            <label for="employeeId">Gender:</label>
            <input type="text"required>

            <label for="address">Address:</label>
            <input type="text" id="address" name="address" required>

            <label for="mobileNo">Mobile No:</label>
            <input type="text" id="mobileNo" name="mobileNo" required>

            
            <label for="salary">Salary:</label>
            <input type="text" name="salary" required>

            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <label for="branchName">Branch Name:</label>
            <input type="text" id="branchName" name="branchName" required>

            <label for="branchId">Branch ID:</label>
            <input type="text" id="branchId" name="branchId" required>
            <br>
            <br>
            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>
