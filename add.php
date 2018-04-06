<!doctype html>
<?php 
require_once('php/initialize.php');
?>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css">
	<link rel="stylesheet" href="app.css" type="text/css">
    <title>Inventory tracker</title>
</head>
<body>


	<div class="container">
	
  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
    <a class="navbar-brand" href="#">Lure Tracker</a>
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link" href="#">Add <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">List</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#">Search</a>
      </li>
    </ul>
  </div>
</nav>
	<div class="camera">
	</div>
	
<button id="snap">Snap Photo</button>
<canvas id="canvas" width="640" height="480"></canvas><video id="video" width="640" height="480" autoplay></video>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
	<h3>Add item</h3>
		<form class="formSpace" action="add-item.php" method="post">
			<div class="form-group row">
				<label for="model" class="col-3 col-form-label">Model</label>
				<div class="col-9">
					<input type="text" class="form-control" name="model" id="model" placeholder="Model">
				</div>
			</div>
			<div class="form-group row">
				<label for="brand" class="col-3 col-form-label">Brand</label>
				<div class="col-9">
					<input type="text" class="form-control" name="brand" id="brand" placeholder="Brand">
				</div>
			</div>
			<div class="form-group row">
				<label for="colour" class="col-3 col-form-label">Colour</label>
				<div class="col-9">
					<input type="text" class="form-control" name="colour" id="colour" placeholder="Colour">
				</div>
			</div>
			<div class="form-group row">
				<label for="quantity" class="col-3 col-form-label">Quantity</label>
				<div class="col-9">
					<input type="number" class="form-control" name="quantity" id="quantity" placeholder="quantity">
				</div>
			</div>
		
			  <button type="submit" class="btn btn-primary float-right">Add item</button>
			  <button type="submit" class="btn btn-danger float-left">Cancel</button>
		</form>
	</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js"></script>
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <!--TODO: use array from mysql -->
	<script>
$(function() {
    $( "#brand" ).autocomplete({
        source: 'search.php'
    });
});


// Grab elements, create settings, etc.
var video = document.getElementById('video');

// Get access to the camera!
if(navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
    // Not adding `{ audio: true }` since we only want video now
    navigator.mediaDevices.getUserMedia({ video: true }).then(function(stream) {
        video.src = window.URL.createObjectURL(stream);
        video.play();
    });
}

// Elements for taking the snapshot
var canvas = document.getElementById('canvas');
var context = canvas.getContext('2d');
var video = document.getElementById('video');

// Trigger photo take
document.getElementById("snap").addEventListener("click", function() {
	context.drawImage(video, 0, 0, 640, 480);
});
</script>
	</body>

</html>
<?php
	db_disconnect($db);
	?>