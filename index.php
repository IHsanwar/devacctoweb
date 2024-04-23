<?php
include("connection.php");
include("insert.php");
$datas = read($konek);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_id'])) {
    $id = $_POST['delete_id'];
    delete($konek, $id);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa</title>
    <link rel="stylesheet" href="style.css">
    <script language="javascript">
        function delete_dd(idd){
            btnConfirm = confirm('Are you sure you want to delete this record?');
            if(btnConfirm){
                location.href = "delete.php?id=" + idd;
            }
            return false;
}

        </script>
</head>

<body>
    


<div id="myModal" class="modal">
  
  <div class="modal-content" id="modalContent">
    <span class="close">&times;</span>
  </div>
</div>
<table>
    <thead>
        <tr>
            <th>Nomor</th>
            <th>Nama</th>
            <th>Kelas</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    <?php
    $no = 1;
    if(!empty($datas))
        foreach($datas as $row){
        

    ?>

        <!-- Add more rows as needed -->
        <tr>
            <td><?php echo $no++;?></td>
            <td><?php echo $row['nama_siswa'];?></td>
            <td><?php echo $row['kelas'];?></td>
            <td><form method="post">
                    <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                    <button type="button" onclick="return delete_dd(<?php echo $row['id']; ?>)">Delete</button>

                    </form>
            </td>
            
        <?php }?>
        </tr>
    </tbody>
</table>









</body>
</html>