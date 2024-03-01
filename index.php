<?php
include("connection.php");
include("fungsi.php");
$datas = read($konek);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HTML CSS Table</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
 <a href="insert.php">tambah data</a>
<table>
    <thead>
        <tr>
            <th>Nama</th>
            <th>Kelas</th>
            <th>id</th>
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
            <td><?php echo $row['nama_siswa'];?></td>
            <td><?php echo $row['kelas'];?></td>
            <td><?php echo $no++;?></td>
        <?php } ?>
        </tr>
    </tbody>
</table>

</body>
</html>