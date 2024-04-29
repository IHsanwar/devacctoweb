<?php
include("connection.php");
include("fungsi.php");
$id = $_GET['id']; // Capture the ID from the URL

// Retrieve data for the given ID
$data = mysqli_query($konek, "SELECT * FROM datasiswa WHERE id='$id'");
while ($d = mysqli_fetch_array($data)) {
?>

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP MySQL Form</title>
    <link rel="stylesheet" href="dot.css">
    
</head>
<body>
    
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Tambah Data</h2>
            <form action="insert.php" method="post">
                <label for="nama">Nama:</label>
                <input type="hidden" name="id" value="<?php echo $d['id']; ?>">
                <input type="text" name="nama" value="<?php echo $d['nama']; ?>"><br>
                
                <label for="kelas">Kelas:</label>
                <input type="text" name="kelas" value="<?php echo $d['kelas']; ?> required><br>
                
                <input type= "submit" value="Submit">
                
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
}
