<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Test Project</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <!-- Container wrapper -->
            <div class="container">
                <!-- Navbar brand -->
                <a class="navbar-brand me-2" href="https://mdbgo.com/">
                    <img src="https://mdbcdn.b-cdn.net/img/logo/mdb-transaprent-noshadows.webp" height="16"
                        alt="MDB Logo" loading="lazy" style="margin-top: -1px;" />
                </a>

                <!-- Toggle button -->
                <button class="navbar-toggler" type="button" data-mdb-toggle="collapse"
                    data-mdb-target="#navbarButtonsExample" aria-controls="navbarButtonsExample" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>

                <!-- Collapsible wrapper -->
                <div class="collapse navbar-collapse" id="navbarButtonsExample">
                    <!-- Left links -->
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="#">DweekStudios</a>
                        </li>
                    </ul>
                    <!-- Left links -->

                    <div class="d-flex align-items-center">
                        <a href="<?php echo e(route('signup')); ?>">
                            <button type="button" class="btn btn-primary me-3">
                                Sign up for free
                            </button>
                        </a>
                    </div>
                </div>
                <!-- Collapsible wrapper -->
            </div>
            <!-- Container wrapper -->
        </nav>
        <!-- Navbar -->
    </div>


    <section class="vh-100">
        <div class="container py-5 h-100">
            <div class="row d-flex align-items-center justify-content-center h-100">
                <div class="col-md-8 col-lg-7 col-xl-6">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.svg"
                        class="img-fluid" alt="Phone image">
                </div>
                <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
                    <div class="">
                        <?php if(!$errors): ?>
                            <ul>
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        <?php endif; ?>

                    </div>
                    <form action="<?php echo e(route('logingin')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('POST'); ?>
                        <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Login</p>

                        <?php if($message = Session::get('failed')): ?>
                            <div class="alert alert-danger">
                                <?php echo e($message); ?>

                            </div>
                        <?php endif; ?>
                        <?php if($message = Session::get('status')): ?>
                            <div class="alert alert-success">
                                <?php echo e($message); ?>

                            </div>
                        <?php endif; ?>
                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="form1Example13">Email address</label>
                            <input type="email" name="email" id="form1Example13"
                                class="form-control form-control-lg" />
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="form1Example23">Password</label>
                            <input type="password" name="pass" id="form1Example23"
                                class="form-control form-control-lg" />
                        </div>

                        <div class="d-flex justify-content-around align-items-center mb-4">
                            <!-- Checkbox -->
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="form1Example3"
                                    checked />
                                <label class="form-check-label" for="form1Example3"> Remember me </label>
                            </div>
                            <a href="<?php echo e(route('forget')); ?>">Forgot password?</a>
                        </div>

                        <!-- Submit button -->
                        <button type="submit" class="btn btn-primary btn-lg btn-block">Login</button>
                        <br>
                        <br>
                        <a href="<?php echo e(route('signup')); ?>">New user? Sign up</a>

                    </form>
                </div>
            </div>
        </div>
    </section>








    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</body>

</html>
<?php /**PATH /home/dweekstudios/test-project/resources/views/welcome.blade.php ENDPATH**/ ?>