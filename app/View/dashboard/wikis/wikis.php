<?php


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
</head>

<body>
    <div class="wrapper">
        <aside id="sidebar" class="side">
            <div class="h-100">
                <div class="sidebar_logo d-flex align-items-end">
                    <img src="<?= URL_DIR ?>public/assets/images/LogoWiki.svg" alt="logo" style="width: 75%;">
                   
                    <img class="close align-self-start" src="<?= URL_DIR ?>public/assets/images/close.svg" alt="">
                </div>

                <ul class="sidebar_nav" style="max-height: 80vh; overflow-y: auto;">

                    <li class="sidebar_item " style="width: 100%;">
                        <a href="dashboard" class="sidebar_link"> <img src="<?= URL_DIR ?>public/assets/images/1. overview.svg" alt="">Overview</a>
                    </li>

                    <li class="sidebar_item ">
                        <a href="users" class="sidebar_link"> <img src="<?= URL_DIR ?>public/assets/images/agents.svg" alt="">Users</a>
                    </li>

                    <li class="sidebar_item">
                        <a href="categories" class="sidebar_link"> <img src="<?= URL_DIR ?>public/assets/images/agents.svg" alt="">Categories</a>
                    </li>
                    <li class="sidebar_item active">
                        <a href="wikis" class="sidebar_link"> <img src="<?= URL_DIR ?>public/assets/images/agents.svg" alt="">wikis</a>
                    </li>
                    <li class="sidebar_item">
                        <a href="tags" class="sidebar_link"> <img src="<?= URL_DIR ?>public/assets/images/agents.svg" alt="">tags</a>
                    </li>

                    <li class="sidebar_item">
                        <span><a href="logout" class="sidebar_link text-danger"><img src="<?= URL_DIR ?>public/assets/images/articles.svg" alt="">LOG
                                OUT</a></span>
                    </li>


                </ul>
                <div class="line"></div>
                <a href="#" class="sidebar_link"><img src="<?= URL_DIR ?>public/assets/images/settings.svg" alt="">Settings</a>


            </div>
        </aside>
        <div class="main">
            <nav class="navbar justify-content-space-between pe-4 ps-2">
                <button class="btn open">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbar gap-4">
                    <div class="">
                        <input type="search" class="search" placeholder="Search" />
                        <img class="search_icon" src="<?= URL_DIR ?>public/assets/images/search.svg" alt="iconicon" />
                    </div>
                    <!-- <img src="img/search.svg" alt="icon"> -->
                    <img class="notification" src="<?= URL_DIR ?>public/assets/images/new.svg" alt="icon" />
                    <div class="card new w-auto">
                        <div class="list-group list-group-light">
                            <div class="list-group-item px-3 d-flex justify-content-between align-items-center">
                                <p class="mt-auto">Notification</p>
                                <a href="#"><img src="<?= URL_DIR ?>public/assets/images/settingsno.svg" alt="icon" /></a>
                            </div>
                            <div class="list-group-item px-3 d-flex">
                                <img src="<?= URL_DIR ?>public/assets/images/notif.svg" alt="iconimage" />
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text mb-3">
                                        Some quick example text to build on the card title and
                                        make up the bulk of the card's content.
                                    </p>
                                    <small class="card-text">1 day ago</small>
                                </div>
                            </div>
                            <div class="list-group-item px-3 d-flex">
                                <img src="<?= URL_DIR ?>public/assets/images/notif.svg" alt="iconimage" />
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text mb-3">
                                        Some quick example text to build on the card title and
                                        make up the bulk of the card's content.
                                    </p>
                                    <small class="card-text">1 day ago</small>
                                </div>
                            </div>
                            <div class="list-group-item px-3 text-center">
                                <a href="#">View all notifications</a>
                            </div>
                        </div>
                    </div>
                    <div class="inline"></div>
                    <div class="name">
                        Med
                    </div>
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-icon pe-md-0 position-relative" data-bs-toggle="dropdown">
                                <img src="<?= URL_DIR ?>public/assets/images/photo_admin.svg" alt="icon" />
                            </a>
                            <div class="dropdown-menu dropdown-menu-end position-absolute">
                                <a class="dropdown-item" href="#">Profile</a>
                                <a class="dropdown-item" href="#">Account Setting</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>



            <section class="Agents px-4">
                <table id="yourTableID" class="agent table align-middle bg-white">

                    <thead class="bg-light">
                        <tr>
                            <th>Wiki_ID</th>
                            <th>wiki_title</th>
                            <th>Content</th>
                            <th>Author</th>
                            <th>Categorie</th>
                            <th>State</th>
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
                                <td class="px-4 py-3 text-center">
                                    <form action="wikis/updateState/<?= $wiki['id'] ?>" method="POST">
                                        <input type="hidden" name="id" value="<?= $wiki['id'] ?>">
                                        <div class="row gap-3">
                                            <select name="status" class="form-select">

                                                <option selected value="<?= $wiki['status'] ?>"><?= $wiki['status'] ?></option>
                                                <?php if ($wiki['status'] == "archived") : ?>

                                                    <option  value="approved">approved</option>
                                                <?php elseif ($wiki['status'] == "approved") : ?>
                                                    <option  value="archived">archived</option>
                                                <?php endif ?>
                                            </select>
                                            <button type="submit" class="btn btn-success">Submit</button>
                                        </div>

                                    </form>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>

                </table>


            </section>

        </div>
    </div>
    <script src="<?= URL_DIR ?>public/assets/js/dashboard.js"></script>
    <script src="<?= URL_DIR ?>public/assets/js/script.js"></script>
</body>

</html>