<?php
include 'koneksi.php';

$id_servis = $_GET['id'];

if(isset($_POST['tambah'])){
    $id_sparepart = $_POST['sparepart'];
    $qty = $_POST['qty'];

    // ambil data sparepart
    $sp = mysqli_fetch_assoc(mysqli_query($conn, 
        "SELECT * FROM sparepart WHERE id_sparepart='$id_sparepart'"
    ));

    // cek stok
    if($sp['stok'] >= $qty){

        $harga = $sp['harga_jual'];
        $subtotal = $harga * $qty;

        // insert detail_servis
        mysqli_query($conn, "INSERT INTO detail_servis 
        (id_servis,id_sparepart,qty,harga_saat_dipakai,subtotal)
        VALUES ('$id_servis','$id_sparepart','$qty','$harga','$subtotal')");

        // kurangi stok
        mysqli_query($conn, "UPDATE sparepart 
        SET stok = stok - $qty 
        WHERE id_sparepart='$id_sparepart'");

        // update status
        mysqli_query($conn, "UPDATE servis 
        SET status='Dikerjakan' 
        WHERE id_servis='$id_servis'");

        echo "Berhasil ditambahkan";
    } else {
        // stok tidak cukup
        mysqli_query($conn, "UPDATE servis 
        SET status='Menunggu Sparepart' 
        WHERE id_servis='$id_servis'");

        echo "Stok tidak cukup!";
    }
}
?>

<form method="POST">
    Sparepart:
    <select name="sparepart">
        <?php
        $data = mysqli_query($conn, "SELECT * FROM sparepart");
        while($d = mysqli_fetch_assoc($data)){
            echo "<option value='".$d['id_sparepart']."'>".$d['nama_sparepart']."</option>";
        }
        ?>
    </select><br>

    Qty: <input type="number" name="qty"><br>

    <button name="tambah">Tambah</button>
</form>