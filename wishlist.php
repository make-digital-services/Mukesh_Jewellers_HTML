<?php
require_once "db.php";
require_once "header.php";
$make_call = callAPI('GET', 'getWatchlist', false);
$response = json_decode($make_call, true);
//  print_r($response);
if($response['value']){
    $data= $response['data'];
    }else{
   $errors = $response['message'];
}


if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['remove']))
{
    // echo $_POST['id'].'aaa';
    $data_array =  array("id"=>$_POST['id']);
    $make_callDelete = callAPI('POST', 'deleteWatchlist', json_encode($data_array));
    $responseDelete = json_decode($make_callDelete, true);
     if($responseDelete['value']){
    //clear post data to avoid resubmission on refresh
    echo '<script>history.pushState({}, "", "")</script>';  
    echo "<script>showToaster('Product removed successfully','error');</script>";      
        $make_call = callAPI('GET', 'getWatchlist', false);
        $response = json_decode($make_call, true);
        //  print_r($response);
        if($response['value']){
            $data= $response['data'];
            }else{
           $errors = $response['message'];
        }
         }else{
        $errors = $responseDelete['message'];
    }
   }


   if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST["addToCart"])) { 
    $data_array =  array("product_id"=>$_POST['product_id']);
    $make_call = callAPI('POST', 'addToCart', json_encode($data_array));
    $response = json_decode($make_call, true);
     if($response['value']){
    //   $data     = $response['TotalItemsInCart'];
    echo "<script> $('#header').load('header.php')</script>";
    echo '<script> showToaster("Product added to Cart!", "success");</script>';  
    //clear post data to avoid resubmission on refresh
    echo '<script>history.pushState({}, "", "")</script>';
  }else{
     $errors = $response['message'];
  }
 }
?>
<div class="container-fluid cart-container wishlist">
    <div class="container">
        <div id="wishlist_container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="navigation_container">
                        <ul>
                            <li><a href="order.php"><i class="fa fa-window-maximize" aria-hidden="true"></i>My
                                    Orders</a>
                            </li>
                            <li><a href="myaccount.php"><i class="fa fa-user" aria-hidden="true"></i>My Account</a></li>
                            <li class="active"><a href="#"><i class="fa fa-heart" aria-hidden="true"></i>My Wishlist</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="tab">
                        <div class="tab_heading">
                            <h1 class="mb-0">My Wishlist</h1>
                        </div>
                        <?php
                          if(isset($data)){
                            foreach($data as $key => $value){
                        echo'<div class="tab_body">
                            <div class="row">
                                <div class="col-md-3">
                                    <img class="img-fluid" src="'.$value['image'].'" alt="'.$value['name'].'">
                                </div>
                                <div class="col-md-9">
                                <a href="details.php?name='.$value['name'].'"><p class="name mt-2">'.$value['name'].'</p></a>
                                    <div class="">
                                        <span class="price d-inline-block">'.$currency.'  '.$value['final_price'].'</span>
                                        <span class="final_price d-inline-block">'.$currency.'  '.$value['price'].'</span>
                                        <span>
                                            <form method="POST">
                                                <input type="hidden" name="product_id" value="'.$value['product_id'].'">
                                                <input type="hidden" name="id" value="'.$value['id'].'">
                                                <input type="submit" name="addToCart" class="remove_btn"
                                                    value="Add To Cart" />
                                                <input type="submit" name="remove" class="remove_btn"
                                                    value="Remove" />
                                            </form>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>';
                            }
                        }
                        else{
                            echo '<h4 style="color:#7e2429;">There are no items in your Wishlist</h4>';
                        }
?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    require_once "footer.php";
?>