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
    <div class="container">
        <center>
            <h1>Dweek Studios</h1>
        </center>
        <br><br><br>
        <div class="alert alert-primary" role="alert">
            Enter New Password....
        </div>

        <form action="<?php echo e(route('passUpdate')); ?>" method="POST">
            <?php if($message = Session::get('status')): ?>
                <div class="alert alert-danger">
                    <?php echo e($message); ?>

                </div>
            <?php endif; ?>
            <?php echo csrf_field(); ?>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Password</label>
                <input type="text" name="pass" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp" placeholder="Enter Your New Password">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Confirm Password</label>
                <input type="text" name="cpass" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp" placeholder="Confirm Password">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</body>

</html>
<?php /**PATH /home/dweekstudios/test-project/resources/views/newPass.blade.php ENDPATH**/ ?>