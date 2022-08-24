<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url() ?>Inventory">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Data Departement</li>
    </ol>
</nav>

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Data Departement</h6>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambah"><i data-feather="plus"></i> Tambah Data</button>

                <div class="table-responsive" style="margin-top: 10px;">
                    <table id="table_departement" style="width: 100%;" class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th style="text-align: center;">Nama Departement</th>
                                <th style="text-align: center;">Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->

<div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Departement</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
            </div>
            <form action="" id="form_tambah">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Nama Departement</label>
                        <input type="text" name="nama_departement" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" id="save_tambah" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
            </div>
            <form action="" id="form_edit">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Nama Departement</label>
                        <input type="hidden" name="id" id="id_departement">
                        <input type="text" name="nama_departement" id="nama_departement" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" id="save_edit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="hapus" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
            </div>
            <form action="" id="form_delete">
                <div class="modal-body">
                    <h5><i data-feather="trash-2" style="color:red"></i> Anda Yakin Untuk Menghapus Data?</h5>
                    <input type="hidden" name="id" id="id_departement_hapus">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No!</button>
                    <button type="button" id="save_delete" class="btn btn-primary">Yes, Delete It!</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- core:js -->
<script src="<?= base_url() ?>assets/vendors/core/core.js"></script>
<!-- endinject -->

<!-- Plugin js for this page -->
<script src="<?= base_url() ?>assets/vendors/datatables.net/jquery.dataTables.js"></script>
<script src="<?= base_url() ?>assets/vendors/datatables.net-bs5/dataTables.bootstrap5.js"></script>
<script src="<?= base_url() ?>assets/vendors/sweetalert2/sweetalert2.min.js"></script>
<!-- End plugin js for this page -->

<!-- inject:js -->
<script src="<?= base_url() ?>assets/vendors/feather-icons/feather.min.js"></script>
<script src="<?= base_url() ?>assets/js/template.js"></script>
<!-- endinject -->

<!-- Custom js for this page -->
<script src="<?= base_url() ?>assets/js/data-table.js"></script>

<script src="<?= base_url() ?>assets/vendors/jquery-validation/jquery.validate.min.js"></script>
<!-- End custom js for this page -->
<script src="<?= base_url() ?>assets/public/js/departement.js"></script>