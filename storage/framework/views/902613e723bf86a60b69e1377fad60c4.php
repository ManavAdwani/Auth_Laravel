<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
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
                <a class="logout" href="<?php echo e(route('logout')); ?>">
                    <i class="fas fa-sign-out"></i>
                    <span class="nav-items">Logout</span>
                </a>
            </li>
        </ul>
    </nav>
    <br>
    <br>
    <div class="container mt-5">


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
    </div>
    <div class="containers">
        <div class="container">
            <form action="<?php echo e(route('adminUpload')); ?>">
                <input type="submit" value="Add File" class="btn btn-warning" style="float:right;">
            </form>
            <h2 class="text-center">File Upload Data</h2>
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Your Name</th>
                        <th>File Name</th>
                        <th>File Type</th>
                        <th>File Tag</th>
                        <th>File Description</th>
                        

                        <th colspan="2">Operations</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td scope="row"><?php echo e($d->id); ?></td>
                            <td><?php echo e($d->name); ?></td>
                            <td>
                                <?php echo e($d->file_name); ?>

                            </td>
                            <td>
                                <?php echo e($d->file_type); ?>

                            </td>
                            <td><?php echo e($d->file_tag); ?></td>
                            <td><?php echo e($d->file_desc); ?></td>
                            <td><a class="btn btn-danger" style="width: 100px"
                                    href="<?php echo e(url('fileDownload/' . $d->file_name)); ?>">Download</a></td>
                            <td><a class="btn btn-warning" style="width: 100px"
                                    href="<?php echo e(url('deleteFiles/' . $d->id)); ?>">Delete</a></td>
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
<?php /**PATH /home/dweekstudios/test-project/resources/views/showData.blade.php ENDPATH**/ ?>