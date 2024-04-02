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
        <input type="number" name="weight" placeholder="Weight">
        <select name="weight_unit">
            <option value="KG">Kilogram</option>
            <option value="G">Gram</option>
            <option value="TN">Metric Tonne</option>
            <option value="OZ">Ounce</option>
            <option value="LB">Pound</option>
            <option value="ST">Stone</option>
        </select>
        <input type="number" name="quantity_inhand" placeholder="Quantity">
        <input type="number" name="price" placeholder="Price">
        <select name="currency">
            <option value="GBP">British Pound</option>
            <option value="EUR">Euro</option>
            <option value="USD">US Dollar</option>
        </select>
        Age: <input type="date" name="age">
        Expiry: <input type="date" name="expiry">
        <input type="submit" value="Add">
    </form>

    <br>
    

    @auth
    {{Auth::user()->name}}
    @else
    <p>Not logged in</p>
    @endauth
</body>
</html>