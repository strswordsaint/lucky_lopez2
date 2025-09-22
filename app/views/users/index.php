<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>MINSU Students Info</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen m-0 p-5 font-sans text-gray-800 bg-cover bg-center bg-no-repeat"
      style="background-image: url('<?= base_url() ?>public/image/BG.jpeg');">

  <div class="max-w-7xl mx-auto px-4 py-10">

    <!-- Header -->
    <header class="mb-8 flex flex-col md:flex-row md:items-center md:justify-between">
      <h1 class="text-3xl md:text-4xl font-bold text-gray-800 tracking-wide">
        MINSU Students Info
      </h1>

      <!-- Search Form -->
      <form action="<?=site_url('users');?>" method="get" class="relative flex items-center mt-4 md:mt-0">
        <?php
          $q = '';
          if (isset($_GET['q'])) {
              $q = $_GET['q'];
          }
        ?>
        <div class="relative">
          <input id="searchInput"
                 class="w-72 md:w-96 pl-4 pr-10 py-2 rounded-md border border-gray-300
                        focus:ring-2 focus:ring-emerald-400 focus:outline-none text-base shadow-sm"
                 name="q" type="text" placeholder="Search students..." value="<?=html_escape($q);?>">
          <button type="button"
                  class="absolute right-2 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600"
                  aria-label="Clear search"
                  onclick="
                    document.getElementById('searchInput').value='';
                    window.location.href='<?=site_url('users');?>';
                  ">
            ✕
          </button>
        </div>
        <button type="submit"
                class="ml-3 bg-emerald-600 hover:bg-emerald-700 text-white font-medium px-5 py-2
                       rounded-md border border-black shadow-sm transition">
          Search
        </button>
      </form>
    </header>

    <!-- Data Table -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
      <table class="min-w-full border-collapse">
        <thead class="bg-emerald-600">
          <tr>
            <th class="px-6 py-3 text-left text-sm font-semibold text-white uppercase tracking-wide">ID</th>
            <th class="px-6 py-3 text-left text-sm font-semibold text-white uppercase tracking-wide">Name</th>
            <th class="px-6 py-3 text-left text-sm font-semibold text-white uppercase tracking-wide">Email</th>
            <th class="px-6 py-3 text-left text-sm font-semibold text-white uppercase tracking-wide">Action</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
          <?php foreach (html_escape($user) as $users): ?>
          <tr class="hover:bg-gray-50 transition">
            <td class="px-6 py-4"><?=$users['id']; ?></td>
            <td class="px-6 py-4"><?=$users['username']; ?></td>
            <td class="px-6 py-4"><?=$users['email']; ?></td>
            <td class="px-6 py-4 space-x-2">
              <a href="<?=site_url('/users/update/'.$users['id']);?>"
                 class="inline-block bg-emerald-600 hover:bg-emerald-700 text-white px-3 py-1
                        rounded-md text-sm font-medium border border-black shadow-sm transition">
                 Update
              </a>
              <a href="<?=site_url('/users/delete/'.$users['id']);?>"
                 class="inline-block bg-red-600 hover:bg-red-700 text-white px-3 py-1
                        rounded-md text-sm font-medium border border-black shadow-sm transition">
                 Delete
              </a>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>

    <!-- Pagination + Create Button Row -->
    <div class="mt-6 flex items-center justify-between">
      <!-- Pagination output -->
      <div>
        <?php echo $page;?>
      </div>

      <!-- Create New User button -->
      <a href="<?=site_url('users/create'); ?>"
         class="inline-block px-6 py-3 rounded-md font-medium text-white bg-emerald-600
                hover:bg-emerald-700 border border-black shadow-sm transition">
         + Create New User
      </a>
    </div>

  </div>
</body>
</html>
