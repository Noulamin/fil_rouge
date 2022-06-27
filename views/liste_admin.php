<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Simple</title>
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
                <p class="">Admin</p>
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
                            <th scope="col">User name</th>
                            <th scope="col">Name</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Status</th>
                            <th scope="col">Email</th>
                            <th scope="col">Birth day</th>
                            <th scope="col">Phone</th>
                            <th scope="col" colspan="2"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($liste_of_requests as $key => $value) { ?>
                            <tr>
                                <td><?php echo $value->username; ?></td>
                                <td><?php echo $value->name; ?></td>
                                <td><?php echo $value->gender; ?></td>
                                <td class="text-danger">Unverified</td>
                                <td><?php echo $value->email; ?></td>
                                <td><?php echo $value->birth_day; ?></td>
                                <td><?php echo $value->phone; ?></td>
                                <td>
                                    <form action="<?php echo URL."admin/active"; ?>" method="POST">
                                        <input class="d-none" name="id" type="text" value="<?php echo $value->id; ?>">
                                        <button type="submit" class="btn_">
                                            Activate
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <?php 
                    if($liste_of_requests == null)
                    {
                        echo "<p class='text-center my-3'>No requests yet</p>";
                    }
                ?>
            </div>
        </div>
    </main>
    <script src="./app\assets\js\main.js"></script>
</body>
</html>