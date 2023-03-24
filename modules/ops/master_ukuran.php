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
                                    Input Master Ukuran
                                </h1>
                            </center>
                            <form id="myForm">
                                <hr>

                                <div class="row">
                                    <center>
                                        <div class="col-md-6">
                                            <div class="row mb-3">
                                                <label class="col-sm-3 col-form-label" for="basic-default-name">Kode Ukuran</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="kode_ukuran" placeholder="" />
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label class="col-sm-3 col-form-label" for="basic-default-name">Nama Ukuran</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="ukuran" placeholder="" />
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
                                    Table Master Ukuran
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
        $('#kode_ukuran').val('');
        $('#kode_ukuran').removeAttr("disabled");
        $('#ukuran').val('');
        $('#updatebtn').text("SAVE").attr('id', "formbtn").attr('type', 'submit');
        load_data();
    });

    //insert data
    $(document).on('click', "#formbtn", function(e) {
        e.preventDefault();
        let data = {
            kode_ukuran: $('#kode_ukuran').val(),
            ukuran: $('#ukuran').val(),
        }
        $.ajax({
            url: 'modules/ops/submit_form.php?jenis=1',
            method: "POST",
            data: data,
            success: function(res) {
                alert(res);
                $('#kode_ukuran').val('');
                $('#ukuran').val('');
                load_data();
            }
        })
    });

    //load data
    function load_data() {
        $.ajax({
            url: 'modules/ops/get_data.php?jenis=1',
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
        let kode_ukuran = $(this).attr('id_ukur');
        //alert(kode_ukuran);
        $.ajax({
            url: "modules/ops/get_data.php?jenis=2",
            method: "POST",
            cache: false,
            dataType: "json",
            data: {
                kode_ukuran: kode_ukuran
            },
            success: function(data) {
                $('#kode_ukuran').val(data[0].kode_ukuran);
                $('#kode_ukuran').attr("disabled", true);
                $('#ukuran').val(data[0].ukuran);
                $('#formbtn').text("Update Data").attr('id', "updatebtn").attr('type', '');
            }
        })
    });

    //update data
    $(document).on('click', "#updatebtn", function(e) {
        e.preventDefault();
        let data = {
            kode_ukuran: $('#kode_ukuran').val(),
            ukuran: $('#ukuran').val(),
        }
        //alert(data);
        $.ajax({
            url: 'modules/ops/submit_form.php?jenis=2',
            method: "POST",
            data: data,
            success: function(res) {
                alert(res);
                $('#kode_ukuran').val('');
                $('#kode_ukuran').removeAttr("disabled");
                $('#ukuran').val('');
                $('#updatebtn').text("SAVE").attr('id', "formbtn").attr('type', 'submit');
                load_data();
            }
        })
    });

    //delete data
    $(document).on('click', '.delete', function() {
        let kode_ukuran = $(this).attr('id_ukur');
        if (confirm('Apa anda yakin ingin menghapus kode_ukur ' + kode_ukuran + ' ??')) {
            $.ajax({
                url: 'modules/ops/submit_form.php?jenis=3',
                method: "POST",
                data: {
                    kode_ukuran: kode_ukuran
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