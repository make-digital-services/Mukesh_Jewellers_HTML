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
            <div class="col-lg-12">
                <div id="order_container">
                    <div class="tab">
                        <div class="tab_heading">
                            <h5 class="mb-0">My Orders</h5>
                        </div>
                        <div class="tab_body">
                            <table class="table table-responsive">
                                <thead>
                                    <th width="20%">Order Id</th>
                                    <th width="35%">Date</th>
                                    <th width="10%">Amount</th>
                                    <th width="10%">Items</th>
                                    <th width="15%">Status</th>
                                    <th width="10%">Action</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>05/10/2019</td>
                                        <td>2586</td>
                                        <td>5</td>
                                        <td>Status</td>
                                        <td><a href="orderdetails.php?id='.$value['id'].'" class="view_details_btn"><i
                                                    class="fa fa-eye" aria-hidden="true"></i></a></td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="total">
                                <p>Order Total : </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
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
<th>Status</th>
<th>Action</th>
</thead>';
                        foreach($orderdata as $key => $value){
echo '<tr>
<td>'.$value['id'].'1</td>
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
echo'<td><a href="orderdetails.php?id='.$value['id'].'"><i class="fa fa-eye" aria-hidden="true"></i></a></td>';
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

<?php
    require_once "footer.php";
?>