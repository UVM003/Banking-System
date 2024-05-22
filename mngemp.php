<?php
session_start();
if(!isset($_SESSION['branch_no'])){ header('location:login.php');}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <style>
    <title>YSVP Bank</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            min-height: 100vh; /* This ensures footer is at the bottom */
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
    <style>
    .action-buttons button {
        padding: 5px 10px;
        margin-right: 5px;
        border: none;
        border-radius: 3px;
        cursor: pointer;
    }
    
    .accept-button {
        background-color: #4CAF50; /* Green */
        color: white;
    }
    
    .reject-button {
        background-color: #f44336; /* Red */
        color: white;
    }
</style>
</head>
<?php
$con = new mysqli('localhost','root','','bankmini');
$result=$con->query("select * from employee where branch_no='{$_SESSION['branch_no']}'");
 if (isset($_GET['delete'])) 
  {
    if ($con->query("delete from employee where emp_id = '$_GET[delete]'") && $con->query("delete from login where login_id = '$_GET[delete]'"))
    {
        echo "Employee Fired successfully"; 
        echo "<script>
        setTimeout(function() {
            window.location.href = 'mngemp.php';
        }, 3000); // Reload after 3 seconds (3000 milliseconds)
    </script>";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}
    if (isset($_GET['alter'])) 
    {
        $sql=$con->query("select salary from employee where emp_id='$_GET[alter]'");
        $kk=$sql->fetch_assoc();
         if ($con->query("UPDATE employee SET salary = {$kk['salary']} + 5000 WHERE emp_id = '$_GET[alter]'"))
      {
          echo "Bonus Dispatched Successfuly";
          echo "<script>
          setTimeout(function() {
              window.location.href = 'mngemp.php';
          }, 2000); // Reload after 3 seconds (3000 milliseconds)
      </script>";
      } else {
          echo "Error Approving record: " . $conn->error;
      }
  } 
?>
<body>
<a href="mindex.php"><button type="button" class="btn btn-info" style="margin-top:30px;margin-left:10px;position: absolute; top: 0; left: 0;">Back</button></a>
<div style="margin-top:70px;"class="container">
    <h2> <center>Manage Employee Information</center></h2><
    <table>
        <thead>
            <tr>
                <th>Employee ID</th>
                <th>Name</th>
                <th>Address</th>
                <th>Mobile No</th>
                <th>Salary</th>
                <th>Manage</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <td>  <?php
            while ($employee = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>{$employee['emp_id']}</td>";
                echo "<td>{$employee['emp_name']}</td>";
                echo "<td>{$employee['address']}</td>";
                echo "<td>{$employee['mobileno']}</td>";
                echo "<td>{$employee['salary']}</td>";
                echo "<td>";
                echo '<a href="?alter=' .$employee['emp_id']  . '"><button type="button" class="btn btn-success">Bonus</button></a>';
                echo '<a href="?delete=' . $employee['emp_id'] . '"><button  style="margin-left: 6px;"type="button" class="btn btn-danger">Fire</button></a>';
                echo "</td>";
                echo "</tr>";
                echo "</tr>";
            }?>
            </tr>
        </tbody>
    </table>
        </div>

</body>
</html>