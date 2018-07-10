<?php 
    session_start();
    include "includes/dbc.php";
    if(isset($_SESSION['loginSession'])){
        $userID =  $_SESSION['ID'];
        if(isset($_POST['submit'])){
            // $_SESSION['ID']
            if (isset( $_POST['feedcomment']) && !empty($_POST['feedcomment'])){
                $comment = strip_tags( trim( $_POST['feedcomment'] ) );
                $stmt = $con->prepare("SELECT * FROM arusers WHERE id = ? LIMIT 1");
                $stmt->execute(array($userID));
                $cont= $stmt->rowCount();
                if($cont > 0){
                    $stmt = $con->prepare("UPDATE arusers SET comment = ? WHERE id = ? ");
                    $stmt->execute(array($comment,$userID));
                        echo "<p class='alert alert-success'><i class='fa fa-heart fa-lg'></i> شكراً لك! </p>";
                }else{
                    echo "<p class='alert alert-danger'> خطأ في النظام  !!</p>";
                }
            }else{
                    echo "<p class='alert alert-danger'> برجاء كتابة تعليق اولاً <i class='fa fa-exclamation-triangle fa-lg'></i></p>";
            }
        }


    }else{
        header('location: login.php');
    }

?>
<script>
    $('#teaxtArea').val('');
</script>