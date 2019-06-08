<?php
require_once "db.php";
require_once "header.php";

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    // echo $_POST['id'].'aaa';
    $data_array =  array("oldpass"=>$_POST['oldpass'],"newpass"=>$_POST['newpass']);
    $make_call = callAPI('POST', 'changePassword', json_encode($data_array));
    $response = json_decode($make_call, true);
      if($response['value']){
        echo "<script>showToaster('Password changed successfully','success');</script>";
         }else{
             ?>
        
      <script>
      var msg = "<?php echo $response['message'];?>";
      showToaster(msg,'error');</script>
      <?php
    }
   }
?>
<div class="container-fluid details-container" id="change_password">
    <div class="container">
        <div id="changepassword_container">
            <div class="row">
                <div class="col-md-6 col-xl-5 m-auto">
                    <div class="tab">
                        <div class="tab_heading active">
                            <h5 class="mb-0">Change Password</h5>
                        </div>
                        <div class="tab_body">
                            <form method="POST" action="changepassword.php" id="changepassword">
                                <div class="form-group">
                                    <label for="oldpass">Old Password</label>
                                    <input type="password" name="oldpass" id="oldpass" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="newpass">New Password</label>
                                    <input type="password" name="newpass" id="newpass" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="conpass">Confirmed Password</label>
                                    <input type="password" name="conpass" id="conpass" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <button type="submit" name="changepass" class="btn" id="changepass">Save
                                        Changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    require_once "footer.php";
?>