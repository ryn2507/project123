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
                                <center><button type="button" id="submit" class="btn btn-primary">Submit</button></center>
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
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Kode Ukuran</th>
                                            <th>Nama Ukuran</th>
                                        </tr>
                                    </thead>
                                    <tbody id="getData">
                                    </tbody>
                                </table>
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
        $.ajax({
            url: "modules/ops/get_data.php?jenis=1",
            type: 'GET',
            dataType: 'json',
            success: function(result) {
                console.log(result);
                for (var i = 0; i < result.length; i++)
                    $("#getData").append('<tr><td>' + result[i].kode_ukuran + '</td><td>' + result[i].ukuran + '</td></tr>');
            }
        });

        $('#submit').click(function() {
            var val1 = $("#kode_ukuran").val();
            var val2 = $("#ukuran").val();
            $.ajax({
                url: 'modules/ops/submit_form.php?jenis=1',
                type: 'POST',
                data: {
                    kode_ukuran: val1,
                    ukuran: val2
                },
                success: function(result) {
                    alert(result);
                    $("#myForm")[0].reset();
                    $("#formB").reload();
                }

            });
        });
    });
</script>