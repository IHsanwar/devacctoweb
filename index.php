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
            <th>   </th>
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
            <td></td>
            <td>
                <form method="get" action="edit.php" style="display: inline-block;">
                <input type="hidden" name="edit" value="<?php echo $row['id']; ?>>">
                <input type="button" class="button-small" onclick="location.href='edit.php?id=<?php echo $row['id']; ?>';" value="Edit" />
                
                
                    <input type= "hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                    <button type="button" class="button-small2" onclick="return delete_dd(<?php echo $row['id']; ?>)">Delete</button>

                    
            </form>
            </td>
            
        <?php }?>
        </tr>
    </tbody>
</table>









</body>
</html>