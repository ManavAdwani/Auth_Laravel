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
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('addUser') }}">Add Users</a>
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
    <br>
    <br>
    <br>
    <center>
        <h1>Hello Admin</h1>
        <br>
        <a href="{{ route('addUser') }}"><button class="btn btn-danger">Add User</button></a>
        <a href="{{ route('showUser') }}">
            <button class="btn btn-primary">See Users</button></a>
        <a href="{{ route('showData') }}"><button class="btn btn-warning">See All Files</button></a>
        <a href="{{ route('logout') }}"><button class="btn btn-danger">Logout</button></a>
    </center>








    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</body>

</html>
