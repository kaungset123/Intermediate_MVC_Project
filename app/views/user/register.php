<?php require_once APPROOT . "/views/inc/header.php"; ?>
<?php require_once APPROOT . "/views/inc/nav.php"; ?>


<div class="continer-fluid my-5">
    <div class="container">
        <div class="col-md-8 offset-md-2">
            <div class="card bg-light p-5">
                <!-- Regiseter form start -->
                <form action="<?php echo URLROOT . 'user/register'?>" method="post" >
                    <h1 class="text-center text-info mb-3">Register To Post</h1>
                    <div class="mb-3">
                         <label for="username" class="form-label">Username</label>
                         <input type="text" class="form-control <?php echo !empty($data['name_err']) ? 'is-invalid' : '' ?>" id="username"  name="name">
                         <span class="text-danger"><?php echo !empty($data['name_err']) ? $data['name_err'] : '' ?></span>
                    </div>
                    <div class="mb-3">
                         <label for="email" class="form-label">Email</label>
                         <input type="email" class="form-control <?php echo !empty($data['email_err']) ? 'is-invalid' : '' ?>" id="email"  name="email">
                         <span class="text-danger"><?php echo !empty($data['email_err']) ? $data['email_err'] : '' ?></span>
                    </div>
                    <div class="mb-3">
                         <label for="password" class="form-label">Password</label>
                         <input type="password" class="form-control <?php echo !empty($data['password_err']) ? 'is-invalid' : '' ?>" id="password"  name="password">
                         <span class="text-danger"><?php echo !empty($data['password_err']) ? $data['password_err'] : '' ?></span>
                    </div>
                    <div class="mb-3">
                         <label for="confirm_password" class="form-label">Comfirm Password</label>
                         <input type="password" class="form-control <?php echo !empty($data['confirm_password_err']) ? 'is-invalid' : '' ?>" id="confirm_password" name="confirm_password">
                         <span class="text-danger"><?php echo !empty($data['confirm_password_err']) ? $data['confirm_password_err'] : '' ?></span>
                    </div>
                    <div class=" ">
                       <a href="<?php echo  URLROOT . "user/login"?>">Already registered,Please login</a>
                           <div class="float-end">
                                <button class="btn btn-outline-secondary">Cancle</button>
                                <button class="btn btn-primary">Register</button>
                           </div>
                    </div>
                </form>
                <!-- Regiseter form start -->    
            </div>
        </div>
    </div>
</div>

<?php require_once APPROOT . "/views/inc/footer.php"; ?>