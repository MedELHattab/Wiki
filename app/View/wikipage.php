<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wiki</title>
    <meta name="keywords" content="HTML, CSS, Youcode, tailwindCSS, Wiki, Wiki">
    <meta name="description" content=" Wiki for new wikis">
    <link rel="stylesheet" href="public/assets/css/style.css">
    <link rel="stylesheet" href="public/assets/dist/output.css">

</head>

<body class="dark:bg-gray-900">

    <!-- Navbar  -->
    <?php include "../app/View/includes/header.php" ?>
    <!-- Navbar  -->

<body class="bg-gray-100 min-h-screen flex items-center justify-center ">

  <div class=" max-w-md w-full bg-white p-8 rounded shadow-md" style="margin-top: 7em;">

    <!-- Title Section -->
    <div class="mb-6">
      <label for="title" class="block text-gray-600 font-semibold mb-2">Title:</label>
      <div id="title" class="px-4 py-2 border rounded-md bg-gray-200">
      <?= $wiki['wiki_title'] ?>
      </div>
    </div>

    <!-- Content Section -->
    <div class="mb-6">
      <label for="content" class="block text-gray-600 font-semibold mb-2">Content:</label>
      <div id="content" class="px-4 py-2 border rounded-md bg-gray-200">
      <?= $wiki['content'] ?>
      </div>
    </div>

    <!-- Categories Section -->
    <div class="mb-6">
      <label for="categories" class="block text-gray-600 font-semibold mb-2">Categories:</label>
      <div id="categories" class="px-4 py-2 border rounded-md bg-gray-200">
      <?= $wiki['Categorie_Name'] ?>
      </div>
    </div>

    <div class="mb-6">
      <label for="author" class="block text-gray-600 font-semibold mb-2">By:</label>
      <div id="author" class="px-4 py-2 border rounded-md bg-gray-200">
      <?= $wiki['name'] ?>
      </div>
    </div>

    <div class="mb-6">
      <label for="categories" class="block text-gray-600 font-semibold mb-2">Tags</label>
      <div id="categories" class="px-4 py-2 border rounded-md bg-gray-200">
      <?php foreach ($tags as $tag) : ?>
                    <span class="bg-gray-100 text-gray-800  text-xs font-medium me-2 px-2.5 py-2 rounded-full dark:bg-gray-700 dark:text-white border border-gray-500"><?= $tag['tag'] ?></span>
                <?php endforeach ?>
      </div>
    </div>

  </div>
  <?php include "../app/View/includes/footer.php"; ?>
    <!-- / Footer   -->

    <!-- / For dark mode -->
    <script src="public/assets/js/darkmode.js"></script>

</body>

</html>
