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
        <input type="text" placeholder="Name" name="name">
        <input type="text" placeholder="Email" name="email">
        <input type="text" placeholder="Business Name" name="business_name">
        <input type="password" placeholder="Password" name="password">
        <input type="Submit" value="Register">
    </form>
</body>
</html>