<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Forgot Password</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
  body{
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
      text-align:left;
    }

    input[type="text"],
    input[type="email"] {
      width: calc(100% - 20px);
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    #reset_btn {
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
</head>
<body>
  <header>
    @include('navbar')
  </header>
  <div class="login-container">
    <div class="login-box">
      <h2>Reset Password</h2>
      <!-- Form to reset password -->
        <form method="POST" action="{{ route('resetpassword', $token) }}">
            @csrf
            <div class="form-group">
                <label for="password">New Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter your new password">
            </div>
            <div class="form-group">
                <label for="password_confirmation">Confirm New Password</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm your new password">
            </div>
            <button type="submit" class="btn btn-primary">Reset Password</button>
        </form>

      <div class="additional-info">
        <span>Remember your password? <a href="{{ route('login') }}">Login</a></span>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
  <footer class="bg-dark text-white text-center py-3">
    @include('footer')
  </footer>
</html>
