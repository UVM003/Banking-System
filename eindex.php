<?php
session_start();
if(!isset($_SESSION['emp_id'])){ header('location:login.php');}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YSVP Bank</title>
    <style>
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            font-family: Arial, sans-serif;
        }
        .container {
            display: flex;
            flex-direction: column;
            height: 100%;
        }
        header, footer {
            background-color: #333;
            color: white;
            padding: 10px;
            text-align: center;
        }
        main {
            flex-grow: 1;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .content {
            width: 70%;
            text-align: center;
        }
        .content h2 {
            margin-bottom: 20px;
            position: relative;
        }
        .employee-label {
            background-color: grey;
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 14px;
            position: absolute;
            top: 10px;
            left: 10px;
        }
        .button-container {
            margin-top: 50px;
        }
        .button-container button {
            padding: 10px 20px;
            margin-right: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .button-container button:last-child {
            margin-right: 0;
        }
    </style>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<?php
$con = new mysqli('localhost','root','','bankmini');
$result=$con->query("select * from employee where emp_id = '$_SESSION[emp_id]'");
$employee=$result->fetch_assoc();
?>
<body>
<a href="login.php"><button  style="margin-top:10px;margin-right:10px;position: absolute; top: 0; right: 0;"type="button" class="btn btn-danger">Log Out</button></a>
    <div class="container">
       
        <main>
            <div class="content">
                <h2>Welcome <?php echo $employee['emp_name']?></h2>
                <span class="employee-label">Employee</span> 
                <div class="button-container">
                <a href="accounts.php"><button>Accounts</button></a>
                <a href="loans.php"> <button onclick=>Loans</button></a>
                <a href="newcus.php"> <button onclick=>New Customer</button></a>
                <a href="newacc.php"> <button onclick=>New Account</button></a>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
