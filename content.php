<?php
require_once "db.php";
require_once "header.php";
$name= $_GET['name'];
$make_call = callAPI('GET', 'getContent?name='.$name, false);
$response = json_decode($make_call, true);
if($response['value']){
    $contentdata= $response['data'];
  }else{
   $errors = $response['message'];
}



?>

<div class="container-fluid cart-container">
    <div class="container">
<div class="row">
<div class="col-lg-12">
<h2><?php echo $contentdata['name'] ?></h2>

<p><?php echo $contentdata['description'] ?></p>
</div>
</div>
    </div>
</div>


<?php
    require_once "footer.php";
?>