<?php
require_once "db.php";
require_once "header.php";
?>
<div class="container-fluid details-container" id="contactus">
    <div class="container">
        <div id="contactus_container">
            <div class="row">
                <div class="col-md-12 col-lg-8">
                    <div class="tab">
                        <div class="tab_heading active">
                            <h5 class="mb-0">Send Us a Message</h5>
                        </div>
                        <div class="tab_body">
                            <form action="" method="post" id="contactform">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <label for="name">Name</label>
                                            <input type="text" name="name" id="name" class="form-control" required>
                                        </div>
                                        <div class="col-lg-6">
                                            <label for="email">Email</label>
                                            <input type="email" name="email" id="email" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <label for="number">Phone</label>
                                            <input type="text" name="number" id="number" class="form-control" required>
                                        </div>
                                        <div class="col-lg-6">
                                            <label for="subject">Subject</label>
                                            <input type="text" name="subject" id="subject" class="form-control"
                                                required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="message">Message</label>
                                    <textarea name="message" id="message" class="form-control" rows="5"></textarea>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <input type="submit" value="Send" id="contactusbtn" class="btn">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-4">
                    <div class="address_cotainer">
                        <div class="heading">
                            <h5 class="mb-0">Contact Information</h5>
                        </div>
                        <div class="descriptions">
                            <div class="media">
                                <div class="media-left">
                                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                                </div>
                                <div class="media-body">
                                    <p>Shop No. 13/14, Building No A-59/60, Shantinagar, Sector-3, Mira Road, Thane -
                                        401107</p>
                                </div>
                            </div>
                            <div class="media">
                                <div class="media-left">
                                    <i class="fa fa-mobile" aria-hidden="true"></i>
                                </div>
                                <div class="media-body">
                                    <p class="ml-1">+9108828379299 / 022-28124195</p>
                                </div>
                            </div>
                            <div class="media">
                                <div class="media-left">
                                    <i class="fa fa-envelope" aria-hidden="true"></i>
                                </div>
                                <div class="media-body">
                                    <p>info@mukeshjewellers.in</p>
                                </div>
                            </div>
                            <div class="media">
                                <div class="media-left">
                                </div>
                                <div class="media-body">
                                    <div class="socials ml-1">
                                        <li><a href="javascript:;"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="javascript:;"><i class="fa fa-instagram"></i></a></li>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="map_container">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d15063.931625664209!2d72.8581065856975!3d19.283109545449722!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sShop+No.+13%2F14%2C+Building+No+A-59%2F60%2C+Shantinagar%2C+Sector-3%2C+Mira+Road%2C+Thane+-+401107!5e0!3m2!1sen!2sin!4v1559885853790!5m2!1sen!2sin"
                width="100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
    </div>
</div>
<?php
    require_once "footer.php";
?>