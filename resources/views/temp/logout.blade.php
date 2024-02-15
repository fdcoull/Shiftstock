<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Logout</h2>
    <form action="/user/logout" method="POST">
        @csrf
        <input type="Submit" value="Logout">
    </form>
</body>
</html>