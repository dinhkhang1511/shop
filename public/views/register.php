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
            
            
            <form class="login-form" method="post" action="<?= $_SESSION['SITE_URL'] ?>public/register">
                
                <input type="text" placeholder="Username" name="username" required />
                <input type="email" placeholder="Email" name="email" required />
                <input type="password" style="" placeholder="Password"  name="password" required />
                <input type="password" style="margin-bottom:0;" placeholder="Confirm password"  name="confirm-password" required />
                <input class="submit mt-3" type="submit" name="register" value="Đăng ký" ></input>
                <a class="message" href=" <?= Config::SITE_URL . 'public/login'?>">Quay về</a>
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

