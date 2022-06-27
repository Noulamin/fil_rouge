<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap');

    *{
        font-family: 'Poppins', sans-serif;
        font-weight: bolder;
    }
</style>

<head>
    <link rel="icon" href="app\image\simple_.jpg">
</head>

<header>
        <div class="side__bar p-0 d-flex flex-column justify-content-start">
            <div class="logo d-flex flex-column justify-content-center align-items-center">
                <a class="logo-1" href="<?php echo URL; ?>"><img src="<?php echo URL."app\image\logo.png"?>" width="180px" alt="logo"></a>
            </div>
            <nav class="mt-0 mt-5">
                <ul class="p-0">
                    <li class="ms-0 mb-2 me-3 nav-item
                        <?php if(isset($_SESSION['link']) && $_SESSION['link'] == 'Dashboard') echo 'link__active' ?> 
                        d-flex justify-content-start align-items-center">
                        <a title="Dashboard" href="<?php echo URL; ?>"
                            class="nav-link me-2 d-flex justify-content-center align-items-center gap-3">
                            <img src="<?php echo URL."app/image/home.png"?>" width="30" alt="Dashboard">
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="ms-0 mb-2 me-3 nav-item
                        <?php if(isset($_SESSION['link']) && $_SESSION['link'] == 'transaction') echo 'link__active' ?> 
                        d-flex justify-content-start align-items-center">
                        <a title="transactions" href="<?php echo URL."transactions"; ?>"
                            class="nav-link me-2 d-flex justify-content-center align-items-center gap-3">
                            <img src="<?php echo URL."app/image/transactions.png"?>" width="30" alt="transactions">
                            <span>Transactions</span>
                        </a>
                    </li>
                    <li class="ms-0 mb-2 me-3 nav-item
                        <?php if(isset($_SESSION['link']) && $_SESSION['link'] == 'invoices') echo 'link__active' ?> 
                        d-flex justify-content-start align-items-center">
                        <a title="invoices" href="<?php echo URL."invoices"; ?>"
                            class="nav-link me-2 d-flex justify-content-center align-items-center gap-3">
                            <img src="<?php echo URL."app/image/invoices.png"?>" width="30" alt="invoices">
                            <span>Invoices</span>
                        </a>
                    </li>
                    <li class="ms-0 mb-2 me-3 nav-item
                        <?php if(isset($_SESSION['link']) && $_SESSION['link'] == 'cards') echo 'link__active' ?> 
                        d-flex justify-content-start align-items-center">
                        <a title="cards" href="<?php echo URL."cards"; ?>"
                            class="nav-link me-2 d-flex justify-content-center align-items-center gap-3">
                            <img src="<?php echo URL."app/image/cards.png"?>" width="30" alt="cards">
                            <span>Cards</span>
                        </a>
                    </li>
                    <li class="ms-0 mb-2 me-3 nav-item
                        <?php if(isset($_SESSION['link']) && $_SESSION['link'] == 'settings') echo 'link__active' ?> 
                        d-flex justify-content-start align-items-center">
                        <a title="settings" href="<?php echo URL."settings"; ?>"
                            class="nav-link me-2 d-flex justify-content-center align-items-center gap-3">
                            <img src="<?php echo URL."app/image/settings.png"?>" width="30" alt="settings">
                            <span>Settings</span>
                        </a>
                    </li>
                    <li class="<?php if($_SESSION['user']->role == "user"){echo "d-none ";} ?>ms-0 mb-2 me-3 nav-item
                        <?php if(isset($_SESSION['link']) && $_SESSION['link'] == 'admin') echo 'link__active' ?> 
                        d-flex justify-content-start align-items-center">
                        <a title="admin" href="<?php echo URL."admin"; ?>"
                            class="nav-link me-2 d-flex justify-content-center align-items-center gap-3">
                            <img src="<?php echo URL."app/image/manager.png"?>" width="30" alt="settings">
                            <span>Admin</span>
                        </a>
                    </li>
                    <li class="ms-0 mb-2 me-3 nav-item d-flex justify-content-start align-items-center">
                        <a title="LogOut" href="<?php echo URL."logout"; ?>"
                            class="nav-link me-2 d-flex justify-content-center align-items-center gap-3">
                            <img src="<?php echo URL."app/image/svg/logout.png"?>" width="30" alt="logout">
                            <span>LogOut</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
        <nav class="nav__bar d-flex justify-content-between px-4 align-items-center">
            
            <div class="d-flex">
                <div class="toogle pointer d-flex">
                    <img src="<?php echo URL."app/image/svg/toogle.svg"?>" alt="toogle">
                </div>
                <input class="input_search " type="text" placeholder="Search">  
                <a href="">
                    <img class="input_button" src="app\image\search.png" alt="">
                </a>
            </div>
           
            <div class="item-admin d-flex justify-content-between gap-3 align-items-center">
                <a class="adminName nav-link text-black pointer m-0">
                    <img class="mx-3" src="<?php echo URL."app/image/user.png"?>" width="44px" height="44px" alt="user">
                    <span><?php echo $_SESSION['user']->name; ?></span>
                </a>
                <a href="<?php echo URL."settings"; ?>">
                    <img src="<?php echo URL."app/image/svg/param.svg"?>" alt="param">
                </a>
            </div>
        </nav>

        <div class="modal fade" id="request_from" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Request from</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <p class="d-flex m-0 mt-3 justify-content-center" id="warning__" ></p>
                <div class="modal-body">
                    <form action="<?php echo URL."dashboard/request"; ?>" method="POST" onsubmit="return modal_validation_2()">
                        <div class="mb-3">
                            <label for="recipient__" class="form-label">From</label>
                            <select id="recipient__" class="form-control form-control-lg" name="recipient">
                                <?php foreach ($all_users as $key => $value){?>
                                <option value="<?php echo $value->id; ?>"><?php echo $value->name; ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="amount" class="form-label">Amount</label>
                            <input type="text" class="form-control" id="amount__" name="amount">
                        </div>

                        <button type="submit" class="btn btn-primary">Send</button>
                    </form>
                </div>
            </div>
        </div>
</header>

