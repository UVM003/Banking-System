
    <?php
session_start();
if(!isset($_SESSION['cus_id'])){ header('location:login.php');}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YSVP Bank</title>
    <style>
       body {
    font-family: Arial, sans-serif;
}

h2 {
    text-align: center;
}
        table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

th, td {
    border: 1px solid #dddddd;
    padding: 8px;
    text-align: left;
}

th {
    background-color: #b0caec;
}

tr:nth-child(even) {
    background-color: #bae1ec;
}

tr:hover {
    background-color: #ddd;
}
        footer {
            margin-top: auto; /* Footer sticks to bottom */
        }
    </style>
</head>
<?php
$con = new mysqli('localhost','root','','bankmini');
$result=$con->query("select * from loan where cus_id = '$_SESSION[cus_id]'");
$result1=$con->query("select cus_name from customer where cus_id = '$_SESSION[cus_id]'");
$re = $result1->fetch_assoc()
?>
<body>
    <h2>Loan Information</h2>
    <table id="account-table">
        <thead>
            <tr>
                <th>Loan Id</th>
                <th>Customer ID</th>
                <th>Name</th>
                <th>Type</th>
                <th>Amount</th>
                <th>Tenure</th>
                <th>Approval Status</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <td>  <?php
            while ($customer = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>{$customer['loan_id']}</td>";
                echo "<td>{$customer['cus_id']}</td>";
                echo "<td>{$re['cus_name']}</td>";
                echo "<td>{$customer['type']}</td>";
                echo "<td>{$customer['amount']}</td>";
                echo "<td>{$customer['loan_tenure']}</td>";
                echo "<td>{$customer['approval']}</td>";
                echo "</tr>";
            }?>
            </tr>
        </tbody>
    </table>
  
</body>
</html>

