<!DOCTYPE html>
<html lang="fr">
    <?php
        // header('Clear-Site-Data: "cache", "cookies", "storage", "executionContexts"');
    ?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./app/assets/style/login.css">
    <title>Started | Simple</title>
</head>
<body>
    <main class="container">
        <div class="row justify-content-center">
            <div id="item" class="col-sm-8 col-9 lol_ rounded">
                
                <img src="./app/image/logo.png" alt=""> <br>
                <p class="text-center m-0">Account creation request</p>

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
                <p id="warning"></p>

                <form action="<?php echo URL."started" ?>" method="POST" onsubmit="return check_sign_up()">

                    <div class="row">
                        <div class="col border-0 p-2 ">
                            <input type="text" class="form-control" placeholder="First name" aria-label="First name" name="first" id="first">
                        </div>
                        <div class="col border-0 p-2">
                            <input type="text" class="form-control" placeholder="Last name" aria-label="Last name" name="last" id="last">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col border-0 p-2">
                            <input type="text" class="form-control" placeholder="User name" aria-label="User name" name="name" id="username">
                        </div>
                        <div class="col border-0 p-2">
                            <input type="text" class="form-control" placeholder="Email address" aria-label="Email address" name="email" id="email">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col border-0 p-2">
                            <input type="phone" class="form-control" placeholder="Phone number" aria-label="Phone number" name="phone" id="phone">
                        </div>
                        <div class="col border-0 p-2">
                            <input type="date" class="form-control" placeholder="Birth day" aria-label="Birth day" name="birthday" id="birthday">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col border-0 p-2">
                            <select class="form-select" aria-label="Gender" name="gender" id="gender">
                                <option value="">Gender ?</option>
                                <option value="homme">Male</option>
                                <option value="femme">Female</option>
                            </select>
                        </div>
                        <div class="col border-0 p-2">
                            <select class="form-select" aria-label="maried" name="maried" id="maried">
                                <option value="">Married ?</option>
                                <option value="yes">Yes</option>
                                <option value="no">No</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col border-0 p-2">
                            <input type="password" class="form-control" placeholder="Password" aria-label="password" name="password" id="password">
                        </div>
                        <div class="col border-0 p-2">
                            <input type="password" class="form-control" placeholder="Confirm password" aria-label="password" name="c_password" id="c_password">
                        </div>
                    </div>

                    <div class="">
                        <button class="btn btn-primary w-100 mt-3" type="submit">Send</button> <br>
                        <div class="d-flex justify-content-between">
                            <a href="" id="forget">Forget password ?</a>
                            <a class="color-primary" style="text-decoration: none;" href="<?php echo URL."login" ?>">Login</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <script src="app\assets\js\js.js"></script>
</body>
</html>