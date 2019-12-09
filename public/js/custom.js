$(document).ready(function(){

    // Basic function
    function validateEmail(email) {
        var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(String(email).toLowerCase());
    }

    // User Management

    var table = $('#usertable').DataTable();
    
    if($('#role').val() == 3){
        // console.log($('#role').val())
        $('#admin-wrapper').removeClass('display-none');
    }else{
        $('#admin-wrapper').addClass('display-none');
    }

    
    $('#role').change(function(){
        console.log($(this).val());
        if($(this).val() !== '' && $(this).val() == 3){
            $('#admin-wrapper').removeClass('display-none');
        }else{
            if($('#admin-wrapper').hasClass('display-none')){
                return
            }else{
                $('#admin-wrapper').addClass('display-none');
            }
        }
    })

    $('#modalbutton').click(function(){
        $("#adduser").modal({backdrop: "static"});
    })

    $("#adduser").on('hidden.bs.modal', function(){
        location.reload();
    });
    
    $('#user-submit').click(function(){

        $('.error').removeClass('display-show');
        $('.form-control').removeClass('border-red');
        let user_id = $('#userid').val().trim();
        let user_name = $('#username').val().trim();
        let user_email = $('#email').val().trim();
        let role = $('#role').val();
        let admin = $('#admin').val();
        let password = $('#password').val();
        let confirm_password = $('#confirm_password').val();
        if(!validation(user_id,user_email,role,admin,password,confirm_password)){
            return false;
        }
        let data = {name:user_id,role:role,password:password,username:user_name,email:user_email,_token:$('input[name=_token]').val()};
        if(admin){
            data = {name:user_id,role:role,admin:admin,password:password,username:user_name,email:user_email,_token:$('input[name=_token]').val()};
        }
        // console.log(data);
        $('#user-submit').html('<span class="spinner-grow spinner-grow-sm"></span>Loading..');
        $('#user-submit').attr('disabled','disabled');
        $('#close').attr('disabled','disabled');
        $.ajax({
            url:'adduser',
            type:'post',
            data:data,
            success:function(data){
                console.log(data);
                if(data == 1){
                    swal({
                        title: "Success",
                        text: "User successfully added.",
                        icon: "success",
                        button: "OK",
                      }).then(()=>{
                        location.reload();
                      });
                }else{
                    swal({
                        title: "Fail",
                        text: "The User ID is already stored in the database.",
                        icon: "error",
                        button: "OK",
                      }).then(()=>{
                        $('#userid').addClass('border-red');
                        $('#userid-unique-error').addClass('display-show');
                        $('#user-submit').html('Save');
                        $('#user-submit').removeAttr('disabled');
                        $('#close').removeAttr('disabled');
                      });
                }
            }
        })
    })

    $('.userd_elete').click(function(e){
        e.preventDefault();
        console.log('ok');
        swal({
            title: "Warning",
            text: "Are you sure ?",
            icon: "warning",
            buttons: {
                cancel: "Cancel",                
                default: 'Ok',
              },
          }).then((value)=>{
              switch(value) {
                    case "default" :
                        location.href = ($(this).attr('href'));
                        break;
                    case "cancel" :
                        break;
              }
          });
    })

    function readURL(input) {
        if (input.files && input.files[0]) {
          var reader = new FileReader();
          
          reader.onload = function(e) {
            $('#my_avatar').attr('src', e.target.result);
          }
          
          reader.readAsDataURL(input.files[0]);
        }
      }
      
      $("#photo").change(function() {
        readURL(this);
      });

    function validation(user_id,user_email,role,admin,password,confirm_password){
        if(user_id == ''){
            $('#userid').addClass('border-red');
            $('#userid-require-error').addClass('display-show');
            return false;
        }
        if(user_email){
            if(!validateEmail(user_email)){
                $('#email').addClass('border-red');
                $('#email-type-error').addClass('display-show');
                return false;
            }
        }
        if(!role){
            $('#role').addClass('border-red');
            $('#role-require-error').addClass('display-show');
            return false;
        }
        if(!$('#admin-wrapper').hasClass('display-none')){
            if(!admin){
                $('#admin').addClass('border-red');
                $('#admin-require-error').addClass('display-show');
                return false;
            }
        }
        if(!password){
            $('#password').addClass('border-red');
            $('#password-require-error').addClass('display-show');
            return false;
        }else if(password.length < 8){
            $('#password').addClass('border-red');
            $('#password-length-error').addClass('display-show');
            return false;
        }
        if(!confirm_password){
            $('#confirm_password').addClass('border-red');
            $('#confirm_password-require-error').addClass('display-show');
            return false;
        }else if(password != confirm_password){
            $('#confirm_password').addClass('border-red');
            $('#password-same-error').addClass('display-show');
            return false;
        }
        return true;
    }

    $('#edituser').click(function(){
        $('.error').removeClass('display-show');
        $('.form-control').removeClass('border-red');
        let user_id = $('#userid').val().trim();
        let user_name = $('#username').val().trim();
        let user_email = $('#email').val().trim();
        let role = $('#role').val();
        let admin = $('#admin').val();
        let password = $('#password').val();
        let confirm_password = $('#confirm_password').val();
        if(!validation(user_id,user_email,role,admin,password,confirm_password)){
            return false;
        }

        swal({
            title: "Warning",
            text: "Are you sure to change password? ",
            icon: "warning",
            buttons: {
                cancel: "Cancel",                
                default: 'Ok',
              },
          }).then((value)=>{
              switch(value) {
                    case "default" :
                        $('#editform').submit();
                        break;
                    case "cancel" :
                        break;
              }
          });
    })

    $('#setuser').click(function(){
        $('.error').removeClass('display-show');
        $('.form-control').removeClass('border-red');
        let email = $('#set_email').val();
        let cur_password = $('#cur_password').val();
        let set_password = $('#set_password').val();
        let set_confirm_password = $('#set_confirm_password').val();
        if(email){
            if(!validateEmail(email)){
                $('#set_email').addClass('border-red');
                $('#set_email-type-error').addClass('display-show');
                return false;
            }
        }
        if(set_password){
            if(!cur_password){
                $('#cur_password').addClass('border-red');
                $('#cur_password-require-error').addClass('display-show');
                return false;
            }
            if(set_password.length < 8){
                $('#set_password').addClass('border-red');
                $('#set_password-length-error').addClass('display-show');
                return false;
            }
            if(!set_confirm_password){
                $('#set_confirm_password').addClass('border-red');
                $('#set_confirm_password-require-error').addClass('display-show');
                return false;
            }
            if(set_confirm_password != set_password){
                $('#set_confirm_password').addClass('border-red');
                $('#set_password-same-error').addClass('display-show');
                return false;
            }
        }
        if(cur_password || set_confirm_password){
            if(!set_password){
                $('#set_password').addClass('border-red');
                $('#set_password-require-error').addClass('display-show');
                return false;
            }
            
        }
        $('#setform').submit();
    })
  })