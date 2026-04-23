<?php
include 'koneksi.php';

$id_servis = $_GET['id'];

// ambil data servis
$servis = mysqli_fetch_assoc(mysqli_query($conn, 
    "SELECT * FROM servis WHERE id_servis='$id_servis'"
));

// hitung total sparepart
$q = mysqli_query($conn, "
SELECT SUM(subtotal) as total FROM detail_servis WHERE id_servis='$id_servis'
");
$data = mysqli_fetch_assoc($q);

$total_sparepart = $data['total'] ?? 0;
?>

<h2>Pembayaran Servis</h2>

<p>Nama Pelanggan: <?= $servis['nama_pelanggan'] ?></p>
<p>Status: <?= $servis['status'] ?></p>
<p>Total Sparepart: Rp <?= number_format($total_sparepart) ?></p>

<form method="POST" action="proses_nota.php">
    <input type="hidden" name="id_servis" value="<?= $id_servis ?>">
    
    Biaya Jasa:
    <input type="number" name="biaya_jasa" required><br><br>

    <button type="submit" name="bayar">Bayar</button>
</form>