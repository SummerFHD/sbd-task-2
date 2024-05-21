<?php
include 'db_connection.php';

$sql = "SELECT * FROM mahasiswa";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Mahasiswa</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <h1>Data Mahasiswa</h1>
    <table border="1">
        <tr>
            <th>NIM</th>
            <th>Nama</th>
            <th>Kode Prodi</th>
            <th>Tahun Masuk</th>
            <th>Aksi</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>{$row['nim']}</td>
                    <td>{$row['nama']}</td>
                    <td>{$row['kdProdi']}</td>
                    <td>{$row['thnMsk']}</td>
                    <td>
                        <a href='edit.php?nim={$row['nim']}'>Edit</a> |
                        <a href='delete.php?nim={$row['nim']}'>Delete</a>
                    </td>
                </tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No data found</td></tr>";
        }
        ?>
    </table>
    <br>
    <a href="add.php"><button>Tambah Data</button></a>
</body>
</html>
