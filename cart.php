<?php
    session_start();

    if(isset($_POST['submit'])){
        session_destroy();
        echo '<script>alert("Your cart is empty")</script>'; 
        header("Refresh:0; url=index.php");
    }

    if(!isset($_SESSION['price'])) {
        $_SESSION['price'] = 10;
    }
    if(!isset($_SESSION['sum'])) {
        $_SESSION['sum'] = 0;
    }

    if(isset($_POST['amount'])){
        $_SESSION['pen_amount'] += $_POST['amount'];
        if(isset($_SESSION['stock'])){
            $_SESSION['stock'] -= $_SESSION['pen_amount'];
        }
        $_SESSION['sum'] = $_SESSION['pen_amount'] * $_SESSION['price'];
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
            <div class="col-md-12 text-center">
                <p class="h1 font-weight-bold text-uppercase p-5">- Cart Items -</p>
            </div>
        </div>
        <?php if($_SESSION['pen_amount'] > 0) { ?>
        <table class="table table-bordered text-center">
            <thead>
                <tr class="align-middle">
                    <th scope="col"></th>
                    <th scope="col" colspan="2">Product</th>
                    <th scope="col">price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Total</th>
                </tr>
            </thead>
            <tbody>
                <tr> 
                    <form method="post">
                        <td class="h3 align-middle">
                            <input type="submit" id="submit" name="submit" class="btn btn-danger" value="Delete">
                        </td>
                    </form>
                    <td colspan="2"><img class="img-size rounded" src="https://images.unsplash.com/photo-1565359184520-fcff70f99c24?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80" alt="Product"></td>
                    <td class="h5 align-middle"><?= $_SESSION['price'] ?></td>
                    <td class="h5 align-middle"><?= $_SESSION['pen_amount'] ?></td>
                    <td class="h5 align-middle"><?= $_SESSION['sum'] ?></td>
                </tr>
            </tbody>
        </table>
        <?php } else { 
                echo '<script>alert("Your cart is empty")</script>'; 
                header("Refresh:0; url=index.php");
        
        } ?>
    </div>
    <?php include_once('common/script/script.inc.php') ?>
</body>
</html>