<?php require_once APPROOT . "/views/inc/header.php"; ?>
<?php require_once APPROOT . "/views/inc/nav.php"; ?>

<h1 class="text-center mt-3 text-info english">member panel</h1>

<div class="container-fluid">
    <div class="container">

    <a href="<?php echo URLROOT . "user/create";?>" class="btn btn-primary mb-3">To Create New Post</a>
        <div class="row">
            <div class="col-md-4">
                <ul class="list-group">
                    <?php foreach($data['cats'] as $cat) : ?>
                        <li class="list-group-item">
                           <a href="<?php echo URLROOT . 'user/member/' . $cat->id;?>"> <?php echo $cat->name ?></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <div class="col-md-8">
                               
                    <?php foreach($data['posts'] as $post):?>
                        <div class="card mb-3">
                            <div class="card-header bg-warning"><span class="me-3"><?php echo $post->title ;?></span></div>
                                <div class="card-block p-3 ">
                                    <p><?php echo $post->description ;?></p>
                                    <div class="d-flex justify-content-between">
                                        <div>
                                        <!-- <a class="btn btn-primary btn-sm" href="">Edit</a> -->
                                        <!-- <a class="btn btn-danger btn-sm" href="">Delete</a> -->
                                        </div>

                                       <a href="<?php echo URLROOT . "user/memberdetail/" . $post->id ;?>"  style="color: red;">view more »</a>
                                       
                                    </div>
                                </div>
                            </div>
                    <?php endforeach;?>
            </div>

        </div>
    </div>
</div> 

<?php require_once APPROOT . "/views/inc/footer.php"; ?>