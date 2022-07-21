$(document).ready(function() {
    $("#no_telp").inputmask();

    $("#email").inputmask();

    $("#no_telp_pic").inputmask();

    $("#no_telp_edit").inputmask();

    $("#email_edit").inputmask();

    $("#no_telp_pic_edit").inputmask();

    var table = $('#table_supplier').DataTable({
        processing: true,
        ajax: {
            type: "GET",
            url: "../Backend/get_supplier",
        },
        columnDefs: [{
            searchable: false,
            orderable: false,
            targets: 0,
        }, ],
        order: [
            [1, 'asc']
        ],
        columns: [{
                render: function(data, type, row) {
                    return `<div style="text-align:center;">${row.id_supplier}</div>`;
                },
            }, {
                render: function(data, type, row) {
                    return `<div style="text-align:center;">${row.nama_supplier}</div>`;
                },
            }, {
                render: function(data, type, row) {
                    return `<div style="text-align:center;">${row.alamat}</div>`;
                },
            },
            {
                render: function(data, type, row) {
                    return `<div style="text-align:center;">${row.no_telp_supplier}</div>`;
                },
            },
            {
                render: function(data, type, row) {
                    return `<div style="text-align:center;">${row.email_supplier}</div>`;
                },
            },
            {
                render: function(data, type, row) {
                    return `<div style="text-align:center;">${row.nama_pic_supplier}</div>`;
                },
            },
            {
                render: function(data, type, row) {
                    return `<div style="text-align:center;">${row.no_telp_pic_supplier}</div>`;
                },
            },
            {
                render: function(data, type, row) {
                    var supplier = row.id_supplier;
                    return `<div style="text-align:center;"><button class="btn btn-primary" id="btn_edit" data-id="${supplier}">Edit</button>
                    <button class="btn btn-danger" id="btn_hapus" data-id="${supplier}">Hapus</button></div>`
                },
            }
        ],

    });

    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
    });

    table.on('order.dt search.dt', function() {
        table.column(0, {
            search: 'applied',
            order: 'applied'
        }).nodes().each(function(cell, i) {
            cell.innerHTML = i + 1;
            table.cell(cell).invalidate('dom');
        });
    }).draw();

    $('#save_tambah').click(function() {
        $.ajax({
            url: "../Backend/tambahSupplier",
            type: "GET",
            dataType: "JSON",
            cache: false,
            processData: false,
            data: $('#form_tambah').serialize(),
            beforeSend: function() {
                $("#save_tambah").prop("disabled", true).html('...Loading');
            },
            success: function() {
                $('#tambah').modal('hide');
                Toast.fire({
                    icon: 'success',
                    title: 'Data Supplier Berhasil Di Tambahkan'
                })
                table.ajax.reload();
            },
            complete: function() {
                $("#save_tambah").prop("disabled", false).html("Save");
                $("#form_tambah").trigger("reset");
            }
        })
    })

    $('#table_supplier').on('click', '#btn_edit', function() {
        var id_supplier = $(this).data("id");
        $.ajax({
            type: "GET",
            url: "../Backend/get_edit_supplier",
            dataType: "JSON",
            data: {
                id_supplier: id_supplier
            },
            success: function(value) {
                $("#id_supplier_edit").val(value.data.id_supplier);
                $("#nama_supplier_edit").val(value.data.nama_supplier);
                $('#alamat_edit').val(value.data.alamat);
                $('#no_telp_edit').val(value.data.no_telp_supplier);
                $('#email_edit').val(value.data.email_supplier);
                $('#pic_edit').val(value.data.nama_pic_supplier);
                $('#no_telp_pic_edit').val(value.data.no_telp_pic_supplier);
                $('#edit').modal('show');
            }
        })
    })

    $('#save_edit').click(function() {
        $.ajax({
            type: "GET",
            url: "../Backend/editSupplier",
            data: $('#form_edit').serialize(),
            dataType: "JSON",
            cache: false,
            processData: false,
            beforeSend: function() {
                $("#save_edit").prop("disabled", true).html('...Loading');
            },
            success: function(value) {
                $('#save_edit').removeAttr('disabled');
                $('#edit').modal('hide');
                table.ajax.reload();

                Toast.fire({
                    icon: 'success',
                    title: 'Data Supplier Berhasil Di Update'
                })
            },
            complete: function() {
                $("#save_edit").prop("disabled", false).html("Save Change");
                $("#form_edit").trigger("reset");
            }
        })
    })

    $('#table_supplier').on('click', '#btn_hapus', function() {
        var id_supplier = $(this).data("id");
        $.ajax({
            type: "GET",
            url: "../Backend/get_edit_supplier",
            dataType: "JSON",
            data: {
                id_supplier: id_supplier
            },
            success: function(value) {
                $("#id_supplier_hapus").val(value.data.id_supplier);
                $('#hapus').modal('show');
            }
        })
    })

    $('#save_delete').click(function() {
        $.ajax({
            url: "../Backend/deleteSupplier",
            type: "GET",
            dataType: "JSON",
            data: $('#form_delete').serialize(),
            cache: false,
            processData: false,
            beforeSend: function() {
                $("#save_delete").prop("disabled", true).html('...Loading');
            },
            success: function() {
                $('#save_delete').removeAttr('disabled');
                $('#hapus').modal('hide');
                table.ajax.reload();

                Toast.fire({
                    icon: 'success',
                    title: 'Data Supplier Berhasil Di Hapus'
                })
            },
            complete: function() {
                $("#save_delete").prop("disabled", false).html("Yes, Delete It!");
                $("#form_delete").trigger("reset");
            }
        })
    })

});