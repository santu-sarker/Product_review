<div class="modal fade" id="post_modal" tabindex="-1" role="dialog" aria-labelledby="post_modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header justify-content-center modal-dialog-scrollable">
            <h5 class="modal-title ml-auto" id="post_modal">write a post</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <form action="./Class/handle_post.class.php" method="POST" enctype="multipart/form-data">
                <div class="row pt-3 pb-5 pl-1 pr-1">
                    <div class="col-12 mb-4">
                        <input type="text" id="post_title" name="post_title" class="form-control" placeholder="product title" required autofocus></input>
                    </div>
                    <div class="col-12 mb-4">
                        <input type="number" id="product_price" name="product_price" class="form-control" placeholder="product price" required autofocus></input>
                    </div>
                    <div class="col-12 mb-4">
                        <textarea class="w-100 form-control" name="post_content" id="" cols="" rows="4" placeholder="Write Details About Your Product"></textarea>
                    </div>
                    <div class="col-12 mb-4">
                        <input type="text" id="post_category" class="w-100 form-control" name="post_category" placeholder="product category (separate with comma if multiple)"></input>
                    </div>
                    <div class="col-12 mb-4">
                        <input type="file" name="post_img" id="fileToUpload" accept="image/*">
                        <button id="remove" type="button" class="btn btn-danger">remove img</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 justify-content-center">
                    <button type="submit" id="post_submit" name="post_submit" class="btn btn-primary w-100">post</button>
                    </div>
                </div>
                </form>
            </div>

        </div>
    </div>
</div>
