<?php
require_once "db.php";
require_once "header.php";
?>
<div class="container-fluid details-container" id="quickpage">
    <div class="container">
        <div id="quickview_container">
            <div class="quick_wrapper">
                <div class="row">
                    <div class="col-md-12 col-lg-5">
                        <div class="img-container"></div>
                        <img src="images/goldchain.jpg" class="img-fluid" alt="">
                    </div>
                    <div class="col-md-12 col-lg-7">
                        <div class="description">
                            <div class="des mt-3">
                                <h1>Heading</h1>
                                <p><span class="offerprice">$24565</span><span class="price">$5622200</span></p>
                            </div>
                            <div class="des mt-3">
                                <p>Description</p>
                                <p><a href="#" id="detailsbtn">View Details</a></p>
                            </div>
                        </div>
                        <div class="form_container mt-3">
                            <form method="post" id="quickform">
                                <div class="form-group">
                                    <span class="qty-select">Qty <input value="1" name="quantity" type="number"
                                            min="1"></span>
                                    <span class="in-strock">In Stock</span>
                                </div>
                                <div class="form-group">
                                    <button id="addcartbtn" class="btn">Add to Cart</button>
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