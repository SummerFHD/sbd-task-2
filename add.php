<?php
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $kdProdi = $_POST['kdProdi'];
    $thnMsk = $_POST['thnMsk'];

    $sql = "INSERT INTO mahasiswa (nim, nama, kdProdi, thnMsk) VALUES ('$nim', '$nama', '$kdProdi', '$thnMsk')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        header("Location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data Mahasiswa</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <h1>Tambah Data Mahasiswa</h1>
    <form method="post">
        NIM: <input type="text" name="nim" required><br>
        Nama: <input type="text" name="nama" required><br>
        Kode Prodi: <input type="text" name="kdProdi" required><br>
        Tahun Masuk: <input type="text" name="thnMsk" required><br>
        <input type="submit" value="Submit">
    </form>
    <br>
    <a href="index.php"><button>Kembali</button></a>
</body>
</html>
