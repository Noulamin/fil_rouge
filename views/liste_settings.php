<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings | Simple</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./app/assets/style/dashboard_sidebar.css">
</head>

<body>
    <?php require("side_bar.php"); ?>

    <main class="main">
        <div class="container p-4">
            <div class="d-flex justify-content-between align-items-center border-bottom fw-bold fs-4">
                <p class="">Settings</p>
            </div>
            <?php 
                if(isset($_SESSION["green_message"]))
                {
                    echo "<p class='alert alert-success my-1 text-center';'>".$_SESSION['green_message']."</p>";
                    unset($_SESSION["green_message"]);
                }
            ?>
            <div class="table-responsive custom-table-responsive card mt-3 p-2 d-flex align-items-center">
                <img src="app\image\user.png" style="max-width: 200px;" alt="">
                <form action="<?php echo URL."settings/update"; ?>" method="POST" style="width: 30%">
                    <label for="Username" class="form-label">User name</label>
                    <input type="text" value="<?php echo $_SESSION['user']->username ?>" class="form-control" id="Username" placeholder="Username" name="username">
                    <label for="Full name" class="form-label">Full name</label>
                    <input type="text" value="<?php echo $_SESSION['user']->name ?>" class="form-control" id="Full name" placeholder="Full name" name="fullname">
                    <label for="Email address" class="form-label">Email address</label>
                    <input type="text" value="<?php echo $_SESSION['user']->email ?>" class="form-control" id="Email address" placeholder="Email address" name="email">
                    <label for="Phone number" class="form-label">Phone number</label>
                    <input type="text" value="<?php echo $_SESSION['user']->phone ?>" class="form-control" id="Phone number" placeholder="Phone number" name="phonenumber">
                    <label for="birthday" class="form-label">Birth day</label>
                    <input type="date" value="<?php echo $_SESSION['user']->birth_day?>" class="form-control" id="birthday" name="birthday">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" value="lol" class="form-control" id="password" placeholder="Password" name="Password">
                    <label for="C_password" class="form-label">Confirm password</label>
                    <input type="password" value="lol" class="form-control" id="C_password" placeholder="Confirm password" name="C_password">
                    <button type="submit" class="btn btn-dark mt-2 w-100">Update</button>
                </form>
            </div>
        </div>
    </main>
    <script src="./app\assets\js\main.js"></script>
</body>
</html>