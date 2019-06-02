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
        echo "<script>showToaster(Product removed successfully','error');</script>";
        $TotalItemsInCart = $responseDelete['TotalItemsInCart'];
         }else{
        $errors = $responseDelete['message'];
    }
   }
?>

<div class="container-fluid cart-container" id="cart">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div id="cart-container">
                    <ul>
                        <?php 
                        // getCart();
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
            <input type="hidden" name="id" value="'.$value['id'].'">
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
                    <a href="order.php"><button>Place Order</button></a>

                </div>
            </div>
            <div class="col-lg-3">
            <?php
            if(isset($TotalItemsInCart)){
            echo   '<div id="product-total">              
                    PRICE DETAILS
                    Price ('.$TotalItemsInCart.' items)
                     '.$currency.''. $CartTotal.'
                    Delivery Charges
                    ₹0
                    Amount Payable
                    '.$currency.''. $CartTotal.'
                    <!-- Your Total Savings on this order ₹620 -->
                   
                </div>';
            }
                ?>
            </div>
        </div>
    </div>
</div>

<!-- load js -->
<script src="js/common.js"></script>
<!-- <script src="ajax/cart.js"></script> -->
<?php
    require_once "footer.php";
?>