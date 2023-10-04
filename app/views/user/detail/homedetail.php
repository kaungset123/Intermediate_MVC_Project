<?php require_once APPROOT . "/views/inc/header.php"; ?>
<?php require_once APPROOT . "/views/inc/nav.php"; ?>



<div class="container-fluid mt-3">
    <div class="container">

        <div class="row">
            <div class="col-md-4">
                <h4 class="text-dark  mb-3 text-center">Choose your favourite course</h4>
                <ul class="list-group">
                    <?php foreach ($data['cats'] as $cat) : ?>
                        <li class="list-group-item">
                            <a href="<?php echo URLROOT . 'detail/homedetail/' . $cat->id; ?>"><?php echo $cat->name; ?></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <div class="col-md-8 p-5">
                <?php foreach ($data['posts'] as $post) : ?>
                    <div class="card mb-3">
                        <div class="card-header bg-warning"><span class="me-3"><?php echo $post->title ?></span></div>
                        <div class="d-flex justify-content-between">
                            <div class="card-block p-3 ">
                                <p><?php echo $post->description ?></p>
                            </div>

                            <a class="me-2 mt-3" href="<?php echo URLROOT . "detail/detailshow/" . $post->id; ?>" style="color: red;">view more »</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

        </div>
    </div>
</div>

<?php require_once APPROOT . "/views/inc/footer.php"; ?>