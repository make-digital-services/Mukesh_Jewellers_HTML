<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <link href="css/flexslider.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Cinzel&display=swap" rel="stylesheet">
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
<?php
require_once "db.php";
$make_call = callAPI('GET', 'getCart', false);
$response = json_decode($make_call, true);
//  print_r($response);
if($response['value']){
    $cartdata= $response['data'];
    $TotalItemsInCart = $response['TotalItemsInCart'];
    $CartTotal = $response['CartTotal'];
  }else{
   $errors = $response['message'];
}

$make_callUser = callAPI('GET', 'getUserDetails', false);
// print_r($make_callUser);
$responseUser = json_decode($make_callUser, true);
if($responseUser['value']){
    $userdata= $responseUser['data'];
    }else{
   $errors = $responseUser['message'];
}

if(isset($_POST['logout'])){
    $make_call = callAPI('GET', 'logout', false);
    $response = json_decode($make_call, true);
    if($response['value']){
        echo "<script>showToaster('User logged out successfully','success')</script>";

        echo '<script>location.href= "index.php";</script>';
    }else{
        echo '<script> alert("Something went wrong");</script>';
    }
}
?>

<body>
    <div id="loader"></div>
    <div id="toaster"></div>
    <header id="header">
        
        <div class="logo-container container-fluid">
               <div class="row">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="logo">
                                <img src="images/logo1.png" alt="">
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
                                    <li class="top-header-cart"><a href="cart.php" class="cart-box"
                                            title="View Cart"><span><?php 
                                            if(isset($TotalItemsInCart)){
                                                echo $TotalItemsInCart;
                                            }else{
                                                echo '0';
                                            }
                                            ?>
                                            </span></a>
                                    </li>
                                    <?php
                                    if(isset($userdata)){
                                        ?>
                                    <li class="top-login-btn logout">
                                        <span>
                                            <i class="fa fa-user"></i>
                                        </span>
                                        <span class="username-login"> Welcome,
                                            <strong><?php echo $userdata['name']; ?></strong></span>
                                        <div class="dropdown-login">
                                            <ul class="dropdown_parent">
                                                <li><a href="javascript:;">My Account</a></li>
                                                <li><a href="javascript:;">Change Password</a></li>
                                                <li><a href="javascript:;">Order History</a></li>
                                                <li><a href="javascript:;">MY Wishlist</a></li>
                                                <li>
                                                    <form method="POST">
                                                        <button type="submit" name="logout">Logout</button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>

                                    </li>

                                    <?php 
                                    }else{
                                        ?>
                                    <li class="top-login-btn">
                                        <a href="login.php">
                                            <i class="fa fa-user"></i><span id="username">Login</span>
                                        </a>
                                    </li>
                                    <?php } ?>

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