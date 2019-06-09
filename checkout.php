<?php
require_once "db.php";
require_once "header.php";
?>
<div class="container-fluid details-container" id="checkout">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-7">
                <div class="checkout_container">
                    <?php if(isset($userdata)){}else{?>
                        <div class="login_container tab">
                        <div class="tab_heading active">
                            <h5>Log In or Sign Up</h5>
                        </div>
                        <div class="tab_body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="errors">
                                    </div>
                                    <form method="post" id="checkout-login-form">
                                        <div class="form-group">
                                            <input type="text" id="username" name="username" class="form-control"
                                                placeholder="username" required>
                                        </div>
                                        <div class="form-group ">
                                            <input type="password" id="password" name="password" class="form-control"
                                                placeholder="password" required>
                                        </div>
                                        <div class="form-group ">
                                            <button type="submit" id="login" class="btn login_btn">LOGIN</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-md-6">
                                    <div class="login_with_social text-center">
                                        <a href="http://" class="facebook"><i class="fa fa-facebook"></i>Facebook</a>
                                        <a href="http://" class="google"><i class="fa fa-google-plus"></i>Google</a>
                                    </div>
                                    <div class="signup_btn-container ">
                                        <button type="submit" id="signup" class="btn signup_btn" class="google">CREATE
                                            ACCOUNT</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                  <?php  }?>
                    

                  <?php if(isset($userdata)){?>
                        <div class="delivery_address_container tab">
                        <div class="tab_heading disactive">
                            <h5>Delivery Address</h5>
                        </div>
                        <div class="tab_body">
                            <div class="errors">
                            </div>
                            <form action="" method="post" id="deliveryaddressform">
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="text" id="name" value="<?php echo $userdata['name']; ?>" name="name" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="">Address</label>
                                            <textarea rows="4" required name="shippingaddress" class="form-control"
                                                cols="50"><?php echo $userdata['shippingaddress']; ?></textarea>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="">Pin Code</label>
                                            <input type="text" value="<?php echo $userdata['shippingpincode']; ?>" name="shippingpincode" id="pin" class="form-control" required>
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group mb-4">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="">City</label>
                                            <input type="text" value="<?php echo $userdata['shippingcity']; ?>" name="shippingcity" id="city" class="form-control" required>
                                         </div>
                                        <div class="col-md-6">
                                            <label for="">State</label>
                                            <input type="text" value="<?php echo $userdata['shippingstate']; ?>" name="shippingstate" id="state" class="form-control" required>
                                           </div>
                                    </div>
                                </div>

                                <!-- <div class="form-group">
                                    <label for="">Address</label>
                                    <textarea rows="4" required name="address" class="form-control"
                                        cols="50"></textarea>
                                </div>
                                <div class="form-group mb-4">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="">City</label>
                                            <select id="city" name="city" class="form-control" placeholder="city"
                                                required>
                                                <option value="India">Mumbai</option>
                                            </select>

                                        </div>
                                        <div class="col-md-6">
                                            <label for="">State</label>
                                            <select id="state" name="state" class="form-control" placeholder="state"
                                                required>
                                                <option value="Maharashtra">Maharashtra</option>
                                            </select>

                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-4">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="">Country</label>
                                            <select id="country" name="country" class="form-control"
                                                placeholder="country" required>
                                                <option value="India">India</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="">Pin Code</label>
                                            <input type="text" name="pin" id="pin" class="form-control" required>
                                        </div>
                                    </div>
                                </div> -->
                                <!-- <div class="form-group d-flex justify-content-end">
                                    <button id="btnContinue" class="btn cust_btn1">Next</button>
                                </div> -->
                            </form>
                        </div>
                    </div>
                    <div class="order_container tab">
                        <div class="tab_heading disactive">
                            <h5>Billing Address</h5>
                        </div>
                        <div class="tab_body">
                            <div class="errors">
                            </div>
                            <form action="" method="post" id="billingaddressform">
                            <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="text" value="<?php echo $userdata['name']; ?>" id="name" name="name" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="">Address</label>
                                            <textarea rows="4" required name="billingaddress" class="form-control"
                                                cols="50"><?php echo $userdata['billingaddress']; ?></textarea>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="">Pin Code</label>
                                            <input type="text" value="<?php echo $userdata['billingpincode']; ?>" name="billingpincode" id="pin" class="form-control" required>
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group mb-4">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="">City</label>
                                            <input type="text" value="<?php echo $userdata['billingcity']; ?>" name="billingcity" id="city" class="form-control" required>
                                                </div>
                                        <div class="col-md-6">
                                            <label for="">State</label>
                                            <input type="text" value="<?php echo $userdata['billingstate']; ?>" name="billingstate" id="state" class="form-control" required>
                                          </div>
                                    </div>
                                </div>

                                <!-- <div class="form-group mb-4">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="city1">City</label>
                                            <select id="city1" name="city1" class="form-control" placeholder="city"
                                                required>
                                                <option value="India">Mumbai</option>
                                            </select>

                                        </div>
                                        <div class="col-md-6">
                                            <label for="state1">State</label>
                                            <select id="state1" name="state1" class="form-control" placeholder="state"
                                                required>
                                                <option value="Maharashtra">Maharashtra</option>
                                            </select>

                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-4">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="country1">Country</label>
                                            <select id="country1" name="country1" class="form-control"
                                                placeholder="country" required>
                                                <option value="India">India</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="pin1">Pin Code</label>
                                            <input type="text" name="pin1" id="pin1" class="form-control" required>
                                        </div>
                                    </div>
                                </div> -->
                                <!-- <div class="form-group d-flex justify-content-end">
                                    <button id="proceedbtn" class="btn cust_btn1">Next</button>
                                </div> -->
                            </form>
                        </div>
                    </div>
                    <?php }else{
                  echo "Please Login to continue Checkout";
                     }?>

                </div>
            </div>
            <div class="col-md-12 col-lg-5">
            <?php
            if(isset($TotalItemsInCart)){?>
                <div class="checkout_oerder">
                    <div class="title">
                        <h5>Order Summary</h5>
                    </div>
                    <div class="d-flex justify-content-between order order_dsc1">
                        <div class="product_name">Product</div>
                        <div class="product_quantity">Quantity</div>
                        <div class="product_total">Total</div>
                    </div>
                    <?php
                      if(isset($cartdata)){
                        foreach($cartdata as $key => $value){
                    echo'<div class="d-flex justify-content-between order order_dsc2">
                        <div class="product_name">
                            <div class="media">
                                <div class="media-left">
                                    <img src="'.$value['image'].'" class="img1" alt="">
                                </div>
                                <div class="media-body">
                                '.$value['name'].'
                                </div>
                            </div>
                        </div>
                        <div class="product_quantity">'.$value['quantity'].'</div>
                        <div class="product_total"> '.$currency.'  '.$value['quantity'] * $value['final_price'].'</div>
                    </div>';
                        }
                    }
                    ?>
                    <div class="d-flex justify-content-between order_dsc1">
                        <div class="subtotal">Subtotal</div>
                        <div> <?php echo $currency .$CartTotal; ?></div>
                    </div>
                    <div class="d-flex justify-content-between order_dsc1">
                        <div class="Total">Total</div>
                        <div> <?php echo $currency .$CartTotal; ?></div>
                    </div>
                    <div class="proceed_container">
                        <input type="submit" id="proceedbtn" class="btn" value="Proceed to Pyment">
                    </div>
                </div>

                <?php } ?>
            </div>
        </div>
    </div>
    <?php
    require_once "footer.php";
?>