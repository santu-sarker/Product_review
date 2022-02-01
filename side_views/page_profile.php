<div class="container-fluid mt-5 page_profile_div">
      <div class="profile_header ">
        <div class="row justify-content-center">
                <div class="card col-lg-10 col-md-10 col-sm-12 ">
                  <div class="card-body ">
                    <div class=" align-items-center text-center profile_img">
                      <img src="./assets/user_images/male.png" alt="user image" class="rounded-circle border border-info" width="200">
                      <div class="profile_details">
                        <h4>Md Santu Sarker</h4>
                        <p class="text-secondary mb-1">Student,Sonargaon University</p>
                        <p class="text-muted font-size-sm">Dhaka, Bangladesh</p>
                        <button class="btn btn-primary">Follow</button>
                        <button class="btn btn-outline-primary">Message</button>

                      </div>
                    </div>
                  </div>
                </div>

        </div>

      </div>
</div>
<div class="container my-0">
              <div class="row">
                <div class="col-12 ">
                  <nav>
                    <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                      <a class="nav-item nav-link active" id="nav-timeline-tab" data-toggle="tab" href="#nav-timeline" role="tab" aria-controls="nav-timeline" aria-selected="true">Timeline</a>
                      <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Overview</a>
                      <a class="nav-item nav-link" id="nav-member-tab" data-toggle="tab" href="#nav-member" role="tab" aria-controls="nav-member" aria-selected="false">Members</a>
                      <a class="nav-item nav-link" id="nav-details-tab" data-toggle="tab" href="#nav-details" role="tab" aria-controls="nav-details" aria-selected="false">Page Details</a>
                    </div>
                  </nav>
                  <div class="tab-content col-12 " id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-timeline" role="tabpanel" aria-labelledby="nav-timeline-tab">
                    <div class="col-9 justify-content-center ml-2 mr-2 mb-3">
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
                    <div class="row ml-2 mr-2 mb-3">
                      <button type="button" class="btn btn-light border border-info rounded post_button w-100 ml-2 mr-2" data-toggle="modal" data-target="#post_modal">write a post </button>
                    </div>
                      <?php include './side_views/user_post.php'?>
                    </div>
                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                     page information shows here
                    </div>
                    <div class="tab-pane fade" id="nav-member" role="tabpanel" aria-labelledby="nav-member-tab">
                      page members shows here
                    </div>
                    <div class="tab-pane fade" id="nav-details" role="tabpanel" aria-labelledby="nav-details-tab">
                      page details information like social links shows here
                    </div>
                  </div>

                </div>
              </div>
        </div>
      </div>
</div>

<?php include "./side_views/post_modal.php"?>