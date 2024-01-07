<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teams Creation</title>
    <link rel="stylesheet" href="<?= URL_DIR ?>public/assets/dist/output.css">
</head>

<body class="bg-gray-300 dark:bg-gray-900">
    <?php include "../app/View/includes/Dash_navigation.php"; ?>
    <main id="main" class="pt-16 h-screen px-28">
        <h2 class="my-6 text-4xl font-semibold text-center font-poppins tracking-widest text-gray-700 dark:text-gray-200">
            <span class="text-primary-100 dark:text-orange">ADD </span> A NEW TEAM
        </h2>
        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">

                <div class="bg-gray-100 dark:bg-gray-800 transition-colors duration-300">
                    <div class="container mx-auto p-4">
                        <div class="bg-white dark:bg-gray-700 shadow rounded-lg p-6">
                            <h1 class="text-xl font-semibold mb-4 text-gray-900 dark:text-gray-100">Team Data</h1>
                            <p class="text-gray-600 dark:text-gray-300 mb-6">Here you can add team's informations.</p>
                            <form enctype="multipart/form-data" action="../createteam" method="POST">
                                <div class="md:grid-cols-2 gap-4 mb-4">
                                    <input type="text" placeholder="Nation name" name="name" class="border p-2 rounded w-full">
                                </div>
                                <div class="mb-4">
                                    <input type="text" placeholder="Coach" name="coach" class="border p-2 rounded w-full">
                                </div>
                                <div class="mb-4">
                                    <input type="text" placeholder="Founding Year" name="founding_year" class="border p-2 rounded w-full">
                                </div>
                                <div class="mb-4">
                                    <input type="file" placeholder="Flag Upload " name="flag" class="border p-2 rounded w-full">
                                </div>

                                <button type="submit" class="px-4 py-2 bg-primary-100 rounded  text-white hover:bg-blue-600 focus:outline-none transition-colors">
                                    Confirm And Submit
                                </button>

                                <button type="button" class="px-4 py-2 bg-orange rounded  text-white hover:bg-blue-600 focus:outline-none transition-colors">
                                    Cancel
                                </button>


                            </form>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </main>
    <?php include "../app/View/includes/Dash_footer.php"; ?>


</body>
<script src="<?= URL_DIR ?>public/assets/js/navigation.js"></script>
<script src="<?= URL_DIR ?>public/assets/js/theme.js"></script>

</html>