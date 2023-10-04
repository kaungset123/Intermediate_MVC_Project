<?php require_once APPROOT . "/views/inc/header.php"; ?>
<?php require_once APPROOT . "/views/inc/nav.php"; ?>

<h1 class="text-info text-center mt-2 mb-3">Admin Category Panel</h1>
 
<div class="container-fluid container">
    <div class="row">
        <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        <h2>Category</h2>                    
                    </div>
                    <div class="card-block">
                        <!-- side bar menu start -->
                        <ul class="list-group ">                         
                                <?php foreach($data['cats'] as $cate): ?>
                                    <li class="list-group-item rounded-0  d-flex justify-content-between" >
                                       <span><?php echo  $cate->name;?></span>
                                       <span>
                                       <a href="<?php echo URLROOT . 'category/edit/' . $cate->id ;?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                        <a href="<?php echo URLROOT . 'category/delete/' . $cate->id ;?>" style="margin-left: 10px;"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                       </span>                                       
                                    </li>
                                <?php endforeach;?>                                                          
                        </ul>
                        <!-- side bar menu end -->
                    </div>
                </div>
        </div>


            <div class="col-md-5 offset-md-1 border p-4 ">
                <form action="<?php echo URLROOT . 'category/edit'?>" method="post" >
                            <h1 class="text-center text-info mb-3">Edit Category</h1>
                            <div class="mb-3">
                                <label for="name" class="form-label">Category Name</label>
                                <input type="text" class="form-control <?php echo !empty($data['name_err']) ? 'is-invalid' : '' ?>" id="name"  name="name" value="<?php echo $data['currentCat']->name; ?>">
                                <span class="text-danger"><?php echo !empty($data['name_err']) ? $data['name_err'] : '' ?></span>
                            </div>
                            <div class="">
                                <div class="float-end">
                                        <button class="btn btn-outline-secondary">Cancle</button>
                                        <button class="btn btn-primary">Update</button>
                                </div>
                            </div>
                </form>
            </div>

    </div>
</div>


<?php require_once APPROOT . "/views/inc/footer.php"; ?>