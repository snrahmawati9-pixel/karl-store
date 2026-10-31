 <div class="cart">
        <a href="#" id="header-cart-btn" target="_blank"><span class="cart_quantity"><?php echo count(@$_SESSION['myCart']); ?></span> <i class="ti-bag"></i> Your Bag</a>
                                        <!-- Cart List Area Start -->
            <ul class="cart-list">
                <?php 
                foreach (@$_SESSION['myCart'] as $productId => $jmlOrder)
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
                            <a href="checkout-1.html" class="btn btn-sm btn-checkout">Checkout</a>
                    </li>
                </ul>
 </div>