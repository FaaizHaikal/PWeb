<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Math Quiz</title>
    <link rel="stylesheet" href="./style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/5f60200bd3.js" crossorigin="anonymous"></script>
  </head>
  <body>
    <div class="form">
      <div class="form-container login active">
        <form action="#">
          <h1>Login</h1>
          <div class="input-box">
            <input type="text" placeholder="Username">
            <i class="fas fa-user"></i>
          </div>
          <div class="input-box">
            <input type="password" placeholder="Password">
            <i class="fa-solid fa-lock"></i>
          </div>
          <div class="forgot-box">
            <a href="#">Forgot password?</a>
          </div>
          <button onclick="handleLogin()" class="login-signup-button">Login</button>
          <div class="login-signup-link">
            Don't have an account? <a href="#" id="signup">Sign up now</a>
          </div>
        </form>
      </div>

      <div class="form-container signup">
        <h1>Sign Up</h1>
        <div class="input-box">
          <input type="email" placeholder="Email">
          <i class="fa-solid fa-envelope"></i>
        </div>
        <div class="input-box">
          <input type="text" placeholder="Username">
          <i class="fas fa-user"></i>
        </div>
        <div class="input-box">
            <input type="password" placeholder="Password">
            <i class="fa-solid fa-lock"></i>
        </div>
        <button onclick="handleSignUp()" class="login-signup-button">Sign Up</button>
        <div class="login-signup-link">
            Already have an account? <a href="#" id="login">Login</a>
        </div>
      </div>
    </div>


    <script src="./script.js"></script>
  </body>
<html>