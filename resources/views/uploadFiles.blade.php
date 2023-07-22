<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('Css/navbar.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('Css/tags.css') }}"> --}}
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
    <nav class="main-nav">
        <ul>
            <a class="logo" href="{{ route('homepage') }}">
                <img src="{{ asset('Css/Google__G__Logo.svg.webp') }}" alt="">
                <span class="nav-items">Dweek Studios</span>
            </a>

            <li>
                <a class="navA" href="{{ route('homepage') }}">
                    <i class="fas fa-home"></i>
                    <span class="nav-items">Home</span>
                </a>
            </li>
            <li>
                <a class="navA" href="{{ route('tag') }}">
                    <i class="fas fa-upload"></i>
                    <span class="nav-items">Upload Files</span>
                </a>
            </li>

            <li>
                <a class="navA" href="{{ route('UserFiles') }}">
                    <i class="fas fa-image"></i>
                    <span class="nav-items">Files</span>
                </a>
            </li>
            {{-- <li>
                <a href="{{ route('pdf') }}">
                    <i class="fas fa-file-pdf"></i>
                    <span class="nav-items">Upload Pdfs</span>
                </a>
            </li>

            <li>
                <a href="{{ route('showpdf') }}">
                    <i class="fas fa-file"></i>
                    <span class="nav-items">Pdf files</span>
                </a>
            </li> --}}
            {{-- <li>
                <a href="{{ route('zipupload') }}">
                    <i class="fas fa-file-archive"></i>
                    <span class="nav-items">Upload Zip files</span>
                </a>
            </li>
            <li>
                <a href="{{ route('showZip') }}">
                    <i class="fas fa-box"></i>
                    <span class="nav-items">Zip files</span>
                </a>
            </li> --}}

            <li>
                <a class="logout" href="{{ route('logout') }}">
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
    <div class="containers">


        <div class="container">
            <form action="{{ route('file-Upload') }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('POST')
                @if ($message = Session::get('status'))
                    <div class="alert alert-success">
                        <strong>{{ $message }}</strong>
                    </div>
                @endif
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <label for="" class="form-label">Name</label>
                <input type="text" name="name" id="" class="form-control">
                <br>
                {{-- <label for="">Tag</label>
                <input class="tags-input"></input> --}}
                <label for="" class="form-label">Upload Screenshot</label>
                <input type="file" class="form-control" name="ss" id="ss">
                <br>
                <label for="" class="form-label">Tag</label>
                <br>
                <input type="text" name="tag" id="tag" class="form-control" />

                <br><br>
                <label for="" class="form-label">File Description</label><input type="text" name="desc"
                    class="form-control" placeholder="Enter Description">
                <br>
                {{-- <br> --}}

                <label for="" class="form-label">Upload File</label>
                <input type="file" class="form-control" name="file[]" id="file" onchange="previewImage(event)" multiple="multiple">
                <br>
                <label for="" class="form-label">File Type</label>
                <input type="text" id="type" name="type" class="form-control"
                    placeholder="No need to write here anyting (It will update Automatically)" readonly>
                <br>
                <button class="btn btn-primary" type="submit">Upload</button>
               
            </form>
           

            {{-- <a href="{{ asset('storage/app/public/' . session('link')) }}">
        <buuton>{{ session('link') }}</buuton>
    </a>

    <div class="col-sm-4">
        <img class="img-thumbnail first" src="{{ asset('storage/images/' . $images->name) }}" alt="">
    </div> --}}
        </div>
    </div>

    <script>
        function previewImage() {
            var output = document.getElementById('output');
            var filename = document.getElementById('file').value;
            var op = document.getElementById('op');
            var type = document.getElementById('type');
            // console.log(filename);
            var extdot = filename.lastIndexOf(".") + 1;
            var ext = filename.substr(extdot, filename.length).toLowerCase();
            console.log(ext);
            type.value = ext;
        }
    </script>
    <script>
         $(document).ready(function() {
        $('#tag').tokenfield({
            autocomplete: {
                source: [
                    <?php
                    foreach ($data as $d) {?> "<?php echo $d['tags']; ?>",
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</body>

</html>
