<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About Us - ShiftStock</title>
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
   <style>
      body {
          display: flex;
          flex-direction: column;
          min-height: 100vh;
        }

    main {
      flex: 1;
    }

    footer {
      background-color: #343a40; /* Dark color for the footer */
      color: #fff; /* Text color for the footer */
      text-align: center;
      padding: 20px 0; /* Padding for the footer */
      width: 100%; /* Full width */
      position: fixed; /* Fixed position */
      bottom: 0; /* Position at the bottom of the viewport */
      left: 0; /* Align to the left */
    }
    
    /* Add your custom styles here */
    .jumbotron {
      background-image: url("{{ asset('images/about-contact-banners.jpg') }}");
      background-size: cover; 
	  background-repeat: no-repeat;
	  background-position: center; /* Center the background image */
      color: #fff;
      padding: 100px 0;
      text-align: center;
      padding: 100px 0;
    }

  </style>
</head>
<body>
  <header>
    @include('navbar')
  </header>

  <!-- Main Content -->
  <main>
    <!-- Jumbotron -->
    <section class="jumbotron">
      <div class="container">
        <h1 class="display-4">About ShiftStock</h1>
        <p class="lead">We are a leading company in the buying and selling of stock.</p>
      </div>
    </section>
    <!-- End Jumbotron -->

    <!-- About Section -->
    <section class="container">
      <div class="row">
        <div class="col-md-6">
          <h2>Our Mission</h2>
          <p>We strive to provide excellent service to our clients and help them achieve their financial goals through strategic stock trading.</p>
        </div>
        <div class="col-md-6">
          <h2>Our Vision</h2>
          <p>To become the most trusted and preferred platform for individuals and businesses to engage in stock trading activities.</p>
        </div>
      </div>
    </section>
    <!-- End About Section -->
  </main>
  <!-- End Main Content -->

  <!-- Footer -->
  <footer class="bg-dark text-white text-center py-3">
    @include('footer')
  </footer>
  <!-- End Footer -->

  <!-- Bootstrap JS (Optional) -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
