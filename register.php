<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
</head>
<?php
include 'connect.php';
if (isset($_POST['register'])) {
    $firstname = $_POST['first_name'];
    $lastname = $_POST['last_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $department = $_POST['department'];
    $password = $_POST['password'];
   

    $sql = "INSERT INTO students (first_name,last_name,email,phone,department,password)
     VALUES('$firstname','$lastname','$email','$phone','$department','$password')";

    if ($conn->query($sql) === TRUE) {
        header("Location: login.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<body>
    <div class="box">
        <div class="container">
            <div class="top-header">
                <header>Sign Up</header>
            </div>
            <form method="POST">
                <div class="input-field">
                    <input type="text" class="input" placeholder="First Name" name="first_name" required>
                </div>
                <div class="input-field">
                    <input type="text" class="input" placeholder="Last Name" name="last_name" required>
                </div>
                <div class="input-field">
                    <input type="email" class="input" placeholder="Email" name="email" required>
                </div>
                <div class="input-field">
                    <input type="text" class="input" placeholder="Phone" name="phone" required>
                </div>
                <div class="input-field">
                    <input type="text" class="input" placeholder="Department" name="department" required>
                </div>
                <div class="input-field">
                    <input type="password" class="input" placeholder="Password" name="password" required>

                </div>
        </div>
        <div class="input-field">
            <input type="submit" class="submit" value="Submit" name="register">
        </div>
        <div class="register-link">
            Already have an account? <a href="login.php">Login</a>
        </div>
        </form>
    </div>
    </div>
</body>

</html>