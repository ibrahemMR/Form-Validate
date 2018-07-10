$(document).ready(function() {
    //login Form Validation : 
    $("#login-form").submit(function(event) {
            event.preventDefault();
            var username = $("#login-username").val();
            var password = $("#login-password").val();
            var insubmit = $("#login-submit").val();
            $("#form-display").load("./loginValidation.php", {
            username : username ,
            password : password,
            submit : insubmit
        });

       
    });
    
    //comment submit
    $('#feedback').submit(function(event){
        event.preventDefault();
        var comment = $("#teaxtArea").val();
        var co_submit = $("#feedback-submit").val();
        $("#form-display").load("./commentvalidation.php", {
            feedcomment : comment ,
            submit : co_submit
        });
    });

});     
