<?php

if (isset($_SESSION["id"])) {
    $loggedIn = $_SESSION["id"];
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wiki</title>
    <meta name="keywords" content="HTML, CSS, Youcode, tailwindCSS, Wiki, Wiki">
    <meta name="description" content="Wiki">

    <link rel="stylesheet" href="public/assets/css/style.css">
    <link rel="stylesheet" href="public/assets/dist/output.css">


</head>

<body class="dark:bg-gray-900">

    <!-- Navbar  -->
    <?php include "../app/View/includes/header.php"; ?>
    <!-- Navbar  -->

    <section class="text-gray-600 mt-[7em] body-font">
        <div class="container mx-auto flex flex-col px-5 justify-center items-center">
            <div date-rangepicker class="flex w-3/4 items-center">
                <!-- First   -->
                <!-- First   -->
                <div class="relative w-3/4">
                    <input type="text" class="w-full backdrop-blur-sm bg-white/20 py-2 pl-10 pr-4 rounded-lg focus:outline-none border-2 border-gray-100 focus:border-violet-300 transition-colors duration-300" placeholder="Search..." />
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- / Filter picker   -->

    <!-- Most read  -->
    <section class="text-gray-600 body-font">
        <section class="text-gray-600 body-font">
            <div class="container px-5 pt-24 mx-auto">
                <div class="flex flex-col">
                    <div class="flex flex-wrap w-full mb-20">
                        <div class="lg:w-1/2 w-full mb-6 lg:mb-0">
                            <a href="marketplace/">
                                <h1 class="titles sm:text-3xl text-2xl font-medium mb-2 text-gray-900 dark:text-white">
                                    Most read
                                </h1>
                            </a>
                            <div class="h-1 w-20 bg-orange-500 rounded"></div>
                        </div>
                    </div>
                </div>
                <div class="flex flex-wrap sm:-m-4 -mx-4 -mb-10 -mt-4">
                    <?php foreach ($allWikis as $wiki) : ?>
                        <div class="p-4 md:w-1/3 sm:mb-0 mb-6">
                            <div class="rounded-lg h-64 overflow-hidden">
                                <img alt="content" class="object-cover object-center h-full w-full" src="" />
                            </div>
                            <h2 class="text-xl font-medium title-font text-gray-900 mt-5">
                                <?= $wiki['wiki_title'] ?>
                            </h2>
                            <h2 class="text-xl font-medium title-font text-gray-900 mt-5">
                                <?= $wiki['Categorie_Name'] ?>
                            </h2>
                            <p class="text-base leading-relaxed mt-2 dark:text-white">
                                <?= $wiki['content'] ?>
                            </p>
                            <a class="text-green-500 inline-flex items-center mt-3">Learn More
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                                    <path d="M5 12h14M12 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="flex flex-col px-5 pt-24 mx-auto">
                    <div class="h-1 bg-gray-200 rounded overflow-hidden">
                        <div class="w-24 h-full bg-orange-500"></div>
                    </div>
                </div>
            </div>
        </section>
    </section>


    <!-- Sport   -->
    <section class="text-gray-600 body-font">
        <section class="text-gray-600 body-font">
            <div class="container px-5 pt-24 mx-auto">
                <div class="flex flex-col">
                    <div class="flex flex-wrap w-full mb-20">
                        <div class="lg:w-1/2 w-full mb-6 lg:mb-0">
                            <h1 class="titles sm:text-3xl text-2xl font-medium mb-2 text-gray-900 dark:text-white">
                                Sport
                            </h1>
                            <div class="h-1 w-20 bg-orange-500 rounded"></div>
                        </div>
                    </div>
                </div>
                <div class="flex flex-wrap sm:-m-4 -mx-4 -mb-10 -mt-4">
                    <?php foreach ($allSportWikis as $SportWiki) : ?>
                        <div class="p-4 md:w-1/3 sm:mb-0 mb-6">
                            <div class="rounded-lg h-64 overflow-hidden">
                                <img alt="content" class="object-cover object-center h-full w-full" src="" />
                            </div>
                            <h2 class="text-xl font-medium title-font text-gray-900 mt-5">
                                <?= $SportWiki['wiki_title'] ?>
                            </h2>
                            <h2 class="text-xl font-medium title-font text-gray-900 mt-5">
                                <?= $SportWiki['Categorie_Name'] ?>
                            </h2>
                            <p class="text-base leading-relaxed mt-2 dark:text-white">
                                <?= $SportWiki['content'] ?>
                            </p>
                            <a class="text-green-500 inline-flex items-center mt-3">Learn More
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                                    <path d="M5 12h14M12 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="flex flex-col px-5 pt-24 mx-auto">
                    <div class="h-1 bg-gray-200 rounded overflow-hidden">
                        <div class="w-24 h-full bg-orange-500"></div>
                    </div>
                </div>
            </div>
        </section>
    </section>
    <!-- / Sport   -->

    <!-- Footer   -->
    <?php include "../app/View/includes/footer.php"; ?>
    <!-- / Footer   -->

    <!-- / For dark mode -->
    <script src="public/assets/js/darkmode.js"></script>
    <!-- / For navbar mobile -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.js"></script>
</body>

</html>