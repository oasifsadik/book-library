<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BookShop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    <section>
        <header>
            <nav class="navbar bg-body-tertiary">
                <div class="container">
                    <div class="logo">
                        <img src="{{ asset('web/img/logo.png') }}" height="50px" width="50px" alt="">
                    </div>
                    <div class="menu">
                        <ul class="d-flex">
                            <li class="list-unstyled p-3"><a class="text-decoration-none text-black" href="{{ url('/') }}">Home</a></li>
                            <li class="list-unstyled p-3"><a class="text-decoration-none text-black" href="">About</a></li>
                            <li class="list-unstyled p-3"><a class="text-decoration-none text-black" href="{{ url('login') }}">login</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
    </section>
        @yield('fcontent')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>
