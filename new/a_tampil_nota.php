<?php
include 'koneksi.php';

$id_servis = $_GET['id_servis'];

// ambil nota
$nota = mysqli_fetch_assoc(mysqli_query($conn, "
SELECT n.*, s.nama_pelanggan
FROM nota_pembayaran n
JOIN servis s ON n.id_servis = s.id_servis
WHERE n.id_servis='$id_servis'
"));

// ambil detail
$detail = mysqli_query($conn, "
SELECT ds.*, sp.nama_sparepart 
FROM detail_servis ds
JOIN sparepart sp ON ds.id_sparepart = sp.id_sparepart
WHERE ds.id_servis='$id_servis'
");
?>

<h2>NOTA PEMBAYARAN</h2>

<p>Nama: <?= $nota['nama_pelanggan'] ?></p>
<p>Tanggal: <?= $nota['tanggal'] ?></p>

<table border="1">
<tr>
    <th>Sparepart</th>
    <th>Qty</th>
    <th>Harga</th>
    <th>Subtotal</th>
</tr>

<?php while($d = mysqli_fetch_assoc($detail)){ ?>
<tr>
    <td><?= $d['nama_sparepart'] ?></td>
    <td><?= $d['qty'] ?></td>
    <td><?= number_format($d['harga_saat_dipakai']) ?></td>
    <td><?= number_format($d['subtotal']) ?></td>
</tr>
<?php } ?>
</table>

<p>Total Sparepart: Rp <?= number_format($nota['total_sparepart']) ?></p>
<p>Biaya Jasa: Rp <?= number_format($nota['biaya_jasa']) ?></p>
<p><b>Total Bayar: Rp <?= number_format($nota['total_bayar']) ?></b></p>

<hr>

<p>Garansi Servis sampai: <?= $nota['tanggal_garansi_servis'] ?></p>
<p>Garansi Sparepart sampai: <?= $nota['tanggal_garansi_sparepart'] ?></p>

<br>
<button onclick="window.print()">Print</button>