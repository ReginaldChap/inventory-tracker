<!doctype html>
<?php 
require_once('php/initialize.php');
?>
<!--?php

$itemName = $_POST['itemName'];
$brand = $_POST['brand'];
$model = $_POST['model'];
$quantity = $_POST['quantity'];

$sql = "INSERT INTO items ";
$sql .= "(item_name, brands_id, model, quantity) ";
$sql .= "VALUES (";
$sql .= "'" . $itemName . "',";
$sql .= "'" . $brand . "',";
$sql .= "'" . $model . "',";
$sql .= "'" . $quantity . "'";
$sql .= ")";
$result = mysqli_query($db, $sql);

if ($result) {

} else {
  echo mysqli_error($db);
  db_disconnect($db);
  exit;
}
?-->

<?php

$item_set = findAllItems();

?>

  <html lang="en">

  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
      crossorigin="anonymous">
    <link rel="stylesheet" href="app.css" type="text/css">
    <title>Inventory tracker</title>
  </head>

  <body>
    <div class="container">
    <h1>All items</h1>
    <?php 
      while($item = mysqli_fetch_assoc($item_set)) { 
        ?>
      <div class="row top-buffer">      
        <div class="col-4">
          <div class="imgPlaceholder"></div>
        </div>
        <div class="col-8">
          <strong>Item: </strong>
          <?php echo $item["model"]; ?>
          <br />
          <strong>Brand: </strong>
          <?php echo $item["brand_name"]; ?>
          <br />
          <strong>Model: </strong>
          <?php echo $item["colour"]; ?>
          <br />
          <strong>Quantity: </strong>
          <?php echo $item["quantity"]; ?>
        </div>
      </div>
      <?php 
      }
        ?>
      <?php 
      mysqli_free_result($item_set);
      ?>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
      crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
      crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
      crossorigin="anonymous"></script>
  </body>

  </html>
  <?php
	db_disconnect($db);
	?>