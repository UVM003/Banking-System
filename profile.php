<?php
session_start();
if(!isset($_SESSION['cus_id'])){ header('location:login.php');}

?>
<?php
$con = new mysqli('localhost','root','','bankmini');
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

$sql = "SELECT * from customer where cus_id='{$_SESSION['cus_id']}'";
$result = $con->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile - YSVP Bank</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }
        main {
            width: 70%;
            margin: 0 auto;
            padding: 20px;
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
    </style>
</head>
<body>
    <main>
        <h2>Profile</h2>
        <table>
            <tr>
                <th>DETAILS</th>
                <th></th>
            </tr>
            <?php
            // Display data in table rows
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>Customer ID</td><td>" . $row["cus_id"] . "</td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td>Name</td><td>" . $row["cus_name"] . "</td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td>Gender</td><td>" . $row["gender"] . "</td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td>DOB</td><td>" . $row["DOB"] . "</td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td>Mobile No</td><td>" . $row["mobileno"] . "</td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td>Email Id</td><td>" . $row["Email"] . "</td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td>Aadhar No</td><td>" . $row["Aadhar no"] . "</td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td>Occupation</td><td>" . $row["occupation"] . "</td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td>Address</td><td>" . $row["address"] . "</td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td>Branch No</td><td>" . $row["branch_no"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='2'>No records found</td></tr>";
            }
            ?>
        </table>
    </main>
</body>
</html>
