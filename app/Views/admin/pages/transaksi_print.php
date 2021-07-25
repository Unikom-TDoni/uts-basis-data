<html>
<head>
    <title>Cetak Transaksi</title>
    <style type="text/css">
        body.tiket {
            margin: 0px;
            padding: 0px;
            color: black;
            font-weight: bold;
            font-family: Courier;
        }
    </style>
</head>

<body class="tiket" onload="window.print()">
    <div style="width: 250px;text-align: center;">
        <div style="width:235;margin: 0px auto">
            <br>
            <span style="font-size: 20px">RD TRANS</span><br>
            <span style="font-size: 15px">--------------------------</span><br>
            <span style="font-size: 17px">TIKET</span><br>
            <span style="font-size: 17px"><?= $nomor_transaksi ?></span><br>
            <span style="font-size: 15px">--------------------------</span><br>

            <span style="font-size: 14px">Tanggal Berangkat:</span><br>
            <span style="font-size: 16px"><?= date("d-m-Y", strtotime($tgl_berangkat))?></span><br>
            <br>
            <span style="font-size: 14px">Jam Berangkat:</span><br>
            <span style="font-size: 16px"><?= $jam_berangkat ?> WIB</span><br>
            <span style="font-size: 15px">--------------------------</span><br>

            <span style="font-size: 14px">Cabang Asal:</span><br>
            <span style="font-size: 15px"><?= $cabang_asal ?></span><br>
            <br>
            <span style="font-size: 14px">Cabang Tujuan:</span><br>
            <span style="font-size: 15px"><?= $cabang_tujuan ?></span><br>
            <span style="font-size: 15px">--------------------------</span><br>

            <?php if($mobil != "-" && $nama_sopir != "-"): ?>
            <span style="font-size: 14px">Mobil:</span><br>
            <span style="font-size: 16px"><?= $mobil ?></span><br>
            <br>
            <span style="font-size: 14px">Sopir:</span><br>
            <span style="font-size: 16px"><?= $nama_sopir ?></span><br>
            <span style="font-size: 15px">--------------------------</span><br>
            <?php endif ?>

            <span style="font-size: 14px">Telp Pelanggan:</span><br>
            <span style="font-size: 16px"><?= $telp ?></span><br>
            <br>
            <span style="font-size: 14px">Nama Pelanggan:</span><br>
            <span style="font-size: 16px"><?= $nama ?></span><br>
            <br>
            <span style="font-size: 14px">Nomor Kursi</span><br>
            <span style="font-size: 40px"><?= $nomor_kursi ?></span><br>
            <span style="font-size: 15px">--------------------------</span><br>

            <div style="width:48%;float:left;text-align:left;font-size:12px">Harga Tiket:</div>
            <div style="width:48%;float:left;text-align:right;font-size:12px"><?= "Rp " . number_format($harga_tiket, 0, ',', '.') ?></div>
            <br><br>
            <span style="font-size: 18px">-- BELUM LUNAS --</span><br>
            <br>
            <span style="font-size: 13px"><?= $waktu_cetak ?></span><br>
            <span style="font-size: 14px">Pencetak:<?= $petugas_cetak ?></span>
        </div>
    </div>

</body>
</html>