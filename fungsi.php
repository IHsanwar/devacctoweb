<?php
include("connection.php");
//fungsi membaca database//
function read($konek){
    $select = "select * from datasiswa"; 
    $res = ($konek->query($select));    
    $datas =[];

    if ($res->num_rows > 0)
    {
        $datas= $res->fetch_all(MYSQLI_ASSOC);
    }
    return $datas;
    //akhir fungsi baca//
}

function input($konek, $nama, $kelas) {
    $sql = "INSERT INTO datasiswa (nama_siswa, kelas) VALUES ('$nama', '$kelas')";
    
    if ($konek->query($sql) === TRUE) {
        $message = "Data berhasil diinput";
        echo "<script type='text/javascript'>alert('$message');</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $konek->error;
    }
}


 