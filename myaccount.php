<?php
require_once "db.php";
require_once "header.php";
?>
<div class="container-fluid details-container" id="my_account">
    <div class="container">
        <div id="myaccount_container">
            <div class="row">
                <div class="col-md-3">
                    <div class="navigation_container">
                        <ul>
                            <li><a href="order.php"><i class="fa fa-window-maximize" aria-hidden="true"></i>My
                                    Orders</a>
                            </li>
                            <li class="active"><a href="#"><i class="fa fa-user" aria-hidden="true"></i>My
                                    Account</a></li>
                            <li><a href="wishlist.php"><i class="fa fa-heart" aria-hidden="true"></i>My Wishlist</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="tab">
                        <div class="tab_heading active">
                            <h5 class="mb-0">Pesonal Info</h5>
                        </div>
                        <div class="tab_body">
                            <form action="" method="post" id="infoform">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="name">Full Name</label>
                                            <input type="text" name="name" id="name" class="form-control" required>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div>
                                                    <label for="">Gender</label>
                                                </div>
                                                <div class="form-check-inline">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input"
                                                            name="optradio">Male
                                                    </label>
                                                </div>
                                                <div class="form-check-inline">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input"
                                                            name="optradio">Female
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="email">Email</label>
                                            <input type="email" name="email" id="email" class="form-control" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="number">Moblie Number</label>
                                            <input type="text" name="number" id="number" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <button id="savepbtn" class="btn">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="tab mt-4">
                        <div class="tab_heading disactive">
                            <h5 class="mb-0">Manage Address</h5>
                        </div>
                        <div class="tab_body">
                            <form action="" method="post" id="addressform">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="">Name</label>
                                            <input type="text" id="name" name="name" class="form-control" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="">Address</label>
                                            <textarea rows="4" required name="address" class="form-control"
                                                cols="50"></textarea>
                                        </div>
                                    </div>

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
                                    <button id="saveabtn" class="btn">save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="tab mt-4">
                        <div class="tab_body address">
                            <p><span class="span1">Mukesh Jwelers</span><span class="span1">9585669856</span></p>
                            <p><span>LIC Colony, Suresh Colony, Vile Parle West, abcd, Mumbai, Maharashtra</span> -
                                <span class="span1">400524<span></p>
                            <p><a href="#" class="editdeletbtn" id="editbtn">Edit</a> <a href="#" id="deletbtn"
                                    class="editdeletbtn">Delete</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    require_once "footer.php";
?>