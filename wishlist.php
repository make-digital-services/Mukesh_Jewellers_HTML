<?php
require_once "db.php";
require_once "header.php";
?>
<div class="container-fluid cart-container wishlist">
    <div class="container">
        <div id="wishlist_container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="navigation_container">
                        <ul>
                            <li><a href="order.php"><i class="fa fa-window-maximize" aria-hidden="true"></i>My
                                    Orders</a>
                            </li>
                            <li><a href="myaccount.php"><i class="fa fa-user" aria-hidden="true"></i>My Account</a></li>
                            <li class="active"><a href="#"><i class="fa fa-heart" aria-hidden="true"></i>My Wishlist</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="tab">
                        <div class="tab_heading">
                            <h5 class="mb-0">My Wishlist</h5>
                        </div>
                        <div class="tab_body">
                            <div class="row">
                                <div class="col-md-3">
                                    <img src="images/goldchain.jpg" class="img-fluid" alt="fdf" srcset="">
                                </div>
                                <div class="col-md-9">
                                    <p class="name mt-2">GOLD NECKLACE WITH WHITE STONES</p>
                                    <div class="">
                                        <span class="price d-inline-block">$1520</span>
                                        <span class="final_price d-inline-block">$2520</span>
                                        <span>
                                            <form method="POST">
                                                <input type="hidden" name="id" value="'.$value['id'].'">
                                                <input type="submit" name="removeCartItem" class="remove_btn"
                                                    value="Remove" />
                                            </form>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    require_once "footer.php";
?>