<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$listing->title}} - Item Details</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }
        .container2 {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .item {
            text-align: center;
        }
        .item img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
        }
        .item h2 {
            font-size: 24px;
            color: #333;
        }
        .item p {
            font-size: 16px;
            color: #666;
        }
        .item button {
            background-color: #007bff;
            color: #fff;
            border-radius: 5px;
            font-size: 18px;
            cursor: pointer;
        }
        .item button:hover {
            background-color: #0056b3;
        }

        .carousel-control-prev-icon,
        .carousel-control-next-icon {
        background-color: black; /* Change the color of the carousel control arrows */
        box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5); /* Add shadow effect to the arrows */
        }

        p {
        margin-bottom: 0;
        }
    </style>
</head>
<body>
@include('navbar')

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="max-width: 30rem; margin: auto;">
                <ol class="carousel-indicators">
                    @foreach($listingImages as $index => $image)
                        <li data-target="#carouselExampleIndicators" data-slide-to="{{ $index }}" class="{{ $index === 0 ? 'active' : '' }}"></li>
                    @endforeach
                </ol>
                <div class="carousel-inner">
                    @foreach($listingImages as $index => $image)
                        <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                            <img class="d-block w-100" src="{{ asset($image->location) }}" alt="{{ $listing->title }}">
                        </div>
                    @endforeach
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <div class="col-md-6">
            <div class="item">
                <h2>{{$listing->title}}</h2>
                <p>Description: {{$listing->description}}</p>
                <p>Packaging: {{$listing->packaging}}</p>
                <p>Weight: {{$listing->weight}} {{$listing->weight_unit}}</p>
                <p>Quantity In Hand: {{$listing->quantity_inhand}}</p>
                <p>Price: {{$listing->price}} {{$listing->currency}} </p>
                <p>Age: {{$listing->age}} years</p>
                <p>Expiry: {{$listing->expiry}}</p>

                @auth
                    @if (Auth::user()->id == $listing->user_id)
                        <a href="/product/{{$listing->id}}/edit" class="btn btn-info">Edit</a>
                        <form action="/product/{{$listing->id}}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    @else
                        <a href="#" class="btn btn-primary">Buy Now</a>
                    @endif
                @else
                    <a href="#" class="btn btn-primary">Buy Now</a>
                @endauth
            </div>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
