
<?php

use Carbon\Carbon;

function currencyIDR($value)
{
    return 'Rp ' . number_format($value, 0, ',', '.');
}
function randomIdTransaction()
{
    $randomInt = mt_rand(0, 9999);
    $result = time() . $randomInt;
    return $result;
}
function IDRToNum($value)
{
    return preg_replace('/\D/', '', $value);
}

function totalPPN($price)
{
    $persentasePPN = 11; //> 11%
    $ppn = $price * ($persentasePPN / 100);
    return $price + $ppn;
}
function random_code()
{

    return rand(1111, 9999);
}

function age($tanggalLahir)
{
    // Mendapatkan tanggal hari ini
    $tanggalSekarang = new DateTime();

    // Mendapatkan tanggal lahir dari parameter dan mengonversinya ke objek DateTime
    $tanggalLahir = new DateTime($tanggalLahir);

    // Menghitung selisih tahun
    $selisihTahun = $tanggalSekarang->diff($tanggalLahir)->y;

    return $selisihTahun;
}
function getPercent($price, $percent, $decimals = 2)
{
    if ($price == 0) {
        return 0;
    }

    return ($percent / 100) * $price;
}

function isExpired($expire_date)
{
    $now = new DateTime();


    // Cek format tanggal kedaluwarsa
    $is_full_format = strpos($expire_date, ':') !== false;

    // Ubah format tanggal kedaluwarsa sesuai dengan kondisi
    $expiration_date = $is_full_format
        ? DateTime::createFromFormat('Y-m-d H:i:s', $expire_date)->format('Y-m-d')
        : DateTime::createFromFormat('Y-m-d', $expire_date);

    // Ubah format tanggal saat ini hanya menjadi 'Y-m-d'
    $current_date = $now->format('Y-m-d');

    // Bandingkan tanggal kedaluwarsa dan tanggal saat ini
    if ($current_date > $expiration_date) {
        // The expiration date has passed
        return true;
    } else {
        // The expiration date has not passed yet
        return false;
    }
}
function cdaFormatTime($datetime, $format = 'm/d/Y h:i A')
{
    return Carbon::createFromFormat('Y-m-d H:i:s', $datetime)->format($format);
}
function generateRregistrationCode($length = 8)
{
    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $randomString = '';

    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }

    return $randomString;
}

function arrayToString($array)
{
    // Mengubah array menjadi string dipisahkan dengan koma
    $string = implode(', ', $array);

    // Mengganti koma terakhir dengan kata "dan"
    $string = preg_replace('/,([^,]*)$/', ' dan $1', $string);

    // Tampilkan hasil konversi
    echo $string;
}
