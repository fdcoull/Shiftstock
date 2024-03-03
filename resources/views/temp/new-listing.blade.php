<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="/listings/new" method="POST">
        @csrf
        <input type="text" name="title" placeholder="Title">
        <input type="text" name="description" placeholder="Description">
        <input type="text" name="packaging" placeholder="Packaging">
        <input type="text" name="weight" placeholder="Weight">
        <input type="text" name="weight_unit" placeholder="Weight Unit">
        <input type="text" name="price" placeholder="Price">
        <input type="text" name="currency" placeholder="Currency (In 3 character ISO format)">
        <input type="text" name="age" placeholder="Item Age">
        <input type="submit" value="Add">
    </form>
</body>
</html>