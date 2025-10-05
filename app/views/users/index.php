<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Users Info</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

  <style>
  body {
    min-height: 100vh;
    margin: 0;
    font-family: "Poppins", sans-serif;
    background: url('<?= base_url() . "public/image/BG.jpg"; ?>') no-repeat center center/cover;
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
  }

  .table th {
    background: #1e5631;
    color: #ffffff;
    text-transform: uppercase;
    font-size: 13px;
  }

  .table tbody tr:hover {
    background: rgba(212, 175, 55, 0.1);
  }

  .btn-create {
    background: linear-gradient(135deg, #1e5631, #a38b00);
    border: none;
    color: white;
  }

  .btn-create:hover {
    background: #144423;
    color: #fff;
  }

  .btn-outline-danger {
    border-color: #d4af37;
    color: #1e5631;
  }

  .btn-outline-danger:hover {
    background-color: #d4af37;
    color: white;
    border-color: #d4af37;
  }

  .text-danger {
    color: #1e5631 !important;
  }

  .alert-light {
    border-color: #d4af37 !important;
    background-color: rgba(255, 255, 255, 0.8);
  }

  .btn-warning {
    background-color: #d4af37;
    border: none;
    color: #fff;
  }

  .btn-warning:hover {
    background-color: #b9961b;
  }

  .btn-danger {
    background-color: #9c1f0cff;
    border: none;
  }

  .btn-danger:hover {
    background-color: #d32d2d8f;
  }

  .alert-danger {
    background-color: #d4af37;
    color: white;
    border: none;
  }

  .alert-warning {
    background-color: #fff8dc;
    border-color: #d4af37;
    color: #1e5631;
  }

  /* Search field styling */
  .search-form {
    position: relative;
    display: flex;
    align-items: center;
  }

  #searchInput {
    padding-right: 35px;
  }

  #clearSearch {
    position: absolute;
    right: 120px;
    background: none;
    border: none;
    font-size: 20px;
    color: #1e5631;
    cursor: pointer;
    top: 50%;
    transform: translateY(-50%);
    display: none;
    z-index: 2;
  }
  </style>
</head>

<body>
  <div class="card w-100" style="max-width:1100px;">
    <div class="card-body">
      <!-- Title -->
      <h2 class="text-center mb-4 text-danger fw-bold">
        <?= ($logged_in_user['role'] === 'admin') ? 'Admin Dashboard' : 'User Dashboard'; ?>
      </h2>

      <!-- Welcome -->
      <?php if(!empty($logged_in_user)): ?>
        <div class="alert alert-light border border-danger-subtle text-center fw-semibold">
          Welcome, <span class="text-danger"><?= html_escape($logged_in_user['username']); ?></span>
        </div>
      <?php else: ?>
        <div class="alert alert-danger text-center">Logged in user not found</div>
      <?php endif; ?>

      <!-- Top bar -->
      <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mb-3 gap-3">
        <a href="<?= site_url('auth/logout'); ?>" class="btn btn-danger px-4">Logout</a>

        <!-- Search with clear button -->
        <form action="<?= site_url('users'); ?>" method="get" class="search-form">
          <?php $q = isset($_GET['q']) ? $_GET['q'] : ''; ?>
          <input id="searchInput" name="q" type="text" placeholder="Search" value="<?= html_escape($q); ?>" class="form-control">

          <!-- Clear (X) Button -->
          <button type="button" id="clearSearch" title="Clear Search">&times;</button>

          <!-- Search Submit Button -->
          <button type="submit" style="
            background-color: #d4af37;
            color: white;
            border: none;
            padding: 6px 14px;
            font-size: 14px;
            font-weight: 600;
            border-radius: 6px;
            margin-left: 8px;
            transition: background-color 0.3s ease;">
            Search
          </button>
        </form>
      </div>

      <!-- Table -->
      <div class="table-responsive">
        <?php if(!empty($users)): ?>
          <table class="table table-striped table-hover text-center align-middle">
            <thead>
              <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <?php if ($logged_in_user['role'] === 'admin'): ?>
                  <th>Password</th>
                  <th>Role</th>
                <?php endif; ?>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($users as $user): ?>
              <tr>
                <td><?= html_escape($user['id']); ?></td>
                <td><?= html_escape($user['username']); ?></td>
                <td><?= html_escape($user['email']); ?></td>
                <?php if ($logged_in_user['role'] === 'admin'): ?>
                  <td>*******</td>
                  <td><?= html_escape($user['role']); ?></td>
                <?php endif; ?>
                <td>
                  <?php if ($logged_in_user['role'] === 'admin'): ?>
                    <a href="<?= site_url('/users/update/'.$user['id']);?>" class="btn btn-sm btn-warning">Update</a>
                    <a href="<?= site_url('/users/delete/'.$user['id']);?>" class="btn btn-sm btn-danger">Delete</a>
                  <?php else: ?>
                    <span class="text-muted">View Only</span>
                  <?php endif; ?>
                </td>
              </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        <?php else: ?>
          <div class="alert alert-warning text-center">No users found.</div>
        <?php endif; ?>
      </div>

      <!-- Pagination -->
      <div class="d-flex justify-content-center">
        <?= $page; ?>
      </div>

      <!-- Create Button -->
      <?php if ($logged_in_user['role'] === 'admin'): ?>
        <div class="d-flex justify-content-center mt-4">
          <a href="<?= site_url('users/create'); ?>" class="btn btn-create text-white px-5 py-2">
            + Create New User
          </a>
        </div>
      <?php endif; ?>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <script>
    document.addEventListener("DOMContentLoaded", function () {
      const searchInput = document.getElementById("searchInput");
      const clearBtn = document.getElementById("clearSearch");

      function toggleClearButton() {
        clearBtn.style.display = searchInput.value.trim() ? "inline" : "none";
      }

      toggleClearButton(); // initial check
      searchInput.addEventListener("input", toggleClearButton);

      clearBtn.addEventListener("click", function () {
        searchInput.value = "";
        toggleClearButton();
        window.location.href = "<?= site_url('users'); ?>"; // redirect to clear query
      });
    });
  </script>
</body>
</html>
