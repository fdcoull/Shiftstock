<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="/product/{{$listing->id}}/image" method="POST" enctype="multipart/form-data">
        @csrf
        <label>Upload images</label>
        <input type="file" name="images[]" multiple>
        <input type="submit" value="Add">
    </form>
    
</body>
</html>