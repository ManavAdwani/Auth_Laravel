<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="Tag">
    <title>TAGS</title>
    <!-- Latest compiled and minified CSS -->

    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tokenfield/0.12.0/css/bootstrap-tokenfield.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tokenfield/0.12.0/bootstrap-tokenfield.js"></script>
</head>

<body>
    <br>
    <div class="container">
        <div class="row">
            {{-- <h2 align="center">Insert Bootstrap Tokenfield Tag Data using PHP Mysql and Jquery Ajax</h2> --}}
            <div class="col-md-6" style="margin: 0 auto; float:none;">
                <p id="success_message"></p>
                <form method="post" id="reg_form">
                    <div class="form-group">
                        <label>Enter Name</label>
                        <input type="text" name="name" id="name" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label>Enter your Skill</label>
                        <input type="text" name="skill" id="skill" class="form-control" />
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" id="submit" class="btn btn-info" value="Submit" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
<script>
    $(document).ready(function() {
        $('#skill').tokenfield({
            autocomplete: {
                source: [
                    <?php
                    foreach ($data as $d) {?> "<?php echo $d['name']; ?>",
                   <?php    
                    }
                    ?>
                ],
                delay: 100

            },

            showAutocompleteOnFocus: true
        })
    });
</script>

</html>
