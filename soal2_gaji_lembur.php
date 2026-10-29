<?php
if (php_sapi_name() !== 'cli') header('Content-Type: text/plain; charset=utf-8');

function gajiHarian($golongan)
{
    if ($golongan == 1) {
        return 150000;
    } elseif ($golongan == 2) {
        return 200000;
    } else {
        return 250000;
    }
}

// Tarif lembur per jam menurut golongan.
function uangLembur($golongan, $jamLembur)
{
    if ($golongan == 1) {
        $tarifPerJam = 15000;
    } elseif ($golongan == 2) {
        $tarifPerJam = 20000;
    } else {
        $tarifPerJam = 25000;
    }
    return $jamLembur * $tarifPerJam;
}

function rupiah($angka)
{
    return "Rp " . number_format($angka, 0, ",", ".");
}

$golongan  = 2;
$hariKerja = 6;
$jamLembur = [0, 2, 1, 0, 3, 2];

$totalGaji   = 0;
$totalLembur = 0;

echo "RINCIAN GAJI DAN LEMBUR (Golongan $golongan)\n\n";

for ($hari = 1; $hari <= $hariKerja; $hari++) {
    $gaji   = gajiHarian($golongan);
    $jam    = $jamLembur[$hari - 1];
    $lembur = 0;

    if ($jam > 0) {
        $lembur = uangLembur($golongan, $jam);
    }

    $totalGaji   += $gaji;
    $totalLembur += $lembur;

    echo "Hari ke-$hari | Gaji " . rupiah($gaji) . " | Lembur $jam jam = " . rupiah($lembur) . "\n";
}

echo "\nTotal gaji pokok : " . rupiah($totalGaji) . "\n";
echo "Total lembur     : " . rupiah($totalLembur) . "\n";
echo "TOTAL DITERIMA   : " . rupiah($totalGaji + $totalLembur) . "\n";
