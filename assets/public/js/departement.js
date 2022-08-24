$(document).ready(function() {
    var table = $('#table_departement').DataTable({
        processing: true,
        ajax: {
            type: "GET",
            url: "../Backend/get_departement",
        },
        columnDefs: [{
            searchable: false,
            orderable: false,
            targets: 0,
        }, ],
        columns: [{
                render: function(data, type, row) {
                    return `<div style="text-align:center;">${row.id_departement}</div>`;
                },
            }, {
                render: function(data, type, row) {
                    return `<div style="text-align:center;">${row.nama_departement}</div>`;
                },
            },
            {
                render: function(data, type, row) {
                    var departement = row.id_departement;
                    return `<div style="text-align:center;"><button class="btn btn-primary" id="btn_edit" data-id="${departement}">Edit</button>
                    <button class="btn btn-danger" id="btn_hapus" data-id="${departement}">Hapus</button></div>`
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

    $('#table_departement').on('click', '#btn_edit', function() {
        var id_departement = $(this).data("id");
        $.ajax({
            type: "GET",
            url: "../Backend/get_edit_departement",
            dataType: "JSON",
            data: {
                id_departement: id_departement
            },
            success: function(value) {
                $("#nama_departement").val(value.data.nama_departement);
                $("#id_departement").val(value.data.id_departement);
                $('#edit').modal('show');
            }
        })
    })

    $('#table_departement').on('click', '#btn_hapus', function() {
        var id_departement = $(this).data("id");
        $.ajax({
            type: "GET",
            url: "../Backend/get_edit_departement",
            dataType: "JSON",
            data: {
                id_departement: id_departement
            },
            success: function(value) {
                $("#id_departement_hapus").val(value.data.id_departement);
                $('#hapus').modal('show');
            }
        })
    })

    $('#save_edit').click(function() {
        $("#form_edit").validate({
            rules: {
                nama_departement: {
                    required: true,
                    minlength: 3
                }
            },
            messages: {
                nama_departement: {
                    required: "Please enter a Nama Departement",
                    minlength: "Nama Departement must consist of at least 3 characters"
                }
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
                    url: "../Backend/editDepartement",
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
                nama_departement: {
                    required: true,
                    minlength: 3
                }
            },
            messages: {
                nama_departement: {
                    required: "Please enter a Nama Departement",
                    minlength: "Nama Departement must consist of at least 3 characters"
                }
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
                    url: "../Backend/tambahDepartement",
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
            url: "../Backend/deleteDepartement",
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