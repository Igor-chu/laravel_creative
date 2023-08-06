<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

{{--    <link rel="stylesheet" href="{{asset('css/app.css')}}">--}}

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">


    <title>Document</title>
</head>
<body>

    <div class="container">

        <div class="row">

            <nav class="navbar navbar-expand-lg bg-body-tertiary">

                <div class="container-fluid">

                    <div class="collapse navbar-collapse" id="navbarNavDropdown">

                        <ul class="navbar-nav">

                            <li class="nav-item">

                                <a class="nav-link" aria-current="page" href="">Main</a>

                            </li>

                            <li class="nav-item">

                                <a class="nav-link" href="{{route('post.index')}}">Posts</a>

                            </li>

                            <li class="nav-item">

                                <a class="nav-link" href="{{route('about.index')}}">About</a>

                            </li>

                            <li class="nav-item">

                                <a class="nav-link" href="{{route('contact.index')}}">Contacts</a>

                            </li>

                        </ul>

                    </div>

                </div>

            </nav>

        </div>

        @yield('content')

    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

</body>
</html>


