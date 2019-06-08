<?php
require_once "db.php";
require_once "header.php";
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
 
 

if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['id']))
{
    // echo $_POST['id'].'aaa';
    $data_array =  array("id"=>$_POST['id']);
    $make_callDelete = callAPI('POST', 'deleteCart', json_encode($data_array));
    $responseDelete = json_decode($make_callDelete, true);
     if($responseDelete['value']){
         $make_call = callAPI('GET', 'getCart', false);
         $response = json_decode($make_call, true);
        if($response['value']){
            $cartdata= $response['data'];
            $TotalItemsInCart = $response['TotalItemsInCart'];
            $CartTotal = $response['CartTotal'];
          }else{
           $errors = $response['message'];
           unset($cartdata);
        }
        echo "<script> $('#header').load('header.php');</script>";
        echo "<script>showToaster('Product removed successfully','error');</script>";
        $TotalItemsInCart = $responseDelete['TotalItemsInCart'];
         }else{
        $errors = $responseDelete['message'];
    }
   }
?>

<div class="container-fluid cart-container" id="cart">
    <div class="container">
        <div class="cart-container tab">
            <div class="row">
                <div class="col-lg-8">
                    <div id="cart-container">
                        <div class="tab_heading active">
                            <h1 class="mb-0">My Cart</h1>
                        </div>

                        <?php 
                        // getCart();
                   if(isset($cartdata)){
                        foreach($cartdata as $key => $value){

                            echo'<div class="tab_body">
                            <div class="row">
                                <div class="col-lg-3 pl-0">
                                    <img class="img-fluid" src="'.$value['image'].'" alt="'.$value['name'].'">
                                </div>
                                <div class="col-lg-9">
                                    <p class="name mt-2">'.$value['name'].'</p>
                                    <div class="">
                                        <span class="quntity d-block">'.$value['quantity'].'</span>
                                        <span class="price d-inline-block">'.$currency.'  '.$value['final_price'].'</span>
                                        <span class="final_price d-inline-block">'.$currency.'  '.$value['price'].'</span>
                                        <span class="total"> '.$currency.'  '.$value['quantity'] * $value['final_price'].'</span>

                                        <span>
                                            <form method="POST">
                                                <input type="hidden" name="id" value="'.$value['id'].'">
                                                <input type="submit" name="removeCartItem" class="remove_btn"
                                                    value="Delete" />
                                            </form>
                                        </span>
                                    </div>
                                    <div>
                                    </div>
                                </div>
                            </div>
                        </div>';
                        }
                    }  else{
                        echo '<h4 style="color:#7e2429;">There are no items in your cart</h4>';
                    }
                        ?>


                        <!-- <div class="place_order_container d-flex justify-content-between">
                            <div class="total">
                                Total Price :
                            </div>
                            <div>
                                <a href="#"><button class="place_btn">Place Order</button></a>
                            </div>
                        </div> -->
                    </div>
                </div>
                <div class="col-lg-4">
                    <div id="product-total">
                        <div class="title">
                            Price Details
                        </div>
                        <div class="body">
                        <?php
            if(isset($TotalItemsInCart)){?>
                            <div class="main_1 d-flex justify-content-between">
                                <div>
                                    Price (<?php echo $TotalItemsInCart; ?>) 
                                </div>
                                <div>
                                <?php echo $currency .$CartTotal; ?>
                                </div>
                            </div>
                            <div class="main_2 d-flex  justify-content-between">
                                <div>
                                    Delivery Charges
                                </div>
                                <div>
                                    ₹0
                                </div>
                            </div>
                            <div class="main_3 d-flex  justify-content-between">
                                <div>
                                    Amount Payable
                                </div>
                                <div>
                                <?php echo $currency .$CartTotal; ?>
                                </div>
                            </div>
                            <div class="saving">
                                Your Total Savings on this order ₹620
                            </div>
            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
           
        </div>
    </div>

</div>
</div>
</div>
</div>
</div>

<!-- <script src="ajax/cart.js"></script> -->
<?php
    require_once "footer.php";
?>