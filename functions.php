<?php 
$conn = mysqli_connect('localhost','root','','projekrekap');
$jumlahData = 0;

function query($query)
{
    global $conn , $jumlahData;
    $result = mysqli_query($conn, $query);
    // Hitung data
    $jumlahData = mysqli_num_rows($result);
    
    $rows = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}


function tambah($data)
{
    global $conn;
    $nama = htmlspecialchars($data["nama"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $kategori = htmlspecialchars($data["kategori"]);
    $jk = htmlspecialchars($data["jk"]);
 
   
    $query = "INSERT INTO pasien VALUES
            ('','$nama','$alamat','$kategori','$jk')";
        

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


function hapus($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM pasien WHERE id=$id");
    return mysqli_affected_rows($conn);
}

function ubah($data)
{
    global $conn;

    $id = $data["id"];
    $nama = htmlspecialchars($data["nama"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $kategori = htmlspecialchars($data["kategori"]);
    $jk = htmlspecialchars($data["jk"]);

    

    $query = "UPDATE pasien SET
            nama='$nama',
            alamat ='$alamat',
            kategori='$kategori',
            jenisKelamin = '$jk' WHERE id = $id;
            ";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function cari($keyword)
{
    $query = "SELECT * FROM pasien WHERE nama LIKE '%$keyword%' OR alamat LIKE
    '%$keyword%'";
    return query($query);
}

?>