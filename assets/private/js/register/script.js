$(document).ready(function() {
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
})