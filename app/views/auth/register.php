<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Register</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

  <style>
    * { box-sizing: border-box; }

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

    /* Glass Card */
    .glass-container {
      width: 100%;
      max-width: 460px;
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

    input, select {
      width: 100%;
      padding: 12px 14px;
      border: 1.5px solid #a38b00;
      border-radius: 12px;
      background: rgba(255, 255, 255, 0.75);
      color: #1e5631;
      font-size: 15px;
      transition: all 0.3s ease;
    }

    input:focus, select:focus {
      border-color: #1e5631;
      box-shadow: 0 0 10px rgba(30, 86, 49, 0.45);
      background: #fff;
      transform: scale(1.02);
      outline: none;
    }

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
    }

    .toggle-password:hover { color: #1e5631; }

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
      box-shadow: 0 6px 14px rgba(30, 86, 49, 0.35);
      transition: all 0.25s ease;
    }

    .btn-submit:hover { background: #144423; transform: translateY(-2px); }
    .btn-submit:active { transform: scale(0.98); box-shadow: 0 3px 8px rgba(30, 86, 49, 0.4); }

    .text-center { margin-top: 20px; }
    .text-center a { color: #fff; font-weight: 600; text-decoration: none; }
    .text-center a:hover { color: #a38b00; text-decoration: underline; }

    /* Shake animation */
    @keyframes shake {
      0%, 100% { transform: translateX(0); }
      25% { transform: translateX(-6px); }
      50% { transform: translateX(6px); }
      75% { transform: translateX(-4px); }
    }

    .shake { animation: shake 0.5s; }

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
  </style>
</head>

<body>
  <div class="glass-container" id="registerContainer">
    <h2>Register</h2>

    <?php if (!empty($error)): ?>
      <div class="error-message"><?= $error ?></div>
    <?php endif; ?>

    <form method="POST" action="<?= site_url('auth/register'); ?>">
      <div class="form-group">
        <input type="text" name="username" placeholder="Username" required 
               value="<?= isset($_POST['username']) ? html_escape($_POST['username']) : ''; ?>"
               class="<?= !empty($error) ? 'invalid-input' : ''; ?>">
      </div>

      <div class="form-group">
        <input type="email" name="email" placeholder="Email" required
               value="<?= isset($_POST['email']) ? html_escape($_POST['email']) : ''; ?>"
               class="<?= !empty($error) ? 'invalid-input' : ''; ?>">
      </div>

      <div class="form-group">
        <input type="password" name="password" id="password" placeholder="Password" required
               class="<?= !empty($error) ? 'invalid-input' : ''; ?>">
        <i class="fa-solid fa-eye toggle-password" id="togglePassword"></i>
      </div>

      <div class="form-group">
        <input type="password" name="confirm_password" id="confirmPassword" placeholder="Confirm Password" required
               class="<?= !empty($error) ? 'invalid-input' : ''; ?>">
        <i class="fa-solid fa-eye toggle-password" id="toggleConfirmPassword"></i>
      </div>

      <div class="form-group">
        <select name="role" required>
          <option value="user" <?= isset($_POST['role']) && $_POST['role']=='user' ? 'selected' : 'selected'; ?>>User</option>
          <option value="admin" <?= isset($_POST['role']) && $_POST['role']=='admin' ? 'selected' : ''; ?>>Admin</option>
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
    // Password toggle
    function toggleVisibility(toggleId, inputId) {
      const toggle = document.getElementById(toggleId);
      const input = document.getElementById(inputId);
      toggle.addEventListener('click', function () {
        input.type = input.type === 'password' ? 'text' : 'password';
        this.classList.toggle('fa-eye');
        this.classList.toggle('fa-eye-slash');
      });
    }
    toggleVisibility('togglePassword', 'password');
    toggleVisibility('toggleConfirmPassword', 'confirmPassword');

    // Shake container on error
    <?php if(!empty($error)): ?>
      const container = document.getElementById('registerContainer');
      container.classList.add('shake');
      container.addEventListener('animationend', function() {
        container.classList.remove('shake');
      });
    <?php endif; ?>
  </script>
</body>
</html>
