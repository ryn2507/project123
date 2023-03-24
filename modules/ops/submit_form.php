<?php
include "../../include/conn.php";
include "../../include/function.php";
$jenis = $_GET['jenis'];

if ($jenis == '1') {
    $post1 = $_POST['kode_ukuran'];
    $post2 = $_POST['ukuran'];

    $sql = "insert into mst_ukuran(kode_ukuran,ukuran)values('$post1','$post2')";
    if ($conn->query($sql) === TRUE) {
        $kata = "Data Berhasil Ditambahkan";
        echo $kata;
    } else {
        $kata = "Data GAGAL ditambahkan !!!";
        echo $kata;
    }
} elseif ($jenis == '2') {
    $kode_ukuran = $_POST['kode_ukuran'];
    $ukuran = $_POST['ukuran'];
    $sql = "update mst_ukuran set ukuran='" . $ukuran . "' where kode_ukuran='" . $kode_ukuran . "' ";
    if ($conn->query($sql) === TRUE) {
        $kata = "Data Berhasil DiUpdate";
        echo $kata;
    } else {
        $kata = "Data GAGAL DiUpdate !!!";
        echo $kata;
    }
} elseif ($jenis == '3') {
    $kode_ukuran = $_POST['kode_ukuran'];
    $sql = "delete from mst_ukuran where kode_ukuran='" . $kode_ukuran . "' ";
    if ($conn->query($sql) === TRUE) {
        $kata = "Data Berhasil DiHapus";
        echo $kata;
    } else {
        $kata = "Data GAGAL DiHapus !!!";
        echo $kata;
    }
} elseif ($jenis == '4') {
    $post1 = $_POST['kode_warna'];
    $post2 = $_POST['nama_warna'];

    $sql = "insert into mst_warna(kode_warna,nama_warna)values('$post1','$post2')";
    if ($conn->query($sql) === TRUE) {
        $kata = "Data Berhasil Ditambahkan";
        echo $kata;
    } else {
        $kata = "Data GAGAL ditambahkan !!!";
        echo $kata;
    }
} elseif ($jenis == '5') {
    $kode_warna = $_POST['kode_warna'];
    $nama_warna = $_POST['nama_warna'];
    $sql = "update mst_warna set nama_warna='" . $nama_warna . "' where kode_warna='" . $kode_warna . "' ";
    if ($conn->query($sql) === TRUE) {
        $kata = "Data Berhasil DiUpdate";
        echo $kata;
    } else {
        $kata = "Data GAGAL DiUpdate !!!";
        echo $kata;
    }
} elseif ($jenis == '6') {
    $kode_warna = $_POST['kode_warna'];
    $data = query("SELECT count(*) as total FROM produk_ WHERE kode_Warna='" . $kode_warna . "'");
    #$data = $conn->query($cek);
    #print_r($data[0]['total']);
    #die;
    if ($data[0]['total'] > 0) {
        $kata = "Kode sudah digunakan,Tidak bisa DIHapus!!!";
        echo $kata;
    } else {
        $sql = "delete from mst_warna where kode_warna='" . $kode_warna . "' ";
        if ($conn->query($sql) === TRUE) {
            $kata = "Data Berhasil DiHapus";
            echo $kata;
        } else {
            $kata = "Data GAGAL DiHapus !!!";
            echo $kata;
        }
    }
} elseif ($jenis == '7') {
    $post1 = $_POST['kode_barang'];
    $post2 = $_POST['nama_barang'];
    $post3 = $_POST['kode_ukuran'];
    $post4 = $_POST['kode_warna'];
    $post5 = STR_REPLACE(",", "", $_POST['harga']);
    $post6 = STR_REPLACE(",", "", $_POST['harga_dasar']);

    $sql = "insert into produk_ (kode_barang,nama_barang,kode_ukuran,kode_warna,harga,harga_dasar)values('$post1','$post2','$post3','$post4','$post5','$post6')";
    if ($conn->query($sql) === TRUE) {
        $kata = "Data Berhasil Ditambahkan";
        echo $kata;
    } else {
        $kata = "Data GAGAL ditambahkan !!!";
        echo $sql;
    }
} elseif ($jenis == '8') {
    $kode_barang = $_POST['kode_barang'];
    $nama_barang = $_POST['nama_barang'];
    $kode_ukuran = $_POST['kode_ukuran'];
    $kode_warna = $_POST['kode_warna'];
    $harga = STR_REPLACE(",", "", $_POST['harga']);
    $harga_dasar = STR_REPLACE(",", "", $_POST['harga_dasar']);
    $sql = "update produk_ set nama_barang='" . $nama_barang . "', 
    kode_ukuran='" . $kode_ukuran . "', 
    kode_warna='" . $kode_warna . "',
    harga='" . $harga . "',
    harga_dasar='" . $harga_dasar . "' 
    where kode_barang='" . $kode_barang . "' ";
    if ($conn->query($sql) === TRUE) {
        $kata = "Data Berhasil DiUpdate";
        echo $kata;
    } else {
        $kata = "Data GAGAL DiUpdate !!!";
        echo $kata;
    }
} elseif ($jenis == '9') {
    $kode_barang = $_POST['kode_barang'];
    $sql = "delete from produk_ where kode_barang='" . $kode_barang . "' ";
    if ($conn->query($sql) === TRUE) {
        $kata = "Data Berhasil DiHapus";
        echo $kata;
    } else {
        $kata = "Data GAGAL DiHapus !!!";
        echo $kata;
    }
}
