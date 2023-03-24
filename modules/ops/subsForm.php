<?php
$nama = $_SESSION['userName'];
?>
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-fluid flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4" style="padding-top: 3px !important;padding-bottom: 3px !important;"><center>Form Registration</center></h4>
        <!-- Basic Layout & Basic with Icons -->
        <div class="row">
            <!-- Basic Layout -->
            <div class="col-xxl">
                <div class="card mb-4">
                    <div class="card-body">
                        <form>
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label" for="basic-default-name">Nama Pasien</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="basic-default-name" placeholder="" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label" for="basic-default-company">NIK</label>
                                <div class="col-sm-9">
                                    <input
                                        type="text"
                                        class="form-control"
                                        placeholder=""
                                    />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label" for="basic-default-email">Usia</label>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-merge">
                                        <input
                                            type="text"
                                            class="form-control"
                                            placeholder=""
                                        />
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label" for="basic-default-phone">No HP</label>
                                <div class="col-sm-9">
                                    <input
                                        type="text"
                                        id="basic-default-phone"
                                        class="form-control phone-mask"
                                        placeholder=""
                                        aria-describedby="basic-default-phone"
                                    />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label" for="basic-default-phone">Alamat</label>
                                <div class="col-sm-9">
                                    <input
                                            type="text"
                                            id="basic-default-phone"
                                            class="form-control phone-mask"
                                            placeholder=""
                                            aria-describedby="basic-default-phone"
                                    />
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Basic with Icons -->


            <div class="col-xxl">
                <div class="card mb-4">
                    <!--div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="mb-0">Basic with Icons</h5>
                        <small class="text-muted float-end">Merged input group</small>
                    </div-->
                    <div class="card-body">
                        <form>
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label" for="basic-icon-default-fullname">Disubmit Oleh</label>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-merge">
                                        <input
                                                type="text"
                                                class="form-control"
                                                id="basic-icon-default-fullname"
                                                placeholder=""
                                                aria-describedby="basic-icon-default-fullname2"
                                        />
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label" for="basic-icon-default-fullname">Dept. / Div.</label>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-merge">
                                        <input
                                                type="text"
                                                class="form-control"
                                                id="basic-icon-default-fullname"
                                                placeholder=""
                                        />
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label" for="basic-icon-default-fullname">Tgl Submit</label>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-merge">
                                        <input
                                                type="text"
                                                class="form-control"
                                                id="basic-icon-default-fullname"
                                                placeholder=""
                                        />
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label" for="basic-icon-default-fullname">Tgl Jatuh Tempo</label>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-merge">
                                        <input class="form-control" type="date" value="" id="html5-date-input" />
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label" for="basic-icon-default-fullname">Tgl Cancel</label>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-merge">
                                        <input
                                                type="text"
                                                class="form-control"
                                                id="basic-icon-default-fullname"
                                                placeholder=""
                                        />
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="col-xxl">
                    <div class="card md-12">
                        <div class="card-body">
                            <form>
                                <hr>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row mb-3">
                                            <label class="col-sm-3 col-form-label" for="basic-icon-default-fullname">Keterangan Pembayaran</label>
                                            <div class="col-sm-9">
                                                <div class="input-group input-group-merge">
                                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="2"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-sm-3 col-form-label" for="basic-icon-default-fullname">Catatan</label>
                                            <div class="col-sm-9">
                                                <div class="input-group input-group-merge">
                                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="2"></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label class="col-sm-3 col-form-label" for="basic-icon-default-fullname">File 1</label>
                                            <div class="col-sm-9">
                                                <div class="input-group input-group-merge">
                                                    <input
                                                            type="file"
                                                            class="form-control"
                                                            id="basic-icon-default-fullname"
                                                            placeholder=""
                                                    />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-sm-3 col-form-label" for="basic-icon-default-fullname">File 2</label>
                                            <div class="col-sm-9">
                                                <div class="input-group input-group-merge">
                                                    <input
                                                            type="file"
                                                            class="form-control"
                                                            id="basic-icon-default-fullname"
                                                            placeholder=""
                                                    />
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-md-6">
                                        <div class="row mb-3">
                                            <label class="col-sm-3 col-form-label" for="basic-icon-default-fullname">Amount1</label>
                                            <div class="col-sm-9">
                                                <div class="input-group input-group-merge">
                                                    <input
                                                            type="text"
                                                            class="form-control"
                                                            id="basic-icon-default-fullname"
                                                            placeholder=""
                                                    />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-sm-3 col-form-label" for="basic-icon-default-fullname">Amount2</label>
                                            <div class="col-sm-9">
                                                <div class="input-group input-group-merge">
                                                    <input
                                                            type="text"
                                                            class="form-control"
                                                            id="basic-icon-default-fullname"
                                                            placeholder=""
                                                    />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-sm-3 col-form-label" for="basic-icon-default-fullname">Amount3</label>
                                            <div class="col-sm-9">
                                                <div class="input-group input-group-merge">
                                                    <input
                                                            type="text"
                                                            class="form-control"
                                                            id="basic-icon-default-fullname"
                                                            placeholder=""
                                                    />
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row mb-3">
                                            <label class="col-sm-3 col-form-label" for="basic-icon-default-fullname">Total</label>
                                            <div class="col-sm-9">
                                                <div class="input-group input-group-merge">
                                                    <input
                                                            type="text"
                                                            class="form-control"
                                                            id="basic-icon-default-fullname"
                                                            placeholder=""
                                                    />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <center><button type="button" class="btn btn-primary">Submit</button></center>

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