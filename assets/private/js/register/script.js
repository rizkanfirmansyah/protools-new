function runSign(e){
    let id;
        if (e == 0) {
            if ($('#codeUser').val() == undefined) {
                id = cekForm(['username', 'password', 'email'])
            }else{
                id = cekForm(['username', 'password', 'email', 'codeUser'])
            }
            up(id)
        } else {
            if(e.keyCode == 13){
                if ($('#codeUser').val() == undefined) {
                    id = cekForm(['username', 'password', 'email'])
                }else{
                    id = cekForm(['username', 'password', 'email', 'codeUser'])
                }
                up(id)
            }
        }  
    }
    
    function up(id){
        if (id == 1) {
        if($('.membership').prop('checked')){
            if ($('#terms').prop('checked')) {
                if ($('#codeRobot').text() == $('#captcha').val()) {
                    signUp()
                    $('#alert').html(' ')
                    return 1;
                }
                proAlert('Your captcha is wrong, please Try Again', 'alert', 'danger')
                captcha('terms')
            }else{
                proAlert('Please! Check the terms & conditions', 'alert', 'danger')
            }
            return 0;
        }else{
            proAlert('Please! Check Membership', 'alert', 'danger')
        }

    }
}

function signUp(){
    let username = $('#username').val()
    let password = $('#password').val()
    let email = $('#email').val()
    let codeUser = $('#codeUser').val()
    $.ajax({
        url:baseurl + 'sign/up',
        data:{
            username:username,
            password:password,
            email:email,
            codeUser:codeUser,
        },
        type: 'POST',
        success:function(res){
            alert(res)
        },
        error:function(err){
            show_error(err)
        }
    })
}

$(document).ready(function() {

    $(this).on('keyup', function(e){
        runSign(e)
    })

    $('#signUp').on('click', function(){
        runSign(0)
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
    $('#email').on('keyup', function(){
        let res = validateEmail($(this).val())
        if(res == false){
            $(this).addClass('is-invalid')
            $(this).removeClass('is-valid')
        }else{
            $(this).removeClass('is-invalid')
            $(this).addClass('is-valid')
        }
    })

    $('.membership').on('change', function(){
        let id = $(this).val()
        if(id == 'user'){
            html = `
            <label for="codeUser">Code User</label>
                    <div class="input-group">
                        <div class="input-group-prepend bg-transparent">
                            <span class="input-group-text bg-transparent border-right-0">
                                <i class="mdi mdi-account-outline text-primary"></i>
                            </span>
                        </div>
                        <input type="text" class="form-control form-control-lg border-left-0" id="codeUser" placeholder="codeUser">
                        <div class="input-group-prepend">
                            <a id="generateCode" style="cursor: pointer;" class="btn btn-primary">Get a Code</a>
                        </div>
                    </div>
            `
            $('#codeHtml').html(html)
        }else{
            $('#codeHtml').html(' ')

        }
    })

    $('#codeHtml').on('click', '#generateCode', function(){
        
    })

    $('#terms').on('change', function(){
        let robot = ' '
        captcha('terms')
    })

})

function captcha(id){
    let code =  Math.floor(Math.random() * 10 * 200409)
        if ($(`#${id}`).prop('checked')) {
            robot = `
            <div class="form-group col-md-4">
                <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                        <span class="input-group-text bg-transparent border-right-0" id="codeRobot">${code}</span>
                    </div>
                    <input type="text" class="form-control form-control-lg border-left-0" id="captcha" placeholder="Enter Code">
                </div>
            </div>
            `
        }else{
            robot = ` `
        }
        $('#robot').html(robot)
}