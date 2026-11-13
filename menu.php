                            <div class="main-menu-area">
                                <nav class="navbar navbar-expand-lg align-items-start">
                                    <div class="collapse navbar-collapse align-items-start collapse" id="karl-navbar">
                                        <ul class="navbar-nav animated" id="nav">
                                            <li class="nav-item active"><a class="nav-link" href="index.php">Home</a></li>
                                            <li class="nav-item active"><a class="nav-link" href="about.php">About</a></li>
                                            <li class="nav-item dropdown">
                                                <a class="nav-link dropdown-toggle" href=" " id="karlDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Product</a>
                                                <div class="dropdown-menu" aria-labelledby="karlDropdown">
                                                    <a class="dropdown-item" href="product.php">Product</a>
                                                    <a class="dropdown-item" href="cart.php">Cart</a>
                                                    <a class="dropdown-item" href="checkout.php">Checkout</a>
                                                </div>
                                            </li>
                                            <?php 
                                                if(isset($_SESSION['snrm9427_ecommerce']))
                                                {
                                                    ?>
                                                    <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
                                                    <?php
                                                }
                                                else
                                                {
                                                    ?>
                                                   <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
                                                    <?php
                                                }
                                                ?>
                                              <li class="nav-item"><a class="nav-link" href="register.php">Register</a></li>
                                        </ul>
                                    </div>
                                </nav>
                            </div>
                           