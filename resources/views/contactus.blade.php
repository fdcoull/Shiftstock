<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Us - ShiftStock</title>
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
    /* Custom Styles */
    .jumbotron {
      background-image: url("{{ asset('images/about-contact-banners.jpg') }}");
      background-size: cover; 
	  background-repeat: no-repeat;
	  background-position: center; /* Center the background image */
      color: #fff;
      text-align: center;
      padding: 100px 0;
    }

    #submit_btn {
        margin-bottom:1rem;
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
        <h1 class="display-4">Contact Us</h1>
        <p class="lead">We're here to help. Contact us if you have any questions or inquiries.</p>
      </div>
    </section>
    <!-- End Jumbotron -->

    <!-- Contact Form -->
    <section class="container">
      <div class="row justify-content-center">
        <div class="col-md-6">

          <form action="/contact/new" method="POST">
          @csrf
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name">
			  <!-- need to connect it to a php form so that it will register-->
            </div>
            <div class="form-group">
              <label for="email">Email address</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email">
            </div>
            <div class="form-group">
              <label for="message">Message</label>
              <textarea class="form-control" id="message" name="message" rows="5" placeholder="Enter your message"></textarea>
            </div>
            <button type="submit" class="btn btn-primary" id="submit_btn">Submit</button>
			<!--- need to add the php form to send a message to the user-->
          </form>

        </div>
      </div>
    </section>
    <!-- End Contact Form -->
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
