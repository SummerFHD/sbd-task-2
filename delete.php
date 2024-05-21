<?php
include 'db_connection.php';

if (isset($_GET['nim'])) {
    $nim = $_GET['nim'];
    $sql = "DELETE FROM mahasiswa WHERE nim='$nim'";
    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
        header("Location: index.php");
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}
?>
