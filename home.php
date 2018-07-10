<?php

    $lifetime=600;
    session_set_cookie_params($lifetime);
    session_start();
    if(isset($_SESSION['loginSession'])){
        include 'header.php'; 
        ?>
                <div class="container">  
                <div class="row">
                    <div class="col-md-4 offset-md-4">
                        <div class="bg-login">
                            <!-- Avatar Image -->
                            <div class="text-center">
                                    <img  id="avatar" src="img/<?php echo $_SESSION['gender'];?>.png" alt="User-Image" class="avatar-img img-responsive center-block" />
                            </div>
                            <div class="Msg text-center">
                                <h3>مرحباْ بك <br> <span><?php echo $_SESSION['loginSession'] ;?></span> </h3>
                                <p>هذا الموقع تجربة للتحقق من صحة المدخلات في حقول التسجيل بالموقع و الدخول عن طريق استخدام تقنية اجاكس شكرا لزيارتك  </p>
                                <form id="feedback" class="feedback" action="commentvalidation.php" method="post">
                                    <textarea class="form-control" id="teaxtArea" rows="2" placeholder=" ارسل لنا تعليق"></textarea>
                                    <button type="submit" class="btn btn-primary" id="feedback-submit" name="submit"><i class="fa fa-location-arrow fa-lg"></i> ارسال </button>
                                    <div id="form-display" class="text-center register-message"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div> 
        <?php
    }else{
        header('Location: login.php');
        exit();	
    }
    include 'footer.php';




	
?>