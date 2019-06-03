<?php
require_once "db.php";
require_once "header.php";
// if(isset($_POST['login']))
//    {
//     $data_array =  array("username"=>$_POST['username'], "password"=>$_POST['password'] );
//     $make_call = callAPI('POST', 'login',  json_encode($data_array));
//     // print_r($make_call);
//     $response = json_decode($make_call, true);
//     if($response['value']){
//      $data = $response['data'];
//     //  header('Location: index.php');
//     echo '<script>location.href= "index.php";</script>';
//     }else{
//       echo '<script> alert("Please Enter valid Username/Password");</script>';
//        $errors = $response['message'];
//     }
//     }
?>


<div class="col-xs-12" id="loginContainer">
    <div class="col-lg-3">
        <form method="post" id="login_form">
            <div class="form-group">
                <label for="email">Username:</label>
                <input type="text" name="username" class="form-control" id="email">
            </div>
            <div class="form-group">
                <label for="pwd">Password:</label>
                <input type="password" name="password" class="form-control" id="pwd">
            </div>

            <button type="submit" name="login" class="btn btn-primary">Login</button>

            <p class="not-member">Not a member yet ? <a href="register.php">Join US</a></p>
        </form>
    </div>
</div>

<!-- load js -->
<script src="js/common.js"></script>
<script src="ajax/login.js"></script>
<?php
    require_once "footer.php";
?>