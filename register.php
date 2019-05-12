<?php
require_once "db.php";
require_once "header.php";
if(isset($_POST['register']))
   {
    $data_array =  array("email"=>$_POST['email'], "username"=>$_POST['username'], "name"=>$_POST['name'] );
    $make_call = callAPI('POST', 'registerUser',  json_encode($data_array));
    $response = json_decode($make_call, true);
    if($response['value']){
     $data = $response['data'];
    //  header('Location: index.php');
    echo '<script>location.href= "login.php";</script>';
    }else{
        $errors = $response['message'];
         echo '<script> alert("'.$errors.'");</script>';
    }
    }


?>


<div class="col-lg-3" style="margin:10% auto;">
<form  method="post" id="login_form">
  <div class="form-group">
    <label for="email">Name:</label>
    <input required type="text" name="name" class="form-control" id="name">
  </div>
  <div class="form-group">
    <label for="email">Email:</label>
    <input required type="email" name="email" class="form-control" id="email">
  </div>
  <div class="form-group">
    <label for="email">Username:</label>
    <input required type="text" name="username" class="form-control" id="username">
  </div>
  

  <button type="submit" name="register" class="btn btn-primary">Submit</button>

</form>
</div>

<!-- load js -->
<!-- <script src="ajax/login.js"></script> -->
<?php
    require_once "footer.php";
?>