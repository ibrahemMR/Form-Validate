$(document).ready(function() {
    //registration validate
    $("#register-form").submit(function(event) {
        event.preventDefault();
        var username = $("#form-username").val();
        var email = $("#form-email").val();
        var password = $("#form-password").val();
        var fullname = $("#form-fullname").val();
        var gender = $("#form-gender").val();
        var submit = $("#form-submit").val();
        $("#form-display").load("./registervalidation.php", {
        username : username ,
        email : email ,
        password : password,
        fullname : fullname,
        gender : gender,
        submit : submit
        });
       
    });
   
          
});