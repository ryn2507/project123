<?php
include "../../include/function.php";
$jenis = $_GET['jenis'];

if ($jenis == '1') {
    $sql = query("select * from mst_ukuran");
    $tbl = "
    <button type='button' class='btn btn-sm btn-success insert' id='insert'>Insert</button>
    <table class='table table-bordered'>
    <thead>
    <tr>
    <th>Kode Ukuran</th>
    <th>Nama Ukuran</th>
    <th>Action</th>
    </tr>
    </thead>
    <tbody>";
    foreach ($sql as $row) {
        $tbl .= "<tr>
        <td>" . $row['kode_ukuran'] . "</td>
        <td>" . $row['ukuran'] . "</td>
        <td><button type='button' class='btn btn-sm btn-warning edit' id_ukur='" . $row['kode_ukuran'] . "'>Edit</button>&nbsp;&nbsp;&nbsp;<button type='button' class='btn btn-sm btn-danger delete' id_ukur='" . $row['kode_ukuran'] . "'>Delete</button></td>
        </tr>";
    }
    $tbl .= "</tbody>
    </table>'";
    #print_r($data);
    echo $tbl;
} elseif ($jenis == '2') {
    //$_POST['kode_ukuran'] = '10001';
    $sql = query("select * from mst_ukuran where kode_ukuran='" . $_POST['kode_ukuran'] . "'");
    #print_r($row);
    foreach ($sql as $row) {
        $data[] = array(
            "kode_ukuran" => $sql[0]['kode_ukuran'],
            "ukuran" => $sql[0]['ukuran']
        );
    }
    #print_r($data);
    echo json_encode($data);
} elseif ($jenis == '3') {
    $sql = query("select * from mst_warna");
    $tbl = "
    <button type='button' class='btn btn-sm btn-success insert' id='insert'>Insert</button>
    <table class='table table-bordered'>
    <thead>
    <tr>
    <th>Kode Warna</th>
    <th>Nama Warna</th>
    <th>Action</th>
    </tr>
    </thead>
    <tbody>";
    foreach ($sql as $row) {
        $tbl .= "<tr>
        <td>" . $row['kode_warna'] . "</td>
        <td>" . $row['nama_warna'] . "</td>
        <td><button type='button' class='btn btn-sm btn-warning edit' id_warna='" . $row['kode_warna'] . "'>Edit</button>&nbsp;&nbsp;&nbsp;<button type='button' class='btn btn-sm btn-danger delete' id_warna='" . $row['kode_warna'] . "'>Delete</button></td>
        </tr>";
    }
    $tbl .= "</tbody>
    </table>'";
    #print_r($data);
    echo $tbl;
} elseif ($jenis == '4') {
    //$_POST['kode_ukuran'] = '10001';
    $sql = query("select * from mst_warna where kode_warna='" . $_POST['kode_warna'] . "'");
    #print_r($row);
    foreach ($sql as $row) {
        $data[] = array(
            "kode_warna" => $sql[0]['kode_warna'],
            "nama_warna" => $sql[0]['nama_warna']
        );
    }
    #print_r($data);
    echo json_encode($data);
} elseif ($jenis == '5') {
    $sql = query("select * from mst_ukuran order by kode_ukuran asc");
    foreach ($sql as $row) {
        #print_r($row);
        $data[] = array(
            "kode_ukuran" => $row['kode_ukuran'],
            "ukuran" => $row['ukuran']
        );
    }
    #print_r($data);
    echo json_encode($data);
} elseif ($jenis == '6') {
    $sql = query("select * from mst_warna order by kode_warna asc");
    foreach ($sql as $row) {
        #print_r($row);
        $data[] = array(
            "kode_warna" => $row['kode_warna'],
            "nama_warna" => $row['nama_warna']
        );
    }
    #print_r($data);
    echo json_encode($data);
} elseif ($jenis == '7') {
    $sql = query("select kode_barang,nama_barang,a.kode_ukuran,ukuran,a.kode_warna,nama_warna,harga,harga_dasar from produk_ A
join mst_ukuran b on a.kode_ukuran=b.kode_ukuran
join mst_warna c on a.kode_warna=c.kode_warna");
    $tbl = "
    <button type='button' class='btn btn-sm btn-success insert' id='insert'>Insert</button>
    <table class='table table-bordered'>
    <thead>
    <tr>
    <th>Kode Barang</th>
    <th>Nama Barang</th>
    <th>Kode Ukuran</th>
    <th>Ukuran</th>
    <th>Kode Warna</th>
    <th>Nama Warna</th>
    <th>Harga</th>
    <th>Harga Dasar</th>
    <th>Action</th>
    </tr>
    </thead>
    <tbody>";
    foreach ($sql as $row) {
        $tbl .= "<tr>
        <td>" . $row['kode_barang'] . "</td>
        <td>" . $row['nama_barang'] . " - " . $row['nama_warna'] . " - " . $row['ukuran'] . "</td>
        <td>" . $row['kode_ukuran'] . "</td>
        <td>" . $row['ukuran'] . "</td>
        <td>" . $row['kode_warna'] . "</td>
        <td>" . $row['nama_warna'] . "</td>
        <td>" . number_format($row['harga']) . "</td>
        <td>" . number_format($row['harga_dasar']) . "</td>
        <td><button type='button' class='btn btn-sm btn-warning edit' id_barang='" . $row['kode_barang'] . "'>Edit</button>&nbsp;&nbsp;&nbsp;<button type='button' class='btn btn-sm btn-danger delete' id_barang='" . $row['kode_barang'] . "'>Delete</button></td>
        </tr>";
    }
    $tbl .= "</tbody>
    </table>'";
    #print_r($data);
    echo $tbl;
} elseif ($jenis == '8') {
    $sql = query("select * from produk_ where kode_barang = '" . $_POST['kode_barang'] . "'");
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
