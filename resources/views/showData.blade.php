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
                <a class="logout" href="{{ route('logout') }}">
                    <i class="fas fa-sign-out"></i>
                    <span class="nav-items">Logout</span>
                </a>
            </li>
        </ul>
    </nav>
    <br>
    <br>
    <div class="container mt-5">


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
    </div>
    <div class="containers">
        <div class="container">
            <form action="{{ route('adminUpload') }}">
                <input type="submit" value="Add File" class="btn btn-warning" style="float:right;">
            </form>
            <h2 class="text-center">File Upload Data</h2>
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Your Name</th>
                        <th>File Name</th>
                        <th>File Type</th>
                        <th>File Tag</th>
                        <th>File Description</th>
                        {{-- <th scope="col">File Path</th> --}}

                        <th colspan="2">Operations</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $d)
                        <tr>
                            <td scope="row">{{ $d->id }}</td>
                            <td>{{ $d->name }}</td>
                            <td>
                                {{ $d->file_name }}
                            </td>
                            <td>
                                {{ $d->file_type }}
                            </td>
                            <td>{{ $d->file_tag }}</td>
                            <td>{{ $d->file_desc }}</td>
                            <td><a class="btn btn-danger" style="width: 100px"
                                    href="{{ url('fileDownload/' . $d->file_name) }}">Download</a></td>
                            <td><a class="btn btn-warning" style="width: 100px"
                                    href="{{ url('deleteFiles/' . $d->id) }}">Delete</a></td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</body>

</html>
