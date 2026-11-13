<section class="offer_area height-700 section_padding_100 bg-img" style="background-image: url(img/bg-img/bg-5.jpg);">
            <div class="container h-100">
                <div class="row h-100 align-items-end justify-content-end">
                    <div class="col-12 col-md-8 col-lg-6">
                        <div class="offer-content-area wow fadeInUp" data-wow-delay="1s">
                            <h2>White t-shirt <span class="karl-level">Hot</span></h2>
                            <p>* Free shipping until 25 Jan 2027</p>
                            <div class="offer-product-price">
                                <h3><span class="regular-price">Rp250.900</span> Rp150.000</h3>
                            </div>
                            <?php
                                $k = mysqli_fetch_array(mysqli_query($con, "select product_id from product where product_nama='Kaos Putih' limit 1"));
                                $idPromo = $k['product_id'] ?? '';
                                ?>
                            <a href="detail_product.php?id=P26111001" class="btn karl-btn">Shop Now</a>
                        </div>
                    </div>
                </div>
            </div>
</section>