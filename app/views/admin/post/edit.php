<?php require_once APPROOT . "/views/inc/header.php"; ?>
<?php require_once APPROOT . "/views/inc/nav.php"; ?>

<!-- <h1>post create page</h1> -->



<div class="container-fluid my-5">
    <div class="container">
        <div class="col-md-8 offset-md-2">
            <div class="card p-4">
            <?php  flash("post_edit_fail"); ?>
                <form action="<?php echo URLROOT . 'post/edit' ?>" method="post" enctype="multipart/form-data">

                    
                    <h1 class="text-center text-info mb-3">Edit Post</h1>
                    
                    <div class="form-group mb-3">
                        <label for="cate_id" class="mb-2">Post Category</label>
                        <select class="form-control" id="cate_id" name="cate_id">
                            <?php foreach($data['cats'] as $cat) :?>
                                <?php if($cat->id == $data['post']->cate_id):?>
                                    <option value="<?php echo  $cat->id;?>" selected><?php echo $cat->name;?></option>
                                <?php else :?>
                                    <option value="<?php echo $cat->id;?>"><?php echo $cat->name;?></option>
                                <?php endif;?>
                                   
                            <?php endforeach;?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control <?php echo !empty($data['title_err']) ? 'is-invalid' : '' ?>" id="title" name="title" value="<?php echo $data['post']->title ;?>">
                        <span class="text-danger"><?php echo !empty($data['title_err']) ? $data['title_err'] : '' ?></span>
                    </div>

                    <div class="form-group mb-3">
                        <label for="desc"  class="mb-2">Post Description</label>
                        <textarea class="form-control <?php echo !empty($data['desc_err']) ? 'is-invalid' : '' ?>"  id="desc" name="desc" style="height: 100px" ><?php echo $data['post']->description ;?></textarea>
                        <span class="text-danger"><?php echo !empty($data['desc_err']) ? $data['desc_err'] : '' ?></span>
                    </div>

                    <div class=" mb-3">
                        <label class="d-block mb-2" for="file">Choose Image</label>
                        <input class="bg-info d-block <?php echo !empty($data['file_err']) ? 'is-invalid' : '' ?>" type="file" name="file" id="file" >
                        <span class="text-danger"><?php echo !empty($data['file_err']) ? $data['file_err'] : '' ?></span>
                        <input type="hidden" name="old_image" value="<?php echo $data['post']->image ; ?>" >
                    </div>

                    <div class="form-group mb-3">
                        <label for="content"  class="mb-2">Post Content</label>
                        <textarea class="form-control <?php echo !empty($data['content_err']) ? 'is-invalid' : '' ?>"  id="content" name="content" style="height: 100px"><?php echo $data['post']->content ;?></textarea>
                        <span class="text-danger"><?php echo !empty($data['content_err']) ? $data['content_err'] : '' ?></span>
                    </div>


                    <div class=" ">
                        <div class="float-end">
                            <button class="btn btn-outline-secondary">Cancle</button>
                            <button class="btn btn-primary">Edit</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<?php require_once APPROOT . "/views/inc/footer.php"; ?>