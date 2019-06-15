<?php
require_once "db.php";
require_once "header.php";
$id= $_GET['id'];
$make_call = callAPI('GET', 'getOrderbyId?id='.$id, false);
$response = json_decode($make_call, true);
//   print_r($response);
if($response['value']){
    $orderdata= $response['data'];
    $order_items= $response['order_items'];
   }else{
   $errors = $response['message'];
}



?>
<div class="container-fluid cart-container">
<div class="container">

<?php
if(isset($orderdata)){
?>
  <div class="row page-row ">
    <!-- orderdetails markup -->
    <div class="col-lg-12">
      <div class="row section-row">
        <!-- page title -->
        <div class="col-lg-12 col-md-12 col-sm-12 section-container page-title-container">
      
          <div class="page-title-wrapper">
            <h3 class="title">Order #: <?php echo $orderdata['id'];?></h3>
            <!-- <div class="download-btn-container">
              <a (click)=createPdf()>
                <i class="fa fa-file-pdf-o"></i>
              </a>
            </div> -->
       </div>
        </div>
        <!-- shipping address detail -->
        <div class="col-lg-12 col-md-12 col-sm-12 ship-address-container">
          <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12 ship-to-container">
              <div class="ship-to-wrapper">
                <strong>Ship To: 
                <?php echo $orderdata['shippingname'];?></strong>
                <p><?php echo $orderdata['shippingaddress'].','. $orderdata['shippingcity'].','. $orderdata['shippingcountry'] .','.$orderdata['shippingstate'].'-'. $orderdata['shippingpincode'];?>
                   </p>
              </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 ship-to-container sold-to">
              <div class="ship-to-wrapper">
                <strong>Sold To:</strong>
                <?php echo $orderdata['firstname'] .''.$orderdata['lastname'];?></strong>
                <p><?php echo $orderdata['billingaddress'].','. $orderdata['billingcity'].','. $orderdata['billingcountry'] .','.$orderdata['billingstate'].'-'. $orderdata['billingpincode'];?>
                   </p>
               
              </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 ship-to-container shipping_info">
              <div class="ship-to-wrapper">
                <p>
                  <span class="title">Date:</span>
                  <span class="value"><?php echo date("d F Y h:i a",strtotime($orderdata['timestamp'])); ?></span>
                </p>
                <p>
                  <span class="title">Order Status:</span>
                  <span class="value">
                  <?php
if($orderdata['orderstatus']==1){
    echo 'Pending';
}
if($orderdata['orderstatus']==2){
    echo 'Processing';
}
if($orderdata['orderstatus']==3){
    echo 'Shipping';
}
if($orderdata['orderstatus']==4){
    echo 'Delivered';
}
if($orderdata['orderstatus']==5){
    echo 'Cancel';
}
                  ?>
                  </span>
                </p>
                <p>
                  <span class="title">Payment Mode:</span>
                  <span class="value">
                  <?php
if($orderdata['paymentmethod'] == 1)
{
  echo"Credit Card";
}
elseif($orderdata['paymentmethod'] == 2)
{
  echo"Debit Card";
}
elseif($orderdata['paymentmethod'] == 3)
{
  echo"Net Banking";
}
elseif($orderdata['paymentmethod'] == 4)
{
  echo"Cash On Delivery";
}
?>
                  </span>
                </p>
              </div>
            </div>
          </div>
        </div>
        
        <!-- order deatils -->
        <div class="col-lg-12 col-md-12 col-sm-12 col-lg-12 table-container">
          <ul class="ui-table">
            <div class="thead">
              <li class="row tbl-row">
                <div class="col col-6 tbl-cell details">
                  <span>Item/Description</span>
                </div>
                <div class="col tbl-cell quentity">
                  <span>Qty</span>
                </div>
                <div class="col tbl-cell price">
                  <span>Price</span>
                </div>
                <div class="col tbl-cell cost">
                  <span>Total</span>
                </div>
              </li>
            </div>
            <div class="tbody">
             

            <?php 
                    foreach($order_items as $key => $value ){
echo '
<li class="row tbl-row">
<div class="col col-6 tbl-cell details">
  <div class="details-info">
    <div class="details-image">
      <img class="img-fluid" width="200" src="'.$value['image'].'" alt="">
    </div>
    <div class="details-desc">
      <span>'.$value['name'].'</span>
    </div>
  </div>
</div>
<div class="col tbl-cell quentity" data-title="Qty">
  <span class="value">'.$value['quantity'].'</span>
</div>
<div class="col tbl-cell price" data-title="Price">
  <span class="value">'.$currency.''.$value['price'].'</span>
</div>
<div class="col tbl-cell cost" data-title="Total">
  <span class="value">'.$currency.''.($value['quantity']* $value['price']).'</span>
</div>
</li>';

            }
            ?>
             
            </div>
          </ul>
          <!-- order total -->
          <div class="order-total">
            <div class="row order-total-row justify-content-end">
              <div class="col-lg-4 col-md-5 col-sm-12 order-total-container align-self-end">
                <div class="order-total-wrapper item">
                  <p class="total-label">Total Items :</p>
                  <p class="total-value"><?php echo $orderdata['items'];?></p>
                </div>
                <div class="order-total-wrapper total">
                  <p class="total-label">Order Total * :</p>
                  <p class="total-value"><?php echo $orderdata['finalamount'];?></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>


<?php 
}else{
echo '<h3>Order not found</h3>';
}  
?>
  </div>
</div>



<?php
    require_once "footer.php";
?>