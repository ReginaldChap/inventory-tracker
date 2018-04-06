<!doctype html>
<?php 
require_once('php/initialize.php');
?>
<?php

$model = $_POST['model'];
$brand = $_POST['brand'];
$colour = $_POST['colour'];
$quantity = $_POST['quantity'];

$sql = "INSERT INTO lures (modelID) VALUES (";
$sql .= "'" . $model . "'";
$sql .= ") ON DUPLICATE KEY UPDATE modelID=modelID;";
$sql .= "INSERT INTO brands (brandID) VALUES (";
$sql .= "'" . $brand . "'";
$sql .= ") ON DUPLICATE KEY UPDATE brandID=brandID;";
$sql .= "INSERT INTO colours (colourID) VALUES (";
$sql .= "'" . $colour . "'";
$sql .= ") ON DUPLICATE KEY UPDATE colourID=colourID;";
$sql .= "INSERT INTO lures_unique (modelID, brandID, colourID, quantity) VALUES (";
$sql .= "'" . $model . "', '" . $brand . "', '" . $colour . "', '" . $quantity . "'";
$sql .= ") ON DUPLICATE KEY UPDATE quantity=VALUES(quantity) + quantity;";

$result = mysqli_multi_query($db, $sql);

if ($result) {

} else {
  echo mysqli_error($db);
  db_disconnect($db);
  exit;
}
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
    <div class="container-fluid camera">
    </div>
    <div class="container">
      <div class="row">
        <div class="col-4">
          <div class="imgPlaceholder"></div>
        </div>
        <div class="col-8">
          <strong>Item: </strong>
          <?php echo $model ?>
          <br />
          <strong>Brand: </strong>
          <?php echo $brand ?>
          <br />
          <strong>Model: </strong>
          <?php echo $colour ?>
          <br />
          <strong>Quantity: </strong>
          <?php echo $quantity ?>
        </div>
      </div>
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