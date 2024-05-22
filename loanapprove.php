<?php
session_start();
if(!isset($_SESSION['branch_no'])){ header('location:login.php');}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YSVP Bank</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
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
    margin-top: 20px;
    margin-left: 225px;
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
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<?php
$con = new mysqli('localhost','root','','bankmini');
$result=$con->query("select * from loan where approval='pending' and branch_no= '$_SESSION[branch_no]' ");
 if (isset($_GET['delete'])) 
  {
    if ($con->query("delete from loan where loan_id = '$_GET[delete]'"))
    {
        echo "Loan application deleted successfully"; 
        echo "<script>
        setTimeout(function() {
            window.location.href = 'loanapprove.php';
        }, 3000); // Reload after 3 seconds (3000 milliseconds)
    </script>";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
  } 
  if (isset($_GET['alter'])) 
  {
    if ($con->query("update loan set approval = 'approved' WHERE  loan_id = '$_GET[alter]'"))
    {
        echo "Loan application Approved successfully";
        echo "<script>
        setTimeout(function() {
            window.location.href = 'loanapprove.php';
        }, 2000); // Reload after 3 seconds (3000 milliseconds)
    </script>";
    } else {
        echo "Error Approving record: " . $conn->error;
    }
  } 
?>
<body>
<a href="mindex.php"><button type="button" class="btn btn-info" style="margin-top:30px;margin-left:10px;position: absolute; top: 0; left: 0;">Back</button></a>
<div style="margin-top:80px;" class="container">
    <h2><center>Loan Information</center></h2>
    <table>
        <thead>
            <tr>
                <th>Account No</th>
                <th>Customer ID</th>
                <th>Type</th>
                <th>Tenure</th>
                <th>Approval Status</th>
                <th>Accept/Reject</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <td>  <?php
            while ($customer = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>{$customer['loan_id']}</td>";
                echo "<td>{$customer['cus_id']}</td>";
                echo "<td>{$customer['type']}</td>";
                echo "<td>{$customer['loan_tenure']}</td>";
                echo "<td>{$customer['approval']}</td>";
                echo "<td>";
                echo '<a href="?alter=' . $customer['loan_id'] . '"><button type="button" class="btn btn-success">Accept</button></a>';
                echo '<a href="?delete=' . $customer['loan_id'] . '"><button  style="margin-left: 6px;"type="button" class="btn btn-danger">Reject</button></a>';
                echo "</td>";
                echo "</tr>";
                echo "</tr>";
            }?>
            </tr>
        </tbody>
    </table>
    <div>
</body>
</html>

