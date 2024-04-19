<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Shift stock</title>
  <script src="resources/js/scripts.js" defer></script>
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom CSS -->
  <style>
    /* Add your custom styles here */
    .jumbotron {
      background-image: url("{{ asset('images/home-banner.jpg') }}");
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

    #special-h5 {
        display: flex;
        justify-content:center;
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
    <h3 class="card-title" id="special-h5">Special Offers</h3>
    <div class="container">
        <div class="row">
            @foreach ($products as $product)
            <div class="col-md-4">
                <div class="card">
                    @if ($product->images->isNotEmpty())
                        <img src="{{ asset($product->images->first()->location) }}" class="card-img-top" alt="{{ $product->title }}">
                    @else
                        <img src="{{ asset('images/placeholder.png') }}" alt="Placeholder" class="card-img-top img-fluid">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->title }}</h5>
                        <p class="card-text">{{ $product->seller->business_name }}</p>
                        <a href="{{ route('product.show', $product->id) }}" class="btn btn-primary">Shop Now</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
<!-- Footer -->
  <footer class="bg-dark text-white text-center py-3">
    @include('footer')
  </footer>
  <!-- End Footer -->

  <!-- Bootstrap JS and jQuery (optional) -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
