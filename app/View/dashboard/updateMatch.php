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
        <form action="..\..\matches\submitUpdateMatch" method="post">
            <button type="submit" class="px-4 py-2 my-2 bg-orange rounded  text-white hover:bg-primary-100 focus:outline-none transition-colors">
                update this Match
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

                                <select name="team1" class="p-2 px-2 rounded border dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                    <?php foreach ($Teams as $team) { ?>
                                        <option value="<?= $team['id'] ?>" <?php if ($team['id'] === $selectedmatch[0]['team1']) {echo 'selected';} ?>>
                                            <?= $team['name'] ?>
                                        </option>
                                    <?php } ?>

                                </select>

                            </td>
                            <td class="border border-gray-300 px-3 py-2 dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">

                            <select name="team2" class="p-2 px-2 rounded border dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                    <?php foreach ($Teams as $team) { ?>
                                        <option value="<?= $team['id'] ?>" <?php if ($team['id'] === $selectedmatch[0]['team2']) {echo 'selected';} ?>>
                                            <?= $team['name'] ?>
                                        </option>
                                    <?php } ?>

                                </select>

                            </td>
                            <td class="border border-gray-300 px-3 py-2 dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">

                                <select name="stade" class="p-2 px-2 rounded border dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                    <?php foreach ($Stadiums as $Stadium) { ?>
                                        <option value="<?= $Stadium['id'] ?>" <?php if ($Stadium['id'] === $selectedmatch[0]['stade']) {echo 'selected';} ?>><?= $Stadium['name'] ?></option>
                                    <?php } ?>

                                </select>

                            </td>
                            <td class="border border-gray-300 px-3 py-2 dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                <p>Date:
                                    <input class="p-2 px-2 rounded border dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800" name="time" value="" type="text" id="datepicker" />
                                </p>
                            </td>
                            <input hidden class="p-2 px-2 rounded border dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800" name="id" value="<?=$selectedmatch[0]['id']?>" type="text"/>

                        </tr>
                    </tbody>
                </table>
            </div>
        </form>

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