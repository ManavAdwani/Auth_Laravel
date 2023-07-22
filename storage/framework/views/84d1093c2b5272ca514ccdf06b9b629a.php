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
                <a href="<?php echo e(route('tag')); ?>">
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
                <a class="logout" href="<?php echo e(route('logout')); ?>">
                    <i class="fas fa-sign-out"></i>
                    <span class="nav-items">Logout</span>
                </a>
            </li>
        </ul>
    </nav>

    <div class="container mt-5">

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
                <?php echo e($message); ?>

            </div>
        <?php endif; ?>
        <?php if($message = Session::get('failed')): ?>
            <div class="alert alert-danger">
                <?php echo e($message); ?>

            </div>
        <?php endif; ?>
        <h2 class="text-center">File Upload Data</h2>
        <div class="containers">
            
                <form action="<?php echo e(route('tag')); ?>">
                    <input type="submit" value="Add File" class="btn btn-warning" style="float:right;">
                </form>
                <br><br>
                <table >
                    <thead>
                        <tr >
                            <th>#</th>
                            <th>Your Name</th>
                            <th>Screenshot</th>
                            <th >File Name</th>
                            <th>Type</th>
                            <th>File Tag</th>
                            
                            <th>Uploaded At</th>
                            <th colspan="3">Operations</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($d->id); ?></td>
                                <td><?php echo e($d->name); ?></td>
                                <td>
                                    <?php if($d->screenshot): ?>
                                    <img src="<?php echo e(asset('screenshot/'.$d->screenshot)); ?>" alt="" width="150px" height="100px">
                                    <?php else: ?>
                                    <span>No image found!</span>
                                    <?php endif; ?>
                                
                                </td>
                                <td>
                                    <?php echo e($d->file_name); ?>

                                </td>
                                <td>
                                    <?php echo e($d->file_type); ?>

                                </td>
                                <td>
                                    <?php echo e($d->file_tag); ?>

                                </td>
                                
                                
                                <td><?php echo e($d->created_at); ?></td>
                                
                                
                                    <td><a class="btn btn-success" style="width:60px"
                                        href="<?php echo e(url('editFile/' . $d->id)); ?>">Edit</a></td>
                                        <td><a class="btn btn-primary" style="width:100px"
                                                href="<?php echo e(url('fileDownload/' . $d->file_name)); ?>">Download</td></a>
                                <td><a class="btn btn-warning"
                                        style="width:100px"href="<?php echo e(url('deletefile/' . $d->id)); ?>">Delete</td></a>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </tbody>
                </table>
            </div>
        </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</body>

</html>
<?php /**PATH /home/dweekstudios/test-project/resources/views/userFiles.blade.php ENDPATH**/ ?>