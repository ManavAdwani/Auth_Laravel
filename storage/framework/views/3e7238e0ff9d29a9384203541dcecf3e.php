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
    <br><br><br>
    <div class="container">
        <div class="mb-3">
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
            <h2>Upload Pdf</h2>
            <br>
            <br>
            <form action="<?php echo e(route('pdfUploading')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php echo method_field('POST'); ?>
                <label for="" class="form-label">Give name to your Pdf</label>
                <input type="text" name="tag" id="" class="form-control">
                <br>
                <label for="" class="form-label">Give description to your Pdf</label>
                <input type="text" name="desc" id="" class="form-control">
                <br>
                <label for="formFile" class="form-label">Upload pdf here</label>
                <input class="form-control" name="pdf" type="file" id="pdfs" onchange="previewpdfs(event)">
                <br>
                <button class="btn btn-primary" type="submit">Upload Pdf</button>


            </form>

            <embed id="output" width="800" height="500" style="visibility: hidden;">
            <br>

        </div>
    </div>

    <script>
        function previewpdfs() {
            var output = document.getElementById('output');
            var filename = document.getElementById('pdfs').value;
            // console.log(filename);
            var extdot = filename.lastIndexOf(".") + 1;
            var ext = filename.substr(extdot, filename.length);
            if (ext == "pdf") {
                document.getElementById('output').style.visibility = "visible";
                output.src = URL.createObjectURL(event.target.files[0]);

            } else {
                alert("Only Pdfs are allowed");
            }
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</body>

</html>
<?php /**PATH /home/dweekstudios/test-project/resources/views/pdfupload.blade.php ENDPATH**/ ?>