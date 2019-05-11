<?php
require_once "db.php";
require_once "header.php";

function getCart(){
$make_call = callAPI('GET', 'getCart', false);
$response = json_decode($make_call, true);
print_r($response);
if($response['value']){
    $cartdata = $response['data'];
    $TotalItemsInCart = $response['TotalItemsInCart'];
    $CartTotal = $response['CartTotal'];
  }else{
   $errors = $response['message'];
}
}

getCart();
if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['id']))
{
    echo $_POST['id'].'aaa';
    $data_array =  array("id"=>$_POST['id']);
    $make_call = callAPI('POST', 'deleteCart', json_encode($data_array));
    print_r($make_call);
    $response = json_decode($make_call, true);
    if($response['value']){
        $TotalItemsInCart = $response['TotalItemsInCart'];
        getCart();
      }else{
       $errors = $response['message'];
    }
}


?>
<div class="container-fluid cart-container">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div id="cart-container">
                    <ul>
                        <?php 
                        if(isset($cartdata)){
                        foreach($cartdata as $key => $value){
echo '<li>
<div class="row">
    <div class="col-lg-3">
        <img class="img-fluid" src="'.$value['image'].'" alt="">
    </div>
    <div class="col-lg-9">
        <p>
        '.$value['name'].'
        </p>
        <p>
        '.$value['quantity'].'
        <span>
        '.$currency.'  '.$value['price'].' <span>'.$currency.''.$value['final_price'].'</span>
           <span class="total"> '.$currency.'  '.$value['quantity'] * $value['final_price'].'</span>
            <form method="POST">
            <input type="text" name="id" value="'.$value['id'].'">
            <input type="submit" name="removeCartItem" value="Delete" />
            </form>
            </p>
    </div>
</div>
</li>';
                        }
                        }
                        else{
                            echo '<h4>There are no items in your cart</h4>';
                        }
                        ?>
                  

                    </ul>

                </div>
            </div>
            <div class="col-lg-3">
                <div id="product-total">
                    PRICE DETAILS
                    Price (<?php echo isset($TotalItemsInCart)?isset($TotalItemsInCart):0; ?> items)
                    <?php echo $currency .' '.isset($CartTotal)?isset($CartTotal):0; ?>
                    Delivery Charges
                    ₹0
                    Amount Payable
                    <?php echo $currency .' '.isset($CartTotal)?isset($CartTotal):0; ?>
                    <!-- Your Total Savings on this order ₹620 -->
                </div>
            </div>
        </div>
    </div>
</div>

<!-- load js -->
<!-- <script src="ajax/cart.js"></script> -->
<?php
    require_once "footer.php";
?>