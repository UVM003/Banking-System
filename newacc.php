<?php
session_start();
if(!isset($_SESSION['emp_id'])){ header('location:login.php');}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Account Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .container {
            margin-top:100px;
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
            width: 100%;
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
</head>
<?php
$con = new mysqli('localhost', 'root', '', 'bankmini');

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

if (isset($_POST['customerId'])) {
    $customerId = $_POST["customerId"];
    $accountNo = $_POST["accountNo"];
    $accountType = $_POST["accountType"];
    $balance = $_POST["initialDeposit"];
    $branchId = $_POST["branchId"];

    
    $sql = "INSERT INTO account(acc_no, cus_id, type, balance, branch_no) 
            VALUES ('$accountNo', $customerId,'$accountType', '$balance','$branchId')";
    
    if ($con->query($sql) === TRUE) {
        echo '<div style="position: absolute; top: 0; left: 0;">New account created successfully!</div>';
        echo "<script>
        setTimeout(function() {
            window.location.href = 'newacc.php';
        }, 3000); // Reload after 3 seconds (3000 milliseconds)
    </script>";
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }

    $con->close();
}
?>
<body>
<a href="eindex.php"><button type="button" class="btn btn-info" style="margin-top:40px;margin-left:10px;position: absolute; top: 0; left: 0;">Back</button></a>
<div class="container">
    <h2>New Account Form</h2>

    <form  method="post">
        <label for="customer_id">Customer ID:</label>
        <input type="text" id="customer_id" name="customerId" required>

        <label for="customer_name">Customer Name:</label>
        <input type="text" id="customer_name" name="customer_name" required>

        <label for="account_no">Account Number:</label>
        <input type="text" id="account_no" name="accountNo" required>

        <label for="account_type">Account Type:</label>
        <select id="account_type" name="accountType">
            <option value="SB">Savings</option>
            <option value="C">Current</option>
            <option value="FD">Fixed Deposit</option>
            <option value="RD">Reccuring Deposit</option>
        </select>

        <label for="initial_deposit">Initial Deposit:</label>
        <input type="text" id="initial_deposit" name="initialDeposit" required>

        <label for="branch_id">Branch ID:</label>
        <input type="text" id="branch_id" name="branchId" required>

         <label for="branch">Branch Name:</label>
        <input type="text" id="branch" name="branch" required>

        
        <button type="submit">Create</button>
    </form>
</div>

</body>
</html>