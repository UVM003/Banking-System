<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Customer</title>
</head>
<style>
    body {
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100vh;
    margin: 0;
    background-color: #f4f4f4; /* Background color for the entire page */
}

.container {
    width: 400px;
    padding: 20px;
    background-color: #fff; /* Background color for the form box */
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Box shadow for a subtle effect */
}

form {
    display: flex;
    flex-direction: column;
    align-items: center;
}

label {
    margin-bottom: 8px;
}

input {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    box-sizing: border-box;
    border: 1px solid #ccc;
    border-radius: 4px;
}

select {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    box-sizing: border-box;
    border: 1px solid #ccc;
    border-radius: 4px;
}

input[type="submit"] {
    background-color: #4caf50; /* Green Submit button */
    color: #fff;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #45a049;
}

    </style>
<body>
    <div class="container">
    <form  method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="customerName" required>
         <label for="GenderSelect"> Select Gender:</label>
         <select name="gender">
            <option value="Female">Female</option>
            <option value="Male">Male</option>
            <option value="Others">Others</option>
        </select>
        <button onclick="getSelectedGender()">Select</button>
        <label for="Date of Birth">Date of Birth</label>
        <input type="date" id="dob" name="DOB" placeholder="DD-MM-YYYY" maxlength="08" oninput="validateDate(this)">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <label for="Aadhar No">Aadhar no</label>
        <input type="text" id="aadhar" name="Aadhar" maxlength="10">
        <label for="Aadhar No">Mobile no</label>
        <input type="text" name="mobileNo" placeholder="Mobile No" required>
        <label for="Aadhar No">Branch</label>
        <label for="Address">Address</label>
        <input type="text" id="address" name="address" placeholder="address" maxlength="60">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" maxlength="20">
        <label for="password">Password:</label>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Submit</button>
    </form>
    </div>
</body>
</html>