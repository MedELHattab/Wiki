<?php


$loggedIn = $_SESSION["id"];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Wiki</title>
    <link rel="stylesheet" href="<?= URL_DIR ?>public/assets/css/dashboard.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <link rel="stylesheet" href="public/assets/css/style.css">
    <link rel="stylesheet" href="public/assets/dist/output.css">

</head>

<body>

    <!-- Navbar  -->
    <?php include "../app/View/includes/header.php"; ?>
    <!-- Navbar  -->
<section class="Agents mt-[7em] px-4">
                <button type="button" class="btn btn-primary my-2" data-bs-toggle="modal" data-bs-target="#exampleModalCenter1"> Add user </button>
                <table id="yourTableID" class="agent table align-middle bg-white">

                    <thead class="bg-light">
                        <tr>
                            <th>Wiki_ID</th>
                            <th>wiki_title</th>
                            <th>Content</th>
                            <th>Author</th>
                            <th>Categorie</th>
                            <th>update</th>
                            <th>delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($wikis as $wiki) { ?>
                            <tr class="border-b dark:border-gray-700">
                                <td class="px-4 py-3 text-center"><?= $wiki['id'] ?></td>
                                <td class="px-4 py-3 text-center"><?= $wiki['wiki_title'] ?></td>
                                <td class="px-4 py-3 text-center"><?= $wiki['content'] ?></td>
                                <td class="px-4 py-3 text-center"><?= $wiki['name'] ?> </td>
                                <td class="px-4 py-3 text-center"><?= $wiki['Categorie_Name'] ?> </td>
                                <td><a href="categories/update/<?=$categorie['id']?>" class="btn btn-success">Update</a></td>
                                <td><a href="categories/delete/<?=$categorie['id']?>" class="btn btn-danger">Delete</a></td>
                                </tr>
                        <?php } ?>
                    </tbody>

                </table>


            </section>

        </div>
    </div>
    <script src="<?= URL_DIR ?>public/assets/js/dashboard.js"></script>
    <script src="<?= URL_DIR ?>public/assets/js/script.js"></script>
        <!-- Footer   -->
        <?php include "../app/View/includes/footer.php"; ?>
    <!-- / Footer   -->

    <!-- / For dark mode -->
    <script src="public/assets/js/darkmode.js"></script>
    <!-- / For navbar mobile -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.js"></script>
</body>

</html>