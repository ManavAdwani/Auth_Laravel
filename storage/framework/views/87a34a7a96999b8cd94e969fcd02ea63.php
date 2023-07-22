<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="<?php echo e(asset('Css/userfile.css')); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>
    <nav class="main-nav">
        <ul>
            <a class="logo" href="<?php echo e(route('homepage')); ?>">
                <img src="<?php echo e(asset('Css/Google__G__Logo.svg.webp')); ?>" alt="">
                <span class="nav-items">Dweek Studios</span>
            </a>

            <li>
                <a href="<?php echo e(route('homepage')); ?>">
                    <i class="fas fa-home"></i>
                    <span class="nav-items">Home</span>
                </a>
            </li>
            <li>
                <a href="<?php echo e(route('imgupload')); ?>">
                    <i class="fas fa-upload"></i>
                    <span class="nav-items">Upload Images</span>
                </a>
            </li>

            <li>
                <a href="<?php echo e(route('UserFiles')); ?>">
                    <i class="fas fa-image"></i>
                    <span class="nav-items">Image Files</span>
                </a>
            </li>
            
            <li>
                <a href="<?php echo e(route('zipupload')); ?>">
                    <i class="fas fa-file-archive"></i>
                    <span class="nav-items">Upload Zip files</span>
                </a>
            </li>
            <li>
                <a href="<?php echo e(route('showZip')); ?>">
                    <i class="fas fa-box"></i>
                    <span class="nav-items">Zip files</span>
                </a>
            </li>
            <li>
                <a class="logout" href="<?php echo e(route('logout')); ?>">
                    <i class="fas fa-sign-out"></i>
                    <span class="nav-items">Logout</span>
                </a>
            </li>
        </ul>
    </nav>
    <br><br><br><br>
    <center>
        <h2>Edit File</h2>
    </center>
    <div class="container">
        <form action="<?php echo e(url('editing/' . $id)); ?>" method="post" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <?php echo method_field('POST'); ?>
            <?php if($message = Session::get('status')): ?>
                <div class="alert alert-success">
                    <strong><?php echo e($message); ?></strong>
                </div>
            <?php endif; ?>
            <?php if(count($errors) > 0): ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>
            <label for="" class="form-label">Upload File</label>
            <input type="file" class="form-control" name="file" id="">
            <br>
            <button class="btn btn-primary" type="submit">Upload</button>
        </form>
        
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</body>

</html>
<?php /**PATH /home/dweekstudios/test-project/resources/views/image_edit.blade.php ENDPATH**/ ?>