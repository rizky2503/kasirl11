<div class="container mt-4">
    <h3 class="mb-4">Dashboard</h3>
    <div class="row">
        <div class="col-md-4 mb-3">
            <div class="card text-white bg-primary shadow">
                <div class="card-body text-center">
                    <h5 class="card-title">Jumlah Pengguna</h5>
                    <h2 class="card-text">{{ $jumlahUser }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card text-white bg-success shadow">
                <div class="card-body text-center">
                    <h5 class="card-title">Jumlah Produk</h5>
                    <h2 class="card-text">{{ $jumlahProduk }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card text-white bg-warning shadow">
                <div class="card-body text-center">
                    <h5 class="card-title">Jumlah Transaksi</h5>
                    <h2 class="card-text">{{ $jumlahTransaksi }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card text-white bg-danger shadow">
                <div class="card-body text-center">
                    <h5 class="card-title">Jumlah Laporan</h5>
                    <h2 class="card-text">{{ $jumlahLaporan }}</h2>
                </div>
            </div>
        </div>
    </div>
</div>
