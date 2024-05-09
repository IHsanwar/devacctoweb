<?php
include("connection.php");
include("fungsi.php");

// Check if 'id' parameter is provided in the URL
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    // Sanitize the ID to prevent SQL injection
    $id = mysqli_real_escape_string($konek, $id);

    // Retrieve data for the given ID
    $query = "SELECT * FROM datasiswa WHERE id='$id'";
    $result = mysqli_query($konek, $query);

    if (!$result) {
        die('Error retrieving data: ' . mysqli_error($konek));
    }

    // Check if any data is found for the given ID
    if (mysqli_num_rows($result) > 0) {
        $d = mysqli_fetch_assoc($result); // Fetch associative array of data
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
    <link rel="stylesheet" href="dot.css">
</head>
<body>
    <h2>Edit Data</h2>
    <form action="edit.php" method="post">
        <input type="hidden" name="id" value="<?php echo $d['id']; ?>">
        <label for="nama">Nama:</label>
        <input type="text" name="nama" value="<?php echo htmlspecialchars($d['nama_siswa']); ?>"><br>
        <label for="kelas">Kelas:</label>
                <select name="kelas" id="kelas">
                    <option value="X RPL 1">X RPL 1</option>
                    <option value="X RPL 2">X RPL 2</option>
                    <option value="X RPL 3">X RPL 3</option>
                    </select>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
<?php
    } else {
        echo "No data found for ID: $id";
    }

    // Free the result set
    mysqli_free_result($result);

} else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle form submission (update process) after POST request

    // Retrieve and sanitize form data
    $id = mysqli_real_escape_string($konek, $_POST['id']);
    $nama = mysqli_real_escape_string($konek, $_POST['nama']);
    $kelas = mysqli_real_escape_string($konek, $_POST['kelas']);

    // Perform the update query
    $update_query = "UPDATE datasiswa SET nama_siswa='$nama', kelas='$kelas' WHERE id='$id'";
    $update_result = mysqli_query($konek, $update_query);

    if ($update_result) {
        echo "Record updated successfully!";
        header("Location: /aplikasidatadevaccto");
    } else {
        echo "Error updating record: " . mysqli_error($konek);
    }
} else {
    echo "ID parameter is missing or invalid.";
}
?>
