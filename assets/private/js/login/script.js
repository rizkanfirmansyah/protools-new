function login(){
    let alert = '<small class="alert alert-danger col-md-12"> '
    let tutor = ''
    if($('#tutorial').prop('checked')){
        tutor = 'yes';
    }else{
        tutor = 'no'
    }

    $.ajax({
        url : baseurl + 'login/user',
        type:'POST',
        data:{
            username : $('#username').val(),
            password : $('#password').val(),
            tutorial : tutor,
        },
        success:function(res){
            let data = JSON.parse(res);
            if(data.code == 'error'){
                $('#alert').html(alert + data.error + '</small>')
            }else{
                window.location.href = baseurl + 'id/user'
            }
        },
        error:function(err){
            show_error(err)
        }
    })
}

$(document).ready(function() {

    $(this).on('keyup', function(e){
        if(e.keyCode == 13){
            let id = cekForm(['username', 'password'])
            if(id == 1){
                login()
            }
        }
    })

    $('#seePassword').on('click', function(){
        passwordCheck()
    })

    $('#login').on('click', function(){
        cekLogin()
    })

})
