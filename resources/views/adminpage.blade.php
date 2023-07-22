<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="{{ asset('Css/navbar.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>
    <nav class="main-nav">
        <ul>
            <a class="logo" href="{{ route('admin') }}">
                <img src="{{ asset('Css/Google__G__Logo.svg.webp') }}" alt="">
                <span class="nav-items">Dweek Studios</span>
            </a>

            <li>
                <a href="{{ route('admin') }}">
                    <i class="fas fa-home"></i>
                    <span class="nav-items">Home</span>
                </a>
            </li>
            <li>
                <a href="{{ route('addUser') }}">
                    <i class="fas fa-add"></i>
                    <span class="nav-items">Add User</span>
                </a>
            </li>

            <li>
                <a href="{{ route('showUser') }}">
                    <i class="fas fa-list"></i>
                    <span class="nav-items">Users List</span>
                </a>
            </li>
            <li>
                <a href="{{ route('showData') }}">
                    <i class="fas fa-file"></i>
                    <span class="nav-items">User Uploaded Files</span>
                </a>
            </li>

            {{-- <li>
                <a href="{{ route('allPdfs') }}">
                    <i class="fas fa-file-pdf"></i>
                    <span class="nav-items">User Uploaded Pdf</span>
                </a>
            </li> --}}
            <li>
                <a class="logout" href="logout">
                    <i class="fas fa-sign-out"></i>
                    <span class="nav-items">Logout</span>
                </a>
            </li>
        </ul>
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
