<?php include_once 'layout/top.inc.php'; ?>
<?php include_once 'layout/nav.inc.php'; ?>

<div class="container">

<div id="msg" class="alert alert-dismissible alert-warning d-none">
  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
  <h4 class="alert-heading">Warning!</h4>
  <p class="mb-0"></a>.</p>
</div>


<form name="register">
    <fieldset>
      <legend>Register</legend>
      <div class="form-group">
        <label for="username" class="form-label mt-4">Username</label>
        <input name="username" type="username" class="form-control" id="name" placeholder="Enter username">
      </div>
      <div class="form-group">
        <label for="password" class="form-label mt-4">Password</label>
        <input name="password" type="password" class="form-control" id="passwd" placeholder="Password">
      </div>
      <div class="form-group">
        <label for="password" class="form-label mt-4">Confirm password</label>
        <input name="confirmPassword" type="password" class="form-control" id="confirm" placeholder="Password">
      </div>
      <div class="form-group">
        <label for="formFile" class="form-label mt-4">Default file input example</label>
        <input class="form-control" type="file" id="formFile">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </fieldset>
  </form>

</div>

  <script src="js/register.js"></script>
  <script src="js/common.js"></script>

<?php include_once 'layout/bottom.inc.php'; ?>