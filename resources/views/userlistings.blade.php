<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Listings</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2 class="h2 mt-3">Your Listings</h2>
        <div class="row">
            @foreach($listings as $listing)
            <div class="col-md-4">
                <div class="card">
                    @if($listing->images->count() > 0)
                        <img src="{{ asset($listing->images->first()->location) }}" class="card-img-top" alt="Listing Image">
                        @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $listing->title }}</h5>
                        <a href="{{ route('product.show', ['id' => $listing->id]) }}" class="btn btn-primary">View Product</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</body>
</html>
