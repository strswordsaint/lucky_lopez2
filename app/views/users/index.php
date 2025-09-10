<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
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
<body class="relative bg-gradient-to-br from-green-100 via-emerald-200 to-green-300 text-gray-800 min-h-screen flex flex-col items-center p-6">

  <!-- Page Title -->
  <h1 class="text-4xl font-extrabold bg-gradient-to-r from-green-700 to-emerald-600 bg-clip-text text-transparent drop-shadow mb-8 relative z-10">
    Minsu Students Dashboard
  </h1>

  <!-- Card Container -->
  <div class="bg-white shadow-2xl rounded-2xl p-6 w-full md:w-4/5 lg:w-3/4 relative z-10 border border-gray-100">

    <!-- Header with Create Button -->
    <div class="flex justify-between items-center mb-6">
      <h2 class="text-xl font-semibold text-gray-700">User Records</h2>
      <a href="<?=site_url('users/create');?>"
         class="flex items-center gap-2 bg-emerald-600 hover:bg-emerald-700 text-white font-medium px-5 py-2 rounded-lg shadow transition">
        <span></span> Create User
      </a>
    </div>

    <!-- Table -->
    <div class="overflow-x-auto rounded-xl border border-gray-200 shadow">
      <table class="w-full text-left">
        <thead>
          <tr class="bg-gradient-to-r from-green-600 to-emerald-700 text-white text-sm uppercase tracking-wider">
            <th class="px-6 py-3">ID</th>
            <th class="px-6 py-3">Username</th>
            <th class="px-6 py-3">Email</th>
            <th class="px-6 py-3 text-center">Action</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-200 text-sm">
          <?php foreach(html_escape($users) as $user): ?>
            <tr class="hover:bg-green-50 transition">
              <td class="px-6 py-3"><?= $user['id']; ?></td>
              <td class="px-6 py-3 font-medium text-gray-900"><?= $user['username']; ?></td>
              <td class="px-6 py-3"><?= $user['email']; ?></td>
              <td class="px-6 py-3 flex justify-center gap-2">

                <!-- Update Button (Gray) -->
                <a href="<?=site_url('users/update/'.$user['id'])?>"
                   class="flex items-center gap-1 bg-gray-400 hover:bg-gray-500 text-white px-4 py-2 rounded-lg shadow-sm transition">
                   <span>Edit</span>
                </a>

                <!-- Delete Button (Red) -->
                <a href="<?=site_url('users/delete/'.$user['id'])?>"
                   onclick="return confirm('Are you sure you want to delete this record?');"
                   class="flex items-center gap-1 bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg shadow-sm transition">
                   <span>Delete</span>
                </a>

              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>

  </div>

</body>
</html>
