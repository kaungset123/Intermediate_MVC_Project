<?php require_once APPROOT . "/views/inc/header.php"; ?>
<?php require_once APPROOT . "/views/inc/nav.php"; ?>


<!-- <h1>Post panel</h1> -->

<div class="container-fluid mt-3">
    <div class="container">

        <!-- <a href="" class="btn btn-primary mb-3">To Create New Post</a> -->
        <div class="row">
            
            <div class="col-md-4 me-5 ms-3">
        
            <h2 class="text-info  ms-4 text-center">Available Course</h2>
                <ul class="list-group">

                    <?php foreach ($data as $cat) : ?>
                        <li class="list-group-item ">
                            <a href=""><?php echo $cat->name; ?></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>


            <div class="col-md-7 off-set-0 pt-5">
                <div class="card mb-3">
                    <div class="card-block p-3 bg-info pt-4">
                        <div class="d-flex justify-content-between ">
                            <p class="text-white">To view detail info of Our Courses</p>
                            <a href="<?php echo URLROOT . 'detail/homedetail/1'; ?>" class="text-dark"> Click Here »</a>
                        </div>
                    </div>
                </div> 
                <div class="row mb-3 ">
                    <img src="assets/imgs/cplus.jpg" style="width:165px;">
                    <img src="assets/imgs/csharp.png" style="width:165px;">                 
                    <img src="assets/imgs/python.png" style="width:165px;">
                    <img src="assets/imgs/js.png" style="width:167px;">
                </div>
                <div class="row">
                  
                  <img src="assets/imgs/java1.png" style="width:165px;">
                  <img src="assets/imgs/phplogo.png" style="width:165px;">
                  <img src="assets/imgs/html.png" style="width:165px;">
                  <img src="assets/imgs/css.png" style="width:167px;">
    
                </div>
            </div>
        </div>
    </div>

    <?php require_once APPROOT . "/views/inc/footer.php"; ?>