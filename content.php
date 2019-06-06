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
        <div id="content">
            <div class="row">
                <div class="col-lg-12">
                    <div id="content_container">
                        <h2><?php echo $contentdata['name'] ?>dfdf</h2>
                        <p><?php echo $contentdata['description'] ?>fdg</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
    require_once "footer.php";
?>