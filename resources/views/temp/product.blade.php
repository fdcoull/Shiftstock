<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @auth
        @if (Auth::user()->id == $listing['user_id'])
            <a href="/product/{{$listing['id']}}/upload">Re-Upload Images</a>
        @endif
    @endauth
    <h1>{{$listing['title']}}</h1>
    <p>{{$listing['description']}}</p>
    @foreach ($images as $image)
        <img src="{{asset($image->location)}}">
    @endforeach
</body>
</html>