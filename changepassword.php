<?php
require_once "db.php";
require_once "header.php";
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
                            <form action="post" id="changepassword">
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