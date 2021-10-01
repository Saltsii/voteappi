<?php include_once 'layout/top.inc.php'; ?>
<?php include_once 'layout/nav.inc.php'; ?>

<div class="container">

  <div id="msg" class="alert alert-dismissible alert-warning d-none">
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    <h4 class="alert-heading">Warning!</h4>
    <p class="mb-0"></a>.</p>
  </div>

  <form name="login">
    <fieldset>
      <legend>Login</legend>
      <div class="form-group">
        <label for="username" class="form-label mt-4">Username</label>
        <input name="username" type="username" class="form-control" id="name" placeholder="Enter username">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1" class="form-label mt-4">Password</label>
        <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </fieldset>
  </form>
</div>

<script src="js/common.js"></script>
<script src="js/login.js"></script>

<?php include_once 'layout/bottom.inc.php'; ?>