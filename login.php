<!DOCTYPE html?
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta>
    <http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="styles.css">
    <title>Educonnect Login</title>
</head>
<body><form method="post">
    <div class="box">
        <div class="container">
            <div class="top-header">
                <header>Login</header>
            </div>
            <div class="input-field">
                <input type="text" class="input" placeholder="Email" name="email" required> 
            </div>
            <div class="input-field">
                <input type="password" class="input" placeholder="Password" name="password" required> 
            </div>
            <div class="input-field">
                <select type="" class="input" placeholder="Select user type" name="user_type" required> 
                    <option value="students" selected>Student</option>
                    <option value="teachers">Teacher</option>
                </select>
            </div>
            <div class="input-field">
                <input type="submit" class="submit" value="Login" name="login">
            </div>
            <div class="register-link">
                New to Educonnect? <a href="regtecstu.html">Register</a>
            </div>
        </div>
    </div></form>
</body>
</html>
<?php
session_start();

if(isset($_POST['login'])) {
    require_once 'connect.php'; // Include the database connection script
    
    // Get user input
    $email = $_POST['email'];
    $password = $_POST['password'];
    $user_type = $_POST['user_type'];//ith vechittilla

    // Determine which table to search based on user_type
    $table_name = ($user_type === 'teachers') ? 'teachers' : 'students';

    // Prepare SQL query to check email and password
    $sql = "SELECT * FROM $table_name WHERE email = ? AND password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        // Authentication successful
        $_SESSION['user_type'] = $user_type;
        $_SESSION['email'] = $email;

        // Redirect to the appropriate page
        if ($user_type === 'teachers') {
            header("Location:index.html");
        } elseif ($user_type === 'students') {
            header("Location: index.html");
        }
        exit();
    } else {
        // Authentication failed
        echo "Invalid email or password. Please try again.";
    }

    $stmt->close();
    $conn->close();
}