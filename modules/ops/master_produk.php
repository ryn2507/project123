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
                                    Input Master Produk
                                </h1>
                            </center>
                            <form id="myForm">
                                <hr>

                                <div class="row">
                                    <center>
                                        <div class="col-md-6">
                                            <div class="row mb-3">
                                                <label class="col-sm-3 col-form-label" for="basic-default-name">Kode Barang</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="kode_barang" placeholder="" />
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label class="col-sm-3 col-form-label" for="basic-default-name">Nama Barang</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="nama_barang" placeholder="" />
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label class="col-sm-3 col-form-label" for="basic-default-name">Kode Ukuran</label>
                                                <div class="col-sm-9">
                                                    <select class="form-control" name="kode_ukuran" id="kode_ukuran">
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label class="col-sm-3 col-form-label" for="basic-default-name">Kode Warna</label>
                                                <div class="col-sm-9">
                                                    <select class="form-control" name="kode_warna" id="kode_warna">
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label class="col-sm-3 col-form-label" for="basic-default-name">Harga</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="harga" placeholder="" pattern="^\d+(\.|\,)\d{2}$" data-type="currency" />
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label class="col-sm-3 col-form-label" for="basic-default-name">Harga Dasar</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="harga_dasar" placeholder="" pattern="^\d+(\.|\,)\d{2}$" data-type="currency" />
                                                </div>
                                            </div>
                                        </div>
                                    </center>
                                </div>
                                <center><button type="button" id="formbtn" class="btn btn-primary">SAVE</button></center>
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
            <div class="col-sm-10 offset-sm-1">
                <div class="col-xxl">
                    <div class="card md-12">
                        <div class="card-body">
                            <center>
                                <h1>
                                    Table Master Produk
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
    $(document).ready(function() {
        $("#kode_ukuran").append('<option value="">-- Kode Ukuran --</option>');
        url = "modules/ops/get_data.php?jenis=5";
        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'json',
            success: function(result) {
                for (var i = 0; i < result.length; i++)
                    $("#kode_ukuran").append('<option value="' + result[i].kode_ukuran + '">' + result[i].kode_ukuran + ' || ' + result[i].ukuran + '</option>');
            }
        });
    });
    $(document).ready(function() {
        $("#kode_warna").append('<option value="">-- Kode Warna --</option>');
        url = "modules/ops/get_data.php?jenis=6";
        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'json',
            success: function(result) {
                for (var i = 0; i < result.length; i++)
                    $("#kode_warna").append('<option value="' + result[i].kode_warna + '">' + result[i].kode_warna + ' || ' + result[i].nama_warna + '</option>');
            }
        });
    });

    $(document).on('click', ".insert", function(e) {
        e.preventDefault();
        $('#kode_barang').val('');
        $('#kode_barang').removeAttr("disabled");
        $('#nama_barang').val('');
        $('#kode_ukuran').val('');
        $('#kode_warna').val('');
        $('#harga').val('');
        $('#harga_dasar').val('');
        $('#updatebtn').text("SAVE").attr('id', "formbtn").attr('type', 'submit');
        load_data();
    });

    $(document).on('click', "#formbtn", function(e) {
        e.preventDefault();
        let data = {
            kode_barang: $('#kode_barang').val(),
            nama_barang: $('#nama_barang').val(),
            kode_ukuran: $('#kode_ukuran').val(),
            kode_warna: $('#kode_warna').val(),
            harga: $('#harga').val(),
            harga_dasar: $('#harga_dasar').val()
        }
        $.ajax({
            url: 'modules/ops/submit_form.php?jenis=7',
            method: "POST",
            data: data,
            success: function(res) {
                alert(res);
                $('#kode_barang').val('');
                $('#nama_barang').val('');
                $('#kode_ukuran').val('');
                $('#kode_warna').val('');
                $('#harga').val('');
                $('#harga_dasar').val('');
                load_data();
            }
        })
    });

    //load data
    function load_data() {
        $.ajax({
            url: 'modules/ops/get_data.php?jenis=7',
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
        let kode_barang = $(this).attr('id_barang');
        //alert(kode_ukuran);
        $.ajax({
            url: "modules/ops/get_data.php?jenis=8",
            method: "POST",
            cache: false,
            dataType: "json",
            data: {
                kode_barang: kode_barang
            },
            success: function(data) {
                $('#kode_barang').val(data[0].kode_barang);
                $('#kode_barang').attr("disabled", true);
                $('#nama_barang').val(data[0].nama_barang);
                $('#kode_ukuran').val(data[0].kode_ukuran);
                $('#kode_warna').val(data[0].kode_warna);
                $('#harga').val(data[0].harga);
                $('#harga_dasar').val(data[0].harga_dasar);
                $('#formbtn').text("Update Data").attr('id', "updatebtn").attr('type', '');
            }
        })
    });

    //update data
    $(document).on('click', "#updatebtn", function(e) {
        e.preventDefault();
        let data = {
            kode_barang: $('#kode_barang').val(),
            nama_barang: $('#nama_barang').val(),
            kode_ukuran: $('#kode_ukuran').val(),
            kode_warna: $('#kode_warna').val(),
            harga: $('#harga').val(),
            harga_dasar: $('#harga_dasar').val(),
        }
        //alert(data);
        $.ajax({
            url: 'modules/ops/submit_form.php?jenis=8',
            method: "POST",
            data: data,
            success: function(res) {
                alert(res);
                $('#kode_barang').val('');
                $('#kode_barang').removeAttr("disabled");
                $('#nama_barang').val('');
                $('#kode_ukuran').val('');
                $('#kode_warna').val('');
                $('#harga').val('');
                $('#harga_dasar').val('');
                $('#updatebtn').text("SAVE").attr('id', "formbtn").attr('type', 'submit');
                load_data();
            }
        })
    });

    //delete data
    $(document).on('click', '.delete', function() {
        let kode_barang = $(this).attr('id_barang');
        if (confirm('Apa anda yakin ingin menghapus kode_ukur ' + kode_barang + ' ??')) {
            $.ajax({
                url: 'modules/ops/submit_form.php?jenis=9',
                method: "POST",
                data: {
                    kode_barang: kode_barang
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

<script>
    // Jquery Dependency

    $("input[data-type='currency']").on({
        keyup: function() {
            formatCurrency($(this));
        },
        blur: function() {
            formatCurrency($(this), "blur");
        }
    });


    function formatNumber(n) {
        // format number 1000000 to 1,234,567
        return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",")
    }


    function formatCurrency(input, blur) {
        // appends $ to value, validates decimal side
        // and puts cursor back in right position.

        // get input value
        var input_val = input.val();

        // don't validate empty input
        if (input_val === "") {
            return;
        }

        // original length
        var original_len = input_val.length;

        // initial caret position
        var caret_pos = input.prop("selectionStart");

        // check for decimal
        if (input_val.indexOf(".") >= 0) {

            // get position of first decimal
            // this prevents multiple decimals from
            // being entered
            var decimal_pos = input_val.indexOf(".");

            // split number by decimal point
            var left_side = input_val.substring(0, decimal_pos);
            var right_side = input_val.substring(decimal_pos);

            // add commas to left side of number
            left_side = formatNumber(left_side);

            // validate right side
            right_side = formatNumber(right_side);

            // On blur make sure 2 numbers after decimal
            if (blur === "blur") {
                right_side += "";
            }

            // Limit decimal to only 2 digits
            // right_side = right_side.substring(0, 2);

            // join number by .
            input_val = "" + left_side;

        } else {
            // no decimal entered
            // add commas to number
            // remove all non-digits
            input_val = formatNumber(input_val);
            input_val = "" + input_val;

            // final formatting
            if (blur === "blur") {
                input_val += "";
            }
        }

        // send updated string to input
        input.val(input_val);

        // put caret back in the right position
        var updated_len = input_val.length;
        caret_pos = updated_len - original_len + caret_pos;
        input[0].setSelectionRange(caret_pos, caret_pos);
    }
</script>