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
                <a href="<?php echo e(route('pdf')); ?>">
                    <i class="fas fa-file-pdf"></i>
                    <span class="nav-items">Upload Pdfs</span>
                </a>
            </li>

            <li>
                <a href="<?php echo e(route('showpdf')); ?>">
                    <i class="fas fa-file"></i>
                    <span class="nav-items">Pdf files</span>
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
    <br><br><br><br><br>
    <div class="containers">
        <div class="container">


            <div class="table-responsive ">
                <h2 class="text-center">Uploaded Pdfs</h2>
                <br>
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Your Name</th>
                            <th>Tag</th>
                            <th>Description</th>
                            <th>File Name</th>
                            <th colspan="2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td scope="row"><?php echo e($d->id); ?></td>
                                <td><?php echo e($d->name); ?></td>
                                <td><?php echo e($d->file_tag); ?></td>
                                <td><?php echo e($d->file_desc); ?></td>
                                <td><?php echo e($d->file_name); ?></td>
                                <td><a class="btn btn-primary" style="width:60px" href="<?php echo e(url('view', $d->id)); ?>">
                                        View
                                </td></a>
                                <td><a class="btn btn-warning" style="width:100px"
                                        href="<?php echo e(url('download', $d->id)); ?>">
                                        Download</td></a>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</body>

</html>
<?php /**PATH /home/dweekstudios/test-project/resources/views/showPdf.blade.php ENDPATH**/ ?>