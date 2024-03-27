<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Login</h2>
    <form action="/user/login" method="POST">
        @csrf
        <input type="text" placeholder="Email" name="email">
        <input type="password" placeholder="Password" name="password">
        <input type="Submit" value="Login">
    </form>
</body>
</html>