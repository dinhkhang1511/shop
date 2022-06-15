<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Login</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link href="<?= $_SESSION['SITE_URL'] . '/public/css/login.css' ?>" rel="stylesheet">

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">
    <div class="login-page">
        

        <div class="form">
            <?php if(isset($_SESSION['user'])): ?>
            <script>window.location=' <?= $_SESSION['SITE_URL'] .'public/admin' ?> ';</script>;
            
            <?php endif; ?>

            <?php if(isset($_SESSION['error'])):
                $message = $_SESSION['error'] ?>
            <div class="alert alert-danger alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong><?= $message ?></strong>
            </div>
            <?php endif; ?>
            <?php if(isset($_SESSION['success'])):
                $message = $_SESSION['success'] ?>
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong><?= $message ?></strong>
            </div>
            <?php endif; ?>

            
            <form class="login-form" method="post" action="<?= $_SESSION['SITE_URL'] ?>public/login">
                <input type="text" placeholder="Username" name="username"/>
                <input type="password" style="margin-bottom:0;" placeholder="Password"  name="password"/>
                <input class="submit" type="submit" name="login" value="Login" ></input>
                <div class="float-left">
                <label class="d-block message position-relative">
                    Nhớ mật khẩu
                    <input class="float-left" type="checkbox" name="remember-me" >
                </label>
                </div>
                <a class="float-right message" href="<?= Config::SITE_URL . 'public/register' ?> "> Không phải thành viên ? </a>
            </form>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js?fbclid=IwAR3Bk9QbxEg0w7GQWUS76e_StOdgxU0joSzHiENkwk4JX2nRW5UTs6uNSV0" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"crossorigin="anonymous"></script>
    <script>
        $('.message a').click(function(){
              $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
        });
    </script>
    
    </body>
</html>

<?php 
    unset($_SESSION['error']);
    unset($_SESSION['success']);

?>