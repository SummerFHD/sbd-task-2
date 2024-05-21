<?php
include 'db_connection.php';

if (isset($_GET['nim'])) {
    $nim = $_GET['nim'];
    $sql = "SELECT * FROM mahasiswa WHERE nim='$nim'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $kdProdi = $_POST['kdProdi'];
    $thnMsk = $_POST['thnMsk'];

    $sql = "UPDATE mahasiswa SET nama='$nama', kdProdi='$kdProdi', thnMsk='$thnMsk' WHERE nim='$nim'";
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
        header("Location: index.php");
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Mahasiswa</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <h1>Edit Data Mahasiswa</h1>
    <form method="post">
        NIM: <input type="text" name="nim" value="<?php echo $row['nim']; ?>" readonly><br>
        Nama: <input type="text" name="nama" value="<?php echo $row['nama']; ?>" required><br>
        Kode Prodi: <input type="text" name="kdProdi" value="<?php echo $row['kdProdi']; ?>" required><br>
        Tahun Masuk: <input type="text" name="thnMsk" value="<?php echo $row['thnMsk']; ?>" required><br>
        <input type="submit" value="Update">
    </form>
    <br>
    <a href="index.php"><button>Kembali</button></a>
</body>
</html>
