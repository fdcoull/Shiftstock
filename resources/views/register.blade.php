<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
  body {

  margin: 0;
  padding: 0;
  font-family: Arial, sans-serif;
  background: url('background.jpg') no-repeat center center fixed;
  background-size: cover;
}

.login-container {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
}

.login-box {
  background-color: rgba(255, 255, 255, 0.8);
  border-radius: 8px;
  padding: 40px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
  text-align: center;
}

.login-box h2 {
  margin-bottom: 20px;
  color: #333;
}

.form-group {
  margin-bottom: 20px;
}

label {
  display: block;
  margin-bottom: 5px;
  color: #666;
}

input[type="text"],
input[type="password"],
input[type="email"]{
  width: calc(100% - 20px);
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
}

button {
  width: calc(100% - 20px);
  padding: 10px;
  background-color: #007bff;
  color: #fff;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.3s;
}

button:hover {
  background-color: #0056b3;
}

.additional-info {
  margin-top: 20px;
}

.additional-info a {
  text-decoration: none;
  color: #007bff;
}

.additional-info a:hover {
  text-decoration: underline;
}

</style>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <header>
    @include('navbar')
  </header>


</head>
<body>
  <div class="login-container">
    <div class="login-box">
      <h2>Register Here</h2>
      <form action="/user/register" method="POST">
      @csrf

        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" id="username" name="name" placeholder="Enter your Name">
        </div>

        <div class="form-group">
          <label for="email">Email</label>
          <input type="text" id="email" name="email" placeholder="Enter your Email">
        </div>

        <div class="form-group">
          <label for="business_name">Business Name</label>
          <input type="text" id="business_name" name="business_name" placeholder="Enter your Business Name">
        </div>

        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" id="password" name="password" placeholder="Enter your password">
        </div>

        <button type="submit">Login</button>
      </form>
      <div class="additional-info">
        <a href="#">Forgot password?</a>
        <span>Don't have an account? <a href="{{ route('register') }}">Sign up</a></span>
      </div>
    </div>
  </div>
</body>
<script src="script.js"></script>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</html>

