<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Test Project</title>
    <link rel="stylesheet" href="<?php echo e(asset('Css/navbar.css')); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>
    <nav class="main-nav">
        <ul>
            <a class="logo" href="<?php echo e(route('admin')); ?>">
                <img src="<?php echo e(asset('Css/Google__G__Logo.svg.webp')); ?>" alt="">
                <span class="nav-items">Dweek Studios</span>
            </a>

            <li>
                <a href="<?php echo e(route('admin')); ?>">
                    <i class="fas fa-home"></i>
                    <span class="nav-items">Home</span>
                </a>
            </li>
            <li>
                <a href="<?php echo e(route('addUser')); ?>">
                    <i class="fas fa-add"></i>
                    <span class="nav-items">Add User</span>
                </a>
            </li>

            <li>
                <a href="<?php echo e(route('showUser')); ?>">
                    <i class="fas fa-list"></i>
                    <span class="nav-items">Users List</span>
                </a>
            </li>
            <li>
                <a href="<?php echo e(route('showData')); ?>">
                    <i class="fas fa-file"></i>
                    <span class="nav-items">User Uploaded Files</span>
                </a>
            </li>

            
            <li>
                <a class="logout" href="logout">
                    <i class="fas fa-sign-out"></i>
                    <span class="nav-items">Logout</span>
                </a>
            </li>
        </ul>
    </nav>
    <section class="vh-100" style="background-color: #eee;">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-12 col-xl-11">
                    <div class="card text-black" style="border-radius: 25px;">
                        <div class="card-body p-md-5">
                            <div class="row justify-content-center">
                                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Add User</p>
                                    <?php if(count($errors) > 0): ?>
                                        <div class="alert alert-danger">
                                            <ul>
                                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <li><?php echo e($error); ?></li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </ul>
                                        </div>
                                    <?php endif; ?>
                                    <?php if($message = Session::get('status')): ?>
                                        <div class="alert alert-success">
                                            <?php echo e($message); ?> <a href="<?php echo e(route('login')); ?>"><strong>Please
                                                    Login</strong></a>
                                        </div>
                                    <?php endif; ?>
                                    <?php if($message = Session::get('failed')): ?>
                                        <div class="alert alert-danger">
                                            <?php echo e($message); ?>

                                        </div>
                                    <?php endif; ?>
                                    <form class="mx-1 mx-md-4" action="<?php echo e(route('addingUser')); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('POST'); ?>
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">

                                                <input type="text" id="form3Example1c" name="name"
                                                    class="form-control" placeholder="User Name" />
                                            </div>
                                        </div>



                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">

                                                <input type="email" id="form3Example3c" name="email"
                                                    class="form-control" placeholder="User Email" />
                                            </div>
                                        </div>
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-tasks fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">

                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="role"
                                                        id="flexRadioDefault1" value="1">
                                                    <label class="form-check-label" for="flexRadioDefault1">
                                                        Admin
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="role"
                                                        id="flexRadioDefault2" value="0" checked>
                                                    <label class="form-check-label" for="flexRadioDefault2">
                                                        User
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">

                                                <input type="password" id="form3Example4c" name="pass"
                                                    class="form-control" placeholder="Password" />
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">

                                                <input type="password" id="form3Example4cd" name="cpass"
                                                    class="form-control" placeholder="confirm password" />

                                            </div>
                                        </div>



                                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                            <a href="<?php echo e(route('Email')); ?>">
                                                <button type="submit"
                                                    class="btn btn-primary btn-lg">Register</button>
                                            </a>
                                            <br>

                                        </div>


                                </div>
                                <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/draw1.webp"
                                        class="img-fluid" alt="Sample image">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</body>

</html>
<?php /**PATH /home/dweekstudios/test-project/resources/views/addUser.blade.php ENDPATH**/ ?>