<?php
include("connection.php");
include("fungsi.php");

// Assume $konek is your database connection object

// Process form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST["nama"];
    $kelas = $_POST["kelas"];
    
    input($konek, $nama, $kelas);
    header("location: /aplikasidatadevaccto");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa</title>
    <link rel="stylesheet" href="dot.css">
    
</head>
<body>
    
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Tambah Data</h2>
            <form action="insert.php" method="post">
                <label for="nama">Nama:</label> 
                <input type="text" name="nama" required><br>
                
                <label for="kelas">Kelas:</label>
                <select name="kelas" id="kelas">
                    <option value="X RPL 1">X RPL 1</option>
                    <option value="X RPL 2">X RPL 2</option>
                    <option value="X RPL 3">X RPL 3</option>
                    </select>
                <input type="submit" value="Submit">
                
            </form>
        </div>
    </div>

    <!-- tombol buat modalnya -->
    <button class="button-7" id="myBtn" >Tambah data <span class="pen">&#9997;</span>
</button>

    <script>
        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the button that opens the modal
        var btn = document.getElementById("myBtn");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks the button, open the modal 
        btn.onclick = function() {
            modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
</body>
</html>
<?php

