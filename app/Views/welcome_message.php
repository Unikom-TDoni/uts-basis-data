<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/user')?>/js/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/user')?>/css/main.min.css">
</head>
<body>
    <header class="header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-3 navbar-logo">
                    <img src="<?= base_url('assets/user')?>/image/logo.png" alt="logo">
                </div>
                <div class="col-9">
                    <nav class="navbar navbar-expand-lg">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav mr-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="#">Travel</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Goods</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Pulls
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">How To</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Contact Us</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Blog</a>
                            </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <section class="section1">
        <div class="container headline">
            <div class="row">
                <div class="col-md-5 order-2 order-md-1">
                    <div class="title">
                        <h1>Layanan Shuttle Antar Kota di Jawa</h1>
                    </div>
                    <div class="desc">
                        <span>Siap antar anda sampai tujuan</span>
                    </div>
                    <div class="headline--cta">
                        <a href="#" class="btn --md --red --cta">Temukan Kota Tujuan</a>
                    </div>
                </div>
                <div class="col-md-7 order-1 order-md-2">
                    <div class="illustration">
                        <img src="<?= base_url('assets/user')?>/image/bg1.png" alt="travel image">
                    </div>
                </div>
            </div>
        </div>
        <div class="container adventages">
            <div class="row">
                <div class="col-md-6 col-lg-3 --title-sub">
                    <div class="adventage">
                        <div class="adventage--title">
                            <h3>Professional Driver</h3>
                        </div>
                        <div class="adventage--desc">
                            <span>Driver kami melalui selesksi ketat sehingga menjamin keselamatan anda selama diperjalanan.</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 --title-sub">
                    <div class="adventage">
                        <div class="adventage--title">
                            <h3>Easy Booking</h3>
                        </div>
                        <div class="adventage--desc">
                            <span>Proses pesan mudah tak perlu mengantri. Pembayaran dapat dilakukan online atau di tempat.</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 --title-sub">
                    <div class="adventage">
                        <div class="adventage--title">
                            <h3>On Time</h3>
                        </div>
                        <div class="adventage--desc">
                            <span>Menjamin ketepatan waktu baik itu keberangkatan ataupun sampai pada tujuan kota anda.</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 --title-sub">
                    <div class="adventage">
                        <div class="adventage--title">
                            <h3>Enjoy the Experience</h3>
                        </div>
                        <div class="adventage--desc">
                            <span>Nikmati pengalaman baru dalam berkerndara dengan fasilitas yang tersedia di dalam shuttle.</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="input-pull">
        <div class="container">
            <div class="row">
                <div class="--title">
                    <h2>Pesan Shuttle</h2>
                    <p>Mulai perjalanan anda dengan shuttle kami.</p>
                </div>
            </div>
            <div class="row">
                <div class="form">
                    <form action="">
                        <div class="forminput">
                            <div class="formsection pull-awal">
                                <label for="pull-awal">Pull Keberangkatan</label>
                                <select name="pull-awal" id="pull-awal">
                                    <?php

                                    use CodeIgniter\CLI\Console;

