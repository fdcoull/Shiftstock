<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Items Page</title>
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
    /* Custom Styles */

    .item {
      margin-bottom: 30px;
    }

	.card item {
      border: 1px solid #ddd; /* Add a border with 1px width and color #ddd */
      border-radius: 5px; /* Optional: Add border radius for rounded corners */
      margin-bottom: 30px;
    }

    .btn-custom {
      background-color: #df7e64;
      border-color: #df7e64;
      color: #415a77;
    }

    .btn-custom:hover {
      background-color: #df7e64;
      border-color: #df7e64;
      color: #ffffff;
    }

    #searchform{
        margin-bottom: 2rem;
    }


  </style>


</head>
<body>
  <header>
    @include('navbar')
  </header>
	
 <!-- Button to add item -->
    <div class="container">
    <a id="addItemButton" href="{{ route('new-listing') }}" class="btn btn-custom mt-5">Add Item</a>
    </div>

    <!-- List to display added items -->
    <ul id="itemList">
      <!-- List items will be added here -->
    </ul>
  

  <!-- JavaScript to handle button click event -->
  <script src="script.js"></script>

  </header>

  <!-- Main Content -->
  <main class="container" >
    <h2 class="mt-5 mb-4">Available Items</h2>
    <form action="/listings" id="searchform">
      <input type="text" name="query" placeholder="Search items...">
      <input type="submit" value="Search">
    </form>
    
    <!-- Item Cards -->
    <div class="row">
      @foreach($listings as $listing)
      <div class="col-md-4">
        <div class="card item">
          <img src="{{ asset('storage/' . $listing->image_path) }}" class="card-img-top" alt="Item Image">
          <div class="card-body">
            <h5 class="card-title">{{ $listing->title }}</h5>
            <p class="card-text">{{ $listing->description }}</p>
            <a href="/product/{{ $listing->id }}" class="btn btn-primary">More Details</a>
          </div>
        </div>
      </div>
      @endforeach
    </div>
    <!-- End Item Cards -->
  </main>
  <!-- End Main Content -->

  <!-- Bootstrap JS (Optional) -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
