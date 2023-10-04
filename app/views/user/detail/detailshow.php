<?php require_once APPROOT . "/views/inc/header.php"; ?>
<?php require_once APPROOT . "/views/inc/nav.php"; ?>

<!-- <h1>post create page</h1> -->


<div class="container-fluid my-5">

    <div class="container">     
       
        <div class="col-md-8 offset-md-2">
        <?php flash('post_edit_success'); ?> 
           
            <div class="d-flex justify-content-between no-gutters mb-3">
                <a class="btn btn-primary" href="<?php echo URLROOT . "detail/homedetail/" . $data['post']->cate_id;?>"> Back</a>
               
            </div>
            <div class="card p-4">
               <div class="card-header">
                    <?php echo $data['post']->title ;?>
               </div>
               <div class="card-body">
                    <img src="<?php echo URLROOT . 'assets/uploads/' . $data['post']->image ?>" class="img-fluid mb-3">
                    <p><?php echo $data['post']->content ;?></p>
               </div>
            </div>  

        </div>
    </div>
</div>

<?php require_once APPROOT . "/views/inc/footer.php"; ?>