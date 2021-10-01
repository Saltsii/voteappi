<?php session_start(); ?>
<?php include_once 'layout/top.inc.php'; ?>
<?php include_once 'layout/nav.inc.php'; ?>
<?php
if (!isset($_SESSION['logged_in'])){
  header('Location: index.php');
  die();
}
?>



    
<div class="jumbotron">
    <a href="#" class="display-3">Welcome to VoteApp admin view</a>
    <?php if (isset($_SESSION['logged_in'])): ?>
      <p>Olet kirjautunut käyttäjänä <?php echo $_SESSION['user_name']; ?></p>
    <?php endif; ?>
</div>

<div class="container">

  <div id="msg" class="alert alert-dismissible alert-warning d-none">
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    <h4 class="alert-heading">Onnistui</h4>
    <p class="mb-0"></a>.</p>
  </div>

      <h2>Votes</h2>
      <button class="btn btn-info" onclick="showPolls('current')">show current polls</button>
      <button class="btn btn-info" onclick="showPolls('old')">show old polls</button>
      <button class="btn btn-info" onclick="showPolls('future')">show future polls</button>
    <ul id="votesUl" class="list-group">
    </ul>
</div>

<script src="js/admin.js"></script>
<script src="js/common.js"></script>

<?php include_once 'layout/bottom.inc.php'; ?>

