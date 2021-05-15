function hold_modal(id, action) {
    $('#' + id).modal(action)
}

let table;
let _token = $('input[name=_token]').val()

function deleteAlert(id, url) {
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        animation: false,
        customClass: 'animated flipInX',
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!',
        confirmButtonClass: 'btn btn-primary',
        cancelButtonClass: 'btn btn-danger ml-1',
        buttonsStyling: false,
    }).then(function (result) {
        if (result.value) {
            $.ajax({
                url: url + id,
                type: 'delete',
                data: {_token: _token},
                success: function (data) {
                    table.ajax.reload()
                    product_table.ajax.reload()
                    Swal.fire({
                        type: "success",
                        title: 'Deleted!',
                        text: data.message,
                        animation: false,
                        customClass: 'animated flipInX',
                        confirmButtonClass: 'btn btn-success',
                    })
                }
            })
        }
        else if (result.dismiss === Swal.DismissReason.cancel) {
            Swal.fire({
                title: 'Cancelled',
                text: 'Your data file is safe :)',
                type: 'error',
                animation: false,
                customClass: 'animated flipInX',
                confirmButtonClass: 'btn btn-success',
            })
        }
    })
}

function successSMS(message, title = null) {
    if (title == null) {
        title = 'Advance POS'
    }
    toastr.success(message, title, {
        "showMethod": "slideDown",
        "hideMethod": "slideUp",
        "progressBar": true,
        timeOut: 5000
    });
}

function errorSMS(message, title = null) {
    if (title == null) {
        title = 'Advance POS'
    }
    toastr.error(message, title, {
        "showMethod": "slideDown",
        "hideMethod": "slideUp",
        "progressBar": true,
        timeOut: 5000
    });
}

$(document).ready(function () {
    $(".touchspin").TouchSpin({
        buttondown_class: "btn btn-primary",
        buttonup_class: "btn btn-primary",
    });
    $(".touchspin-step").TouchSpin({
        step: 5
    });
    // Add image
    $('#profile').change(function (e) {
        let path = URL.createObjectURL(e.target.files[0])
        $('#load_add_user_profile').html(`<img src="${path}" style="width: 50px; height: 50px; border-radius: 100px" />`)
    })
    //Edit image
    $('#e_profile').change(function (e) {
        let path = URL.createObjectURL(e.target.files[0])
        $('#e_load_add_user_profile').html(`<img src="${path}" style="width: 50px; height: 50px; border-radius: 100px" />`)
    })
    // Add user function
    $('#addUserForm').submit(function (e) {
        e.preventDefault()
        let url = $('#addUserForm').attr('action');
        $.ajax({
            url: url,
            type: 'post',
            cache: false,
            contentType: false,
            processData: false,
            data: new FormData(this),
            success: function (data) {
                if (data.status === 'fail') {
                    let message = ''
                    $.each(data.error, function (i, v) {
                        message = v
                        errorSMS(message)
                    });
                } else {
                    $('#addUserForm')[0].reset()
                    table.ajax.reload()
                    hold_modal('addUserModal', 'hide')
                    successSMS(data.message)
                }
            }
        })
    })

    // Edit user function
    $('#editUserForm').submit(function (e) {
        e.preventDefault()
        let url = $('#editUserForm').attr('action');
        $.ajax({
            url: url,
            type: 'post',
            cache: false,
            contentType: false,
            processData: false,
            data: new FormData(this),
            success: function (data) {
                if (data.status === 'fail') {
                    let message = ''
                    $.each(data.error, function (i, v) {
                        message = v
                        errorSMS(message)
                    });
                } else {
                    $('#addUserForm')[0].reset()
                    table.ajax.reload()
                    hold_modal('editUserModal', 'hide')
                    successSMS(data.message)
                }
            },
            error: function () {
                alert('Something went wrong')
            }
        })
    })
    let key = 0
    table = $('#userList').DataTable({
        ajax: "get-data",
        order: ['0', 'asc'],
        processing: true,
        columns: [
            {
                "data": null,
                render: function () {
                    return ++key
                }
            },
            {"data": "name"},
            {"data": "phone"},
            {
                "data": null,
                render: function (data, row, type) {
                    if (data.is_admin === '1') {
                        return 'Admin'
                    } else if (data.is_admin === '2') {
                        return 'User'
                    } else {
                        return ''
                    }
                }
            },
            {"data": "email"},
            {
                "data": null,
                render: function (data, row, type) {
                    return `<img src="/all/app-assets/images/profile/user-uploads/${data.profile}"
                                style="width: 50px; height: 50px; border-radius: 100px; cursor: pointer" onclick="view_user_profile_image(${data.id})" alt="Profile">`
                }
            },
            {
                "data": null,
                render: function (data, row, type) {
                    return `<div class="btn-group" role="group" aria-label="Basic example">
                                <button type="button" class="btn btn-outline-info btn-sm" onclick="view_user(${data.id})"><i class="feather icon-eye"></i></button>
                                <button type="button" class="btn btn-outline-primary btn-sm" onclick="edit_user(${data.id})"><i class="feather icon-edit"></i></button>
                                <button type="button" class="btn btn-outline-danger btn-sm" onclick="deleteAlert(${data.id}, 'users/destroy/')"><i class="feather icon-trash"></i></button>
                            </div>`
                }
            },
        ],
    })
    $('#description').keyup(updateCount)

    function updateCount() {
        var cs = $(this).val().length;
        $('#count_words').text(cs + ' words');
    }
})

