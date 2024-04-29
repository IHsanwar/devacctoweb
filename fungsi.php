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


function delete($konek, $id){
    $id = mysqli_real_escape_string($konek, $id);
    $sql = "DELETE FROM datasiswa WHERE id=$id";
    var_dump($sql);
    if ($konek->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $konek->error;
    }
}

function edit($konek, $id){

    // Update the data in the database
    mysqli_query($koneksi, "UPDATE datasiswa SET nama='$nama', kelas='$kelas' WHERE id='$id'");

    // Redirect back to the index page (or wherever you want)
    header("location:index.php");
}
?>



 