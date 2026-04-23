CREATE TABLE detail_servis (
    id_detail INT AUTO_INCREMENT PRIMARY KEY,
    id_servis INT,
    id_sparepart INT,
    qty INT,
    harga_saat_dipakai INT,
    subtotal INT,
    FOREIGN KEY (id_servis) REFERENCES servis(id_servis),
    FOREIGN KEY (id_sparepart) REFERENCES sparepart(id_sparepart)
);

CREATE TABLE nota_pembayaran (
    id_nota INT AUTO_INCREMENT PRIMARY KEY,
    id_servis INT,
    tanggal DATE,
    total_sparepart INT,
    biaya_jasa INT,
    total_bayar INT,
    tanggal_garansi_servis DATE,
    tanggal_garansi_sparepart DATE,
    FOREIGN KEY (id_servis) REFERENCES servis(id_servis)
);

<?php if($d['status'] != 'Selesai'){ ?>
    <a href="pembayaran.php?id=<?= $d['id_servis'] ?>">Bayar</a>
<?php } ?>