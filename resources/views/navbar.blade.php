<!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
	  <img src="file:///D:/Users/Emma%20Davidson/Downloads/main.png" alt="Logo" height="30" image-position="left">
        <a class="navbar-brand" href="{{ route('home') }}">Shift Stock</a> 
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
		<!-- Search form -->
    <form class="form-inline my-2 my-lg-0 ml-auto">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
    <!-- End of search form -->
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="{{ route('home') }}">Home</a>
            </li>
			 <li class="nav-item">
              <a class="nav-link" href="{{ route('listings.index') }}">Items</a>
            </li>
            		<li class="nav-item">
              <a class="nav-link" href="{{ route('aboutus') }}">About Us</a>
            </li>
			<li class="nav-item">
              <a class="nav-link" href="{{ route('login') }}">Log In</a>
            </li>
            
			<li class="nav-item">
              <a class="nav-link" href="{{ route('contactus') }}">Contact Us</a>
            </li>
		   <li class="nav-item">
              <a class="nav-link" href="{{ route('cart') }}">Cart</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
