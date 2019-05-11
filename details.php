<?php
session_start(); //start session
require_once "db.php";
require_once "header.php";
$productName= $_GET['name'];
//get product details by name
 $result = $con->query("select * from product where name='$productName'");
 $productData =  mysqli_fetch_assoc($result);
 $productId = $productData['id'];
 $productImages = $con->query("select * from product_image where product_id=$productId");
 $productSpecification = $con->query("select * from `product_specification` where product_id=$productId");
 $relatedProduct = $con->query("SELECT p.`id`, p.`name`,pi.image , p.`price`, p.`discount`, p.`final_price` FROM `product` p LEFT JOIN product_image pi ON p.id=pi.product_id LEFT JOIN related_product rp ON rp.relatedproduct=p.id WHERE rp.product=$productId GROUP BY p.id");


 if(isset($_POST["addToCart"])) { 
     echo "in add to cart";
     $data_array =  array("product_id"=>$productData['id'] );
    $make_call = callAPI('POST', 'addToCart', json_encode($data_array));
    print_r($make_call);
  $response = json_decode($make_call, true);
  if($response['value']){
      $data     = $response['TotalItemsInCart'];
    echo '<script> alert("Product added to Cart");</script>';
  }else{
     $errors = $response['message'];
  }
 }
?>

<div class="container-fluid details-container">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="exzoom hidden" id="exzoom">
                    <div class="exzoom_img_box">
                        <ul class="exzoom_img_ul">
                            <?php
                        while($row = $productImages->fetch_assoc()){
                        echo '<li><img src="'.$row["image"].'" /></li>';
                        }
                        ?>


                        </ul>
                    </div>
                    <div class="exzoom_nav"></div>
                    <p class="exzoom_btn">
                        <a href="javascript:void(0);" class="exzoom_prev_btn"> <i class="fa fa-arrow-left"
                                aria-hidden="true"></i> </a>
                        <a href="javascript:void(0);" class="exzoom_next_btn"> <i class="fa fa-arrow-right"
                                aria-hidden="true"></i> </a>
                    </p>
                </div>
            </div>
            <div class="col-lg-6 product_details">
                <h1><?php echo $productData['name']; ?></h1>
                <!-- <section class="size-box">
                    <span class="size-listed"><select name="" id="">
                            <option value="">Select Size</option>
                            <option value="">SM</option>
                            <option value="">MD</option>
                            <option value="">LF</option>
                            <option value="">XL</option>
                        </select> </span>
                    <span class="size-not-listed"> <a href="javascript:;">Size not listed ?</a> </span>

                </section> -->
                <form method="post">
                    <section class="product-quantity">
                        <span class="qty-select">Qty <input value="1" type="number" min="1"></span>
                        <span class="in-strock"><?php echo $productData['quantity']; ?> In Stock</span>
                    </section>
                    <section class="product-quantity">
                        <span class="qty-select">Price : <?php echo $productData['final_price']; ?></span>
                        <span class="in-strock"><?php echo $productData['price']; ?> </span>
                    </section>
                    <section class="product-buttons">
                        <button type="submit" name="addToCart" class="produnt-details-btn add-to-cart"><i
                                class="fa fa-shopping-bag"></i> Add to
                            cart</button>
                        <button class="produnt-details-btn compare-btn"><i class="fa fa-exchange"></i> Compare</button>
                        <button class="produnt-details-btn wishlist-btn"><i class="fa fa-heart"></i> Wishlist</button>
                    </section>
                    <section class="produnt-spects-container">
                        <h2>Product Details</h2>
                        <ul class="product-specs">

                            <?php
                        while($row = $productSpecification->fetch_assoc()){
                        echo '<li><span>'.$row["key"].'</span>'.$row["value"].'</li>';
                        }
                        ?>

                        </ul>
                    </section>
                </form>
            </div>
        </div>

        <div id="container" class="container">
            <div id="main" role="main">
                <?php 
                if($relatedProduct && $relatedProduct->num_rows>0){
                   echo '<h4>SIMILAR PRODUCTS IN TREND</h4>';
                }
                ?>
                <section class="slider">
                    <div class="flexslider1 carousel">
                        <ul class="slides">
                            <?php
                        while($row = $relatedProduct->fetch_assoc()){
                            echo  '<li><div class="related-pro-outer"><span class="related-pro"> <a href="#"><img src="'.$row["image"].'" /></a></span> </div> </li>';
                        }
                        ?>
                        </ul>
                    </div>
                </section>
            </div>

        </div>

    </div>
</div>


<?php
    require_once "footer.php";
?>

<script src="https://unpkg.com/imagesloaded@4/imagesloaded.pkgd.min.js"></script>
<script src="js/jquery.exzoom.js"></script>
<script type="text/javascript">
$('.container').imagesLoaded(function() {
    $("#exzoom").exzoom({
        autoPlay: false,
    });
    $("#exzoom").removeClass('hidden')
});
</script>
<script type="text/javascript">
$(window).load(function() {
    $('.flexslider1').flexslider({
        animation: "slide",
        animationLoop: false,
        itemWidth: 175,
        itemMargin: 6,
        pausePlay: false,
    });
});
</script>