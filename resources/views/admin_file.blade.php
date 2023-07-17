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
                        <a class="nav-link " aria-current="page" href="{{ route('admin') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('addUser') }}">Add Users</a>
                    </li>

                    {{-- <li class="nav-item">
                        <a class="nav-link" href="{{ route('addUser') }}">Upload File</a>
                    </li> --}}

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('showUser') }}">Users List</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('showData') }}">User Uploaded Files</a>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <a class="nav-link" href="{{ route('logout') }}">Logout</a>
                </form>
            </div>
        </div>
    </nav>
    <center>
        <h2>Upload File</h2>
    </center>
    <div class="container">
        <form action="{{ route('image-Upload') }}" method="post" enctype="multipart/form-data">
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
            <label for="" class="form-label">Upload File</label>
            <input type="file" class="form-control" name="file" id="">
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



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</body>

</html>
