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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@2.0.1/dist/css/multi-select-tag.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-..." crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-..." crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="public/assets/css/style.css">
    <link rel="stylesheet" href="public/assets/dist/output.css">
</head>

<body>

    <!-- Navbar  -->
    <?php include "../app/View/includes/header.php"; ?>
    <!-- Navbar  -->
    <section class="Agents mt-[7em] px-4">
        <button type="button" id="addWikisButton" class="btn btn-primary my-2" data-bs-toggle="modal" data-bs-target="#addwikisModal" style="background-color: #0d6efd;">
            Add wikis
        </button>
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
                        <td><button data-id="<?= $wiki['id'] ?>" type="button" id="updateWikisButton" class="btn btn-primary my-2" style="background-color: #0d6efd;" data-bs-toggle="modal" data-bs-target="#updatewikisModal<?= $wiki['id'] ?>">
                                Update
                            </button></td>
                        <td><a href="mywikis/delete/<?= $wiki['id'] ?>" class="btn btn-danger">Delete</a></td>
                    </tr>
                    <!-- Modal -->

                    <div class="modal fade" id="updatewikisModal<?= $wiki['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Update wikis</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <!-- Your modal content goes here -->
                                    <form action="Mywikis/updateWiki" method="Post">

                                        <div class="mb-3">
                                            <label for="tagName" class="form-label">Wiki Name</label>
                                            <input type="text" class="form-control" id="tagName" name="wiki" required value="<?= $wiki['wiki_title'] ?>">
                                            <input type="hidden" name="id" value="<?= $wiki['id'] ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="tagcontent" class="form-label">Content</label>
                                            <input type="text" class="form-control" id="tagcontent" name="content" required value="<?= $wiki['content'] ?>">

                                        </div>
                                        <div>
                                            <select name="Categorie_ID" id="categorie" class="form-control" required>
                                                <option value="<?= $wiki[0]['Categorie_ID'] ?>"><?= $wiki['Categorie_Name'] ?></option>
                                                <?php foreach ($categories as $categorie) : ?>
                                                    <option value="<?= $categorie['id'] ?>"><?= $categorie['Categorie_Name'] ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                        <div>
            <label class="form-label">Tags</label>
            <select name="tag[]" id="tag" multiple required>
                <?php foreach($tags as $tag) :?>
                    <option value="<?= $tag['id'] ?>"><?= $tag['tag'] ?></option>
                <?php endforeach ?>
            </select>
        </div>

                                        <button type="submit" data-id="<?= $wiki['id'] ?>" style="background-color: #0d6efd;" class="btn btn-primary">Update wikis</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </tbody>

        </table>


    </section>

    </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="addwikisModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Wikis</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Your modal content goes here -->
                    <form action="mywikis/addWiki/" method="Post">
                        <div class="mb-3">
                            <label for="WikiName" class="form-label">Wiki Name</label>
                            <input type="text" class="form-control" id="wikiName" name="wiki" required>
                        </div>
                        <div class="mb-3">
                            <label for="Content" class="form-label">Content</label>
                            <textarea name="content" id="content" cols="25" required></textarea>
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label">Categorie</label>
                            <select name="categorie" id="categorie" placeholder="Description" class="form-control">
                                <?php foreach ($categories as $categorie) : ?>
                                    <option value="<?= $categorie['id'] ?>"><?= $categorie['Categorie_Name'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>

                        <div>
            <label class="form-label">Tags</label>
            <select name="tag[]" id="tag1" multiple required>
                <?php foreach($tags as $tag) :?>
                    <option value="<?= $tag['id'] ?>"><?= $tag['tag'] ?></option>
                <?php endforeach ?>
            </select>
        </div>

                        <!-- Add more form fields if needed -->
                        <button type="submit" class="btn btn-primary" style="background-color: #0d6efd;">Add Wiki</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="<?= URL_DIR ?>public/assets/js/dashboard.js"></script>
    <script src="<?= URL_DIR ?>public/assets/js/script.js"></script>

    <script>
        // Initialize the modal
        var myModaladd = new bootstrap.Modal(document.getElementById('addwikiModal'));

        // Show the modal when the button is clicked
        document.getElementById('addWikkisButton').addEventListener('click', function() {
            myModaladd.show();
        });
    </script>
    <script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@2.0.1/dist/js/multi-select-tag.js"></script>
    <!-- <script>
    new MultiSelectTag('tag')  // id
</script> -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            new MultiSelectTag('tag', {
                enable_search: true,
                search_placeholder: 'Search tags...',
            });
        });
    </script>
     <script>
        document.addEventListener('DOMContentLoaded', function() {
            new MultiSelectTag('tag1', {
                enable_search: true,
                search_placeholder: 'Search tags...',
            });
        });
    </script>
    <script>
        // Initialize the modal
        var myModal = new bootstrap.Modal(document.getElementById('updatewikisModal'));

        // Show the modal when the button is clicked
        document.getElementById('updateWikisButton').addEventListener('click', function() {
            myModal.show();
        });
    </script>

    <!-- Footer   -->
    <?php include "../app/View/includes/footer.php"; ?>
    <!-- / Footer   -->

    <!-- / For dark mode -->
    <script src="public/assets/js/darkmode.js"></script>
    <!-- / For navbar mobile -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.js"></script>
</body>

</html>