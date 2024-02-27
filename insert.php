<?php
include("connection.php");
include("fungsi.php");

// Assume $konek is your database connection object

// Process form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST["nama"];
    $kelas = $_POST["kelas"];

    
    input($konek, $nama, $kelas);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP MySQL Form</title>
</head>
<body>
    <h2>Submit User Data</h2>
    <form action="insert.php" method="post">
        <label for="nama">Nama:</label>
        <input type="text" name="nama" required><br>
        
        <label for="kelas">Class:</label>
        <input type="text" name="kelas" required><br>
        
        <input type="submit" value="Submit">
    </form>
</body>
</html>
