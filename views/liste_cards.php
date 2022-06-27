<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cards | Simple</title>
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
        <div class="Container p-4 ">
            <div class="d-flex justify-content-between border-bottom fw-bold fs-4"> 
                <p class="">Cards</p>
            </div>
            <div class="card mt-3 p-2">
                <div class="d-flex flex-wrap">
                    <div class="col-sm-4 m-3">
                        <div class="card">
                            <div class="card-body fs-5 p-4">
                                <div class="d-flex justify-content-between text-dark fw-bold">
                                    <p>
                                        Bank of Morocco
                                    </p>
                                    <p>
                                        *9324
                                    </p>
                                </div>
                                <div class="d-flex justify-content-between text-dark fw-bold">
                                    <p class="m-0 mt-3">
                                        Checking
                                    </p>
                                    <p class="m-0 mt-3">
                                        Visa card
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 m-3">
                        <div class="card">
                            <div class="card-body fs-5 p-4">
                                <div class="d-flex justify-content-between text-dark fw-bold">
                                    <p>
                                        Bank of Morocco
                                    </p>
                                    <p>
                                        *9324
                                    </p>
                                </div>
                                <p class="m-0 mt-3">
                                    Checking
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 m-3">
                        <div class="card">
                            <div class="card-body fs-5 p-4">
                                <div class="d-flex justify-content-between text-dark fw-bold">
                                    <p>
                                        Bank of Morocco
                                    </p>
                                    <p>
                                        *9324
                                    </p>
                                </div>
                                <p class="m-0 mt-3">
                                    Checking
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 m-3 d-flex justify-content-center align-items-center">
                        <!-- Button trigger modal -->
                        <button type="button" class="" data-bs-toggle="modal" data-bs-target="#staticBackdrop" style="border:none; background: none;">
                            <img src="app\image\plus.png" style="max-width: 75px;" alt="">
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Request Card</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <select class="form-select" aria-label="Default select example">
                    <option value="1">Visa card</option>
                    <option value="2">Master card</option>
                </select>
                <input class="form-control my-3" type="text" name="" id="" placeholder="Card number">
                <input class="form-control my-3" type="text" name="" id="" placeholder="Name on the card">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Add card</button>
            </div>
            </div>
        </div>
        </div>
    </main>
    <script src="./app\assets\js\main.js"></script>
</body>
</html>