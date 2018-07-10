<?php
    include "includes/dbc.php";
    if(isset($_POST['submit'])){
        if ( isset( $_POST['username'] ) ){
            $username = strip_tags( trim( $_POST['username'] ) );
        }

        if ( isset( $_POST['password'] ) ){
            $password = strip_tags( trim( $_POST['password'] ) );
        }
        
        $hashpass = sha1($password);

        $errorEmpty = false;
        $errorData = false;
        $success = false;
        //login with username or email :D 
        $stmt = $con->prepare("SELECT * FROM arusers WHERE ( username = ? OR email = ? )and password = ? LIMIT 1");
        $stmt->execute(array($username,$username,$hashpass));
        $row = $stmt->fetch();
	    $cont= $stmt->rowCount();
        
        if (empty($username) || empty($password)){
            echo "<p class='alert alert-danger'><i class='fa fa-exclamation-triangle'></i> Wrong Username Or Password!</p>";
            $errorEmpty = true;
        }elseif($cont == 0){
            echo  "<p class='alert alert-danger'><i class='fa fa-exclamation-triangle'></i> خطأ في اسم السمتخدم او كلمة المرور</p>";
            $errorData = true;
        }else{
            session_start();
              //store Fullname from database as login session		
            $_SESSION['loginSession'] = $row['fullName'];//Register new session name
            $_SESSION['ID'] = $row['id'];//register session ID
            $_SESSION['gender'] = $row['gender'];//User Gender
            $success = true;    
        }
    }else{
        echo "Ops Error :( ";
    }
?>
    <script>
    $("#login-password , #login-username").removeClass("form-error"); // remover red border after retype
    var errorEmpty  = "<?php echo $errorEmpty; ?>";
    var errorData   = "<?php echo $errorData; ?>";
    var success     = "<?php echo $success; ?>";
    if(errorEmpty == true){
        $("#login-username, #login-password").addClass("form-error");
    }else{
        $("#login-password, #login-username").removeClass("form-error");
    }
    if(errorData == true){
        $("#login-username, #login-password").addClass("form-error");
    }else{
        $("#login-password, #login-username").removeClass("form-error");
    }
    if(success == true){
        window.location.replace("home.php");
    }
    
    </script>