<?php
$conn = new mysqli("localhost", "root", "", "testdb");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Ambil input search 
$nama = isset($_GET['nama']) ? $_GET['nama'] : '';
$alamat = isset($_GET['alamat']) ? $_GET['alamat'] : '';

$sql = "SELECT p.id, p.nama, p.alamat, 
               GROUP_CONCAT(h.hobi SEPARATOR ', ') AS hobi_list
        FROM person p
        LEFT JOIN hobi h ON p.id = h.person_id
        WHERE p.nama LIKE '%$nama%' AND p.alamat LIKE '%$alamat%'
        GROUP BY p.id, p.nama, p.alamat";

$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Person dan Hobi</title>
    <style>
        table, th, td { border: 1px solid black; border-collapse: collapse; padding: 5px; }
    </style>
</head>
<body>
<h2>Daftar Person dan Hobinya</h2>

<table>
    <tr>
        <th>Nama</th>
        <th>Alamat</th>
        <th>Hobi</th>
    </tr>
    <?php while ($row = $result->fetch_assoc()) { ?>
    <tr>
        <td><?= htmlspecialchars($row['nama']) ?></td>
        <td><?= htmlspecialchars($row['alamat']) ?></td>
        <td><?= !empty($row['hobi_list']) ? htmlspecialchars($row['hobi_list']) : '-' ?></td>
    </tr>
    <?php } ?>
</table>

<h3>Cari Data</h3>
<form method="get">
    Nama: <input type="text" name="nama" value="<?= htmlspecialchars($nama) ?>"><br><br>
    Alamat: <input type="text" name="alamat" value="<?= htmlspecialchars($alamat) ?>"><br><br>
    <input type="submit" value="SEARCH">
</form>

</body>
</html>

