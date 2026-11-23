<?php

// Function untuk format rupiah
function formatRupiah($angka) {
    return "Rp " . number_format($angka, 0, ',', '.');
}

// Function untuk menghitung total
function hitungTotal($harga, $jumlah) {
    return $harga * $jumlah;
}

// Function untuk menentukan nilai
function tentukanNilai($nilai) {
    if ($nilai >= 85) {
        return "A";
    } elseif ($nilai >= 70) {
        return "B";
    } elseif ($nilai >= 55) {
        return "C";
    } elseif ($nilai >= 40) {
        return "D";
    } else {
        return "E";
    }
}

?>