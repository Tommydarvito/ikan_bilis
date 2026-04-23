<?php
include 'koneksi.php';

$data = mysqli_query($conn, "SELECT * FROM servis");
?>

<table border="1">
<tr>
    <th>Nama</th>
    <th>Status</th>
    <th>Aksi</th>
</tr>

<?php while($d = mysqli_fetch_assoc($data)){ ?>
<tr>
    <td><?= $d['nama_pelanggan'] ?></td>
    <td><?= $d['status'] ?></td>
    <td>
        <a href="tambah_detail.php?id=<?= $d['id_servis'] ?>">
            Tambah Sparepart
        </a>
    </td>
</tr>
<?php } ?>
</table>