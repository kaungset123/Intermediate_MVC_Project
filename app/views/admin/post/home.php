<?php require_once APPROOT . "/views/inc/header.php"; ?>
<?php require_once APPROOT . "/views/inc/nav.php"; ?>

<h1 class="text-info text-center">Admin Post panel</h1>

<div class="container-fluid">
    <div class="container">
        <?php flash("post_delete_success"); ?>
        <?php flash("post_delete_fail"); ?>

        <div class="row">
            <div class="col-md-4">
                <div class="d-flex justify-content-between no-gutters">
                    <a class=" btn btn-primary mb-2" aria-current="page" href="<?php echo URLROOT . "admin/home"; ?>"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
                    <a href="<?php echo URLROOT . "post/create"; ?>" class="btn btn-primary mb-2">To Create New Post</a>
                </div>
                <ul class="list-group">
                    <?php foreach ($data['cats'] as $cat) : ?>
                        <li class="list-group-item">
                            <a href="<?php echo URLROOT . 'post/home/' . $cat->id; ?>"><?php echo $cat->name; ?></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <div class="col-md-8 mt-5">

                <?php foreach ($data['posts'] as $post) : ?>
                    <div class="card mb-3">
                        <div class="card-header bg-warning"><span class="me-3"><?php echo $post->title ?></span></div>
                        <div class="card-block p-3 ">
                            <p><?php echo $post->description ?></p>
                            <div class="d-flex justify-content-between">
                                <div>
                                    <a class="btn btn-primary btn-sm" href="<?php echo URLROOT . "post/edit/" . $post->id; ?>">Edit</a>
                                    <a class="btn btn-danger btn-sm" href="<?php echo URLROOT . "post/delete/" . $post->id; ?>">Delete</a>
                                </div>

                                <a href="<?php echo URLROOT . "post/show/" . $post->id; ?>" style="color: red;">view Detail »</a>

                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

        </div>
    </div>
</div>

<?php require_once APPROOT . "/views/inc/footer.php"; ?>