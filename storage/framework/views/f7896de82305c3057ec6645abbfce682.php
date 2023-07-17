<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <?php echo e($data->name); ?>

    <?php echo e($data->file_path); ?>


    <iframe src="/assets<?php echo e(public_path($data->file_name)); ?>" frameborder="0"></iframe>
</body>

</html>
<?php /**PATH /home/dweekstudios/test-project/resources/views/viewpdfs.blade.php ENDPATH**/ ?>