<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', '(o_O)!?') }}</title>

        <!-- Styles -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

    </head>
    <body>
        <div class="container">
            <div class="row align-items-center" style="height: 100vh;">
                <div class="col-lg-6 mx-auto">
                    <div class="card border-0">
                        <div class="card-body px-3 py-3">
                            <h1 class="card-title">
                                <a class="nav-link px-0 py-0" href="/">
                                    {{ config('app.name', '(o_O)!?') }}
                                </a>
                            </h1>
                            <p class="card-text">
                                a blog skeleton<br>
                                laravel5.5 | bootstrap4.0 |
                                <a href="https://github.com/kzbb/o_O">source code(GitHub)</a>
                            </p>
                        </div>
                    </div>
                    @yield('content')
                </div>
            </div>
        </div>
    </body>
</html>
