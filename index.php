<?php
     
     if (isset($_SESSION['loginSession'])) {
         header('Location: login.php');//Redirect to login page
     }
    //set active class for register link in header
    $reg = 'active';
    //include header page
    include "header.php";
    
?>
    <div class="container">  
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <div class="bg-register">
                    <form id="register-form" class="reg-form" action="registervalidation.php" method="post">
                            <!-- Avatar Image -->
                            <div class="text-center">
                                    <img  id="avatar" src="img/users.png" alt="User-Image" class="img-responsive center-block" />
                            </div>    
                        <div class="form-group">
                            <!-- Start of input field -->
                            <div class="input-group">
                            <input type="text" class="form-control"  name="username" id="form-username" autocomplete="off"  placeholder="اسم المستخدم" required>
                                <div class="input-group-prepend">
                                    <span class="input-group-text" >
                                        <i class="fas fa-user"></i>
                                    </span>
                                </div> 
                            </div>
                            <!-- End Of input field -->

                            <!-- Start of input field -->
                            <div class="input-group">
                            <input type="text" class="form-control" name="email" id="form-email" placeholder="البريد الالكتروني"   autocomplete="off" required >
                                <div class="input-group-prepend">
                                    <span class="input-group-text" >
                                        <i class="fas fa-at"></i>
                                    </span>
                                </div>
                                
                            </div>
                            <!-- End Of input field -->

                            <!-- Start of input field -->
                            <div class="input-group">
                            <input type="password" class="form-control" name="password" id="form-password" placeholder="الرقم السري" autocomplete="off"  required> 

                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fa-unlock-alt"></i>
                                    </span>
                                </div>
                            </div>
                            <!-- End Of input field -->

                            <!-- Start of input field -->
                            <div class="input-group">
                            <input  type="text" class="form-control" name="fullname" id="form-fullname" placeholder="الاسم بالكامل" autocomplete="off" required> 
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fa-address-card"></i>
                                    </span>
                                </div>
                            </div>
                            <!-- End Of input field -->
                            <div class="input-group">
                                <select class="custom-select" name="gender" id="form-gender"  onchange="changeImage(this)">
                                    <option value="1" disabled selected style="display:none">اختر</option>
                                    <option value="1">ذكر</option>
                                    <option value="2">انثي</option>
                                </select>
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fa-transgender"></i>
                                    </span>
                                </div>
                            </div>
                            
                            <button type="submit" class="btn btn-success" id="form-submit" name="submit" >سجل الآن</button>
                            <div id="form-display" class="text-center register-message"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div> 
<?php
    include 'footer.php';
?>