// functions
// view user modal
function view_user(id) {
    $.ajax({
        url: 'users/' + id,
        type: 'get',
        success: function (data) {
            if (data) {
                hold_modal('viewUserModal', 'show')
                $.each(data, function (k, v) {
                    $('#v_'+k).html(v)
                })
                $('#user_info').html(data.name)
                $('#v_load_add_user_profile').html(`<img src="/all/app-assets/images/profile/user-uploads/${data.profile}"
                                style="width: 100px; height: 100px; border-radius: 100px" alt="Profile">`)
                if (data.is_admin == '1') {
                    $('#v_role').html('Admin')
                } else if (data.is_admin == '2') {
                    $('#v_role').html('User')
                }
            }
        },
        error: function () {
            alert('Failed!')
        }
    })
}

// view user profile image modal
function view_user_profile_image(id) {
    $.ajax({
        url: 'users/' + id,
        type: 'get',
        success: function (data) {
            if (data) {
                hold_modal('viewUserImageModal', 'show')
                $('#user_profile_name').html(data.name)
                $('#v_load_view_user_profile').html(`<img src="/all/app-assets/images/profile/user-uploads/${data.profile}"
                                style="width: 370px; height: 370px; border-radius: 50px" alt="Profile">`)
            }
        },
        error: function () {
            alert('Failed!')
        }
    })
}
// edit user modal
function edit_user(id) {
    $('#e_password').val('')
    $('#e_password_confirmation').val('')
    $.ajax({
        url: '/users/' + id,
        type: 'get',
        success: function (data) {
            hold_modal('editUserModal', 'show')
            $.each(data, function (k,v) {
                $('#ee_'+k).val(v)
            })
            $('#e_load_add_user_profile').html(`<img src="/all/app-assets/images/profile/user-uploads/${data.profile}"
                                style="width: 50px; height: 50px; border-radius: 100px" alt="Profile">`)
            $('#e_role_id').filter(function () {
                return $(this).val() === $('#e_role_id').val(data.is_admin)
            }).attr('selected', true)
        }
    })
}

