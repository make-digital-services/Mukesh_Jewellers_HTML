<?php
require_once "db.php";
require_once "header.php";
$make_call = callAPI('GET', 'getOrderbyUserId', false);
$response = json_decode($make_call, true);
//  print_r($response);
if($response['value']){
    $orderdata= $response['data'];
   }else{
   $errors = $response['message'];
}



?>
<div class="container-fluid cart-container">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div id="cart-container">
                    <table style="width:100%; border:1px solid #ccc">
                   
                        <?php 
                   if(isset($orderdata)){

                    echo' <thead>
<th>Order Id</th>
<th>Date</th>
<th>Amount</th>
<th>Items</th>
<th>Status</th></thead>';
                        foreach($orderdata as $key => $value){
echo '<tr>
<td>'.$value['id'].'</td>
<td>'. date("d F Y",strtotime($value['timestamp'])).'</td>
<td>'.$value['finalamount'].'</td>
<td>'.$value['items'].'</td>';
if($value['orderstatus']==1){
    echo '<td>Pending</td>';
}
if($value['orderstatus']==2){
    echo '<td>Processing</td>';
}
if($value['orderstatus']==3){
    echo '<td>Shipping</td>';
}
if($value['orderstatus']==4){
    echo '<td>Delivered</td>';
}
if($value['orderstatus']==5){
    echo '<td>Cancel</td>';
}
echo '</tr>';
  }
  }
                        else{
                            echo '<h4>There are no Orders</h4>';
                        }
                        ?>


                    </table>
                

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