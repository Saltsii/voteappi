<?php session_start(); ?>
<?php 
if (!isset($_SESSION['logged_in'])){
  header('Location: index.php');
  die();
}
?>

<?php include_once 'layout/top.inc.php'; ?>
<?php include_once 'layout/nav.inc.php'; ?>


<div class="container">

  <div id="msg" class="alert alert-dismissible alert-warning d-none">
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    <h4 class="alert-heading">Warning!</h4>
    <p class="mb-0"></a>.</p>
  </div>


  <form name="editPoll">
      <fieldset>
        <legend>Edit Poll</legend>
        <div class="form-group">
          <input type="hidden" name ="id"
          <label for="topic" class="form-label mt-4">Topic</label>
          <input name="topic" type="username" class="form-control" placeholder="topic">
        </div>
        <div class="form-group">
          <label for="start" class="form-label mt-4">Start</label>
          <input name="start" type="date" class="form-control">
        </div>
        <div class="form-group">
          <label for="end" class="form-label mt-4">End</label>
          <input name="end" type="date" class="form-control">
        </div>

        <h4>Poll options</h4> <button class="btn btn-primary" id="addOption">Add option</button>
        
      <!-- Additional options go here -->

        <!-- <div class="form-group">
          <label for="formFile" class="form-label mt-4">Default file input example</label>
          <input class="form-control" type="file" id="formFile">
        </div> -->
      </fieldset>
      <button type="submit" class="btn btn-primary">Save poll</button>
      <button id="deleteLastOption" class="btn btn-danger">Delete last option</button>
    </form>

</div>

  <script src="js/editPoll.js"></script>
  <script src="js/common.js"></script>

        <?php include_once 'layout/bottom.inc.php'; ?>