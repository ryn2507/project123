<?php
$nama = $_SESSION['userName'];
?>
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-fluid flex-grow-1 container-p-y">
        <!--h4 class="fw-bold py-3 mb-4" style="padding-top: 3px !important;padding-bottom: 3px !important;">
            <center>Form Registration</center>
        </h4>
        <Basic Layout & Basic with Icons -->
        <div class="row">
            <div class="col-md-12">
                <div class="col-xxl">
                    <div class="card md-12">
                        <div class="card-body">
                            <center>
                                <h1>
                                    Input Master Warna
                                </h1>
                            </center>
                            <form id="myForm">
                                <hr>

                                <div class="row">
                                    <center>
                                        <div class="col-md-6">
                                            <div class="row mb-3">
                                                <label class="col-sm-3 col-form-label" for="basic-default-name">Kode Warna</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="kode_warna" placeholder="" />
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label class="col-sm-3 col-form-label" for="basic-default-name">Nama Warna</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="nama_warna" placeholder="" />
                                                </div>
                                            </div>
                                        </div>
                                    </center>
                                </div>
                                <center><button type="submit" id="formbtn" class="btn btn-primary">SAVE</button></center>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <br>
        <hr>
        <br>

        <div class="row">
            <div class="col-sm-6 offset-sm-3">
                <div class="col-xxl">
                    <div class="card md-12">
                        <div class="card-body">
                            <center>
                                <h1>
                                    Table Master Warna
                                </h1>
                            </center>

                            <div class="table-responsive text-nowrap">
                                <div id="table"></div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- / Content -->

    <div class="content-backdrop fade"></div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script>
    $(document).on('click', ".insert", function(e) {
        e.preventDefault();
        $('#kode_warna').val('');
        $('#kode_warna').removeAttr("disabled");
        $('#nama_warna').val('');
        $('#updatebtn').text("SAVE").attr('id', "formbtn").attr('type', 'submit');
        load_data();
    });

    $(document).on('click', "#formbtn", function(e) {
        e.preventDefault();
        let data = {
            kode_warna: $('#kode_warna').val(),
            nama_warna: $('#nama_warna').val(),
        }
        $.ajax({
            url: 'modules/ops/submit_form.php?jenis=4',
            method: "POST",
            data: data,
            success: function(res) {
                alert(res);
                $('#kode_warna').val('');
                $('#nama_warna').val('');
                load_data();
            }
        })
    });

    //load data
    function load_data() {
        $.ajax({
            url: 'modules/ops/get_data.php?jenis=3',
            method: "GET",
            success: function(res, status) {
                if (status == "success") {
                    $("#table").html(res);
                }
            }
        });
    }
    load_data();

    //edit data
    $(document).on('click', '.edit', function() {
        let kode_warna = $(this).attr('id_warna');
        //alert(kode_ukuran);
        $.ajax({
            url: "modules/ops/get_data.php?jenis=4",
            method: "POST",
            cache: false,
            dataType: "json",
            data: {
                kode_warna: kode_warna
            },
            success: function(data) {
                $('#kode_warna').val(data[0].kode_warna);
                $('#kode_warna').attr("disabled", true);
                $('#nama_warna').val(data[0].nama_warna);
                $('#formbtn').text("Update Data").attr('id', "updatebtn").attr('type', '');
            }
        })
    });

    //update data
    $(document).on('click', "#updatebtn", function(e) {
        e.preventDefault();
        let data = {
            kode_warna: $('#kode_warna').val(),
            nama_warna: $('#nama_warna').val(),
        }
        //alert(data);
        $.ajax({
            url: 'modules/ops/submit_form.php?jenis=5',
            method: "POST",
            data: data,
            success: function(res) {
                alert(res);
                $('#kode_warna').val('');
                $('#kode_warna').removeAttr("disabled");
                $('#nama_warna').val('');
                $('#updatebtn').text("SAVE").attr('id', "formbtn").attr('type', 'submit');
                load_data();
            }
        })
    });

    //delete data
    $(document).on('click', '.delete', function() {
        let kode_warna = $(this).attr('id_warna');
        if (confirm('Apa anda yakin ingin menghapus kode_ukur ' + kode_warna + ' ??')) {
            $.ajax({
                url: 'modules/ops/submit_form.php?jenis=6',
                method: "POST",
                data: {
                    kode_warna: kode_warna
                },
                success: function(res, status) {
                    if (status == 'success') {
                        alert(res);
                        load_data();
                    }
                }
            })
        } else {
            alert('Data Tidak jadi dihapus');
        }
    });
</script>