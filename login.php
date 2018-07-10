<?php
    session_start();
    if(isset($_SESSION['loginSession'])){
        header('Location: home.php');
        exit();
    }else{
        $log= "active";
    include "header.php"; 
?>
<div class="container">  
    <div class="row">
        <div class="col-md-4 offset-md-4">
            <div class="bg-login">
                <form id="login-form" class="reg-form" action="loginValidation.php" method="post">
                        <!-- Avatar Image -->
                        <div class="text-center">
                                <img  id="avatar" src="img/users.png" alt="User-Image" class="img-responsive center-block" />
                        </div>    
                    <div class="form-group">
                        <!-- Start of input field -->
                        <div class="input-group">
                        <input type="text" class="form-control"  name="username" id="login-username" placeholder=" اسم المستخدم او البريد الالكتروني" autocomplete="off" required>
                            <div class="input-group-prepend">
                                <span class="input-group-text" >
                                    <i class="fas fa-user"></i>
                                </span>
                            </div> 
                        </div>
                        <!-- End Of input field -->

                        <!-- Start of input field -->
                        <div class="input-group">
                        <input type="password" class="form-control" name="password" id="login-password" placeholder="كلمة المرور" required>
                            <div class="input-group-prepend">
                                <span class="input-group-text" >
                                    <i class="fas fa-lock"></i>
                                </span>
                            </div>
                            
                        </div>
                        <!-- End Of input field -->
                        
                        <button type="submit" class="btn btn-primary" id="login-submit" name="submit" > دخول </button>
                        <div id="form-display" class="text-center login-message"></div>
                    </div>
                </form>
            </div>
        </div>
    </div> 


<?php

include "footer.php";
}    
?>