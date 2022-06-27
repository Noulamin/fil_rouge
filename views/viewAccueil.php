<?php 
   // header('Clear-Site-Data: "cache", "cookies", "storage", "executionContexts"');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./app/assets/style/accueil.css">
    <title>Home | Simple</title>
</head>
<body>
    <header class="d-flex justify-content-between align-items-center">
        <div><img class="mx-4" id="logo" src="./app/image/logo.png" alt="logo"></div>
        <div class="d-flex">
            <a href="<?php echo URL."login"; ?>"><div id="login">Login</div></a>
            <a href="<?php echo URL."started"; ?>"><div id="get_started">Get started</div></a>
        </div>
    </header>
    <main>
        <div class="d-flex justify-content-between">
            <div class="left_cont">
                <h1 class="fw-bolder">Banking & <br> budgeting, made <br> Simple</h1> 
                <p class="">Master your money with one easy app.</p>
                <a href="<?php echo URL."started"; ?>"><div class="text-center" id="get_started">Get started</div></a>
                <p class="">Already a customer? <a href="<?php echo URL."login"; ?>">Login here.</a></p>
            </div>
            <img class="simple_img" src="./app/image/Simple_bank.png" alt="">
        </div>
    </main>
    <footer>
        @2022 Simple bank all rights reserved.
    </footer>
</body>
</html>