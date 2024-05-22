<?php
session_start();
if(!isset($_SESSION['cus_id'])){ header('location:login.php');}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Page</title>
    <link rel="stylesheet" href="customer.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<script src="https://kit.fontawesome.com/e03d6b8c21.js" crossorigin="anonymous"></script>
<style>
    
body {
    font-family: Arial, sans-serif;
    background-color: whitesmoke;
}

.login-container {
    text-align: center;
    margin-top: 50px;
}

input[type="text"],
input[type="password"],
button {
    margin: 10px;
    padding: 8px;
    border-radius: 5px;
    border: 1px solid #ccc;
}

button {
    cursor: pointer;
    background-color: #007bff;
    color: #fff;
    border: none;
}

#error-message {
    color: red;
}

.customer-container {
    text-align: center;
    margin-top: 250px;
}

.buttons {
    margin-top: 20px;
}

.buttons button {
    margin: 10px;
    padding: 8px 20px;
    border-radius: 5px;
    border: none;
    background-color: #007bff;
    color: #fff;
    cursor: pointer;
}

.buttons button:hover {
    background-color: #0056b3;
}
</style>
<?php
$con = new mysqli('localhost','root','','bankmini');
$result=$con->query("select * from customer where cus_id = '$_SESSION[cus_id]'");
$customer=$result->fetch_assoc();
$result2=$con->query("select * from account where cus_id = '$_SESSION[cus_id]'AND type='SB'");
$acc=$result2->fetch_assoc();

$accountNumber =  $acc['acc_no'] ;


$visiblePart = substr($accountNumber, 0, 1);
$maskedPart = str_repeat('X', strlen($accountNumber) - 4);
$visibleEndPart = substr($accountNumber, -3);

$maskedAccountNumber = $visiblePart . $maskedPart . $visibleEndPart;
?>
<script>
        function toggleBalance() {
            var balanceElement = document.getElementById("balance");
            if (balanceElement.style.visibility === "hidden") {
                balanceElement.style.visibility = "visible";
            } else {
                balanceElement.style.visibility = "hidden";
            }
        }
    </script>
    <style>
        .clickable {
            cursor: pointer;
            text-decoration: underline;
            color: blue;
        }
        .qwerty
        {
            border: radius 50px;
            align-items:left;
            padding: 15px;

        }
    </style>
           
<body>
<a href="profile.php"><i class="fa-solid fa-user qwerty" ></i></a>
<a href="login.php"><button  style="margin-top:10px;margin-right:10px;position: absolute; top: 0; right: 0;"type="button" class="btn btn-danger">Log Out</button></a>
    <div class="customer-container">
    <h2>Welcome <?php echo $customer['cus_name']?></h2>
    <div>
                    <p> Account No : <?php echo $maskedAccountNumber?></p>
                    <p>Click here for balance: <span class="clickable" onclick="toggleBalance()">Balance</span></p>
                    <p id="balance" style="visibility: hidden">&#8377;<?php echo $acc['balance']?></p>
                </div>
        <div class="buttons">
            <button onclick="location.href='myacc.php';">My Account</button>
            <button onclick="location.href='applyloan.php';">Apply Loans</button>
            <button onclick="location.href='myloan.php';">My Loans</button>
        </div>
    </div>
</body>
</html>