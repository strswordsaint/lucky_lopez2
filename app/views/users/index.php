<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Users Info</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <!-- SweetAlert2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <style>
  body {
    min-height: 100vh;
    margin: 0;
    font-family: "Poppins", sans-serif;
    background: url('<?= base_url() . "public/image/BG.jpg"; ?>') no-repeat center center/cover;
    padding: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    animation: pageFadeIn 0.8s ease forwards;
  }

  .card {
    border-radius: 16px;
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.25);
    background: rgba(255, 255, 255, 0.12);
    backdrop-filter: blur(14px);
    transform: translateY(25px);
    opacity: 0;
    animation: cardEnter 0.9s ease-out 0.2s forwards;
  }

  .dashboard-title {
    font-size: 2.2rem;
    font-weight: 700;
    color: #000000ff;
    text-align: center;
    text-transform: uppercase;
    letter-spacing: 1px;
    margin-bottom: 1.5rem;
    opacity: 0;
    transform: translateY(-15px);
    animation: fadeSlideDown 0.9s ease-out 0.3s forwards;
  }

  .dashboard-title::after {
    content: "";
    display: block;
    width: 80px;
    height: 4px;
    background: linear-gradient(90deg, #1e5631, #d4af37);
    margin: 10px auto 0;
    border-radius: 2px;
  }

  .welcome-card {
    background: rgba(255, 255, 255, 0.25);
    border: 1px solid rgba(212, 175, 55, 0.4);
    border-radius: 12px;
    padding: 15px 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    margin-bottom: 25px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
    opacity: 0;
    transform: translateY(10px);
    animation: fadeSlideUp 0.9s ease-out 0.5s forwards;
  }

  .welcome-card i {
    font-size: 1.4rem;
    color: #000000ff;
  }

  .welcome-card span {
    color: #000000ff;
    font-weight: 600;
    font-size: 1.1rem;
  }

  .btn-create,
  .btn-danger,
  .btn-warning,
  .btn-search {
    transition: all 0.25s ease;
    border-radius: 8px;
  }

  .btn-create {
    background: linear-gradient(135deg, #1e5631, #a38b00);
    border: none;
    color: white;
    font-weight: 500;
    padding: 10px 24px;
  }

  .btn-create:hover {
    transform: translateY(-2px);
    background: #144423;
  }

  .btn-danger {
    background-color: #9c1f0c;
    border: none;
    color: #fff;
    font-weight: 500;
    padding: 10px 24px;
  }

  .btn-danger:hover {
    background-color: #c62828;
    transform: translateY(-2px);
  }

  .btn-warning {
    background-color: #d4af37;
    color: #fff;
    font-weight: 500;
    padding: 8px 18px;
  }

  .btn-warning:hover {
    background-color: #b9961b;
    transform: translateY(-2px);
  }

  .btn-search {
    background-color: #d4af37;
    color: white;
    border: none;
    font-weight: 500;
    padding: 8px 18px;
  }

  .btn-search:hover {
    background-color: #b9961b;
    transform: translateY(-2px);
  }

  /* Search bar layout */
  .search-container {
    flex: 1;
    display: flex;
    align-items: center;
    gap: 8px;
  }

  .search-wrapper {
    position: relative;
    flex: 1;
  }

  .search-wrapper input {
    width: 100%;
    padding-right: 40px;
  }

  /* Clear (X) button — inside the input field */
  #clearSearch {
    position: absolute;
    right: 10px;
    top: 50%;
    transform: translateY(-50%);
    background: none;
    border: none;
    font-size: 20px;
    color: #1e5631;
    cursor: pointer;
    display: none;
    z-index: 2;
    transition: all 0.2s ease;
  }

  #clearSearch:hover {
    color: #b9961b;
    transform: translateY(-50%) scale(1.15);
  }

  .table th {
    background: #1e5631;
    color: #ffffff;
    text-transform: uppercase;
    font-size: 13px;
  }

  .table tbody tr {
    transition: background 0.25s ease, transform 0.25s ease;
  }

  .table tbody tr:hover {
    background: rgba(212, 175, 55, 0.12);
    transform: translateY(-2px);
  }

  /* Animations */
  @keyframes pageFadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
  }

  @keyframes cardEnter {
    from { opacity: 0; transform: translateY(25px) scale(0.98); }
    to { opacity: 1; transform: translateY(0) scale(1); }
  }

  @keyframes fadeSlideDown {
    from { opacity: 0; transform: translateY(-15px); }
    to { opacity: 1; transform: translateY(0); }
  }

  @keyframes fadeSlideUp {
    from { opacity: 0; transform: translateY(10px); }
    to { opacity: 1; transform: translateY(0); }
  }
  </style>
