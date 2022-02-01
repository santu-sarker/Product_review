<div class="row">
  <div class="col-2">

    <nav class="col-sm-3 col-md-3 col-lg-2 d-none d-sm-block bg-dark sidebar">
      <ul class="nav nav-pills flex-column side_navbar">
        <li class="nav-item">
          <a class="nav-link" href="#">Gedget Bd </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Iot SoftTech</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Apple Computers </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Starbucks Coffee</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Samsung Store</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Mobile BD</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Rows Electronics</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Quick Fams</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Techno Munia</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Jafor BD</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Start Over</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Saitama Corners </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Durbin Productions</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Cicyles Zone</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Bike Corners</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Productive Techs</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Asian Groups</a>
        </li>

      </ul>
    </nav>
  </div>
  <div class="row col-9 justify-content-center mt-5">
    <div class="col-9 mb-4 w-100">
        <?php include './side_views/index_search.php'?>
    </div>
    <div class="col-9 justify-content-center mt-2">
    <?php if (isset($_SESSION['post_error'])) {?>
                    <div class="alert alert-<?php printf($_SESSION['post_error']);?> alert-dismissible fade show text-center" role="alert">
                      <strong><?php echo $_SESSION['post_msg'] ?></strong>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>

        <?php
unset($_SESSION['post_error']);unset($_SESSION['post_msg']);}?>
    </div>
    <div class="col-9 mb-3">
        <button type="button" class="btn btn-light border border-info rounded post_button w-100 " data-toggle="modal" data-target="#post_modal">write a post </button>
        <?php include './side_views/post_modal.php'?>
    </div>
    <div class="col-9">
        <?php include './side_views/user_post.php'?>
    </div>
    <div class="col-9">
        <?php include './side_views/user_post.php'?>
    </div>
    <div class="col-9">
        <?php include './side_views/user_post.php'?>
    </div>
  </div>


</div>
