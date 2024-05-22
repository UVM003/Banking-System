<?php
session_start();
if(!isset($_SESSION['emp_id'])&&!isset($_SESSION['branch_no'])){ header('location:login.php');}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YSVP Bank</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            min-height: 100vh; 
        }
        header, footer {
            background-color: #333;
            color: white;
            padding: 10px;
            text-align: center;
        }
        main {
            flex-grow: 1;
            width: 70%;
            margin: 0 auto;
            padding: 20px;
        }
        table {
    width: 70%;
    border-collapse: collapse;
    margin-top: 10px;
    margin-left: 220px;
    margin-right:30px;
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
</head>
<?php
$con = new mysqli('localhost','root','','bankmini');
$result=$con->query("select * from loan where  branch_no = '$_SESSION[branch_no]'");
?>
<body>
    <h2><center>Loan Information</center></h2>

    <table>
        <thead>
            <tr>
                <th>Account No</th>
                <th>Customer ID</th>
                <th>Name</th>
                <th>Type</th>
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
                $result1=$con->query("select cus_name from customer where cus_id = '$customer[cus_id]'");
                $re = $result1->fetch_assoc();
                echo "<td>{$re['cus_name']}</td>";
                echo "<td>{$customer['type']}</td>";
                echo "<td>{$customer['loan_tenure']}</td>";
                echo "<td>{$customer['approval']}</td>";
                echo "</tr>";
            }?>
            </tr>
        </tbody>
    </table>
  
</body>
</html>