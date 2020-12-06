function start_role(con, parm = 'default', add = 'default'){
    let roles = ''
    $.ajax({
        url : baseurl + 'api/getrole',
        dataType : 'JSON',
        type:'POST',
        data:{
            con:con,    
        },
        success:function(res){
            if (con == 'active') {
                if (parm == 'default') {
                    res.forEach(role => {
                        roles += `<option value="${role.id}">${role.role_name}</option>`
                    });
                    $('#roleId').html(roles)
                }else{
                    res.forEach(role => {
                        if (role.id == add[0]) {
                            
                        }else{
                            roles += `<option value="${role.id}">${role.role_name}</option>`
                        }
                    });
                        ads = `<option value="${add[0]}">${add[1]}</option>`
                        if (add[0] == 1) {
                            $('#editRoleId').html(ads)
                            return 0;   
                        }
                        $('#editRoleId').html(ads + roles)
                } 
            }else{
                res.forEach(role => {
                    roles += `<a class="dropdown-item" data-id="${role.id}" id="typeRoleId" style="cursor:pointer;">${role.role_name}</a>`
                });
                    all = `<a class="dropdown-item" data-id="all" id="typeRoleId" style="cursor:pointer;">All</a>` 
                $('#roleType').html(roles + all)
            }
        },
    })

}

function start_userID(userID = 'all'){
    return userID;
}

function ready_user(userID){
     $('#datatable').DataTable({
        processing: false,
        serverSide: true,
        order: [
            [0, 'asc']
        ],
        ajax: {
            url:baseurl + 'datatable/table/user',
            type: 'POST',
            dataType: 'JSON',
            data:{
                id : userID,
            }
        },
        columns: [
            {
                data: 'id',
                orderable: false,
                className: 'text-left'
            },
            {
                data: 'username',
                orderable: false,
                className: 'text-left'
            },
            {
                data: 'email',
                orderable: false,
                className: 'text-left'
            },
            {
                data: 'image',
                orderable: false,
                className: 'text-left'
            },
            {
                data: 'role_id',
                orderable: false,
                className: 'text-left'
            },
            {
                data: 'status',
                orderable: false,
                className: 'text-center'
            },
            {
                data: 'create_at',
                orderable: false,
                className: 'text-right'
            },
            {
                data: 'updated',
                orderable: false,
                className: 'text-right'
            },
            {
                data: 'button',
                orderable: false,
                className: 'text-right'
            },
        ],
        "bDestroy": true,
        
    })

    
}


$(document).ready(function(){
    start_role('inactive')
    let id = start_userID()
    $('#typeRoleName').html(id)
    ready_user(id)
    
    $('#roleType').on('click', '#typeRoleId',function(){
        let id = $(this).data('id')
        let text = $(this).text()
        $('#typeRoleName').html(text)
        ready_user(id)
    })

    $('#createUser').on('click', function(){
        $('#createDataUser').modal('show')
        start_role('active')
    })

    $('#generateName').on('click', function(){
        let res = generate()
        $('#username').val(res);
        
    })
    
    $('#generatePassword').on('click', function(){
        let res = generate()
        $('#password').val(res);
    })

    $('#seePassword').on('click', function(){
        passwordCheck()
    })

    $('#saveUser').on('click', function(){
       userCheck('insert')
    })
    
    $('#datatable').on('click', '#statusUser', function(){
        let id = $(this).data('id')
        let parm = $(this).data('parm')
        $.ajax({
            url:baseurl + 'update/status',
            type:'POST',
            data:{
                username:parm,
                status:id,
            },
            success:function(res){
                refresh_table('#datatable')
            }
        })
    })
    
    $('#datatable').on('click', '#editUser', function(){
        let id = $(this).data('id')
        $.ajax({
            url:baseurl + 'api/getuser',
            type:'POST',
            data:{
                username:id,
            },
            success:function(res){
                let data = JSON.parse(res)
                if(data.status == 1){
                    $('#editActive').attr('checked', 'checked')
                }
                let option = [data.role_id,data.role_name]
                $('#editUsername').val(data.username)
                $('#editPassword').val('password')
                $('#editEmail').val(data.email)
                $('#editDataUser').modal('show')
                start_role('active', 'edit', option)
            }
        })
    })
    
    $('#editDataUser').on('click', '#editUser', function(){
        let email = $('#editEmail').val()
        let password = $('#editPassword').val()
        let username = $('#editUsername').val()
        let role = $('#editRoleId').val()
        let active = ''
        let val = validateEmail(email)
        
        if (username == "") {
            $('#editUsername').addClass('is-invalid')
            $('#editUsername').attr('placeholder', 'Kolom Tidak Boleh Kosong')
        }else{
            $('#editUsername').removeClass('is-invalid')
            $('#editUsername').addClass('is-valid')
            if (password == "") {
                $('#editPassword').addClass('is-invalid')
                $('#editPassword').attr('placeholder', 'Kolom Tidak Boleh Kosong')
            }else{
                $('#editPassword').removeClass('is-invalid')
                $('#editPassword').addClass('is-valid')
                if(val == true){
                    if(email != ""){
                        $('#editEmail').removeClass('is-invalid')
                        $('#email').addClass('is-valid')
                        if(role == null){
                            $('#inputOption').text('Kolom Tidak Boleh Kosong')
                            $('#editRoleId').addClass('is-invalid')
                        }else{
                            $('#editRoleId').removeClass('is-invalid')
                            $('#editRoleId').addClass('is-valid')
                            if ($('#editActive').prop('checked')) {
                                active = 1
                            }else{
                                active = 0
                            }
                            user_insert([username, password, email, role, active], 'update')
                        }
                    }else{
                        $('#email').attr('placeholder', 'Kolom Tidak Boleh Kosong')
                    }
                }else{
                    $('#email').addClass('is-invalid')
                }
            }
        }
    })

    $('#enableEditPassword').on('click', function(){
        $('#editPassword').removeAttr('disabled')
        $('#editPassword').val('')
        $(this).hide()
        $('#saveEditPassword').show()
        $('#seeEditPassword').show()
    })

    $('#saveEditPassword').on('click', function(){
        $.ajax({
            url: baseurl + 'change/password',
            data:{
                username : $('#editUsername').val(),
                password : $('#editPassword').val(),
            },
            type:'POST',
            success:function(res){
                let data = JSON.parse(res);
                let html = `<div class="alert alert-${data.code} alert-dismissible fade show" role="alert">${data.message}<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>`
                $('#modalBody').prepend(html)
            }
        })
    })
    
    $('#seeEditPassword').on('click', function(){
        if($('#editPassword').attr('type') == 'text'){
            $('#editIconicPassword').removeClass('mdi mdi-eye');
            $('#editIconicPassword').addClass('mdi mdi-eye-off');
            
            $('#editPassword').attr('type', 'password')
            $(this).addClass('btn-success');
            $(this).removeClass('btn-danger');
        }else{
            $('#editIconicPassword').removeClass('mdi mdi-eye-off');
            $('#editIconicPassword').addClass('mdi mdi-eye');
            $(this).removeClass('btn-success');
            $(this).addClass('btn-danger');
    
            $('#editPassword').attr('type', 'text')
            
        }
    })

    $('#datatable').on('click', '#deleteUser', function(){
        $.ajax({
            url: baseurl + 'delete/user',
            type:'POST',
            data:{
                id:$(this).data('id')
            },
            success:function(res) {
                refresh_table('#datatable')
            },
            error:function(err) {
                show_error(err)
            }
        })
    })

})