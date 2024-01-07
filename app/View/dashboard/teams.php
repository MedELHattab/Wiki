<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CAN23- TEAMS</title>
    <link rel="stylesheet" href="<?= URL_DIR ?>public/assets/dist/output.css">
</head>

<body class="bg-gray-300 dark:bg-gray-900">
    <?php include "../app/View/includes/Dash_navigation.php"; ?>
    <main id="main" class="h-full py-16 px-28">
        <h2 class="my-6 mt-10 text-4xl font-semibold text-center font-poppins tracking-widest text-gray-700 dark:text-gray-200">
            <span class="text-primary-100 dark:text-orange">Teams</span> - CAN 2023
        </h2>
        <a href="Teams/creationpage/">
            <button type="button" class="px-4 py-2 m-4 bg-orange rounded  text-white hover:bg-primary-100 focus:outline-none transition-colors">
                Add a Team
            </button>
        </a>
        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-4 py-3">Nation</th>
                            <th class="px-4 py-3">Coach</th>
                            <th class="px-4 py-3">Founding Year</th>
                            <th class="px-4 py-3">Status</th>
                            <th class="px-4 py-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        <?php foreach ($teams as $team) { ?>
                            <tr class="text-gray-700 dark:text-gray-400">
                                <td class="px-4 py-3">
                                    <div class="flex items-center text-sm">
                                        <!-- Avatar with inset shadow -->
                                        <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                            <img src="<?= URL_DIR ?>public/assets/uploads/<?= $team['flag'] ?>" alt="Team Flag" class="object-cover w-full h-full rounded-full" />
                                            <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                                        </div>
                                        <div>
                                            <p class="font-semibold"><?= $team['name'] ?></p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    <?= $team['coach'] ?>
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    <?= $team['founded_year'] ?>
                                </td>
                                <td class="px-4 py-3 text-xs">
                                    <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                        Approved
                                    </span>
                                </td>
                                <td class="px-4 py-3">
                                    <div class="flex items-center space-x-4 text-sm">
                                            <button data-Team_Id="<?= $team['id'] ?>" class=" editteam flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Edit">
                                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                                                </svg>
                                            </button>
                                        <a href="Teams/delete/<?= $team['id'] ?>">
                                            <button onclick="confirmDelete()" class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Delete">
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
            <div id="modification-modal" class="modification_modal hidden overflow-y-auto overflow-x-hidden fixed w-1/2 rounded-xl border top-1/2 left-1/2 transform -translate-y-1/2 -translate-x-1/2 z-100 justify-center items-center dark:bg-gray-700 overflow-auto bg-opacity-50">
                <div aria-hidden="true" class="flex flex-col justify-center px-2 py-12 lg:px-2 text-gray-900 dark:text-white">
                    <div class="sm:w-full sm:max-w-sm flex self-center justify-between items-center">
                        <h2 class="self-center font-poppins text-center text-4xl font-bold leading-9 tracking-wider">Edit a Team</h2>
                        <span class="close cursor-pointer">&times;</span>
                    </div>

                    <div class="mt-10 self-center w-1/2">
                        <form id="editform" class="space-y-6" action="Teams/editteam" method="POST">
                            <input type="number" name="id" id="TeamID" class="hidden" value="<?= $team['id'] ?>">
                            <div>
                                <label for="TeamName" class="block text-sm font-medium leading-6">New Team Name</label>
                                <div class="mt-2">
                                    <input type="text" id="TeamName" name="name" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light" placeholder="Team Name">
                                </div>
                            </div>
                            <div>
                                <label for="Coach" class="block text-sm font-medium leading-6">New Team Coach</label>
                                <div class="mt-2">
                                    <input type="text" id="Coach" name="coach" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light" placeholder="Team Coach">
                                </div>
                            </div>
                            <div>
                                <label for="Founding-Year" class="block text-sm font-medium leading-6">Found at : </label>
                                <div class="mt-2">
                                    <input type="text" id="year" name="founded_year" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light" placeholder="Founding Year">
                                </div>
                            </div>
                            
                            <div class="flex justify-center">
                                <button type="submit" class="flex w-1/2 justify-center rounded-md bg-primary-600 px-3 py-1.5 text-sm font-semibold leading-6 tracking-widest text-white shadow-sm hover:bg-primary-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary-600">Submit Edits</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


        </div>
    </main>
</body>
<script>
    function confirmDelete() {
        var confirmation = confirm(`Are you sure you want to delete this Team?`);
        return confirmation;
    }
</script>
<script src="<?= URL_DIR ?>public/assets/js/teams.js"></script>
<script src="<?= URL_DIR ?>public/assets/js/navigation.js"></script>
<script src="<?= URL_DIR ?>public/assets/js/theme.js"></script>

</html>