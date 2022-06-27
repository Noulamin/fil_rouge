<?php
 // header('Clear-Site-Data: "cache", "cookies", "storage", "executionContexts"');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoices | Simple</title>
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
            <div class="d-flex justify-content-between align-items-center border-bottom fw-bold fs-4">
                <p class="">Invoices</p>
            </div>
            <div class="d-flex justify-content-between align-items-center border-2 mt-3 fw-bold">
                <div class="d-flex justify-content-between align-items-center">
                    <p class="m-0">Show</p>
                    <select class="rounded mx-2" name="" id="">
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="75">75</option>
                        <option value="tout">All</option>
                    </select>
                    <p class="m-0">entities</p>
                </div>
            </div>

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

            <div class="table-responsive card mt-3 p-2">
                <table style="overflow: overlay;" class="table table-striped">
                    <thead>
                        <tr class="rounded">
                            <th scope="col">Product</th>
                            <th scope="col">Corporation</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Status</th>
                            <th scope="col">Date</th>
                            <th scope="col" colspan="2"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($liste_of_bills as $key => $value) { ?>
                            <tr>
                                <td><?php echo $value->product; ?></td>
                                <td>
                                    <?php
                                        if(str_contains($value->product, 'requested'))
                                        {
                                            echo substr($value->corporation, 1);
                                        }
                                        else
                                        {
                                            echo $value->corporation; 
                                        }
                                        
                                    ?>
                                </td>
                                <td><?php echo "$".$value->amount; ?></td>
                                <td class="text-danger" >Unpaid</td>
                                <td><?php echo $value->date; ?></td>
                                <td>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn_" data-bs-toggle="modal" data-bs-target="#pay<?= $value->id;?>">
                                        Pay
                                    </button>
                                </td>
                                <!-- BEGIN Modal -->
                                <div class="modal fade" id="pay<?= $value->id;?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">Confirmation</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="<?php echo URL."invoices/pay"; ?>" method="POST">
                                                <p>You sure you want to pay $<?= $value->amount;?> for <?= $value->product;?> ?</p>
                                                <input class="d-none" value="<?= $value->id;?>" name="id" type="text">
                                                <input class="d-none" value="<?= $value->amount;?>" name="amount" type="text">
                                                <input class="d-none" value="<?= $value->product;?>" name="name" type="text">
                                                <input class="d-none" value="<?= $value->corporation;?>" name="corporation" type="text">
                                                <button type="submit" class="btn btn-primary">Pay now</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- END Modal -->
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <?php 
                    if($liste_of_bills == null)
                    {
                        echo "<p class='text-center my-3'>No bills yet</p>";
                    }
                ?>
            </div>
        </div>
    </main>
    <script src="./app\assets\js\main.js"></script>
</body>

</html>