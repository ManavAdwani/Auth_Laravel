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
                <a href="<?php echo e(route('allPdfs')); ?>">
                    <i class="fas fa-file-pdf"></i>
                    <span class="nav-items">User Uploaded Pdf</span>
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
    <br><br><br><br><br>
    <center>
        <h2>Upload File</h2>
    </center>
    <div class="container">
        <form action="<?php echo e(route('image-Upload')); ?>" method="post" enctype="multipart/form-data">
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
            <label for="" class="form-label">Give name to your image</label>
            <input type="text" name="tag" id="" class="form-control">
            <br>
            <label for="" class="form-label">Give description to your image</label>
            <input type="text" name="desc" id="" class="form-control">
            <br>
            <label for="" class="form-label">Upload File</label>
            <input type="file" class="form-control" name="file" id="file" onchange="previewImage(event)">
            <br>
            <button class="btn btn-primary" type="submit">Upload</button>
        </form>
        <img id="output" width="500px" class="img-thumbnail" height="500px" style="visibility: hidden">
        
    </div>


    <script>
        function previewImage() {
            var output = document.getElementById('output');
            var filename = document.getElementById('file').value;
            // console.log(filename);
            var extdot = filename.lastIndexOf(".") + 1;
            var ext = filename.substr(extdot, filename.length).toLowerCase();
            console.log(ext);
            if (ext == "jpg" || ext == "png" || ext == "jpeg") {
                document.getElementById('output').style.visibility = "visible";
                output.src = URL.createObjectURL(event.target.files[0]);
            } else {
                alert("Only jpg or png images are allowed");
            }
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</body>

</html>
<?php /**PATH /home/dweekstudios/test-project/resources/views/admin_file.blade.php ENDPATH**/ ?>