$(document).ready(function() {
    var table = $('#table_barang').DataTable({
        processing: true,
        ajax: {
            type: "GET",
            url: "../Backend/get_barang",
        },
        columnDefs: [{
            searchable: false,
            orderable: false,
            targets: 0,
        }, ],
        columns: [{
            render: function(data, type, row) {
                return `<div style="text-align:center;">${row.id_barang}</div>`;
            },
        }, {
            render: function(data, type, row) {
                return `<div style="text-align:center;">${row.nama_barang}</div>`;
            },
        }, {
            render: function(data, type, row) {
                return `<div style="text-align:center;">${row.satuan}</div>`;
            },
        }, {
            render: function(data, type, row) {
                return `<div style="text-align:center;">${row.berat_barang}</div>`;
            },
        }, {
            render: function(data, type, row) {
                var barang = row.id_barang;
                return `<div style="text-align:center;">
                    <a href="../Inventory/Detail_Barang/${barang}"><button class="btn btn-secondary">Detail</button></a>
                    <button class="btn btn-primary" id="btn_edit" data-id="${barang}">Edit</button>
                    <button class="btn btn-danger" id="btn_hapus" data-id="${barang}">Hapus</button>
                    </div>`
            },
        }],

    });

    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
    });

    $('#btn_tambah').click(function() {
        $('#tambah').modal('show');
        select2kategori();

        select2supplier();

        select2satuan();

        select2satuanberat();
    })

    table.on('order.dt search.dt', function() {
        table.column(0, {
            search: 'applied',
            order: 'applied'
        }).nodes().each(function(cell, i) {
            cell.innerHTML = i + 1;
            table.cell(cell).invalidate('dom');
        });
    }).draw();

    $('#table_barang').on('click', '#btn_edit', function() {
        var id_barang = $(this).data("id");
        $.ajax({
            type: "GET",
            url: "../Backend/get_edit_barang",
            dataType: "JSON",
            data: {
                id_barang: id_barang
            },
            success: function(value) {
                var convert = value.data.berat_barang.split(" ")
                var berat = convert[0]
                var satuan_berat = convert[1]

                $("#id_barang_edit").val(value.data.id_barang);
                $("#nama_barang_edit").val(value.data.nama_barang);
                $("#berat_barang_edit").val(berat);
                $("#keterangan_edit").val(value.data.keterangan);
                select2kategori_edit(value.data.id_kategori);

                select2supplier_edit(value.data.id_supplier);

                select2satuan_edit(value.data.satuan);

                select2satuanberat_edit(satuan_berat);

                $('#edit').modal('show');
            }
        })
    })

    $('#table_barang').on('click', '#btn_hapus', function() {
        var id_barang = $(this).data("id");
        $.ajax({
            type: "GET",
            url: "../Backend/get_edit_barang",
            dataType: "JSON",
            data: {
                id_barang: id_barang
            },
            success: function(value) {
                $("#id_barang_hapus").val(value.data.id_barang);
                $('#hapus').modal('show');
            }
        })
    })

    $('#save_edit').click(function() {
        $("#form_edit").validate({
            rules: {
                id_kategori: {
                    required: true,
                },
                id_supplier: {
                    required: true,
                },
                nama_barang: {
                    required: true,
                },
                satuan: {
                    required: true,
                },
                berat_barang: {
                    required: true,
                },
                keterangan: {
                    required: true,
                }
            },
            messages: {
                id_kategori: {
                    required: "Please select a Kategori Barang",
                },
                id_supplier: {
                    required: "Please select a Supplier"
                },
                nama_barang: {
                    required: "Please enter a Nama Barang"
                },
                satuan: {
                    required: "Please select a Satuan"
                },
                berat_barang: {
                    required: "Please enter a Berat Barang"
                },
                keterangan: {
                    required: "Please enter a Keterangan"
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
                    url: "../Backend/editBarang",
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
                id_kategori: {
                    required: true,
                },
                id_supplier: {
                    required: true,
                },
                nama_barang: {
                    required: true,
                },
                satuan: {
                    required: true,
                },
                berat_barang: {
                    required: true,
                },
                keterangan: {
                    required: true,
                }
            },
            messages: {
                id_kategori: {
                    required: "Please select a Kategori Barang",
                },
                id_supplier: {
                    required: "Please select a Supplier"
                },
                nama_barang: {
                    required: "Please enter a Nama Barang"
                },
                satuan: {
                    required: "Please select a Satuan"
                },
                berat_barang: {
                    required: "Please enter a Berat Barang"
                },
                keterangan: {
                    required: "Please enter a Keterangan"
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
                    url: "../Backend/tambahBarang",
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
                            title: 'Data Barang Berhasil Di Tambahkan'
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
            url: "../Backend/deleteBarang",
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

function select2kategori() {
    $("#select2kategori").select2({
        allowClear: true,
        placeholder: "Select a Kategori",
        dropdownParent: $('#tambah .modal-content')
    });
    show_kategori()
}

function show_kategori() {
    $.ajax({
        url: "../Backend/get_kategori",
        type: "GET",
        dataType: "JSON",
        success: function(x) {
            if (x.status == true) {
                $('#select2kategori').html('<option value=""></option>');
                $.each(x.data, function(k, v) {
                    $('#select2kategori').append(`<option value="${v.id_kategori}">${v.nama_kategori}</option>`).html();
                });
            }
        }
    });
}

function select2supplier() {
    $("#select2supplier").select2({
        allowClear: true,
        placeholder: "Select a Supplier",
        dropdownParent: $('#tambah .modal-content')
    });
    show_supplier()
}

function show_supplier() {
    $.ajax({
        url: "../Backend/get_supplier",
        type: "GET",
        dataType: "JSON",
        success: function(x) {
            if (x.status == true) {
                $('#select2supplier').html('<option value=""></option>');
                $.each(x.data, function(k, v) {
                    $('#select2supplier').append(`<option value="${v.id_supplier}">${v.nama_supplier}</option>`).html();
                });
            }
        }
    });
}

function select2satuan() {
    $("#select2satuan").select2({
        allowClear: true,
        placeholder: "Select a Satuan",
        dropdownParent: $('#tambah .modal-content')
    });
}

function select2satuanberat() {
    $("#select2satuanberat").select2({
        allowClear: true,
        dropdownParent: $('#tambah .modal-content')
    });
}

function select2kategori_edit(value) {
    $("#select2kategori_edit").select2({
        allowClear: true,
        placeholder: "Select a Kategori",
        dropdownParent: $('#edit .modal-content')
    });
    show_kategori_edit(value)
}

function show_kategori_edit(value) {
    $.ajax({
        url: "../Backend/get_kategori",
        type: "GET",
        dataType: "JSON",
        success: function(x) {
            if (x.status == true) {
                $('#select2kategori_edit').html('<option value=""></option>');
                $.each(x.data, function(k, v) {
                    var option = '<option value="' + v.id_kategori + '">' + v.nama_kategori + ' </option>'
                    $('#select2kategori_edit').append(option).val(value).trigger("change");
                });
            }
        }
    });
}

function select2supplier_edit(value) {
    $("#select2supplier_edit").select2({
        allowClear: true,
        placeholder: "Select a Supplier",
        dropdownParent: $('#edit .modal-content')
    });
    show_supplier_edit(value)
}

function show_supplier_edit(value) {
    $.ajax({
        url: "../Backend/get_supplier",
        type: "GET",
        dataType: "JSON",
        success: function(x) {
            if (x.status == true) {
                $('#select2supplier_edit').html('<option value=""></option>');
                $.each(x.data, function(k, v) {
                    $('#select2supplier_edit').append(`<option value="${v.id_supplier}">${v.nama_supplier}</option>`).val(value).trigger("change");
                });
            }
        }
    });
}

function select2satuan_edit(value) {
    $("#select2satuan_edit").select2({
        allowClear: true,
        placeholder: "Select a Satuan",
        dropdownParent: $('#edit .modal-content')
    });

    var option = `
                <option value="Pcs">Pcs</option>
                <option value="Box">Box</option>
                <option value="Kg">Kg</option>
                <option value="Ball">Ball</option>
                <option value="Karung">Karung</option>
                <option value="Liter">Liter</option>
                <option value="Kaleng">Kaleng</option>
                <option value="Palet">Palet</option>
                <option value="Ikat">Ikat</option>`;
    $("#select2satuan_edit").html('<option value=""></option>')
    $('#select2satuan_edit').append(option).val(value).trigger("change")
}

function select2satuanberat_edit(value) {
    $("#select2satuanberat_edit").select2({
        allowClear: true,
        dropdownParent: $('#edit .modal-content')
    });

    var option = `
            <option value="Gr">Gr</option>
            <option value="Kg">Kg</option>
            <option value="Ton">Ton</option>
    `
    $("#select2satuanberat_edit").html('<option value=""></option>')
    $('#select2satuanberat_edit').append(option).val(value).trigger("change")
}