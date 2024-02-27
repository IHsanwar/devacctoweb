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
    <link rel="stylesheet" href="css.css">
</head>
<body>

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
        if(!empty($datas))
        foreach($datas as $row){

    ?>

        <!-- Add more rows as needed -->
        <tr>
            <th><?php echo $row['nama_siswa'];?></th>
            <th><?php echo $row['kelas'];?></th>
            <th><?php echo $row['id'];?></th>
        <?php } ?>
        </tr>
    </tbody>
</table>

</body>
</html>