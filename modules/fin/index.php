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
                                    Vending Machine
                                </h1>
                            </center>
                            <form id="myForm">
                                <hr>

                                <div class="row">
                                    <center>
                                        <div class="col-md-6">
                                            <div class="row mb-3">
                                                <label class="col-sm-3 col-form-label" for="basic-default-name">Nama Minuman</label>
                                                <div class="col-sm-9">
                                                    <select class="form-control" name="nama_minuman" id="nama_minuman">
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label class="col-sm-3 col-form-label" for="basic-default-name">Harga</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="harga" class="form-control" id="harga" disabled />
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label class="col-sm-3 col-form-label" for="basic-default-name">Uang Bayar</label>
                                                <div class="col-sm-9">
                                                    <select class="form-control" name="uang_bayar" id="uang_bayar">
                                                    </select>
                                                </div>
                                            </div>
                                            <div id="kembalian">

                                            </div>
                                        </div>
                                    </center>
                                </div>
                                <center><button type="button" id="submit" name="submit" class="btn btn-primary" disabled>Submit</button></center>
                            </form>
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
<script type="text/javascript" src="modules/fin/fileJs.js"></script>