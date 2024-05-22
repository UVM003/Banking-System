
<?php
session_start();
if(!isset($_SESSION['emp_id'])&&!isset($_SESSION['branch_no'])){ header('location:login.php');}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Customer Enrollment - YSVP Bank</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <?php
$con = new mysqli('localhost', 'root', '', 'bankmini');

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

if (isset($_POST['customerId'])) {
    $customerName = $_POST["customerName"];
    $gender=$_POST["gender"];
    $DOB=$_POST["DOB"];
    $Aadhar=$_POST["Aadhar"];
    $occupation=$_POST["occupation"];
    $email=$_POST["email"];
    $address = $_POST["address"];
    $mobileNo = $_POST["mobileNo"];
    $branchName = $_POST["branchName"];
    $branchId = $_POST["branchId"];
    $customerId = $_POST["customerId"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    

$insertCustomerQuery = "INSERT INTO customer(cus_id, cus_name, gender, DOB, occupation, `Aadhar no`, Email, address, mobileno, branch_no) 
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmtCustomer = $con->prepare($insertCustomerQuery);
$stmtCustomer->bind_param("issssssssi", $customerId, $customerName, $gender, $DOB, $occupation, $Aadhar, $email, $address, $mobileNo, $branchId);
$customerInserted = $stmtCustomer->execute();

$insertLoginQuery = "INSERT INTO login (login_id, username, password, type) 
VALUES (?, ?, ?, 'customer')";
$stmtLogin = $con->prepare($insertLoginQuery);
$stmtLogin->bind_param("isi", $customerId, $username, $password);
$loginInserted = $stmtLogin->execute();

    if ($customerInserted && $loginInserted) {
        echo "<div>Customer Enrollment completed successfully!</div>";
        echo "<script>
        setTimeout(function() {
            window.location.href = 'newcus.php';
        }, 2000); // Reload after 3 seconds (3000 milliseconds)
    </script>";
    } else {
        echo "<div>Error: " . $con->error . "</div>";
    }
}
?>

  <style>
    body, html {
      margin: 0;
      padding: 0;
      height: 100%;
      font-family: Arial, sans-serif;
    }
    .container {
     
      margin-top:50px;
      display: flex;
      flex-direction: column;
      
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
    form {
      display: flex;
      flex-direction: column;
      align-items: center;
      margin-top: 20px;
    }
    form input {
      margin: 10px;
      padding: 8px;
      width: 300px;
      border-radius: 5px;
      border: 1px solid #ccc;
      box-sizing: border-box;
    }
    form button {
      padding: 10px 20px;
      background-color: #007bff;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }
    form button:hover {
      background-color: #0056b3;
    }
  </style>
</head>
<body>
<a href="eindex.php"><button type="button" class="btn btn-info" style="margin-top:30px;margin-left:10px;position: absolute; top: 0; left: 0;">Back</button></a>
  <div class="container">
    <main>
      <div class="content">
        <h2>Customer Enrolling</h2>
        <form method="post">
          <input type="text" name="customerName" placeholder="Customer Name" required>
          <input type="text" name="gender" placeholder="Gender" required>
          <input type="text" name="occupation" placeholder="Occupation" required>
          <input type="text" name="DOB" placeholder="DOB YYYY-MM-DD" required>
          <input type="text" name="Aadhar" placeholder="Aadhar No" required>
          <input type="text" name="email" placeholder="Email" required>
          <input type="text" name="address" placeholder="Address" required>
          <input type="text" name="mobileNo" placeholder="Mobile No" required>
          <input type="text" name="branchName" placeholder="Branch Name" required>
          <input type="text" name="branchId" placeholder="Branch ID" required>
          <input type="text" name="customerId" placeholder="Customer ID" required>
          <input type="text" name="username" placeholder="Username" required>
          <input type="password" name="password" placeholder="Password" required>
          <button type="submit">Add customer</button>
        </form>
      </div>
    </main>

  </div>
</body>
</html>
