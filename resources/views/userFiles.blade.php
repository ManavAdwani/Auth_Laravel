<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    {{-- <link rel="stylesheet" href="{{ asset('Css/navbar.css') }}""> --}}
    <link rel="stylesheet" href="{{ asset('Css/userfile.css') }}">
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
                <a href="{{ route('homepage') }}">
                    <i class="fas fa-home"></i>
                    <span class="nav-items">Home</span>
                </a>
            </li>
            <li>
                <a href="{{ route('tag') }}">
                    <i class="fas fa-upload"></i>
                    <span class="nav-items">Upload Images</span>
                </a>
            </li>

            <li>
                <a href="{{ route('UserFiles') }}">
                    <i class="fas fa-image"></i>
                    <span class="nav-items">Image Files</span>
                </a>
            </li>
            {{-- <li>
                <a href="{{ route('pdf') }}">
                    <i class="fas fa-file-pdf"></i>
                    <span class="nav-items">Upload Pdfs</span>
                </a>
            </li> --}}

            {{-- <li>
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

    <div class="container mt-5">

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if ($message = Session::get('status'))
            <div class="alert alert-success">
                {{ $message }}
            </div>
        @endif
        @if ($message = Session::get('failed'))
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @endif
        <h2 class="text-center">File Upload Data</h2>
        <div class="containers">
            {{-- <div class="container"> --}}
                <form action="{{ route('tag') }}">
                    <input type="submit" value="Add File" class="btn btn-warning" style="float:right;">
                </form>
                <br><br>
                <table >
                    <thead>
                        <tr >
                            <th>#</th>
                            <th>Your Name</th>
                            <th>Screenshot</th>
                            <th >File Name</th>
                            <th>Type</th>
                            <th>File Tag</th>
                            {{-- <th scope="col">File Path</th> --}}
                            <th>Uploaded At</th>
                            <th colspan="3">Operations</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $d)
                            <tr>
                                <td>{{ $d->id }}</td>
                                <td>{{ $d->name }}</td>
                                <td>
                                    @if ($d->screenshot)
                                    <img src="{{asset('screenshot/'.$d->screenshot)}}" alt="" width="150px" height="100px">
                                    @else
                                    <span>No image found!</span>
                                    @endif
                                
                                </td>
                                <td>
                                    {{ $d->file_name }}
                                </td>
                                <td>
                                    {{ $d->file_type }}
                                </td>
                                <td>
                                    {{ $d->file_tag }}
                                </td>
                                
                                {{-- <td>{{ $d->file_path }}</td> --}}
                                <td>{{ $d->created_at }}</td>
                                
                                {{-- <td><a class="btn btn-danger" style="width:60px"
                                    href="{{url('checkSS') }}">View</a></td> --}}
                                    <td><a class="btn btn-success" style="width:60px"
                                        href="{{ url('editFile/' . $d->id) }}">Edit</a></td>
                                        <td><a class="btn btn-primary" style="width:100px"
                                                href="{{ url('fileDownload/' . $d->file_name) }}">Download</td></a>
                                <td><a class="btn btn-warning"
                                        style="width:100px"href="{{ url('deletefile/' . $d->id) }}">Delete</td></a>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    {{-- </div> --}}

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</body>

</html>