foreach ($cabang as $item):?>
                                        <option <?php if($item->id_cabang == old('pull-awal')) echo 'selected="selected"'; ?> value="<?= $item->id_cabang ?>"><?= $item->nama_cabang ?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                            <div class="formsection pull-akhir">
                                <label for="pull-akhir">Pull Tujuan</label>
                                <select name="pull-akhir" id="pull-akhir">
                                    <?php foreach ($cabang as $item):?>
                                        <option <?php if($item->id_cabang == old('pull-akhir')) echo 'selected="selected"'; ?> value="<?= $item->id_cabang ?>"><?= $item->nama_cabang ?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                            <div class="formsection date-input">
                                <label for="tanggalberangkat">Tanggal Berangkat</label>
                                <input type="date" name="tanggalberangkat" id="tanggalberangkat">
                            </div>
                            <div class="formsection passanger">
                                <label for="passanger">Penumpang</label>
                                <select name="passanger" id="passanger">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                </select>
                            </div>
                            <div class="formsection checkinput">
                                <button id='checkketersediaan' class="btn --sm --red-outline" onclick="getJadwalKeberangkatan()">Cek Ketersediaan</button>
                            </div>
                        </div>
                        <div class="formresult" style="display: none;">
                            <div class="jadwal-rute" id="jadwal-rute">
                            </div>
                            <div class="footer-result">
                                <div class="row align-items-center">
                                    <div class="col-md-8">
                                        <span class="price" id="price"></span>
                                        <span id="status-pesan"></span>
                                    </div>  
                                    <div class="col-md-4 buttonsubmit">
                                        <button class="btn --red --md">
                                            Pesan Shuttle
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <section class="section2">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-5 order-sm-1 order-2">
                    <div class="section --title">
                        <h2>Bagaimana Cara Memesan?</h2>
                        <p>Ikuti tahap berikut untuk memesan shuttle.</p>
                    </div>
                    <div class="steps">
                        <div class="step">
                            <div class="title --title">
                                <h3 data-aria="1">Pilih Pull Keberangkatan & Tujuan</h3>
                                <span>Pilih kota dan pull keberangkatan yang telah kami sediakan. Untuk saat ini kami hanya beroperasi di 4 kota besar. Lalu pilih tujuan kota dan pull.</span>
                            </div>
                        </div>
                        <div class="step">
                            <div class="title --title">
                                <h3 data-aria="2">Tentukan Tanggal Keberangkatan</h3>
                                <span>Tentutkan tanggal keberangkatan seminiminalnya 1 hari sebelum keberangkatan, semaksimalnya 1 bulan sebelum keberangkatan dan lakukan konfirmasi sebelumnya.</span>
                            </div>
                        </div>
                        <div class="step">
                            <div class="title --title">
                                <h3 data-aria="3">Bayar Transaksi Pesanan</h3>
                                <span>Pembayaran transaksi pesanan selambat-lambatnya 1 jam sebelum jam keberangkatan, pembayaran lebih dari itu pesanan akan dibatalkan.</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="offset-md-1 col-md-6 order-sm-2 order-1">
                    <div class="illustration">
                        <img src="<?= base_url('assets/user')?>/image/bg2.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section3">
        <div class="container">
            <div class="row">
                <div class="inner --title">
                    <h2>Pull Shuttle</h2>
                    <p>Melayani perjalanan  shuttle di kota besar di Jawa.</p>
                </div>
            </div>
            <nav class="nav-tab">
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                  <button class="nav-link active" id="Bandung-tab" data-bs-toggle="tab" data-bs-target="#Bandung" type="button" role="tab" aria-controls="Bandung" aria-selected="true">Bandung</button>
                  <button class="nav-link" id="Jakarta-tab" data-bs-toggle="tab" data-bs-target="#Jakarta" type="button" role="tab" aria-controls="Jakarta" aria-selected="false">Jakarta</button>
                  <button class="nav-link" id="Semarang-tab" data-bs-toggle="tab" data-bs-target="#Semarang" type="button" role="tab" aria-controls="Semarang" aria-selected="false">Semarang</button>
                  <button class="nav-link" id="yogyakarta-tab" data-bs-toggle="tab" data-bs-target="#yogyakarta" type="button" role="tab" aria-controls="yogyakarta" aria-selected="false">Yogyakarta</button>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="Bandung" role="tabpanel" aria-labelledby="Bandung-tab">
                    <div class="row align-items-center">
                        <div class="col-md-6 inner city-image">
                            <div class="image">
                                <img src="<?= base_url('assets/user')?>/image/bandung.jpg" alt="photo bandung">
                            </div>
                        </div>
                        <div class="col-md-6 inner points">
                            <?php foreach (array_filter($cabang, function($item) { return $item->nama_kota == "KOTA BANDUNG"; }) as $item):?>
                                <div class="point">
                                    <div class="city --title">
                                        <h3><?= $item->nama_cabang ?></h3>
                                        <span class="address"><?= $item->alamat ?></span>
                                        <span><a href="http://maps.google.com/?q=<?= $item->alamat ?>" title="See on Google Maps">See on Google Maps</a></span>
                                    </div>
                                </div>
                            <?php endforeach;?>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="Jakarta" role="tabpanel" aria-labelledby="Jakarta-tab">
                    <div class="row align-items-center">
                        <div class="col-md-6 inner city-image">
                            <div class="image">
                                <img src="<?= base_url('assets/user')?>/image/jakarta.jpg" alt="photo bandung">
                            </div>
                        </div>
                        <div class="col-md-6 inner points">
                            <?php foreach (array_filter($cabang, function($item) { return $item->nama_kota == "KOTA JAKARTA PUSAT"; }) as $item):?>
                                <div class="point">
                                    <div class="city --title">
                                        <h3><?= $item->nama_cabang ?></h3>
                                        <span class="address"><?= $item->alamat ?></span>
                                        <span><a href="http://maps.google.com/?q=<?= $item->alamat ?>" title="See on Google Maps">See on Google Maps</a></span>
                                    </div>
                                </div>
                            <?php endforeach;?>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="Semarang" role="tabpanel" aria-labelledby="Semarang-tab">
                    <div class="row align-items-center">
                        <div class="col-md-6 inner city-image">
                            <div class="image">
                                <img src="<?= base_url('assets/user')?>/image/semarang.jpg" alt="photo bandung">
                            </div>
                        </div>
                        <div class="col-md-6 inner points">
                            <?php foreach (array_filter($cabang, function($item) { return $item->nama_kota == "KOTA SEMARANG"; }) as $item):?>
                                <div class="point">
                                    <div class="city --title">
                                        <h3><?= $item->nama_cabang ?></h3>
                                        <span class="address"><?= $item->alamat ?></span>
                                        <span><a href="http://maps.google.com/?q=<?= $item->alamat ?>" title="See on Google Maps">See on Google Maps</a></span>
                                    </div>
                                </div>
                            <?php endforeach;?>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="yogyakarta" role="tabpanel" aria-labelledby="yogyakarta-tab">
                    <div class="row align-items-center">
                        <div class="col-md-6 inner city-image">
                            <div class="image">
                                <img src="<?= base_url('assets/user')?>/image/yogyakarta.jpg" alt="photo bandung">
                            </div>
                        </div>
                        <div class="col-md-6 inner points">
                            <?php foreach (array_filter($cabang, function($item) { return $item->nama_kota == "KOTA YOGYAKARTA"; }) as $item):?>
                                <div class="point">
                                    <div class="city --title">
                                        <h3><?= $item->nama_cabang ?></h3>
                                        <span class="address"><?= $item->alamat ?></span>
                                        <span><a href="http://maps.google.com/?q=<?= $item->alamat ?>" title="See on Google Maps">See on Google Maps</a></span>
                                    </div>
                                </div>
                            <?php endforeach;?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section5">
        <div class="container">
            <div class="row">
                <div class="ads" style="background: url(<?= base_url('assets/user')?>/image/goods.jpg) center center; background-size: cover;">
                    <div class="title --title">
                        <h2>Ingin Mengirim Barang?</h2>
                        <span>Kirim barang 1 hari sampai dengan shuttle kami.</span>
                        <a href="" class="btn --md --red --cta">Pelajari Lebih Lanjut</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="section6" style="padding-bottom: 9.6rem;">
        <div class="container">
            <div class="row">
                <div class="APImaps" id="APImaps" style="width: 100%; border-radius: 16px">
                        <iframe height="300" style="border:0" loading="lazy" allowfullscreen 
                        src="https://www.google.com/maps/embed/v1/place?key=AIzaSyDJ2K6VQya4WNhCbQwEbn26TLpdHLqaYPQ&q=Bandung+Jalan+Buah+Batu+No+278"
                        style="width: 100%;" onload="this.width=document.getElementById('APImaps').offsetWidth;">
                        </iframe>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer">
        <div class="container">
            <div class="row footer-logo">
                <img src="" alt="">
            </div>
            <div class="row footer-mid">
                <div class="col-lg-8 footer-links-outer">
                    <div class="footer-links">
                        <div class="title --title">
                            <h3>About</h3>
                            <a href="#" class="footer-link">Company</a>
                            <a href="#" class="footer-link">Comunity</a>
                            <a href="#" class="footer-link">Careers</a>
                            <a href="#" class="footer-link">Our Partner</a>
                        </div>
                    </div>
                    <div class="footer-links">
                        <div class="title --title">
                            <h3>Resource</h3>
                            <a href="#" class="footer-link">Privacy Policy</a>
                            <a href="#" class="footer-link">Terms of Service</a>
                            <a href="#" class="footer-link">Security</a>
                            <a href="#" class="footer-link">Insurance</a>
                        </div>
                    </div>
                    <div class="footer-links">
                        <div class="title --title">
                            <h3>Points</h3>
                            <a href="#" class="footer-link">Jakarta Point</a>
                            <a href="#" class="footer-link">Bandung Point</a>
                            <a href="#" class="footer-link">Semarang Point</a>
                            <a href="#" class="footer-link">Yogyakarta Point</a>
                        </div>
                    </div>
                    <div class="footer-links">
                        <div class="title --title">
                            <h3>SiteMap</h3>
                            <a href="#" class="footer-link">Blog</a>
                            <a href="#" class="footer-link">Travel Service</a>
                            <a href="#" class="footer-link">Good Service</a>
                            <a href="#" class="footer-link">Contact Us</a>
                        </div>
                    </div>
                </div>
                <div class="offset-lg-1 col-lg-3">
                    <div class="social-media">
                        <div class="title --title">
                            <h3>Social Media</h3>
                            <span>Follow us on social media to find out the latest updates on our progress.</span>
                        </div>
                        <div class="social-media-icon">
                            <a href="#" class="social-media-icon-link"><i class="fa fa-instagram"></i></a>
                            <a href="#" class="social-media-icon-link"><i class="fa fa-facebook"></i></a>
                            <a href="#" class="social-media-icon-link"><i class="fa fa-twitter"></i></a>
                        </div>
                        <span class="phone">+62 822 2353 2365</span>
                        <span class="address">Jl. Buah Batu No.278, Bandung, Indonesia</span>
                    </div>
                </div>
            </div>
            <div class="row footnote">
                <span>Copyright © 2021 Travel Team | All Rights Reserved.</span>
            </div>
        </div>
    </footer>
    <script src="<?= base_url('assets/user')?>/js/bootstrap/jquery.min.js"></script>
    <script src="<?= base_url('assets/user')?>/js/bootstrap/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('assets/user')?>/js/main.js"></script>