</head>

<body>
  <div class="card w-100" style="max-width:1100px;">
    <div class="card-body">
      <!-- Dashboard Title -->
      <h2 class="dashboard-title">
        <?= ($logged_in_user['role'] === 'admin') ? 'Admin Dashboard' : 'User Dashboard'; ?>
      </h2>

      <!-- Welcome -->
      <?php if(!empty($logged_in_user)): ?>
        <div class="welcome-card text-center">
          <i class="bi bi-person-circle"></i>
          <div>
            Welcome back, <span><?= html_escape($logged_in_user['username']); ?></span> 
          </div>
        </div>
      <?php else: ?>
        <div class="alert alert-danger text-center">Logged in user not found</div>
      <?php endif; ?>

      <!-- Top Controls -->
      <div class="d-flex flex-column flex-md-row align-items-center justify-content-between mb-3 gap-3">
        <?php if ($logged_in_user['role'] === 'admin'): ?>
          <a href="<?= site_url('users/create'); ?>" class="btn btn-create">
            <i class="bi bi-person-plus-fill"></i> Create New User
          </a>
        <?php endif; ?>

        <div class="search-container">
          <form action="<?= site_url('users'); ?>" method="get" class="d-flex w-100">
            <div class="search-wrapper">
              <?php $q = isset($_GET['q']) ? $_GET['q'] : ''; ?>
              <input id="searchInput" name="q" type="text" placeholder="Search users..." 
                     value="<?= html_escape($q); ?>" class="form-control" />
              <button type="button" id="clearSearch">
                <i class="bi bi-x-circle"></i>
              </button>
            </div>
            <button type="submit" class="btn btn-search ms-2">
              <i class="bi bi-search"></i> Search
            </button>
          </form>
        </div>

        <a href="<?= site_url('auth/logout'); ?>" class="btn btn-danger">
          <i class="bi bi-box-arrow-right"></i> Logout
        </a>
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
                    <a href="<?= site_url('/users/update/'.$user['id']);?>" class="btn btn-warning me-2">
                      <i class="bi bi-pencil-square"></i> Update
                    </a>
                    <a href="<?= site_url('/users/delete/'.$user['id']);?>" 
                       class="btn btn-danger" 
                       onclick="confirmDelete(event, '<?= html_escape($user['username'], ENT_QUOTES) ?>', this.href)">
                       <i class="bi bi-trash3-fill"></i> Delete
                    </a>
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

      <div class="d-flex justify-content-center mt-3">
        <?= $page; ?>
      </div>
    </div>
  </div>

  <script>
    document.addEventListener("DOMContentLoaded", function () {
      const searchInput = document.getElementById("searchInput");
      const clearBtn = document.getElementById("clearSearch");

      function toggleClearButton() {
        clearBtn.style.display = searchInput.value.trim() ? "block" : "none";
      }

      toggleClearButton();
      searchInput.addEventListener("input", toggleClearButton);

      clearBtn.addEventListener("click", function () {
        searchInput.value = "";
        toggleClearButton();
        window.location.href = "<?= site_url('users'); ?>";
      });
    });

    // SweetAlert2 Delete Confirmation
    function confirmDelete(event, username, url) {
      event.preventDefault();
      Swal.fire({
        title: 'Are you sure?',
        text: `You are about to delete user "${username}". This action cannot be undone!`,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'Cancel'
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = url;
        }
      });
    }
  </script>
</body>
</html>
