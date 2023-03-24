<?php
include "../../include/function.php";
$jenis = $_GET['jenis'];

if ($jenis == '1') {
    $sql = query("select * from vending_produk");
    foreach ($sql as $row) {
        $data[] = array(
            "id_vending" => $row['id'],
            "nama_vending" => $row['nama'],
            "harga_vending" => $row['harga']
        );
    }
    #print_r($data);
    echo json_encode($data);
} elseif ($jenis == '2') {
    //$_POST['kode_ukuran'] = '10001';
    $sql = query("select * from vending_produk where id='" . $_GET['id'] . "'");
    #echo $sql;
    #print_r($row);
    foreach ($sql as $row) {
        $data[] = array(
            "harga" => $row['harga']
        );
    }
    #print_r($data);
    echo json_encode($data);
} elseif ($jenis == '3') {
    $sql = query("select * from vending_pecahan order by id asc");
    foreach ($sql as $row) {
        $data[] = array(
            "id_pecahan" => $row['id'],
            "pecahan" => $row['pecahan']
        );
    }
    #print_r($data);
    echo json_encode($data);
} elseif ($jenis == '4') {
    $post1 = $_POST['bayar'];
    #$post1 = 20;
    $post2 = $_POST['harga'];
    #$post2 = 1;
    $hasil = $post1 - $post2;
    $sql = query("select * from vending_pecahan order by id desc");
    $total = count($sql);

    foreach ($sql as $row) {
        for ($i = 0; $i < $total; $i++) {
            if ($row['pecahan'] <= $hasil) {
                $hasil = $hasil - $row['pecahan'];
                echo "Pecahan Rp " . $row['pecahan'] . " = " . count([$row['pecahan']]) . " Lembar \n";
            }
        }
    }
}














//elseif ($jenis == '4') {
    #$post1 = $_POST['bayar'];
    #$post1 = 20;
    #$post2 = $_POST['harga'];
    #$post2 = 1;
    #$hasil = $post1 - $post2;
    #$sql = query("select * from vending_pecahan order by id desc");
    #$total = count($sql);

    #foreach ($sql as $row) {
    #    for ($i = 0; $i < $total; $i++) {
    #        if ($row['pecahan'] <= $hasil) {
    #            $hasil = $hasil - $row['pecahan'];
    #            $data[] = array(
    #                "Pecahan " . $row['pecahan']
    #            );
    #        }
    #    }
    #}
    #$data1 = array_count_values(array_column($data, 0));
    #$tot = array_count_values($data);
    #echo "<pre>";
    #print_r($data);
    #echo "<br>";
    #$data1[] = array_count_values(array_column($data, 0));
    #print_r($data1);
    #echo "<br>";
    #echo $data1[0]['Pecahan 1'];
    #print_r($data1);
    #echo "<pre>";
    #echo json_encode($data);
#}
