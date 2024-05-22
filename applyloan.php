<?php
session_start();
if(!isset($_SESSION['cus_id'])){ header('location:login.php');}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apply Loans</title>
    <link rel="stylesheet" href="applyloans.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<style>
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
            margin-top:80px;
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

 </style>
 <?php
$con = new mysqli('localhost','root','','bankmini');
if (isset($_POST['customer_id'])) {
    $customer_id = $_POST['customer_id'];
    $branch_id = $_POST['branch_id'];
    $loan_type = $_POST['loan_type'];
    $loan_tenure = $_POST['loan_tenure'];
    $loan_amount = $_POST['loan_amount'];

    $stmt = $con->prepare("INSERT INTO loan (amount,type, loan_tenure, approval, branch_no, cus_id) VALUES (?, ?, ?, 'pending', ?, ?)");
    $stmt->bind_param("dsssi", $loan_amount, $loan_type, $loan_tenure, $branch_id, $customer_id);
    $sql_trigger = '
    CREATE TRIGGER before_loan_insert
    BEFORE INSERT ON loan
    FOR EACH ROW
    BEGIN
        IF NEW.type = "student" AND NEW.amount > 500000 THEN
            SIGNAL SQLSTATE "45000" SET MESSAGE_TEXT = "Student loan amount cannot exceed 500,000.";
        END IF;
    END';
    
    try {

    if ($stmt->execute()) {
        echo '<div style="position: absolute; top: 0; left: 0;">Loan application submitted successfully!</div>';
        echo "<script>
            setTimeout(function() {
                window.location.href = 'applyloan.php';
            }, 3000); // Reload after 3 seconds (3000 milliseconds)
        </script>";
    } else {
        echo "<div> Error: Unable to submit loan application.</div>";
    }
} catch (mysqli_sql_exception $e) {
    // Display custom error message
    echo "<div> " . $e->getMessage() . "</div>";
    echo "<script>
    setTimeout(function() {
        window.location.href = 'applyloan.php';
    }, 3000); // Reload after 3 seconds (3000 milliseconds)
</script>";
}

    $stmt->close();
    $con->close();
}
?>
<body>
<a href="cindex.php"><button type="button" class="btn btn-info" style="margin-top:30px;margin-left:10px;position: absolute; top: 0; left: 0;">Back</button></a>
   
    <div class="container">
    <h2><center>Apply for Loan</center></h2>
    <br>
    <br>
    <form id="apply-loan-form" method="POST">
        <div class="form-group">
            <label for="customer-name">Customer Name:</label>
            <input type="text" id="customer-name" name="customer-name" required>
        </div>
        <div class="form-group">
            <label for="customer-id">Customer ID:</label>
            <input type="text" id="customer-id" name="customer_id" required>
        </div>
        <div class="form-group">
            <label for="branch-id">Branch ID:</label>
            <input type="text" id="branch-id" name="branch_id" required>
        </div>
        <div class="form-group">
            <label for="branch-name">Branch Name:</label>
            <input type="text" id="branch-name" name="branch-name" required>
        </div>
        <div class="form-group">
            <label for="loan-type">Loan Type:</label>
            <input type="text" id="loan-type" name="loan_type" required>
        </div>
        <div class="form-group">
            <label for="branch-id">Loan Tenure:</label>
            <input type="text" id="branch-id" name="loan_tenure" required>
        </div>
        <div class="form-group">
            <label for="loan-amount">Loan Amount:</label>
            <input type="number" id="loan-amount" name="loan_amount" required>
        </div>
        <button type="submit">Apply</button>
    </form>
</div>
</body>
</html>