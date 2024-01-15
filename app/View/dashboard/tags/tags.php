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
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-..." crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-..." crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
  <div class="wrapper">
    <aside id="sidebar" class="side">
      <div class="h-100">
        <div class="sidebar_logo d-flex align-items-end">
          <img src="<?= URL_DIR ?>public/assets/images/LogoWiki.svg" alt="wiki logo">
          <img class="close align-self-start" src="<?= URL_DIR ?>public/assets/images/close.svg" alt="">
        </div>

        <ul class="sidebar_nav" style="max-height: 80vh; overflow-y: auto;">

          <li class="sidebar_item " style="width: 100%;">
            <a href="dashboard" class="sidebar_link"> <img src="<?= URL_DIR ?>public/assets/images/1. overview.svg" alt="">Overview</a>
          </li>

          <li class="sidebar_item">
            <a href="users" class="sidebar_link"> <img src="<?= URL_DIR ?>public/assets/images/agents.svg" alt="">Users</a>
          </li>

          <li class="sidebar_item">
            <a href="categories" class="sidebar_link"> <img src="<?= URL_DIR ?>public/assets/images/agents.svg" alt="">Categories</a>
          </li>
          <li class="sidebar_item">
            <a href="wikis" class="sidebar_link"> <img src="<?= URL_DIR ?>public/assets/images/agents.svg" alt="">wikis</a>
          </li>
          <li class="sidebar_item active">
            <a href="tags" class="sidebar_link"> <img src="<?= URL_DIR ?>public/assets/images/agents.svg" alt="">tags</a>
          </li>

          <li class="sidebar_item">
            <span><a href="logout/logout" class="sidebar_link text-danger"><img src="<?= URL_DIR ?>public/assets/images/articles.svg" alt="">LOG
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
        <button type="button" id="addTagsButton" class="btn btn-primary my-2" data-bs-toggle="modal" data-bs-target="#addtagsModal">
          Add Tags
        </button>
        <table id="yourTableID" class="agent table align-middle bg-white">

        <thead class="bg-light">
          <tr>
            <th>Tag_ID</th>
            <th>Tag Name</th>
            <th>Update</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($tags as $tag) { ?>
            <tr class="border-b dark:border-gray-700">
              <td class="px-4 py-3 text-center"><?= $tag['id'] ?></td>
              <td class="px-4 py-3 text-center"><?= $tag['tag'] ?></td>
              <td><button data-id="<?= $tag['id'] ?>" type="button" id="updateTagsButton" class="btn btn-primary my-2" data-bs-toggle="modal" data-bs-target="#updatetagsModal<?= $tag['id'] ?>">
                    Update
                  </button></td>
              <td><a href="tags/delete/<?= $tag['id'] ?>" class="btn btn-danger">Delete</a></td>
            </tr>
                          <!-- Modal -->

                          <div class="modal fade" id="updatetagsModal<?= $tag['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Update tag</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <!-- Your modal content goes here -->
                      <form action="tags/editTag" method="Post">

                        <div class="mb-3">
                          <label for="tagName" class="form-label">Tag Name</label>
                          <input type="text" class="form-control" id="tagName" name="tag" required value="<?= $tag['tag'] ?>">
                          <input type="hidden" name="id" value="<?= $tag['id'] ?>" >
                        </div>

                        <button type="submit" data-id="<?= $tag['id'] ?>" class="btn btn-primary">Update Tag</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
          <?php
          }
          ?>

        </tbody>
        </table>


      </section>

    </div>
  </div>
  <script src="<?= URL_DIR ?>public/assets/js/dashboard.js"></script>
  <script src="<?= URL_DIR ?>public/assets/js/script.js"></script>
  <!-- Modal -->
  <div class="modal fade" id="addtagssModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <!-- Your modal content goes here -->
          <form action="tags/addtag/" method="Post">
            <!-- Add your form fields for adding tags here -->
            <div class="mb-3">
              <label for="tagName" class="form-label">Tag Name</label>
              <input type="text" class="form-control" id="TagName" name="tag" required>
            </div>
            <!-- Add more form fields if needed -->
            <button type="submit" class="btn btn-primary">Add Tag</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script src="<?= URL_DIR ?>public/assets/js/dashboard.js"></script>
  <script src="<?= URL_DIR ?>public/assets/js/script.js"></script>

  <script>
    // Initialize the modal
    var myModaladd = new bootstrap.Modal(document.getElementById('addtagssModal'));

    // Show the modal when the button is clicked
    document.getElementById('addTagsButton').addEventListener('click', function() {
      myModaladd.show();
    });
  </script>

<script>
    // Initialize the modal
    var myModal = new bootstrap.Modal(document.getElementById('updatetagsModal'));

    // Show the modal when the button is clicked
    document.getElementById('updateTagsButton').addEventListener('click', function() {
      myModal.show();
    });
  </script>
</body>

</html>