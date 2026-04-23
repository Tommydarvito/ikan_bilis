<?php
include 'koneksi.php';

if(isset($_POST['bayar'])){
    $id_servis = $_POST['id_servis'];
    $biaya_jasa = $_POST['biaya_jasa'];
    $today = date('Y-m-d');

    // total sparepart
    $q = mysqli_query($conn, "
    SELECT SUM(subtotal) as total FROM detail_servis WHERE id_servis='$id_servis'
    ");
    $data = mysqli_fetch_assoc($q);

    $total_sparepart = $data['total'] ?? 0;
    $total_bayar = $total_sparepart + $biaya_jasa;

    // garansi
    $garansi_servis = date('Y-m-d', strtotime('+30 days'));
    $garansi_sparepart = date('Y-m-d', strtotime('+1 year'));

    // simpan nota
    mysqli_query($conn, "INSERT INTO nota_pembayaran
    (id_servis, tanggal, total_sparepart, biaya_jasa, total_bayar, tanggal_garansi_servis, tanggal_garansi_sparepart)
    VALUES
    ('$id_servis','$today','$total_sparepart','$biaya_jasa','$total_bayar','$garansi_servis','$garansi_sparepart')");

    // update status servis
    mysqli_query($conn, "UPDATE servis SET status='Selesai' WHERE id_servis='$id_servis'");

    header("Location: cetak_nota.php?id_servis=$id_servis");
}
?>