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
            </div>
        </div>
    </div>
</div>
<?php
    require_once "footer.php";
?>