<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CAN23- TEAMS</title>
    <link rel="stylesheet" href="<?= URL_DIR ?>public/assets/dist/output.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script src="../path/to/flatpickr.min.js"></script>


</head>

<body class="bg-gray-300 dark:bg-gray-900">
    <?php include "../app/View/includes/Dash_navigation.php"; ?>
    <main id="main" class=" pt-16 px-28">
        <h2 class="my-6 text-4xl font-semibold text-center font-poppins tracking-widest text-gray-700 dark:text-gray-200">
            <span class="text-primary-100 dark:text-orange">Teams</span> - CAN 2023
        </h2>
        <form enctype="multipart/form-data" action="matches\addMatch" method="post">
            <button type="submit" class="px-4 py-2 my-2 bg-orange rounded  text-white hover:bg-primary-100 focus:outline-none transition-colors">
                Add a Match
            </button>

            <div class="overflow-x-auto dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
            <table class="w-full border-collapse border border-gray-300 dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="border-y border-gray-100 bg-gray-50/50 p-2 dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">Team A</th>
                            <th class="border-y border-gray-100 bg-gray-50/50 p-2 dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">Team B</th>
                            <th class="border-y border-gray-100 bg-gray-50/50 p-2 dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">Stadium</th>
                            <th class="border-y border-gray-100 bg-gray-50/50 p-2 dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">Date</th>

                        </tr>
                    </thead>
                    <tbody id="attendees-list">
                        <tr>
                            <td class="border border-gray-300 px-3 py-2 dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">

                                <select name="team2" class="p-2 px-2 rounded border dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                    <?php foreach ($Teams as $team) { ?>

                                        <option value="<?= $team['id'] ?>"><?= $team['name'] ?></option>
                                    <?php } ?>

                                </select>

                            </td>
                            <td class="border border-gray-300 px-3 py-2 dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">

                                <select name="team1" class="p-2 px-2 rounded border dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                    <?php foreach ($Teams as $team) { ?>

                                        <option value="<?= $team['id'] ?>"><?= $team['name'] ?></option>
                                    <?php } ?>

                                </select>

                            </td>
                            <td class="border border-gray-300 px-3 py-2 dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">

                                <select name="stade" class="p-2 px-2 rounded border dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                    <?php foreach ($Stadiums as $Stadium) { ?>
                                        <option value="<?= $Stadium['id'] ?>"><?= $Stadium['name'] ?></option>
                                    <?php } ?>

                                </select>

                            </td>
                            <td class="border border-gray-300 px-3 py-2 dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                <p>Date:
                                <input type="datetime-local" value="" name="time" class="p-2 px-2 rounded border dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                </p>

                            </td>

                        </tr>

                    </tbody>
                </table>
                <table class="w-full border-collapse border border-gray-300 dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="border-y border-gray-100 bg-gray-50/50 p-2 dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">Price</th>
                            <th class="border-y border-gray-100 bg-gray-50/50 p-2 dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">Image</th>

                        </tr>
                    </thead>
                    <tbody id="attendees-list">
                        <tr>
                            <td class="border border-gray-300 px-3 py-2 dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">

                                <input class="p-2 px-10 rounded border dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800" name="ticket_price" value="" type="text" />
                            </td>
                            <td class="border border-gray-300 px-3 py-2 dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">

                                <input class="p-2 px-2 rounded border dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800 cursor-pointer " name="image" value="" id="file_input" type="file">

                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </form>

        <div class="w-full py-2 overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-4 py-3">Match Id</th>
                            <th class="px-4 py-3">Team 1</th>
                            <th class="px-4 py-3">Team 2</th>
                            <th class="px-4 py-3">stadium</th>
                            <th class="px-4 py-3">Time</th>
                            <th class="px-4 py-3">stadium</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        <?php foreach ($matches as $match) { ?>

                            <tr class="text-gray-700 dark:text-gray-400">
                                <td class="px-4 py-3">
                                    <div class="flex items-center text-sm">
                                        <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                            <img src="public/assets/uploads/<?= $match['image'] ?>" alt="Team Flag" class="object-cover w-full h-full rounded-full" />
                                            <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                                        </div>
                                        <div>
                                            <p class="font-semibold"><?= $match['id'] ?></p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    <?= $match['team1'] ?>
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    <?= $match['team2'] ?>
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    <?= $match['stadiumName'] ?>
                                </td>
                                <td class="px-4 py-3 text-xs">
                                    <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                        <?= $match['matchDay'] ?>
                                    </span>
                                </td>
                                <td class="px-4 py-3">
                                    <div class="flex items-center space-x-4 text-sm">
                                        <a href="matches/updateMatch/<?= $match["id"] ?>">
                                            <button class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Edit">
                                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                                                </svg>
                                            </button>
                                        </a>
                                        <a href="matches/deleteMatch/<?= $match["id"] ?>" onclick="return confirm('Do you really want to Delete ?');">
                                            <button class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Delete">
                                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                                </svg>
                                            </button>
                                        </a>

                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

        </div>
    </main>

</body>
<script src="../path/to/flowbite/dist/datepicker.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/datepicker.min.js"></script>
<script src="public/assets/js/navigation.js"></script>
<script src="public/assets/js/theme.js"></script>
<script>
    $(document).ready(function() {
        var date = new Date();
        var currentMonth = date.getMonth();
        var currentDate = date.getDate();
        var currentYear = date.getFullYear();

        $('#datepicker').datepicker({
            minDate: new Date(currentYear, currentMonth, currentDate),
            dateFormat: 'yy-mm-dd'
        });
    });
</script>

</html>