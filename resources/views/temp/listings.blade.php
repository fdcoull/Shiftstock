<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <h1>Listings</h1>
    @foreach($listings as $listing)
    <div>
        <h2>{{$listing['title']}}</h2>
        <p>{{$listing['description']}}</p>
    </div>
    @endforeach
    
</body>
</html>