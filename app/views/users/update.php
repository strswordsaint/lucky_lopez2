<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update User</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    /* CSS-only dot grid pattern */
    body::before {
      content: "";
      position: fixed;
      inset: 0;
      background-image: radial-gradient(rgba(255,255,255,0.4) 1px, transparent 1px);
      background-size: 30px 30px;
      z-index: 0;
    }
  </style>
</head>
<body class="relative bg-gradient-to-br from-green-100 via-emerald-200 to-green-300 flex items-center justify-center min-h-screen">

  <!-- Card -->
  <div class="relative z-10 bg-white p-8 rounded-2xl shadow-2xl w-full max-w-md">
    <!-- Title -->
    <h1 class="text-3xl font-extrabold text-center mb-6 bg-gradient-to-r from-green-700 to-emerald-600 bg-clip-text text-transparent">
       Update User
    </h1>

    <!-- Form -->
    <form action="<?= site_url('users/update/'.segment(4)); ?>" method="POST" class="space-y-5">
      
      <!-- Username -->
      <div>
        <label for="username" class="block text-gray-700 font-medium mb-1">Username</label>
        <input 
          type="text" 
          id="username" 
          name="username"
          value="<?= html_escape($user['username']); ?>"
          required
          class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-green-500 focus:outline-none"
        >
      </div>

      <!-- Email -->
      <div>
        <label for="email" class="block text-gray-700 font-medium mb-1">Email Address</label>
        <input 
          type="email" 
          id="email" 
          name="email"         
          value="<?= html_escape($user['email']); ?>"
          required
          class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-green-500 focus:outline-none"
        >
      </div>

      <!-- Buttons -->
      <div class="flex gap-3">
        <!-- Save -->
        <button type="submit"
          class="flex-1 bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition">
           Save
        </button>
          <a href="<?= site_url('/'); ?>" 
            class="flex-1 text-center bg-gray-400 hover:bg-gray-500 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition">
            Cancel
          </a>
    </form>
  </div>

</body>
</html>
