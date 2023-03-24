<?php
include "../../include/function.php";
$jenis = $_GET['jenis'];

if ($jenis == '1') {
    $sql = query("select * from mst_ukuran");
    foreach ($sql as $row) {
        #print_r($row);
        $data[] = array(
            "kode_ukuran" => $row['kode_ukuran'],
            "ukuran" => $row['ukuran']
        );
    }
    #print_r($data);
    echo json_encode($data);
} elseif ($jenis == '2') {
    $sql = query("select * from mst_warna");
    foreach ($sql as $row) {
        #print_r($row);
        $data[] = array(
            "kode_warna" => $row['kode_warna'],
            "nama_warna" => $row['nama_warna']
        );
    }
    #print_r($data);
    echo json_encode($data);
} elseif ($jenis == '3') {
    $sql = query("select * from produk_");
    foreach ($sql as $row) {
        #print_r($row);
        $data[] = array(
            "kode_barang" => $row['kode_barang'],
            "nama_barang" => $row['nama_barang'],
            "kode_ukuran" => $row['kode_ukuran'],
            "kode_warna" => $row['kode_warna'],
            "harga" => $row['harga'],
            "harga_dasar" => $row['harga_dasar']
        );
    }
    #print_r($data);
    echo json_encode($data);
}
