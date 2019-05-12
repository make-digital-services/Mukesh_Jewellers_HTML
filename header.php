<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <link href="css/flexslider.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <link href="css/jquery.exzoom.css" rel="stylesheet" />
    <title>Mukesh Jewellers</title>

    <!-- jQuery library -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

    <script>
    // $(document).ready(function() {
    //     $(document).ajaxStart(function() {
    //         $("#loader").css("display", "block");
    //     });
    //     $(document).ajaxComplete(function() {
    //         $("#loader").css("display", "none");
    //     });

    //     if (localStorage.getItem("userData")) {
    //         var userData = JSON.parse(localStorage.getItem("userData"));
    //         $("#username").html(userData.name);
    //         //  alert(userData.name + "aaaaaa");
    //     }
    // });
    </script>
</head>

<body>
    <div id="loader"></div>
    <header>
        <div class="logo-container container-fluid">
            <div class="row">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="logo">
                                <img src="images/logo.png" alt="">
                            </div>
                        </div>
                        <div class="col-lg-9 right-box-header">

                            <!-- ///cartData -->

                            <!-- ///End cartData -->

                            <div class="social-media">
                                <ul>
                                    <li class="search-container"><button class="searchbox-button" href="javascript:;"><i
                                                class="fa fa-search"></i></button>
                                        <input class="searchbox" type="text" placeholder="Search"></li>
                                    <li><a href="javascript:;"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="javascript:;"><i class="fa fa-instagram"></i></a></li>
                                    <li class="top-header-cart"><a href="cart.php" class="cart-box" id="cart-info"
                                            title="View Cart"><span>0</span></a>
                                    </li>
                                    <li class="top-login-btn"><a href="javascript:;"><i class="fa fa-user"></i>
                                            <span id="username">Login</span></a></li>

                                </ul>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="navigation-conatainer  container-fluid">
            <div class="row">
                <div class="container">
                    <nav class="text-center">
                        <ul>
                            <li><a href="index.php"><i class="fa fa-home"></i></a></li>
                            <?php
                            $sql = "select * from navigation";
                            $result = $con->query($sql);
                            
                            if ($result->num_rows > 0) {
                                // output data of each row
                                while($row = $result->fetch_assoc()) {
                                    echo  '<li><a href="listing.php?name='.$row['name'].'">'.$row['name'].'</a></li>';
                                }
                            }

?>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>