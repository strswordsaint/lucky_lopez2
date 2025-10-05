<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Create User</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <!-- Google Fonts Poppins -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet" />

  <style>
    body {
      min-height: 100vh;
      margin: 0;
      font-family: "Poppins", sans-serif;
      background: url('<?= base_url() . "public/image/BG2.jpg"; ?>') no-repeat center center/cover;
      padding: 30px;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .card {
      border-radius: 16px;
      box-shadow: 0 8px 20px rgba(30, 86, 49, 0.3);
      background: rgba(255, 255, 255, 0.1);
      backdrop-filter: blur(12px);
      -webkit-backdrop-filter: blur(12px);
      max-width: 480px;
      width: 100%;
      border: 1px solid rgba(212, 175, 55, 0.4);
    }

    h2 {
      color: #1e5631;
      font-weight: 700;
      margin-bottom: 1.5rem;
      text-align: center;
      letter-spacing: 0.05em;
    }

    label {
      font-weight: 600;
      color: #1e5631;
    }

    input,
    select {
      border-radius: 12px;
      border: 1.5px solid #a38b00;
      padding: 0.65rem 1rem;
      font-size: 1rem;
      color: #1e5631;
      background: rgba(255, 255, 255, 0.75);
      transition: border-color 0.3s ease;
    }

    input::placeholder {
      color: #7a7a7a;
    }

    input:focus,
    select:focus {
      outline: none;
      border-color: #1e5631;
      box-shadow: 0 0 8px 0 rgba(30, 86, 49, 0.3);
      background: #fff;
    }

    .form-control:focus-visible {
      outline-offset: 0;
    }

    /* Flex wrapper for input + eye */
    .input-with-icon {
      display: flex;
      align-items: center;
      position: relative;
    }

    .input-with-icon input {
      flex: 1;
      padding-right: 2.5rem;
    }

    .input-with-icon i {
      margin-left: -2rem;
      cursor: pointer;
      color: #a38b00;
      font-size: 1.2rem;
      flex-shrink: 0;
    }

    .input-with-icon i:hover {
      color: #1e5631;
    }

    .btn-create {
      background: linear-gradient(135deg, #1e5631, #a38b00);
      border: none;
      color: white;
      font-weight: 600;
      padding: 0.75rem;
      border-radius: 12px;
      width: 100%;
      font-size: 1.1rem;
      box-shadow: 0 6px 12px rgba(30, 86, 49, 0.3);
      transition: background-color 0.3s ease;
    }

    .btn-create:hover {
      background: #144423;
      color: white;
    }

    .error-message {
      background: rgba(255, 0, 0, 0.1);
      border: 1px solid rgba(255, 0, 0, 0.3);
      color: #a70000;
      border-radius: 12px;
      padding: 0.75rem 1rem;
      text-align: center;
      margin-bottom: 1rem;
      font-weight: 600;
      font-size: 0.9rem;
    }

    .btn-back-container {
      margin-top: 1.5rem;
      text-align: center;
    }

    .btn-back {
      color: #1e5631;
      font-weight: 600;
      text-decoration: none;
      border: 1.5px solid #a38b00;
      padding: 0.5rem 1.75rem;
      border-radius: 12px;
      display: inline-block;
      transition: all 0.3s ease;
      background: rgba(255, 255, 255, 0.75);
      box-shadow: 0 4px 8px rgba(163, 139, 0, 0.3);
    }

    .btn-back:hover {
      color: white;
      background: #1e5631;
      border-color: #144423;
      box-shadow: 0 6px 14px rgba(20, 68, 35, 0.6);
      text-decoration: none;
    }
  </style>
</head>

<body>
  <div class="card p-5">
    <h2>Create User</h2>

    <!-- Error Message -->
    <?php if (!empty($error)) : ?>
      <div class="error-message"><?= $error ?></div>
    <?php endif; ?>

    <form method="post" action="<?= site_url('users/create'); ?>" class="mb-3">
      <!-- Username -->
      <div class="mb-4">
        <label for="username" class="form-label">Username</label>
        <input type="text" id="username" name="username" placeholder="Username" required
          value="<?= isset($username) ? html_escape($username) : '' ?>" class="form-control" />
      </div>

      <!-- Email -->
      <div class="mb-4">
        <label for="email" class="form-label">Email</label>
        <input type="email" id="email" name="email" placeholder="Email" required
          value="<?= isset($email) ? html_escape($email) : '' ?>" class="form-control" />
      </div>

      <!-- Password -->
      <div class="mb-4">
        <label for="password" class="form-label">Password</label>
        <div class="input-with-icon">
          <input type="password" name="password" id="password" placeholder="Password" required class="form-control" />
          <i class="fa-solid fa-eye" id="togglePassword"></i>
        </div>
      </div>

      <!-- Confirm Password -->
      <div class="mb-4">
        <label for="confirmPassword" class="form-label">Confirm Password</label>
        <div class="input-with-icon">
          <input type="password" name="confirm_password" id="confirmPassword" placeholder="Confirm Password" required
            class="form-control" />
          <i class="fa-solid fa-eye" id="toggleConfirmPassword"></i>
        </div>
      </div>

      <!-- Role -->
      <div class="mb-4">
        <label for="role" class="form-label">Role</label>
        <select name="role" id="role" required class="form-control">
          <option value="" disabled <?= !isset($role) ? 'selected' : '' ?>>-- Select Role --</option>
          <option value="admin" <?= isset($role) && $role == "admin" ? 'selected' : '' ?>>Admin</option>
          <option value="user" <?= isset($role) && $role == "user" ? 'selected' : '' ?>>User</option>
        </select>
      </div>

      <!-- Submit -->
      <button type="submit" class="btn-create">Create User</button>
    </form>

    <!-- Back button container -->
    <div class="btn-back-container">
      <a href="<?= site_url('users'); ?>" class="btn-back">Back</a>
    </div>
  </div>

  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" />

  <!-- Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Toggle Password Script -->
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

      toggle.addEventListener('keydown', function (e) {
        if (e.key === 'Enter' || e.key === ' ') {
          e.preventDefault();
          this.click();
        }
      });
    }

    toggleVisibility('togglePassword', 'password');
    toggleVisibility('toggleConfirmPassword', 'confirmPassword');
  </script>
</body>

</html>
