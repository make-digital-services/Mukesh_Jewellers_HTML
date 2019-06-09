<?php
require_once "db.php";
require_once "header.php";

// function getUserData(){
$make_callUser = callAPI('GET', 'getUserDetails', false);
$responseUser = json_decode($make_callUser, true);
if($responseUser['value']){
    $userdata= $responseUser['data'];
    }else{
   $errors = $responseUser['message'];
}
// }

//  getUserData();
//update personal details
if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST["savePd"])) { 
    $data_array =  array("name"=>$_POST['name'],"gender"=>$_POST['gender'],"email"=>$_POST['email'],"phone"=>$_POST['phone']);
    $make_call = callAPI('POST', 'savePd', json_encode($data_array));
    $response = json_decode($make_call, true);
     if($response['value']){
        $make_callUser = callAPI('GET', 'getUserDetails', false);
        $responseUser = json_decode($make_callUser, true);
        if($responseUser['value']){
            $userdata= $responseUser['data'];
            }else{
           $errors = $responseUser['message'];
        }
        // getUserData();
    echo '<script> showToaster("User Details Updated!", "success");</script>';  
    //clear post data to avoid resubmission on refresh
    echo '<script>history.pushState({}, "", "")</script>';
  }else{
     $errors = $response['message'];
  }
 }
//update billing address
if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST["submitBilling"])) { 
    $data_array =  array("billingaddress"=>$_POST['billingaddress'],"billingpincode"=>$_POST['billingpincode'],"billingcity"=>$_POST['billingcity'],"billingstate"=>$_POST['billingstate']);
    $make_call = callAPI('POST', 'updateBilling', json_encode($data_array));
    $response = json_decode($make_call, true);
     if($response['value']){
        $make_callUser = callAPI('GET', 'getUserDetails', false);
        $responseUser = json_decode($make_callUser, true);
        if($responseUser['value']){
            $userdata= $responseUser['data'];
            }else{
           $errors = $responseUser['message'];
        }
        // getUserData();
    echo '<script> showToaster("Billing Adress Updated!", "success");</script>';  
    //clear post data to avoid resubmission on refresh
    echo '<script>history.pushState({}, "", "")</script>';
  }else{
     $errors = $response['message'];
  }
 }

//update shipping address
if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST["submitShipping"])) { 
    $data_array =  array("shippingaddress"=>$_POST['shippingaddress'],"shippingpincode"=>$_POST['shippingpincode'],"shippingcity"=>$_POST['shippingcity'],"shippingstate"=>$_POST['shippingstate']);
    $make_call = callAPI('POST', 'updateShipping', json_encode($data_array));
    $response = json_decode($make_call, true);
     if($response['value']){
        $make_callUser = callAPI('GET', 'getUserDetails', false);
        $responseUser = json_decode($make_callUser, true);
        if($responseUser['value']){
            $userdata= $responseUser['data'];
            }else{
           $errors = $responseUser['message'];
        }
        // getUserData();
    echo '<script> showToaster("Shipping Adress Updated!", "success");</script>';  
    //clear post data to avoid resubmission on refresh
    echo '<script>history.pushState({}, "", "")</script>';
  }else{
     $errors = $response['message'];
  }
 }
