<?php $file_name = basename($_SERVER['SCRIPT_FILENAME'],".php") ?>
<nav class="navbar navbar-expand-lg navbar-light bg-light p-3">
        <div class="container">
            <a class="navbar-brand font-weight-bold text-uppercase" href="index.php">PòngPông Shop</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto font-weight-bold">
                    <li class="nav-item" <?php echo $file_name == 'cart' ? 'active' : '' ?>>
                        <a class="nav-link" href="cart.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart items</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>