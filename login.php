<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="login.css">
</head>
<?php
    $con = new mysqli('localhost','root','','bankmini');
		if (isset($_POST['usertype'])&& $_POST['usertype']=='CUSTOMER')
		{
  			$user = $_POST['username'];
		    $pass = $_POST['password'];
		   
		    $check = $con->query("select * from login where username='$user' AND password='$pass'");
		    if($check->num_rows>0)
		    { 
		      session_start();
              $id=$check->fetch_assoc();
              $result= $con->query("select * from customer where cus_id='{$id['login_id']}'");
		      $data = $result->fetch_assoc();
		      $_SESSION['cus_id']=$data['cus_id'];
		      $_SESSION['customer'] = $data;
		      header('location:cindex.php');
		     }
		   
		}
		if (isset($_POST['usertype'])&& $_POST['usertype']=='EMPLOYEE')
		{
  			$user = $_POST['username'];
		    $pass = $_POST['password'];
		   
		    $check = $con->query("select * from login where username='$user' AND password='$pass'");
		    if($check->num_rows>0)
		    { 
		      session_start();
              $id=$check->fetch_assoc();
              $result= $con->query("select * from employee  where emp_id='{$id['login_id']}'");
		      $data = $result->fetch_assoc();
		      $_SESSION['emp_id']=$data['emp_id'];
		      $_SESSION['branch_no'] = $data['branch_no'];
		      header('location:eindex.php');
		     }
		   
		}
		if (isset($_POST['usertype']) && $_POST['usertype']=='MANAGER')
		{
  			$user = $_POST['username'];
		    $pass = $_POST['password'];
		   
		    $check = $con->query("select * from login where username='$user' AND password='$pass'");
		    if($check->num_rows>0)
		    { 
		      session_start();
              $id=$check->fetch_assoc();
              $result= $con->query("select * from manager where mgr_id='{$id['login_id']}'");
		      $data = $result->fetch_assoc();
		      $_SESSION['branch_no']=$data['branch_no'];
		      //$_SESSION['user'] = $data;
		      header('location:mindex.php');
		     }
		    
		}

	 ?>
<style>
    body {
    font-family: Arial, sans-serif;
    background-color:#FAD6A5;
}
html, body {
    overflow: hidden;
}
.main{
    width: 100%;
    
    background-position: center;
    background-size: cover;
    height: 100vh;
 
}
.navbar{
    width: 1700px;
    height: 70px;
    margin: auto;
    display: flex;
    justify-content: space-between;
    align-items:first baseline;
    
}
.navbar-right {
    margin-left: auto; 
}

.logo{
    color: #ff7200;
    font-size: 35px;
    font-family: Arial;
    padding-left: 20px;
    float: left;
    padding-top: 10px;
    margin-top: 5px;
}
.menu{
    width: 400px;
    float: left;
    height: 70px;
}
ul{
    float: left;
    display: flex;
    justify-content: center;
    align-items: center;
}
ul li{
    list-style: none;
    margin-left: 72px;
    margin-top: 5px;
    font-size: 14px;
}
ul li a{
    text-decoration: none;
    color:black;
    font-family: Arial;
    font-weight: bold;
    transition: 0.4s ease-in-out;
}
ul li a:hover{
    color: #ff7200;
}


#login-container {
    position: absolute;
    left: 0;
    right: 0;
    margin: auto;
    top: 50%;
    transform: translateY(-50%);
    width: 300px;
    padding: 30px;
    background-color: white;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-shadow: 0px 0px 20px 0px rgba(0,0,0,0.2); 
}
h1 {
    text-align: center;
    margin-bottom: 20px;
}

label {
    display: block;
    margin-bottom: 5px;
}

input[type="text"], input[type="password"] {
    width: 100%;
    padding: 5px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

button[type="button"] {
    width: 100%;
    padding: 7px;
    background-color: #FF6700;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

button[type="button"]:hover {
    background-color: #3e8e41;
}

#message {
    margin-top: 10px;
    color: red;
}
#user-type {
    padding: 5px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

    </style>
<body>
    <div class="main">
        <div class="navbar">
            <div class="icon">
                <h2 class="logo">YSVP BANK</h2>
            </div>

           
    <center>
        <div id="login-container">
            <h1>Login</h1>
            <form id="login-form" method="POST">
                <select name="usertype"></center>
                    <option value="CUSTOMER">CUSTOMER</option>
                    <option value="EMPLOYEE">EMPLYOEE</option>
                    <option value="MANAGER">MANAGER</option>
  
    </select><br>
    <label for="user-name">User name:</label>
    <input type="text" name="username"><br>
    <label for="password">Password:</label>
    <input type="password" name="password"><br>
    <button type="submit">Login</button>
    </form>
    <div id="message"></div>
    </div>
</body>

</html>