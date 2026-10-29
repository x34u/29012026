<?php
if (php_sapi_name() !== 'cli') header('Content-Type: text/plain; charset=utf-8');

// Bonus 5% dari setoran jika setoran mencapai batas minimum.
function hitungBonus($setoran, $batas)
{
    if ($setoran >= $batas) {
        return $setoran * 0.05;
    }
    return 0;
}

function rupiah($angka)
{
    return "Rp " . number_format($angka, 0, ",", ".");
}

$saldo         = 100000;
$jumlahBulan   = 6;
$batasBonus    = 200000;
$setoranBulanan = [150000, 200000, 250000, 100000, 300000, 200000];

echo "SIMULASI TABUNGAN ANAK\n";
echo "Saldo awal  : " . rupiah($saldo) . "\n";
echo "Batas bonus : setoran >= " . rupiah($batasBonus) . "\n\n";

for ($bulan = 1; $bulan <= $jumlahBulan; $bulan++) {
    $setoran = $setoranBulanan[$bulan - 1];
    $bonus   = hitungBonus($setoran, $batasBonus);
    $saldo  += $setoran + $bonus;

    echo "Bulan $bulan | Setoran " . rupiah($setoran);
    if ($bonus > 0) {
        echo " | Bonus " . rupiah($bonus);
    } else {
        echo " | Tanpa bonus";
    }
    echo " | Saldo " . rupiah($saldo) . "\n";
}

echo "\nSALDO AKHIR setelah $jumlahBulan bulan : " . rupiah($saldo) . "\n";
