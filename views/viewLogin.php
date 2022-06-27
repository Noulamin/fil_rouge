<!DOCTYPE html>
<html lang="fr">
    <?php
        //header('Clear-Site-Data: "cache", "cookies", "storage", "executionContexts"');
    ?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./app/assets/style/login.css">
    <title>Login | Simple</title>
</head>
<body>
    <main class="container">
        <div class="row justify-content-center">
            <div id="item" class="col-lg-4 col-md-6 col-sm-8 col-9 lol rounded">
                
                <img src="./app/image/logo.png" alt=""> <br>
                
                <?php if($status != ''): ?>
                    <?php
                        if(isset($_SESSION["red_message"]))
                        {
                            echo "<p class='alert alert-danger my-1 text-center'>".$_SESSION['red_message']."</p>";
                            unset($_SESSION["red_message"]);
                        }
                        if(isset($_SESSION["green_message"]))
                        {
                            echo "<p class='alert alert-success my-1 text-center'>".$_SESSION['green_message']."</p>";
                            unset($_SESSION["green_message"]);
                        }
                    ?>
                    <p id="warning" class="alert alert-danger mb-4 w-100 text-center"><?=$status; ?></p>
                <?php endif ?>



                <form action="<?php echo URL."login" ?>" method="POST" onsubmit="return check_sign_in()">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control form-control-lg" id="username" name="username">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control form-control-lg" id="password" name="password">
                    </div>
                    <div class="">
                        <button class="btn btn-primary w-100" type="submit">Login</button> <br>
                        <div class="d-flex justify-content-between">
                            <a href="" id="forget">Forget password ?</a>
                            <a class="color-primary" style="text-decoration: none;" href="<?php echo URL."started" ?>">Get started</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <script src="./app\assets\js\js.js"></script>
</body>
</html>