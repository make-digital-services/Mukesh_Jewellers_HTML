<?php
require_once "db.php";
require_once "header.php";
?>
<div class="container-fluid offer-banner-container">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-xl-8">
                <div class="checkout-container">
                    <div class="checkout-tab-heading">
                        <h3>1. Log In or Sign Up</h3>
                    </div>
                    <div class="card-body">
                        <form method="post" id="checkout-login-form">
                            <div class="input-group form-group">
                                <input type="text" id="username" name="username" class="form-control"
                                    placeholder="username" required>
                            </div>
                            <div class="input-group form-group">
                                <input type="password" id="password" name="password" class="form-control"
                                    placeholder="password" required>
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