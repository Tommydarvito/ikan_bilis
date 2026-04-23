<?php
include 'koneksi.php';
$id = $_GET['id'];

$data = mysqli_query($conn, "
SELECT ds.*, sp.nama_sparepart 
FROM detail_servis ds
JOIN sparepart sp ON ds.id_sparepart = sp.id_sparepart
WHERE ds.id_servis='$id'
");

$total = 0;
?>

<table border="1">
<tr>
    <th>Sparepart</th>
    <th>Qty</th>
    <th>Harga</th>
    <th>Subtotal</th>
</tr>

<?php while($d = mysqli_fetch_assoc($data)){ 
    $total += $d['subtotal'];
?>
<tr>
    <td><?= $d['nama_sparepart'] ?></td>
    <td><?= $d['qty'] ?></td>
    <td><?= $d['harga_saat_dipakai'] ?></td>
    <td><?= $d['subtotal'] ?></td>
</tr>
<?php } ?>

<tr>
    <td colspan="3">Total</td>
    <td><?= $total ?></td>
</tr>
</table>