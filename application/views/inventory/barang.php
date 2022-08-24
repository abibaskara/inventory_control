<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url() ?>Inventory">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Data Barang</li>
    </ol>
</nav>

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Data Barang</h6>
                <button type="button" class="btn btn-primary" id="btn_tambah"><i data-feather="plus"></i> Tambah Data</button>

                <div class="table-responsive" style="margin-top: 10px;">
                    <table id="table_barang" style="width: 100%;" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th style="text-align: center;">Nama Barang</th>
                                <th style="text-align: center;">Satuan</th>
                                <th style="text-align: center;">Berat Barang</th>
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

<div class="modal fade" id="tambah" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Barang</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
            </div>
            <form action="" id="form_tambah">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Kategori Barang</label>
                        <select class="form-select" id="select2kategori" name="id_kategori" data-width="100%" required>
                        </select>
                    </div>
                    <div class="form-group" style="text-align: 10px;">
                        <label for="">Supplier</label>
                        <select class="form-select" id="select2supplier" name="id_supplier" data-width="100%" required>
                        </select>
                    </div>
                    <div class="form-group" style="text-align: 10px;">
                        <label for="">Nama Barang</label>
                        <input type="text" name="nama_barang" id="nama_barang" class="form-control" required>
                    </div>
                    <div class="form-group" style="text-align: 10px;">
                        <label for="">Satuan</label>
                        <select class="form-select" id="select2satuan" name="satuan" data-width="100%" required>
                            <option value=""></option>
                            <option value="Pcs">Pcs</option>
                            <option value="Box">Box</option>
                            <option value="Kg">Kg</option>
                            <option value="Ball">Ball</option>
                            <option value="Karung">Karung</option>
                            <option value="Liter">Liter</option>
                            <option value="Kaleng">Kaleng</option>
                            <option value="Palet">Palet</option>
                            <option value="Ikat">Ikat</option>
                        </select>
                    </div>
                    <div class="form-group" style="text-align: 10px;">
                        <label for="">Berat Barang</label>
                        <div class="input-group">
                            <input type="number" name="berat_barang" id="berat_barang" class="form-control" required>
                            <select class="form-select input-group-text input-group-addon" id="select2satuanberat" name="satuanberat" data-width="20%" required>
                                <option value="Gr">Gr</option>
                                <option value="Kg">Kg</option>
                                <option value="Ton">Ton</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group" style="text-align: 10px;">
                        <label for="">Keterangan</label>
                        <textarea name="keterangan" id="keterangan" class="form-control" required></textarea>
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

<div class="modal fade" id="edit" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data Barang</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
            </div>
            <form action="" id="form_edit">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Kategori Barang</label>
                        <input type="hidden" id="id_barang_edit" name="id">
                        <select class="form-select" id="select2kategori_edit" name="id_kategori" data-width="100%" required>
                        </select>
                    </div>
                    <div class="form-group" style="text-align: 10px;">
                        <label for="">Supplier</label>
                        <select class="form-select" id="select2supplier_edit" name="id_supplier" data-width="100%" required>
                        </select>
                    </div>
                    <div class="form-group" style="text-align: 10px;">
                        <label for="">Nama Barang</label>
                        <input type="text" name="nama_barang" id="nama_barang_edit" class="form-control" required>
                    </div>
                    <div class="form-group" style="text-align: 10px;">
                        <label for="">Satuan</label>
                        <select class="form-select" id="select2satuan_edit" name="satuan" data-width="100%" required>

                        </select>
                    </div>
                    <div class="form-group" style="text-align: 10px;">
                        <label for="">Berat Barang</label>
                        <div class="input-group">
                            <input type="number" name="berat_barang" id="berat_barang_edit" class="form-control" required>
                            <select class="form-select input-group-text input-group-addon" id="select2satuanberat_edit" name="satuanberat" data-width="20%" required>
                            </select>
                        </div>
                    </div>
                    <div class="form-group" style="text-align: 10px;">
                        <label for="">Keterangan</label>
                        <textarea name="keterangan" id="keterangan_edit" class="form-control" required></textarea>
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
                    <input type="hidden" name="id" id="id_barang_hapus">
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

<script src="<?= base_url() ?>assets/vendors/jquery-validation/jquery.validate.min.js"></script>
<script src="<?= base_url() ?>assets/vendors/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>
<script src="<?= base_url() ?>assets/vendors/inputmask/jquery.inputmask.min.js"></script>
<script src="<?= base_url() ?>assets/vendors/select2/select2.min.js"></script>
<script src="<?= base_url() ?>assets/vendors/typeahead.js/typeahead.bundle.min.js"></script>
<script src="<?= base_url() ?>assets/vendors/jquery-tags-input/jquery.tagsinput.min.js"></script>
<script src="<?= base_url() ?>assets/vendors/dropzone/dropzone.min.js"></script>
<script src="<?= base_url() ?>assets/vendors/dropify/dist/dropify.min.js"></script>
<script src="<?= base_url() ?>assets/vendors/bootstrap-colorpicker/bootstrap-colorpicker.min.js"></script>
<script src="<?= base_url() ?>assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
<script src="<?= base_url() ?>assets/vendors/moment/moment.min.js"></script>
<script src="<?= base_url() ?>assets/vendors/tempusdominus-bootstrap-4/tempusdominus-bootstrap-4.js"></script>
<!-- End plugin js for this page -->

<!-- inject:js -->
<script src="<?= base_url() ?>assets/vendors/feather-icons/feather.min.js"></script>
<script src="<?= base_url() ?>assets/js/template.js"></script>
<!-- endinject -->

<!-- Custom js for this page -->
<script src="<?= base_url() ?>assets/js/data-table.js"></script>
<script src="<?= base_url() ?>assets/public/js/barang.js"></script>
<!-- End custom js for this page -->