?>
<div class="container-fluid details-container" id="my_account">
    <div class="container">
        <div id="myaccount_container">
            <div class="row">
                <div class="col-md-3">
                    <div class="navigation_container">
                        <ul>
                            <li><a href="order.php"><i class="fa fa-window-maximize" aria-hidden="true"></i>My
                                    Orders</a>
                            </li>
                            <li class="active"><a href="#"><i class="fa fa-user" aria-hidden="true"></i>My
                                    Account</a></li>
                            <li><a href="wishlist.php"><i class="fa fa-heart" aria-hidden="true"></i>My Wishlist</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="tab">
                        <div class="tab_heading active">
                            <h5 class="mb-0">Pesonal Info</h5>
                        </div>
                        <div class="tab_body">
                            <form action="" method="post" id="infoform">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="name">Full Name</label>
                                            <input type="text" name="name" value="<?php echo $userdata['name'] ?>" id="name" class="form-control" required>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div>
                                                    <label for="">Gender</label>
                                                </div>
                                                <div class="form-check-inline">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input"
                                                           value="1" <?php echo ($userdata['gender']== 1) ?  "checked" : "" ;  ?> name="gender">Male
                                                    </label>
                                                </div>
                                                <div class="form-check-inline">
                                                    <label class="form-check-label">
                                                        <input type="radio"  class="form-check-input"
                                                        value="2" <?php echo ($userdata['gender']== 2) ?  "checked" : "" ;  ?>  name="gender">Female
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="email">Email</label>
                                            <input type="email" name="email" value="<?php echo $userdata['email'] ?>" id="email" class="form-control" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="number">Moblie Number</label>
                                            <input type="text" value="<?php echo $userdata['phone'] ?>" name="phone" id="number" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <input type="submit" name="savePd" class="btn" value="Save" />
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="tab mt-4">
                        <div class="tab_heading disactive">
                            <h5 class="mb-0">Billing Address</h5>
                        </div>
                        <div class="tab_body address" id="billingFormEdit">
                        <?php if ($userdata['billingpincode']) { ?>
                                <p><span><?php echo $userdata['billingaddress'].','.$userdata['billingcity'].','.$userdata['billingstate']; ?></span> -
                                <span class="span1"><?php echo $userdata['billingpincode']; ?><span></p>
                            <p><a  onclick="editBilling()" class="editdeletbtn" id="editbtn">Edit</a>
                             <!-- <a href="#" id="deletbtn" class="editdeletbtn">Delete</a> -->
                            </p>
                        <?php } else{
                            echo "Address not found";
                            echo '<a  onclick="editBilling()" class="editdeletbtn" id="editbtn">Add</a>';
                        }
                        
                        ?>
                        </div>
                        <div class="tab_body" id="billingForm">
                            <form action="myaccount.php" method="post" id="addressform">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="">Address</label>
                                            <textarea rows="4" required name="billingaddress" class="form-control"
                                                cols="50"><?php echo $userdata['billingaddress']; ?></textarea>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="">Pin Code</label>
                                            <input type="text" value="<?php echo $userdata['billingpincode']; ?>" name="billingpincode" id="pin" class="form-control" required>
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group mb-4">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="">City</label>
                                            <input type="text" value="<?php echo $userdata['billingcity']; ?>" name="billingcity" id="city" class="form-control" required>
                                            <!-- <select id="city" name="city" class="form-control" placeholder="city"
                                                required>
                                                <option value="India">Mumbai</option>
                                            </select> -->
                                        </div>
                                        <div class="col-md-6">
                                            <label for="">State</label>
                                            <input type="text" value="<?php echo $userdata['billingstate']; ?>" name="billingstate" id="state" class="form-control" required>
                                            <!-- <select id="state" name="state" class="form-control" placeholder="state"
                                                required>
                                                <option value="Maharashtra">Maharashtra</option>
                                            </select> -->

                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="form-group mb-4">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="">Country</label>
                                            <select id="country" name="country" class="form-control"
                                                placeholder="country" required>
                                                <option value="India">India</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="">Pin Code</label>
                                            <input type="text" name="pin" id="pin" class="form-control" required>
                                        </div>
                                    </div>
                                </div> -->
                                <div class="form-group d-flex justify-content-end">
                                    <input type="submit" name="submitBilling" class="btn" value="Save" />
                                </div>
                            </form>
                        </div>
                    </div>



                    <div class="tab mt-4">
                        <div class="tab_heading disactive">
                            <h5 class="mb-0">Shipping Address</h5>
                        </div>
                        <div class="tab_body address" id="shippingFormEdit">
                        <?php if ($userdata['shippingpincode']) { ?>
                                <p><span><?php echo $userdata['shippingaddress'].','.$userdata['shippingcity'].','.$userdata['shippingstate']; ?></span> -
                                <span class="span1"><?php echo $userdata['shippingpincode']; ?><span></p>
                            <p><a  onclick="editShipping()" class="editdeletbtn" id="editbtn">Edit</a> 
                            <!-- <a href="#" id="deletbtn" class="editdeletbtn">Delete</a> -->
                            </p>
                        <?php } else{
                            echo "Address not found";
                            echo '<a  onclick="editShipping()" class="editdeletbtn" id="editbtn">Add</a>';
                        }
                        
                        ?>
                        </div>
                        <div class="tab_body" id="shippingForm">
                            <form action="myaccount.php" method="post" id="addressform">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="">Address</label>
                                            <textarea rows="4" required name="shippingaddress" class="form-control"
                                                cols="50"><?php echo $userdata['shippingaddress']; ?></textarea>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="">Pin Code</label>
                                            <input type="text" value="<?php echo $userdata['shippingpincode']; ?>" name="shippingpincode" id="pin" class="form-control" required>
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group mb-4">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="">City</label>
                                            <input type="text" value="<?php echo $userdata['shippingcity']; ?>" name="shippingcity" id="city" class="form-control" required>
                                         </div>
                                        <div class="col-md-6">
                                            <label for="">State</label>
                                            <input type="text" value="<?php echo $userdata['shippingstate']; ?>" name="shippingstate" id="state" class="form-control" required>
                                           </div>
                                    </div>
                                </div>
                               
                                <div class="form-group d-flex justify-content-end">
                                    <input type="submit" name="submitShipping" class="btn" value="Save" />
                                </div>
                            </form>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>


    <script>
    function editBilling(){
        $("#billingForm").css({ display:'block'});
        $("#billingFormEdit").css({ display:'none'});
    }
    function editShipping(){
        $("#shippingForm").css({ display:'block'});
        $("#shippingFormEdit").css({ display:'none'});
    }
    </script>
    <?php
    require_once "footer.php";
?>