<?php

    include "includes/dbc.php";
    include "includes/isclean.php";
    if(isset($_POST['submit'])){
        $username   = $_POST['username'];
        $email      = $_POST['email'];
        $password   = $_POST['password'];
        $fullname   = $_POST['fullname'];
        $hashpass   = sha1($password);
        $gender     = $_POST['gender'];

        $errorEmpty = false;
        $errorEmail = false;
        $errorExist = false;
        $errorPass  = false;
        $errorFullname  = false;
        $errorGend = false;

        $stmt = $con->prepare("SELECT * FROM arusers WHERE username= ? OR email = ? LIMIT 1");
        $stmt->execute(array($username,$email));
        $cont= $stmt->rowCount();

        if (empty($username) || empty($email) || empty($hashpass) || empty($fullname) ){
            echo "<p class='alert alert-danger'>جميع الحقول مطلوبة <i class='fa fa-exclamation-triangle'></i> !</p>";
            $errorEmpty = true;
        }elseif( $gender == 0 ){
            echo "<p class='alert alert-danger'> اختر النوع<i class='fa fa-exclamation-triangle'></i> </p>";
            $errorGend = true;
        }elseif(!filter_var($email , FILTER_VALIDATE_EMAIL)) {
            echo "<p class='alert alert-danger'> ادخل بريد الكتروني صحيح <i class='fa fa-exclamation-triangle'></i> </p>";
            $errorEmail = true;
        }elseif( strlen($password) < 6 ){
            echo "<p class='alert alert-danger'> كلمة السر اقل من 6 احرف <i class='fa fa-exclamation-triangle'></i> </p>";
            $errorPass = true;
        }elseif($cont > 0){
                echo "<p class='alert alert-danger'>اسم المستخدم او البريد موجود سابقا <i class='fa fa-exclamation-triangle'></i></p>";
                $errorExist = true;
        }elseif(is_string($fullname) == false){
            echo "<p class='alert alert-danger'>الاسم غير صحيح <i class='fa fa-exclamation-triangle'></i></p>";
            $errorFullname = true;
        }elseif(is_clean($username) && is_clean($email) && is_clean($password)){
            echo "<p class='alert alert-danger'>ThugLife <i class='fa fa-exclamation-triangle'></i></p>";
        }else{
            $stmt = $con->prepare("INSERT INTO arusers (id,username,email,password,fullName,gender) VALUES (:sid,:suser,:semail,:spass,:sfull,:sgender)");
						$stmt->execute(array(
							'sid'	   => NULL,
                            'suser'    => $username ,
                            'semail'   => $email,
							'spass'    => $hashpass,
                            'sfull'    => $fullname,
                            'sgender'  => $gender
							 )
                            );
                        
            echo "<p class='alert alert-success'><i class='fa fa-true'></i> تم التسجيل بنجاح</p>";
            //echo "<p class='alert alert-success'><a href='login.php'><i class='fa fa-home'></i> login now</a> </p>";               
            }
        }
?>
<script>
    $("#form-email, #form-password , #form-username, #form-fullname,#form-gender").removeClass("form-error"); // remover red border after retype
    var errorEmpty = "<?php echo $errorEmpty; ?>";
    var errorEmail = "<?php echo $errorEmail; ?>";
    var errorExist = "<?php echo $errorExist; ?>";
    var errorFullname = "<?php echo $errorFullname; ?>";
    var errorPass = "<?php echo $errorPass; ?>";
    var errorGend = "<?php echo $errorGend; ?>";
    if(errorEmail == true){
        $("#form-email").addClass("form-error");
    }else{
        $("#form-email").removeClass("form-error");
    }
    if(errorEmpty == true || errorExist == true){
        $("#form-email, #form-username ").addClass("form-error");
    }if(errorGend == true ){
        $("#form-gender").addClass("form-error"); 
    }
    if(errorPass == true){
        $("#form-password").addClass("form-error");
    }else{
        $("#form-password").removeClass("form-error");
    }
    if(errorFullname == true ){
        $("#form-fullname").addClass("form-error");
    }else{
        $("#form-fullname").removeClass("form-error");
    }
    if(errorEmpty == false  && errorEmail == false && errorExist == false && errorPass == false && errorGend == false ){
        $("#form-display").removeClass("form-error");
        $("#form-email, #form-username,#form-password,#form-fullname,#form-gender").val("");
        setTimeout(function() {
        window.location.replace("login.php");
                }, 1000);                           
    }
</script>