// Products
function profit() {
    let profit = 0
    let cost_price = $('#cost_price').val()
    let selling_price = $('#selling_price').val()
    let profit_id = $('#profit')
    let e_profit_id = $('#e_profit')
    if (selling_price != '' || cost_price != '') {
       profit = (parseFloat(cost_price) + parseFloat(selling_price))
        profit_id.html('profit: ' + profit)
        e_profit_id.html('profit: ' + profit)
    }
}
$('#addProductForm').submit(function (e) {
    e.preventDefault()
    let cost_price = $('#cost_price').val()
    let selling_price = $('#selling_price').val()
    if (cost_price > selling_price) {
        errorSMS('Cost price must not be more than Selling price')
        return
    }
    $.ajax({
        url: $(this).attr('action'),
        type: 'post',
        cache: false,
        contentType: false,
        processData: false,
        data: new FormData(this),
        success: function (data) {
            if (data.status === 'fail') {
                let message = ''
                $.each(data.error, function (a,b) {
                    message = b
                    errorSMS(message)
                })
            } else {
                $('#addProductForm')[0].reset()
                hold_modal('addProductModal', 'hide')
                product_table.ajax.reload()
                successSMS(data.message)
            }
        }
    })
})

let product_table
$(document).ready(function () {
    let key = 0
    product_table = $('#ProductList').DataTable({
        ajax: 'get-products',
        order: ['0', 'asc'],
        processing: true,
        columns: [
            {
                'data': null,
                render: function () {
                    return ++key
                }
            },
            {'data': 'product_name'},
            {'data': 'brand'},
            {'data': 'cost_price'},
            {'data': 'selling_price'},
            {'data': 'quantity'},
            {
                'data': null,
                render: function (data) {
                    if (parseInt(data.alert_stock) >= parseInt(data.quantity)) {
                        return `<span class="badge badge-danger">Low stock: ${data.alert_stock}</span>`
                    } else if (parseInt(data.alert_stock) && parseInt(data.quantity) === 0) {
                        return `<span class="badge badge-danger">Out stock</span>`
                    } else {
                        return `<span class="badge badge-success">In stock: ${data.alert_stock}</span>`
                    }
                }
            },
            {
                'data': null,
                render: function (data, row, type) {
                    return `<div class="btn-group" role="group" aria-label="Basic example">
                                <button type="button" class="btn btn-outline-info btn-sm" onclick="view_product(${data.id})"><i class="feather icon-eye"></i></button>
                                <button type="button" class="btn btn-outline-primary btn-sm" onclick="edit_product(${data.id})"><i class="feather icon-edit"></i></button>
                                <button type="button" class="btn btn-outline-danger btn-sm" onclick="deleteAlert(${data.id}, 'products/')"><i class="feather icon-trash"></i></button>
                            </div>`
                }
            },
        ]
    })
})

function view_product(id) {
    $.ajax({
        url: 'products/'+id,
        type: 'get',
        success: function (data) {
            $('#product_info').html(data.product_name)
            $.each(data, function (k,v) {
                $('#v_'+k).html(v)
            })
        }
    })
    hold_modal('viewProductModal', 'show')
}

function edit_product(id) {
    $.ajax({
    url: 'products/'+id,
    type: 'get',
    success: function (data) {
        $('#product_info').html(data.product_name)
        $.each(data, function (k,v) {
            $('#e_'+k).val(v)
        })
    }
})
    hold_modal('editProductModal', 'show')
}

$('#editProductForm').submit(function (e) {
    e.preventDefault()
    let cost_price = $('#e_cost_price').val()
    let selling_price = $('#e_selling_price').val()
    if (cost_price > selling_price) {
        errorSMS('Cost price must not be more than Selling price')
        return
    }
    let formData = new FormData(this)
    formData.append('_method', 'PUT');
    console.log(formData)
    $.ajax({
        url: 'products/' + $('#e_id').val(),
        type: 'POST',
        cache: false,
        contentType: false,
        processData: false,
        data: formData,
        success: function (data) {
            if (data.status === 'fail') {
                let message = ''
                $.each(data.error, function (a,b) {
                    message = b
                    errorSMS(message)
                })
            } else {
                $('#addProductForm')[0].reset()
                hold_modal('editProductModal', 'hide')
                product_table.ajax.reload()
                successSMS(data.message)
            }
        }
    })
})
