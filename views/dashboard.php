<h2>Dashboard</h2>

<p>Selamat datang di Aplikasi PHP Modular!</p>

<div class="card">
    <h3>Belajar PHP Modular</h3>
    <p>
        Aplikasi ini dibuat untuk mempelajari pemisahan
        kode PHP menjadi beberapa file agar lebih rapi
        dan mudah dikelola.
    </p>
</div>

<div class="card">
    <h3>Informasi</h3>
    <p>Nama: Nazwa Salsabila</p>
    <p>NIM: 312510155</p>
</div>

<div class="card">
    <h3>Contoh Penggunaan Function</h3>

    <p>
        Harga barang:
        <?= formatRupiah(50000); ?>
    </p>

    <p>
        Total belanja:
        <?= formatRupiah(hitungTotal(25000, 3)); ?>
    </p>

    <p>
        Nilai mahasiswa:
        <?= tentukanNilai(90); ?>
    </p>
</div>