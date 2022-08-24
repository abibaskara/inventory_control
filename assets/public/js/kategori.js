$(document).ready(function() {
    var table = $('#table_kategori').DataTable({
        processing: true,
        ajax: {
            type: "GET",
            url: "../Backend/get_kategori",
        },
        columnDefs: [{
            searchable: false,
            orderable: false,
            targets: 0,
        }, ],
        columns: [{
                render: function(data, type, row) {
                    return `<div style="text-align:center;">${row.id_kategori}</div>`;
                },
            }, {
                render: function(data, type, row) {
                    return `<div style="text-align:center;">${row.nama_kategori}</div>`;
                },
            },
            {
                render: function(data, type, row) {
                    var kategori = row.id_kategori;
                    return `<div style="text-align:center;"><button class="btn btn-primary" id="btn_edit" data-id="${kategori}">Edit</button>
                    <button class="btn btn-danger" id="btn_hapus" data-id="${kategori}">Hapus</button></div>`
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

    $('#table_kategori').on('click', '#btn_edit', function() {
        var id_kategori = $(this).data("id");
        $.ajax({
            type: "GET",
            url: "../Backend/get_edit_kategori",
            dataType: "JSON",
            data: {
                id_kategori: id_kategori
            },
            success: function(value) {
                $("#nama_kategori_edit").val(value.data.nama_kategori);
                $("#id_kategori_edit").val(value.data.id_kategori);
                $('#edit').modal('show');
            }
        })
    })

    $('#table_kategori').on('click', '#btn_hapus', function() {
        var id_kategori = $(this).data("id");
        $.ajax({
            type: "GET",
            url: "../Backend/get_edit_kategori",
            dataType: "JSON",
            data: {
                id_kategori: id_kategori
            },
            success: function(value) {
                $("#id_kategori_hapus").val(value.data.id_kategori);
                $('#hapus').modal('show');
            }
        })
    })

    $('#save_edit').click(function() {
        $("#form_edit").validate({
            rules: {
                nama_kategori: {
                    required: true,
                    minlength: 3
                },
            },
            messages: {
                nama_kategori: {
                    required: "Please enter a Nama Kategori Barang",
                    minlength: "Nama Kategori Barang must consist of at least 3 characters"
                },
            },
            errorPlacement: function(error, element) {
                error.addClass( "invalid-feedback" );
        
                if (element.parent('.input-group').length) {
                    error.insertAfter(element.parent());
                }
                else {
                    error.insertAfter(element);
                }
            },
            submitHandler: function () { 
                $.ajax({
                    type: "GET",
                    url: "../Backend/editKategori",
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
                            title: 'Data Berhasil Di Update'
                        })
                    },
                    complete: function() {
                        $("#save_edit").prop("disabled", false).html("Save Change");
                        $("#form_edit").trigger("reset");
                    }
                })
            }
        })
    })

    $('#save_tambah').click(function() {
        $("#form_tambah").validate({
            rules: {
                nama_kategori: {
                    required: true,
                    minlength: 3
                },
            },
            messages: {
                nama_kategori: {
                    required: "Please enter a Nama Kategori Barang",
                    minlength: "Nama Kategori Barang must consist of at least 3 characters"
                },
            },
            errorPlacement: function(error, element) {
                error.addClass( "invalid-feedback" );
        
                if (element.parent('.input-group').length) {
                    error.insertAfter(element.parent());
                }
                else {
                    error.insertAfter(element);
                }
            },
            submitHandler: function () { 
                $.ajax({
                    url: "../Backend/tambahKategori",
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
                            title: 'Data Berhasil Di Tambahkan'
                        })
                        table.ajax.reload();
                    },
                    complete: function() {
                        $("#save_tambah").prop("disabled", false).html("Save");
                        $("#form_tambah").trigger("reset");
                    }
                })
            }
        })
    })

    $('#save_delete').click(function() {
        $.ajax({
            url: "../Backend/deleteKategori",
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
                    title: 'Data Berhasil Di Hapus'
                })
            },
            complete: function() {
                $("#save_delete").prop("disabled", false).html("Yes, Delete It!");
                $("#form_delete").trigger("reset");
            }
        })
    })
});