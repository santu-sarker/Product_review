<div class="container light-style flex-grow-1 container-p-y">

    <h4 class="font-weight-bold py-3 mb-4 text-center">
      Account settings
    </h4>

    <div class="card overflow-hidden">
      <div class="row no-gutters row-bordered row-border-light">
        <div class="col-md-3 pt-0 account_tab" >
          <div class="list-group list-group-flush account-settings-links" id="account_tab">
            <a class="list-group-item list-group-item-action" data-toggle="tab" href="#account-change-password">Change password</a>
            <a class="list-group-item list-group-item-action" data-toggle="tab" href="#account-info">Info</a>
            <a class="list-group-item list-group-item-action" data-toggle="tab" href="#account-social-links">Social links</a>
            <a class="list-group-item list-group-item-action" data-toggle="tab" href="#account-connections">Connections</a>
            <a class="list-group-item list-group-item-action" data-toggle="tab" href="#account-notifications">Notifications</a>
          </div>
        </div>
        <div class="col-md-9">
          <div class="tab-content h-100">

            <div class="tab-pane fade active show" id="account-change-password">
              <div class="card-body pb-2">
                <form id="form_signin" action="./Class/account_settings.class.php" method="POST">
                <?php if (isset($_SESSION['pass_change_error'])) {?>
                  <div class="alert alert-<?php printf($_SESSION['pass_change_error']);?> alert-dismissible fade show text-center" role="alert">
                      <strong><?php echo $_SESSION['pass_change_error_log'] ?></strong>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <?php
unset($_SESSION['pass_change_error']);unset($_SESSION['pass_change_error_log']);}?>
                  <div class="form-group">
                    <label class="form-label">Current password</label>
                    <input type="password" name="c_password" id="c_password" class="form-control">
                  </div>

                  <div class="form-group">
                    <label class="form-label">New password</label>
                    <input type ="password" id="n_password" name="n_password" class="form-control">
                  </div>

                  <div class="form-group">
                    <label class="form-label">Repeat new password</label>
                    <input type="password" name="cn_password" id="cn_password" class="form-control">
                  </div>

                  <div class="text-right my-3">
                    <button type="submit" id="password_change" name="password_change" class="btn btn-primary">Save changes</button>&nbsp;
                    <button type="button" id="password_cancle" name="password_cancle" class="btn btn-default">Cancel</button>
                  </div>
                  </form>
              </div>
            </div>
            <div class="tab-pane fade" id="account-info">
              <div class="card-body pb-2">

                <div class="form-group">
                  <label class="form-label">Bio</label>
                  <textarea class="form-control" rows="4" placeholder="Edit Your Bio Information"></textarea>
                </div>
                <div class="form-group">
                  <label class="form-label">Birthday</label>
                  <input type="text" class="form-control" placeholder="Birth date">
                </div>
                <div class="form-group">
                  <label class="form-label">Country</label>
                  <select class="custom-select">
                    <option>USA</option>
                    <option selected="">Bangladesh</option>
                    <option>India</option>
                    <option>Pakistan</option>
                    <option>Japan</option>
                  </select>
                </div>


              </div>
              <hr class="border-light m-0">
              <div class="card-body pb-2">

                <h6 class="mb-4">Contacts</h6>
                <div class="form-group">
                  <label class="form-label">Phone</label>
                  <input type="text" class="form-control" placeholder="e.g: 01766464051">
                </div>
                <div class="form-group">
                  <label class="form-label">Website</label>
                  <input type="text" class="form-control" placeholder="e.g: review_web.com">
                </div>
                <div class="text-right my-3">
                    <button type="submit" id="password_change" name="password_change" class="btn btn-primary">Save changes</button>&nbsp;
                    <button type="button" id="password_cancle" name="password_cancle" class="btn btn-default">Cancel</button>
                  </div>
              </div>

            </div>
            <div class="tab-pane fade" id="account-social-links">
              <div class="card-body pb-2">

                <div class="form-group">
                  <label class="form-label">Twitter</label>
                  <input type="text" class="form-control" value="https://twitter.com/user">
                </div>
                <div class="form-group">
                  <label class="form-label">Facebook</label>
                  <input type="text" class="form-control" value="https://www.facebook.com/user">
                </div>
                <div class="form-group">
                  <label class="form-label">Google+</label>
                  <input type="text" class="form-control" value="">
                </div>
                <div class="form-group">
                  <label class="form-label">LinkedIn</label>
                  <input type="text" class="form-control" value="">
                </div>
                <div class="form-group">
                  <label class="form-label">Instagram</label>
                  <input type="text" class="form-control" value="https://www.instagram.com/user">
                </div>
                <div class="text-right my-3">
                    <button type="submit" id="password_change" name="password_change" class="btn btn-primary">Save changes</button>&nbsp;
                    <button type="button" id="password_cancle" name="password_cancle" class="btn btn-default">Cancel</button>
                  </div>
              </div>
            </div>
            <div class="tab-pane fade" id="account-connections">
              <div class="card-body">
                <button type="button" class="btn btn-twitter">Connect to <strong>Twitter</strong></button>
              </div>
              <hr class="border-light m-0">
              <div class="card-body">
                <h5 class="mb-2">
                  <a href="javascript:void(0)" class="float-right text-muted text-tiny"><i class="ion ion-md-close"></i> Remove</a>
                  <i class="ion ion-logo-google text-google"></i>
                  You are connected to Google:
                </h5>
                mdsantusarker@mail.com
              </div>
              <hr class="border-light m-0">
              <div class="card-body">
                <button type="button" class="btn btn-facebook">Connect to <strong>Facebook</strong></button>
              </div>
              <hr class="border-light m-0">
              <div class="card-body">
                <button type="button" class="btn btn-instagram">Connect to <strong>Instagram</strong></button>
              </div>
            </div>
            <div class="tab-pane fade" id="account-notifications">
              <div class="card-body pb-2">

                <h6 class="mb-4">Activity</h6>

                <div class="form-group">
                  <label class="switcher">
                    <input type="checkbox" class="switcher-input" checked="">
                    <span class="switcher-indicator">
                      <span class="switcher-yes"></span>
                      <span class="switcher-no"></span>
                    </span>
                    <span class="switcher-label">Email me when someone comments on my post</span>
                  </label>
                </div>
                <div class="form-group">
                  <label class="switcher">
                    <input type="checkbox" class="switcher-input" checked="">
                    <span class="switcher-indicator">
                      <span class="switcher-yes"></span>
                      <span class="switcher-no"></span>
                    </span>
                    <span class="switcher-label">Email me when someone request for join in page</span>
                  </label>
                </div>
                <div class="form-group">
                  <label class="switcher">
                    <input type="checkbox" class="switcher-input">
                    <span class="switcher-indicator">
                      <span class="switcher-yes"></span>
                      <span class="switcher-no"></span>
                    </span>
                    <span class="switcher-label">Email me when someone follows me</span>
                  </label>
                </div>
              </div>
              <hr class="border-light m-0">
              <div class="card-body pb-2">

                <h6 class="mb-4">Application</h6>

                <div class="form-group">
                  <label class="switcher">
                    <input type="checkbox" class="switcher-input" checked="">
                    <span class="switcher-indicator">
                      <span class="switcher-yes"></span>
                      <span class="switcher-no"></span>
                    </span>
                    <span class="switcher-label">News and announcements</span>
                  </label>
                </div>
                <div class="form-group">
                  <label class="switcher">
                    <input type="checkbox" class="switcher-input">
                    <span class="switcher-indicator">
                      <span class="switcher-yes"></span>
                      <span class="switcher-no"></span>
                    </span>
                    <span class="switcher-label">Weekly product updates</span>
                  </label>
                </div>
                <div class="form-group">
                  <label class="switcher">
                    <input type="checkbox" class="switcher-input" checked="">
                    <span class="switcher-indicator">
                      <span class="switcher-yes"></span>
                      <span class="switcher-no"></span>
                    </span>
                    <span class="switcher-label">Weekly blog digest</span>
                  </label>
                </div>
                <div class="text-right my-3">
                    <button type="submit" id="password_change" name="password_change" class="btn btn-primary">Save changes</button>&nbsp;
                    <button type="button" id="password_cancle" name="password_cancle" class="btn btn-default">Cancel</button>
                  </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


  </div>
