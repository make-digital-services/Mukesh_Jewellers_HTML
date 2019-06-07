<?php
require_once "db.php";
require_once "header.php";
?>
<div class="container-fluid details-container" id="checkout">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-xl-10 m-auto">
                <div class="checkout_container">
                    <div class="login_container tab">
                        <div class="tab_heading active">
                            <h5>1. Log In or Sign Up</h5>
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
                                    <div class="div_desc">
                                        <p>or Login using</p>
                                    </div>
                                    <div class="login_with_social text-center">
                                        <a href="http://" class="facebook"><i class="fa fa-facebook"></i>Facebook</a>
                                        <a href="http://" class="google"><i class="fa fa-google-plus"></i>Google</a>
                                    </div>
                                    <div class="signup_btn-container ">
                                        <button type="submit" id="signup" class="btn signup_btn" class="google">CREATE
                                            ACCOUNT</button>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <h5>Order Details</h5>
                                    </div>
                                    <table class="table table-responsive">
                                        <thead>
                                            <tr>
                                                <th width="60%">Product</th>
                                                <th width="15%">Quantity</th>
                                                <th width="25%">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>ffd</td>
                                                <td>gfg</td>
                                                <td>gdd</td>
                                            </tr>
                                            <tr>
                                                <td class="font-weight-bold">Subtotal</td>
                                                <td></td>
                                                <td>gdd</td>
                                            </tr>
                                            <tr>
                                                <td class="font-weight-bold">Total</td>
                                                <td></td>
                                                <td>gdd</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
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
                            <form action="" method="post" id="deliveryaddressform">
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="text" id="name" name="name" class="form-control" required>
                                </div>
                                <div class="form-group">
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
                                </div>
                                <div class="form-group d-flex justify-content-end">
                                    <button id="btnContinue" class="btn cust_btn1">continue</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="order_container tab">
                        <div class="tab_heading disactive">
                            <h5>3. Billing Address</h5>
                        </div>
                        <div class="tab_body">
                            <div class="errors">
                            </div>
                            <form action="" method="post" id="billingaddressform">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="name1">Name</label>
                                        <input type="text" id="name1" name="name1" class="form-control" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="address1">Address</label>
                                        <textarea rows="4" required name="address1" id="address1" class="form-control"
                                            cols="50"></textarea>
                                    </div>
                                </div>
                                <div class="form-group mb-4">
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
                                </div>
                                <div class="form-group d-flex justify-content-end">
                                    <button id="proceedbtn" class="btn cust_btn1">Place Order</button>
                                </div>
                            </form>
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