</body>
</html>

<script>
    function getJadwalKeberangkatan()
    {
        event.preventDefault();
        $.ajax(
        {
            url:"<?= site_url('user/jadwal') ?>",
            type: "POST",
            data: {
                id_cabang_asal: document.getElementById("pull-awal").value,
                id_cabang_tujuan: document.getElementById("pull-akhir").value
            },
            dataType : 'json',
            beforeSend: function()
            {
                $("#jadwal-rute").empty();
            },
            success: function(result)
            {
                $.each(result.jadwal, function(key,value)
                {
                    $("#jadwal-rute").append(
                        '<label class="container-radio">\
                            <span class="time">'+value.jam_berangkat+'</span>\
                            <input type="radio" name="jadwal">\
                            <span class="radiomark"></span>\
                        </label>'
                        );
                });

                if(result.jadwal.length == 0)
                {
                    $("#price").text("Rp.0");
                    $("#status-pesan").text("Maaf rute tidak ditemukan");
                }
                else {
                    $("#price").text("Rp.135.000");
                    $("#status-pesan").text("Dari " + result.cabangAsal.nama_kota + ", " + result.cabangAsal.nama_cabang + 
                        " ke " + result.cabangTujuan.nama_kota + ", " + result.cabangTujuan.nama_cabang +
                        " memakan waktu sekitar " + result.rute.waktu_tempuh + " menit."
                    );
                }
            },
        });
    }
</script>