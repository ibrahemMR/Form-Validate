<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Validation Login & Register Form with Ajax</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="js/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="style/all.css">
    <link rel="stylesheet" href="style/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Cairo|Indie+Flower" rel="stylesheet">
    <link rel="stylesheet" href="style/style.css">
    <script>
           
             //change Avatar image if user change gender :D 
             function changeImage(Option) {
                    if (Option.value == "1") {
                        $('#avatar').attr('src','img/user.png');
                    } else if (Option.value == "2"){
                        $('#avatar').attr('src','img/user2.png');
                    }else{
                        $('#avatar').attr('src','img/users.png');
                    }
                }
    </script>    
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <span class="navbar-brand mb-0 h1">
               <?php 
                    if(isset($_SESSION['loginSession'])){ 
                            echo '<i class="fa fa-bong fa-lg"></i> Ajax Trainning';
                    }else{
                        echo '<i class="fa fa-home fa-lg"></i> Ibram.me';
                    }
               ?>
            </span>
            <div class="collapse navbar-collapse " id="navbarTogglerDemo01">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <?php
                    if(isset($_SESSION['loginSession'])){ ?>
                    <li class="nav-item">
                        <a class="nav-link" href="home.php"><i class="fa fa-home fa-lg"></i> الرئيسية </a>
                    </li>
                  <?php  }?>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                     <?php 
                    if(isset($_SESSION['loginSession'])){
                        echo '<li class="nav-item"><a class="nav-link $reg " href="logout.php"><i class="fa fa-sign-out-alt fa-lg"></i> خروج </a>
                   </li>';
                    }else{
                        ?>
                    <li class="nav-item">
                         <a class="nav-link <?php if(isset($reg)) echo $reg; ?>" href="index.php"><i class="fa fa-user-plus fa-lg"></i> التسجيل </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if(isset($log)) echo $log; ?> " href="login.php"> <i class="fa fa-sign-in-alt fa-lg"></i> الدخول </a>
                    </li>
                    <?php }
                    ?>
                    
                </ul>
            </div>
        <div>
    </nav>