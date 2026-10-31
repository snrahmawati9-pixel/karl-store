<header class="header_area">
            <!-- Top Header Area Start -->
            <div class="top_header_area">
                <div class="container h-100">
                    <div class="row h-100 align-items-center justify-content-end">

                        <div class="col-12 col-lg-7">
                            <div class="top_single_area d-flex align-items-center">
                                <!-- Logo Area -->
                                <div class="top_logo">
                                    <a href="#"><img src="img/core-img/logo.png" alt=""></a>
                                </div>
                                <!-- Cart & Menu Area -->
                                <div class="header-cart-menu d-flex align-items-center ml-auto">
                                    <!-- Cart Area -->
                                  <div class="cart">
                                        <a href="#" id="header-cart-btn" target="_blank"><span class="cart_quantity"><<?php echo count($_SESSION['myCart'] ?? []); ?></span> <i class="ti-bag"></i> Your Bag</a>
                                            <?php $total = 0; ?>
                                            <ul class="cart-list">
                                                <?php 
                                                foreach (($_SESSION['myCart'] ?? []) as $productId => $jmlOrder)
                                                {
                                                $product=mysqli_query($con, "select * from product where product_id = '".$productId."'");
                                                $rowProduct=mysqli_fetch_array($product);
                                                ?>
                                                    <li>
                                                        <a href="#" class="image"><img src="product/<?php echo $rowProduct['product_gambar']?>" class="cart-thumb" alt=""></a>
                                                        <div class="cart-item-desc">
                                                            <h6><a href="#"><?php echo $rowProduct['product_nama']?></a></h6>
                                                            <p><?php echo $jmlOrder; ?>x - <span class="price"><?php echo "Rp ". number_format($rowProduct['product_harga'], 0, ",", "."); ?></span></p>
                                                            <?php 
                                                            $subtotal=$jmlOrder*$rowProduct['product_harga'];
                                                            @$total+=$subtotal;
                                                            ?>
                                                        </div>
                                                    </li>
                                                    <?php
                                                }
                                                ?>
                                                    <li class="total">
                                                        <span class="pull-right">Total:<?php echo "Rp ". number_format(@$total, 0, ",", "."); ?></span>
                                                            <a href="cart.php" class="btn btn-sm btn-cart">Cart</a>
                                                            <a href="index.php" class="btn btn-sm btn-checkout">Order Lagi</a>
                                                    </li>
                                                </ul>
                                 </div>
                                    <div class="header-right-side-menu ml-15">
                                        <a href="#" id="sideMenuBtn"><i class="ti-menu" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <!-- Top Header Area End -->
            <div class="main_header_area">
                <div class="container h-100">
                    <div class="row h-100">
                        <div class="col-12 d-md-flex justify-content-between">
                            <!-- Header Social Area -->
                            <div class="header-social-area">
                                <a href="#"><span class="karl-level">Share</span> <i class="fa fa-pinterest" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                            </div>
                            <!-- Menu Area -->
                            <?php require_once 'menu.php' ?>
                            <!-- Help Line -->
                            <div class="help-line">
                                <a href="tel:+346573556778"><i class="ti-headphone-alt"></i> +62 8512 3556 778</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>