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
    </style>
</head>
<body>
@include('navbar')

<div class="container">
    @if($listing)
        <div class="item">
            <img src="{{ asset('uploads/' . $listing->image_path) }}" alt="{{$listing->title}}">
            <h2>{{$listing->title}}</h2>
            <p>{{$listing->description}}</p>
            <p>Price: £{{$listing->price}}</p>
            <p>Stock Age: {{$listing->age}} years</p>

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
    @else
        <p>Listing not found.</p>
    @endif
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
