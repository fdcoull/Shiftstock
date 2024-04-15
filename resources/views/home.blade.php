<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Shift stock</title>
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom CSS -->
  <style>
    /* Add your custom styles here */
    .jumbotron {
      background-image: url("file:///D:/Users/Emma%20Davidson/Downloads/home-banner.jpg");
      background-size: cover; 
	  background-repeat: no-repeat;
	  background-position: center; /* Center the background image */
      color: #fff;
      padding: 100px 0;
    }
    .card {
      margin-bottom: 20px;
    }
	.navbar-brand img {
      margin-right: 40px; /* Adjust the margin if needed */
    }
  </style>
  
  <header>
    @include('navbar')
  </header>
</head>
<body>

  <div class="jumbotron text-center">
    <h1 class="display-4">Welcome to shiftstock</h1>
    <p class="lead">click here to go to our stock available to buy and sell.</p>
    <a class="btn btn-primary btn-lg" href="{{ route('aboutus') }}" role="button">Learn more</a>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <div class="card">
          <img src="file:///D:/Users/Emma%20Davidson/Downloads/apron.jpg" class="card-img-top" alt="Special Offer 1">
          <div class="card-body">
            <h5 class="card-title">Special Offer 1</h5>
			<p class="card-text" id="text"> we now have PVC Aprons on offer Check out our limited-time offer.</p>
			<button onclick="changeTextSize()">Increase Text Size</button>
			<script src="https://github.com/emma123456789101/test-gp/blob/main/scripts.js"></script>
            <a href=#>Items class="btn btn-primary">Shop Now</a>
          </div>
        </div>
      </div>
      <!-- Add more cards or content here -->
    </div>
  </div>
<!-- Footer -->
  <footer class="bg-dark text-white text-center py-3">
    <div class="container">
      <p>&copy; 2024 shiftstock. All rights reserved.</p>
    </div>
  </footer>
  <!-- End Footer -->

  <!-- Bootstrap JS and jQuery (optional) -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
