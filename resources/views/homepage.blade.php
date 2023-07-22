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
    <br>
    <br>
    <br>
    <center>
        <h1>Hello {{ Session::get('name') }}</h1>
        <br>
        <h5>Welcome to the DweekStudios Website</h5>
        <br>
    </center>








    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</body>

</html>
