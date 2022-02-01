<nav class="navbar fixed-top navbar-expand-sm navbar-dark bg-dark ">
    <div class="container-fluid">
    <a href="./index.php" class="navbar-brand ">Review Web</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">

        <ul class="navbar-nav text-center">
            <li class="nav-item index_username"><a href="./profile.php" class="nav-link "><?php echo $_SESSION['user_email'] ?></a></li>
            <li class="nav-item "><a href="" class="nav-link">Notification</a></li>
            <li class="nav-item "><a href="./account_settings.php" class="nav-link">Settings</a></li>
            <li class="nav-item "><a href="./logout.php" class="nav-link">Logout</a></li>

        </ul>






      </div>
    </div>
</nav>
