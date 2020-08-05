<?php
    session_start();
    // session_destroy();
    $_SESSION['stock'] = 10;

    if(!isset($_SESSION['pen_amount'])) {
        $_SESSION['pen_amount'] = 0;
    }

    if(isset($_SESSION['pen_amount'])) {
        $_SESSION['stock'] -= $_SESSION['pen_amount'];
        if($_SESSION['stock'] == 0) {
            echo '<script>alert("Out of stock");</script>';
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PòngPông Shop</title>
    <?php include_once('common/style/style.inc.php') ?>
</head>
<body>
    <?php include_once('common/layouts/navbar.inc.php') ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12 d-flex justify-content-center pt-5 pb-5">
                <p class="h1 font-weight-bold p-5 text-uppercase">- Products -</p>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <div class="card h-100">
                    <div class="warpper-card-img">
                        <img class="img-fluid rounded" src="https://images.unsplash.com/photo-1565359184520-fcff70f99c24?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80" alt="Product">
                    </div>
                    <form action="cart.php" method="post">
                        <div class="card-body">
                            <p class="h5 font-weight-bold">Pencils</p>
                            <p class="h6">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                            <p class="h6 font-weight-bold">Price : 10 Bath</p>
                            <p id="stock" class="h6 text-success text-center pt-3"><?= $_SESSION['stock'] ?> Left in stock</p>

                            <?php if($_SESSION['stock'] != 0) { ?>
                            <div class="justify-content-center pt-4">
                                <!-- <button class="btn btn-outline-danger font-weight-bold button" type="button" name="button">-</button> -->
                                <div class="form-group row">
                                    <label for="amount" class="h6 col-sm-4 text-center">Amount</label>
                                    <div class="col-sm-8">
                                        <input class="form-control" type="number" id="amount" name="amount" value="1" min="0" max="<?= $_SESSION['stock'] ?>">
                                    </div>
                                </div>
                                <!-- <button class="btn btn-outline-primary font-weight-bold button" type="button" name="button">+</button> -->
                            </div>
                            <div class="p-3">
                                <button type="submit" id="submit" class="btn btn-primary btn-block">Add to cart</button>
                            </div>
                            <?php } else { echo ''; } ?>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php include_once('common/script/script.inc.php') ?>
</body>
</html>