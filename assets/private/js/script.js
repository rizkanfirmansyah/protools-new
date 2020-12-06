const baseurl = window.location.origin + '/protools/';
const currentURL = window.location.pathname + window.location.search + window.location.hash;


$(function () {
    $('[data-toggle="tooltip"]').tooltip()
})

function sAlert(title, subtitle, expression){
  return swal(title, subtitle, expression);
}

  date = new Date();
  detik = date.getSeconds();
  menit = date.getMinutes();
  jam = date.getHours();
  hari = date.getDay();
  tanggal = date.getDate();
  bulan = date.getMonth();
  tahun = date.getFullYear();
  const dateNow = tahun+"-"+bulan+"-"+tanggal+" "+jam+":"+menit+":"+detik

  
 function show_error(err){
  return alert(`${err.status} ${err.statusText}`)
}


function eventMod(parent, child, even){
  $(`#${parent}`).on(even, `#${child}`, function(){
      if($(this).attr('disabled')){
          alert('Save project and try again')
      }else{
          // console.log('ohh oke');
      }
  })
}

function shuffleArray(array) {
  let act = '';
  for (var i = array.length - 1; i > 0; i--) {
      var j = Math.floor(Math.random() * (i + 1));
      var temp = array[i];
      array[i] = array[j];
      array[j] = temp;
  }

  return temp;
  
}

function refresh_table(table) {
table = $(table).DataTable();
table.ajax.reload()
}

function validateEmail(email) {
  var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
  return emailReg.test(email);
}


function generate(id) {
    var s = 'a';
    let huruf = []
    while(s != 'z')
    {
        huruf.push(s);
        s = String.fromCharCode(s.charCodeAt(0) + 1);
    }
        
    var S = 'A';
    while(S != 'Z')
    {
        huruf.push(S);
        S = String.fromCharCode(S.charCodeAt(0) + 1);
    }
        
    var arr = huruf 
    var res = shuffleArray(arr)
    var res2 = shuffleArray(arr)
    var res3 = shuffleArray(arr)
    var res4 = shuffleArray(arr)
    return res + res2 + res3 + res4 + Math.floor((Math.random() * 1000) + 1);
    
}

function passwordCheck(){
  if($('#password').attr('type') == 'text'){
    $('#iconicPassword').removeClass('mdi mdi-eye');
    $('#iconicPassword').addClass('mdi mdi-eye-off');
    
    $('#password').attr('type', 'password')
    $('#seePassword').addClass('btn-success');
    $('#seePassword').removeClass('btn-danger');
  }else{
      $('#iconicPassword').removeClass('mdi mdi-eye-off');
      $('#iconicPassword').addClass('mdi mdi-eye');
      $('#seePassword').removeClass('btn-success');
      $('#seePassword').addClass('btn-danger');

      $('#password').attr('type', 'text')
      
  }
}


function user_insert(data, param){
  console.log(param);
  $.ajax({
      url: baseurl + 'user/insert',
      type: 'POST',
      data:{
          username : data[0],
          password : data[1],
          email : data[2],
          image : 'profile.png',
          role_id : data[3],
          status : data[4],
          create_at : dateNow,
          param : param
      },
      success:function(res) {
          let alert = JSON.parse(res)
          console.log(alert.title, alert.subtitle, alert.expression)
          if (alert.title.toLowerCase() == 'success') {
              refresh_table('#datatable')
              start_role()
              $('#createDataUser').modal('hide')
              $('#editDataUser').modal('hide')
          }
      },
      error:function(err) {
          show_error(err)
      }
  })
}


function userCheck(param){
  let email = $('#email').val()
  let password = $('#password').val()
  let username = $('#username').val()
  let role = $('#roleId').val()
  let active = ''
  let val = validateEmail(email)

  if (username == "") {
    $('#username').addClass('is-invalid')
    $('#username').attr('placeholder', 'Kolom Tidak Boleh Kosong')
  }else{
      $('#username').removeClass('is-invalid')
      $('#username').addClass('is-valid')
      if (password == "") {
          $('#password').addClass('is-invalid')
          $('#password').attr('placeholder', 'Kolom Tidak Boleh Kosong')
      }else{
          $('#password').removeClass('is-invalid')
          $('#password').addClass('is-valid')
          if(val == true){
              if(email != ""){
                  $('#email').removeClass('is-invalid')
                  $('#email').addClass('is-valid')
                  if(role == null){
                      $('#inputOption').text('Kolom Tidak Boleh Kosong')
                      $('#roleId').addClass('is-invalid')
                  }else{
                      $('#roleId').removeClass('is-invalid')
                      $('#roleId').addClass('is-valid')
                      if ($('#active').prop('checked')) {
                          active = 1
                      }else{
                          active = 0
                      }
                      user_insert([username, password, email, role, active], param)
                  }
              }else{
                  $('#email').attr('placeholder', 'Kolom Tidak Boleh Kosong')
                  $('#email').addClass('is-invalid')
              }
          }else{
              $('#email').addClass('is-invalid')
          }
      }
  }

}


function checkValid(param){
  let res = []
  param.forEach(parm => {
    if($(`#${parm}`).val() == "" || $(`#${parm}`).val() == undefined ){
      res.push(parm)
    }else{
      
    }
    
  })  ;

  return res;
  
}

function logo(){
  let id = $('#valueNavbar').data('id')
  if(id == 1){
    $('#valueNavbar').data('id', 2)
  }else{
    $('#valueNavbar').data('id', 1)
  }
  if (id == 1) {
    $('#sidebarLogoMini').show()
    $('#sidebarLogo').hide()
  }else{
    $('#sidebarLogoMini').hide()
    $('#sidebarLogo').show()
  }
}