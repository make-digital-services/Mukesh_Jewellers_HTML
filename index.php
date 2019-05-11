<?php
require_once "db.php";
require_once "header.php";
?>

<div class="full-slider-banner">
    <div class="wrapper-2">
        <div class="wrapper example-2">
            <ul>
                <?php
                    $sql = "SELECT * FROM `slider`";
                    $result = $con->query($sql);
                    if($result->num_rows>0){
                        while($row = $result->fetch_assoc()){
                            echo '<li><img src="'.$imageServerIp. $row["image"].'" alt=""></li>';
                        }
                    }
                    ?>
                <!-- <li><img src="images/banner.jpg" alt=""></li>
                    <li><img src="images/banner2.jpg" alt=""></li>
                    <li><img src="images/banner3.jpg" alt=""></li> -->

            </ul>
        </div>
    </div>
</div>

<div class="container-fluid offer-banner-container">
    <div class="container ">
        <div class="offer-banner-inner">
            <div class="row">
                <div class="col-lg-6">
                    <div class="offer-banner">
                        <img src="images/offerbanner-1.png" alt="">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="offer-content">
                        <h2>DIAMOND JEWELLERY</h2>
                        <p>
                            <span>
                                Royal Diamond Collection
                            </span>
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                            has
                            been
                            the industry's standard dummy text ever since the 1500s,
                        </p>
                        <button>Shop Now</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="offer-banner-inner">
            <div class="row">
                <div class="col-lg-6">
                    <div class="offer-banner">
                        <img src="images/offerbanner-2.png" alt="">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="offer-content">
                        <h2>DIAMOND JEWELLERY</h2>
                        <p>
                            <span>
                                Royal Diamond Collection
                            </span>
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                            has
                            been
                            the industry's standard dummy text ever since the 1500s,
                        </p>
                        <button>Shop Now</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid testimonial-container">
        <!-- Place somewhere in the <body> of your page -->
        <div id="container" class="container">
            <div id="main" role="main">
                <section class="slider">
                    <div class="flexslider carousel">
                        <ul class="slides">
                            <li>
                                <div class="testimonial-outer">
                                    <span class="testimonial-avtar"> <img src="images/avtar-icon.jpg" /></span>
                                    <div class="testimoniMsg"> Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        Asperiores voluptate cupiditate
                                        <span class="client-address-name">Mumbai, John Morrise</span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="testimonial-outer">
                                    <span class="testimonial-avtar"> <img src="images/avtar-icon.jpg" /></span>
                                    <div class="testimoniMsg"> Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        Asperiores voluptate cupiditate
                                        <span class="client-address-name">Mumbai, John Morrise</span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="testimonial-outer">
                                    <span class="testimonial-avtar"> <img src="images/avtar-icon.jpg" /></span>
                                    <div class="testimoniMsg"> Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        Asperiores voluptate cupiditate
                                        <span class="client-address-name">Mumbai, John Morrise</span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="testimonial-outer">
                                    <span class="testimonial-avtar"> <img src="images/avtar-icon.jpg" /></span>
                                    <div class="testimoniMsg"> Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        Asperiores voluptate cupiditate
                                        <span class="client-address-name">Mumbai, John Morrise</span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="testimonial-outer">
                                    <span class="testimonial-avtar"> <img src="images/avtar-icon.jpg" /></span>
                                    <div class="testimoniMsg"> Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        Asperiores voluptate cupiditate
                                        <span class="client-address-name">Mumbai, John Morrise</span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="testimonial-outer">
                                    <span class="testimonial-avtar"> <img src="images/avtar-icon.jpg" /></span>
                                    <div class="testimoniMsg"> Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        Asperiores voluptate cupiditate
                                        <span class="client-address-name">Mumbai, John Morrise</span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="testimonial-outer">
                                    <span class="testimonial-avtar"> <img src="images/avtar-icon.jpg" /></span>
                                    <div class="testimoniMsg"> Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        Asperiores voluptate cupiditate
                                        <span class="client-address-name">Mumbai, John Morrise</span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="testimonial-outer">
                                    <span class="testimonial-avtar"> <img src="images/avtar-icon.jpg" /></span>
                                    <div class="testimoniMsg"> Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        Asperiores voluptate cupiditate
                                        <span class="client-address-name">Mumbai, John Morrise</span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="testimonial-outer">
                                    <span class="testimonial-avtar"> <img src="images/avtar-icon.jpg" /></span>
                                    <div class="testimoniMsg"> Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        Asperiores voluptate cupiditate
                                        <span class="client-address-name">Mumbai, John Morrise</span>
                                    </div>
                                </div>
                            </li>

                        </ul>
                    </div>
                </section>
            </div>

        </div>
    </div>


    <?php
    require_once "footer.php";
    
?>

    <script type="text/javascript">
    $(window).load(function() {
        $('.flexslider').flexslider({
            animation: "slide",
            animationLoop: false,
            itemWidth: 370,
            itemMargin: 3,
            pausePlay: false,
        });
    });
    </script>