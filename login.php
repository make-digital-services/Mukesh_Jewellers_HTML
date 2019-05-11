<?php
require_once "db.php";
require_once "header.php";
?>


<div class="col-lg-3" style="margin:10% auto;">
<form id="login_form">
  <div class="form-group">
    <label for="email">Username:</label>
    <input type="text" name="username" class="form-control" id="email">
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" name="password" class="form-control" id="pwd">
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>

<!-- load js -->
<script src="ajax/login.js"></script>
<?php
    require_once "footer.php";
?>