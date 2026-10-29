<?php
if (php_sapi_name() !== 'cli') header('Content-Type: text/plain; charset=utf-8');

function tarifHarian($jenis)
{
    if ($jenis == "Sedan") {
        return 300000;
    } elseif ($jenis == "SUV") {
        return 500000;
    } else {
        return 0;
    }
}

function rupiah($angka)
{
    return "Rp " . number_format($angka, 0, ",", ".");
}

$jenisMobil = "SUV";
$lamaSewa   = 5;

$tarif = tarifHarian($jenisMobil);
if ($tarif == 0) {
    echo "Jenis kendaraan tidak tersedia.\n";
    exit;
}

echo "RINCIAN SEWA MOBIL\n";
echo "Jenis kendaraan : $jenisMobil\n";
echo "Tarif per hari  : " . rupiah($tarif) . "\n";
echo "Lama sewa       : $lamaSewa hari\n\n";

$subtotal = 0;
for ($hari = 1; $hari <= $lamaSewa; $hari++) {
    $subtotal += $tarif;
    echo "Hari ke-$hari : " . rupiah($tarif) . " (kumulatif " . rupiah($subtotal) . ")\n";
}

// Diskon 10% berlaku hanya jika sewa lebih dari 3 hari.
$diskon = 0;
if ($lamaSewa > 3) {
    $diskon = $subtotal * 0.10;
}
$total = $subtotal - $diskon;

echo "\nSubtotal         : " . rupiah($subtotal) . "\n";
echo "Diskon           : " . rupiah($diskon) . "\n";
echo "TOTAL PEMBAYARAN : " . rupiah($total) . "\n";
