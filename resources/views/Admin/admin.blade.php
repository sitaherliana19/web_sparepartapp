<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Ansonika">
    <title>Admin dashboard</title>
    
    <!-- Favicons-->
    <link rel="stylesheet" href="/font2/css/all.min.css">

    <!-- FONT -->
    <link href="/login/font-bunny.css" rel="stylesheet">

    <!-- Bootstrap CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link href="/admin_style/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    
    <link href="/login/admin.css" rel="stylesheet">
    <link href="/admin_style/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="/admin_style/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    <link href="/admin_style/css/custom.css" rel="stylesheet">
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>

<body class="fixed-nav sticky-footer" id="page-top">
    <nav class="navbar navbar-expand-lg navbar-dark bg-default fixed-top" id="mainNav">
        <style>
        .navbar-brand img {
            margin-right: 10px; 
        }
        .navbar-nav.ml-auto .nav-link {
            color: black; /* Mengubah warna teks menjadi hitam */
        }
        </style>
        <a class="navbar-brand"><img src="/img/logo-navbar.png" alt="" width="60" 
            height="36">Bengkel Arilla</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
            data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Beranda">
                    <a class="nav-link" href="/admin-dashboard">
                        <i class="fas fa-fw fa-house"></i>
                        <span class="nav-link-text">Beranda</span>
                    </a>
                </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="DataPelanggan">
                    <a class="nav-link" href="/data_pelanggan">
                        <i class="fa-solid fa-fw fa-clipboard-list"></i> 
                        <span class="nav-link-text">Data Pelanggan</span>
                    </a>
                </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="product">
                    <a class="nav-link" href="/products">
                        <i class="fa-solid fa-box-open"></i> 
                        <span class="nav-link-text">Product</span>
                    </a>
                </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="kategori_produk">
                    <a class="nav-link" href="/kategori_produk">
                        <i class="fa fa-folder"></i> 
                        <span class="nav-link-text">Kategori Produk</span>
                    </a>
                </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="barang_masuk">
                    <a class="nav-link" href="/barang_masuk">
                        <i class="bi bi-arrow-left"></i> 
                        <span class="nav-link-text">Barang Masuk</span>
                    </a>
                </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="barang_keluar">
                    <a class="nav-link" href="/barang_keluar">
                        <i class="bi bi-arrow-right"></i> 
                        <span class="nav-link-text">Barang Keluar</span>
                    </a>
                </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="pengiriman">
                    <a class="nav-link" href="/data_pesanan">
                        <i class="fas fa-shipping-fast"></i> 
                        <span class="nav-link-text">Data Pemesanan</span>
                    </a>
                </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="laporan">
                    <a class="nav-link" href="/laporan">
                        <i class="bi bi-bar-chart"></i> 
                        <span class="nav-link-text">Laporan</span>
                    </a>
                </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Logout">
                    <a class="nav-link" href="log" data-toggle="modal" data-target="#logoutModal">
                        <i class="fa fa-fw fa-sign-out-alt"></i> 
                        <span class="nav-link-text">Logout</span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="contain">
        @yield('contain')
    </div>
    
<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Apakah Anda Yakin?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Pilih "Logout" untuk mengakhiri sesi Anda saat ini</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a href="/logout" class="btn btn-danger">Logout</a>
            </div>
        </div>
    </div>
</div>
</body>
</html>