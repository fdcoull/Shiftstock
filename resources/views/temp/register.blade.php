<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Register</h2>
    <form action="/user/register" method="POST">
        @csrf
        <input type="text" placeholder="Username" name="username">
        <input type="text" placeholder="Email" name="email">
        <input type="password" placeholder="Password" name="password">
        <input type="text" placeholder="Business Name" name="businessName">
        <input type="text" placeholder="Recovery Email" name="recoveryEmail">
        <input type="Submit" value="Register">
    </form>
</body>
</html>