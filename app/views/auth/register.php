<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Register</title>
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
      background: url('<?= base_url() . "public/image/BG3.jpg"; ?>') no-repeat center center/cover;
      padding: 20px;
    }

    .glass-container {
      width: 100%;
      max-width: 460px;
      padding: 40px;
      background: rgba(255, 255, 255, 0.1);
      backdrop-filter: blur(14px);
      border-radius: 20px;
      border: 1px solid rgba(212, 175, 55, 0.4);
      box-shadow: 0 12px 28px rgba(30, 86, 49, 0.25);
      text-align: center;
    }

    h2 {
      font-size: 1.8em;
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

    .form-group input,
    .form-group select {
      width: 100%;
      padding: 12px 14px;
      border: 1.5px solid #a38b00;
      border-radius: 12px;
      background: rgba(255, 255, 255, 0.75);
      color: #1e5631;
      font-size: 15px;
      transition: 0.3s ease;
      box-sizing: border-box;
    }

    .form-group input:focus,
    .form-group select:focus {
      border-color: #1e5631;
      box-shadow: 0 0 8px rgba(30, 86, 49, 0.35);
      background: #fff;
      outline: none;
    }

    /* Eye Icon */
    .toggle-password {
      position: absolute;
      right: 14px;
      top: 50%;
      transform: translateY(-50%);
      cursor: pointer;
      font-size: 1.2em;
      color: #a38b00;
      transition: color 0.3s ease;
    }

    .toggle-password:hover {
      color: #1e5631;
    }

    /* Button */
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
      transition: background-color 0.3s ease, transform 0.2s ease;
    }

    .btn-submit:hover {
      background: #144423;
      transform: translateY(-2px);
    }

    /* Error message */
    .error-message {
      background: rgba(255, 0, 0, 0.1);
      border: 1px solid rgba(255, 0, 0, 0.3);
      color: #a70000;
      border-radius: 12px;
      padding: 12px;
      margin-bottom: 18px;
      font-size: 0.9em;
      font-weight: 600;
      text-align: center;
    }

    .text-center {
      margin-top: 20px;
    }

    .text-center a {
      color: #ffffffff;
      font-weight: 600;
      text-decoration: none;
      transition: 0.3s;
    }

    .text-center a:hover {
      text-decoration: underline;
      color: #a38b00;
    }
  </style>
</head>
<body>
  <div class="glass-container">
    <h2>Register</h2>

    <?php if (!empty($error)): ?>
      <div class="error-message"><?= $error ?></div>
    <?php endif; ?>

    <form method="POST" action="<?= site_url('auth/register'); ?>">
      <div class="form-group">
        <input type="text" name="username" placeholder="Username" required>
      </div>

      <div class="form-group">
        <input type="email" name="email" placeholder="Email" required>
      </div>

      <div class="form-group">
        <input type="password" name="password" id="password" placeholder="Password" required>
        <i class="fa-solid fa-eye toggle-password" id="togglePassword"></i>
      </div>

      <div class="form-group">
        <input type="password" name="confirm_password" id="confirmPassword" placeholder="Confirm Password" required>
        <i class="fa-solid fa-eye toggle-password" id="toggleConfirmPassword"></i>
      </div>

      <div class="form-group">
        <select name="role" required>
          <option value="user" selected>User</option>
          <option value="admin">Admin</option>
        </select>
      </div>

      <button type="submit" class="btn-submit">Register</button>
    </form>

    <div class="text-center">
      <p>Already have an account? 
        <a href="<?= site_url('auth/login'); ?>">Login here</a>
      </p>
    </div>
  </div>

  <script>
    function toggleVisibility(toggleId, inputId) {
      const toggle = document.getElementById(toggleId);
      const input = document.getElementById(inputId);

      toggle.addEventListener('click', function () {
        const type = input.type === 'password' ? 'text' : 'password';
        input.type = type;

        this.classList.toggle('fa-eye');
        this.classList.toggle('fa-eye-slash');
      });
    }

    toggleVisibility('togglePassword', 'password');
    toggleVisibility('toggleConfirmPassword', 'confirmPassword');
  </script>
</body>
</html>
