<?php
session_start();
if(!isset($_SESSION['cus_id'])){ header('location:login.php');}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Account</title>
</head>
<?php
$con = new mysqli('localhost','root','','bankmini');
$stmt = $con->prepare("CALL GetAccountDetails(?)");
$stmt->bind_param("i", $_SESSION['cus_id']);
$stmt->execute();
$result = $stmt->get_result();
?>
<style>

body {
    font-family: Arial, sans-serif;
    background-color:whitesmoke;
}

h2 {
    text-align: center;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
    margin-left: 10px;
    margin-right:10px;
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

</style>

<body>
    <h2>My Account Details</h2>
    <table id="account-table">
        <thead>
            <tr>
                <th>Account No</th>
                <th>Customer ID</th>
                <th>Name</th>
                <th>Type</th>
                <th>Balance</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <td>  <?php
            while ($customer = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>{$customer['acc_no']}</td>";
                echo "<td>{$customer['cus_id']}</td>";
                echo "<td>{$customer['cus_name']}</td>";
                echo "<td>{$customer['type']}</td>";
                echo "<td>{$customer['balance']}</td>";
                echo "</tr>";
            }?>
            </tr>
        </tbody>
    </table>

</body>
</html>