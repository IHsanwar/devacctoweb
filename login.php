<?php
session_start();
include("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Protect against SQL injection
    $email = mysqli_real_escape_string($konek, $email);
    $password = mysqli_real_escape_string($konek, $password);

    $query = "SELECT * FROM accounts WHERE email = '$email'";
    $result = $konek->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $hashedPassword = $row['password'];

        // Verify the password using password_verify
        if (password_verify($password, $hashedPassword)) {
            // Login successful
            $_SESSION['email'] = $email ['email'];
            $_SESSION['is_login'] = true;
            
            header("location: index.php");
            exit();
        } else {
            // Login failed
            $error = "Invalid email or password";
        }
    } else {
        // Login failed
        $error = "Invalid email or password";
    }
}

$konek->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>

<h2>Login</h2>

<?php if (isset($error)) { ?>
    <p style="color: red;"><?php echo $error; ?></p>
<?php } ?>

<form method="post" action="">
    <label for="email">Email:</label>
    <input type="text" name="email" required><br>

    <label for="password">Password:</label>
    <input type="password" name="password" required><br>

    <input type="submit" value="Login">
</form>

</body>
</html>
