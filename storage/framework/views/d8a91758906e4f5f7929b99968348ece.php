<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Dweek Studios</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="<?php echo e(route('homepage')); ?>">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('UserFiles')); ?>">Image Files</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('pdf')); ?>">Upload Pdfs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="<?php echo e(route('showpdf')); ?>">Pdf Files</a>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <a class="nav-link" href="<?php echo e(route('logout')); ?>">Logout</a>
                </form>
            </div>
        </div>
    </nav>
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Your Name</th>
                    <th scope="col">Filename</th>
                    <th scope="col">File Path</th>
                    <th scope="col" colspan="2">View/Download</th>
                </tr>
            </thead>
            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tbody>
                    <th scope="row"><?php echo e($d->id); ?></th>
                    <td><?php echo e($d->name); ?></td>
                    <td><?php echo e($d->file_name); ?></td>
                    <td><?php echo e($d->file_path); ?></td>
                    <td><a href="<?php echo e(url('view', $d->id)); ?>">View</a></td>
                    <td><a href="<?php echo e(url('download', $d->file_name)); ?>">Download</a></td>
                </tbody>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</body>

</html>
<?php /**PATH /home/dweekstudios/test-project/resources/views/showPdf.blade.php ENDPATH**/ ?>