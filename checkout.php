<?php
require_once "db.php";
require_once "header.php";
?>
<div class="container-fluid details-container">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-xl-10">
                <div class="checkout_container">
                    <div class="login_container tab">
                        <div class="tab_heading active">
                            <h5>1. Log In or Sign Up</h5>
                        </div>
                        <div class="tab_body">
                            <div class="errors">
                            </div>
                            <form method="post" id="checkout-login-form">
                                <div class="form-group col-md-8 col-lg-6 pl-0 pr-0">
                                    <input type="text" id="username" name="username" class="form-control"
                                        placeholder="username" required>
                                </div>
                                <div class="form-group col-md-8 col-lg-6 pl-0 pr-0">
                                    <input type="password" id="password" name="password" class="form-control"
                                        placeholder="password" required>
                                </div>
                                <div class="form-group col-md-8 col-lg-6 pl-0 pr-0">
                                    <button type="submit" id="login" class="btn login_btn">LOGIN</button>
                                </div>
                            </form>
                            <div class="div_desc col-md-8 col-lg-6 pl-0 pr-0">
                                <p>or Login using</p>
                            </div>
                            <div class="login_with_social text-center col-md-8 col-lg-6 pl-0 pr-0">
                                <a href="http://" class="facebook"><i class="fa fa-facebook"></i>Facebook</a>
                                <a href="http://" class="google"><i class="fa fa-google-plus"></i>Google</a>
                            </div>
                            <div class="signup_btn-container col-md-8 col-lg-6 pl-0 pr-0">
                                <button type="submit" id="signup" class="btn signup_btn" class="google">CREATE
                                    ACCOUNT</button>
                            </div>
                        </div>
                    </div>
                    <div class="delivery_address_container tab">
                        <div class="tab_heading disactive">
                            <h5>2. Delivery Address</h5>
                        </div>
                        <div class="tab_body">
                            <div class="errors">
                            </div>
                            <form action="" method="post" id="delivery-address-form">
                                <div class="form-group mb-4">
                                    <input type="text" name="address1" class="form-control" id="address1"
                                        placeholder="Address Line 1" required>
                                </div>
                                <div class="form-group mb-4">
                                    <input type="text" name="address2" class="form-control" id="address2"
                                        placeholder="Address Line 2" required>
                                </div>
                                <div class="form-group mb-4">
                                    <input type="text" name="landmark" class="form-control" id="landmark"
                                        placeholder="Landmark" required>
                                </div>
                                <div class="form-group mb-4">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="text" name="pinCode" class="form-control" id="pinCode"
                                                placeholder="Pin Code" required>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" name="city" class="form-control" id="city"
                                                placeholder="City" required>
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group d-flex justify-content-end">
                                    <button id="btnContinue" class="btn cust_btn1">continue</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="order_container tab">
                        <div class="tab_heading disactive">
                            <h5>3. View Order</h5>
                        </div>
                        <div class="tab_body">
                            <table class="table table-responsive">
                                <thead>
                                    <tr>
                                        <th width="20%">Product</th>
                                        <th width="60%">Quantity</th>
                                        <th width="20%">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>ffd</td>
                                        <td>gfg</td>
                                        <td>gdd</td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-end">
                                <button id="proceedbtn" class="btn cust_btn1">Place Order</button>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="checkout-container">
                    <div class="checkout-tab-heading">
                        <h3>Billing Details</h3>
                    </div>
                    <div class="card-body">
                        <form method="post" id="checkout-billing-form">
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" id="name" name="name" class="form-control" placeholder="name"
                                    required>
                            </div>
                            <div class="form-group">
                            <label for="">Address</label>
                                <textarea rows="4" required name="address" class="form-control" cols="50"
                                    placeholder="Address"></textarea>
                            </div>
                            <div class="form-group">
                            <label for="">Country</label>
                                <select id="country" name="country" class="form-control" placeholder="country" required>
                                    <option value="India">India</option>
                                </select>
                            </div>
                            <div class="form-group">
                            <label for="">State</label>
                                <select id="state" name="state" class="form-control" placeholder="state" required>
                                    <option value="Maharashtra">Maharashtra</option>
                                </select>
                            </div>
                            <div class="form-group">
                            <label for="">City</label>
                                <select id="city" name="city" class="form-control" placeholder="city" required>
                                    <option value="India">India</option>
                                </select>
                            </div>
                            <div class="form-group">
                            <label for="">Pin Code</label>
                                <select id="pin" name="pin" class="form-control" placeholder="pin" required>
                                    <option value="India">India</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <input type="submit" id="login" value="Login" class="btn login_btn">
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Signup" id="signup" class="btn login_btn">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    require_once "footer.php";
?>