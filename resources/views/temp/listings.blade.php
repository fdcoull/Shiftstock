<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <h1>Listings</h1>
    <form action="/" >
        <input type="text" name="query">
        <input type="submit" value="Search">
    </form>
    @foreach($listings as $listing)
    <div>
        <a href="/product/{{$listing['id']}}"><h2>{{$listing['title']}}</h2></a>
        <p>{{$listing['description']}}</p>
    </div>
    @endforeach
    
</body>
</html>