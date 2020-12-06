function login(alert){
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

function cekLogin()
{
    let alert = '<small class="alert alert-danger col-md-12"> '
    let res = checkValid(['username', 'password']);
    let value = ''
    res.forEach(result =>{
        value += `<i class="mdi mdi-alert-circle-outline"></i>  ${result} do not empty <br>`
    })
    if(res.length > 0){
        $('#alert').html(alert + value + '</small>')
    }else{
        $('#alert').html('')
        login(alert)
    }
}

$(document).ready(function() {

    $(this).on('keyup', function(e){
        if(e.keyCode == 13){
                cekLogin()
        }
    })

    $('#seePassword').on('click', function(){
        passwordCheck()
    })

    $('#login').on('click', function(){
        cekLogin()
    })

})
