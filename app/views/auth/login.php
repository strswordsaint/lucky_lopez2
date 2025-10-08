<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

  <style>
    body {
      margin: 0;
      font-family: "Poppins", sans-serif;
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      background: url('<?= base_url() . "public/image/BG2.jpg"; ?>') no-repeat center center/cover;
      padding: 20px;
      overflow: hidden;
    }

    /* Glass Container */
    .glass-container {
      width: 100%;
      max-width: 420px;
      padding: 40px;
      background: rgba(255, 255, 255, 0.12);
      backdrop-filter: blur(14px);
      border-radius: 20px;
      border: 1px solid rgba(212, 175, 55, 0.4);
      box-shadow: 0 12px 28px rgba(30, 86, 49, 0.25);
      text-align: center;
      transition: all 0.3s ease;
    }

    h2 {
      font-size: 1.9em;
      font-weight: 700;
      color: #1e5631;
      margin-bottom: 25px;
      letter-spacing: 0.5px;
    }

    .form-group {
      margin-bottom: 18px;
      position: relative;
      text-align: left;
    }

    .form-group input {
      width: 100%;
      padding: 12px 14px;
      border: 1.5px solid #a38b00;
      border-radius: 12px;
      background: rgba(255, 255, 255, 0.8);
      color: #1e5631;
      font-size: 15px;
      transition: all 0.3s ease;
      box-sizing: border-box;
    }

    .form-group input:focus {
      border-color: #1e5631;
      box-shadow: 0 0 10px rgba(30, 86, 49, 0.35);
      background: #fff;
      transform: scale(1.02);
      outline: none;
    }

    /* Red highlight for wrong input */
    .invalid-input {
      border-color: #c62828 !important;
      background: rgba(255, 0, 0, 0.08);
    }

    .toggle-password {
      position: absolute;
      right: 14px;
      top: 50%;
      transform: translateY(-50%);
      cursor: pointer;
      font-size: 1.2em;
      color: #a38b00;
      transition: transform 0.4s ease, color 0.3s ease;
    }

    .toggle-password:hover {
      color: #1e5631;
      transform: translateY(-50%) rotate(15deg);
    }

    .btn-submit {
      width: 100%;
      padding: 14px;
      border: none;
      border-radius: 12px;
      background: linear-gradient(135deg, #1e5631, #a38b00);
      color: #fff;
      font-size: 1.1em;
      font-weight: 600;
      cursor: pointer;
      box-shadow: 0 6px 12px rgba(30, 86, 49, 0.35);
      transition: all 0.3s ease;
    }

    .btn-submit:hover {
      background: linear-gradient(135deg, #144423, #c7a600);
      transform: translateY(-2px) scale(1.03);
      box-shadow: 0 10px 20px rgba(30, 86, 49, 0.4);
    }

    .btn-submit:active {
      transform: scale(0.97);
    }

    .text-center {
      margin-top: 20px;
    }

    .text-center a {
      color: #ffffff;
      font-weight: 600;
      text-decoration: none;
      transition: color 0.3s ease, text-shadow 0.3s ease;
    }

    .text-center a:hover {
      text-decoration: underline;
      color: #a38b00;
      text-shadow: 0 0 6px rgba(163,139,0,0.5);
    }

    /* Shake animation */
    @keyframes shake {
      0%, 100% { transform: translateX(0); }
      20% { transform: translateX(-10px); }
      40% { transform: translateX(10px); }
      60% { transform: translateX(-10px); }
      80% { transform: translateX(10px); }
    }

    .shake {
      animation: shake 0.5s;
    }

  </style>
</head>
<body>
  <div class="glass-container" id="loginContainer">
    <h2>Login</h2>

    <form method="post" action="<?= site_url('auth/login') ?>" id="loginForm">
      <div class="form-group">
        <input type="text" name="username" placeholder="Username" required value="<?= isset($_POST['username']) ? html_escape($_POST['username']) : ''; ?>" 
               class="<?= !empty($error) ? 'invalid-input' : ''; ?>">
      </div>

      <div class="form-group">
        <input type="password" name="password" id="password" placeholder="Password" required 
               class="<?= !empty($error) ? 'invalid-input' : ''; ?>">
        <i class="fa-solid fa-eye toggle-password" id="togglePassword"></i>
      </div>

      <button type="submit" class="btn-submit">Login</button>
    </form>

    <div class="text-center">
      <p>
        Don’t have an account?
        <a href="<?= site_url('auth/register'); ?>">Register here</a>
      </p>
    </div>
  </div>

  <script>
    const togglePassword = document.getElementById('togglePassword');
    const password = document.getElementById('password');
    const container = document.getElementById('loginContainer');

    togglePassword.addEventListener('click', function () {
      const type = password.type === 'password' ? 'text' : 'password';
      password.type = type;
      this.classList.toggle('fa-eye');
      this.classList.toggle('fa-eye-slash');
    });

    // Shake the container if there's an error
    <?php if(!empty($error)): ?>
      container.classList.add('shake');
      container.addEventListener('animationend', function() {
        container.classList.remove('shake');
      });
    <?php endif; ?>
  </script>
</body>
</html>
