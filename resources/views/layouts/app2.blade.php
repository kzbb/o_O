<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', '(o_O)!?') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
</head>
<body>
    <div id="app">

        <div class="container px-0">
            <div class="row px-0">
                <div class="col px-0">

                    <ul class="nav">
                        <li class="nav-item align-self-end">
                            <h1 class="mb-0 pb-0">
                                <a class="nav-link pb-0"
                                @if( Request::path() == "/" )
                                href="home"
                                @else
                                href="/"
                                @endif
                                >
                                    {{ config('app.name', '(o_O)!?') }}
                                </a>
                            </h1>
                        </li>
                        @auth
                        @if( isset($_GET["view"]) )
                        <li class="nav-item align-self-end active">
                            <a class="nav-link pb-0" href="home">
                                Home
                            </a>
                        </li>
                        @else
                        <li class="nav-item align-self-end">
                            <a class="nav-link pb-0" href="home?view=future">
                                Scheduled
                            </a>
                        </li>
                        @endif
                        @if( Request::path() == "settings" )
                        <li class="nav-item align-self-end">
                            <a class="nav-link pb-0" href="home">
                                Home
                            </a>
                        </li>
                        @else
                        <li class="nav-item align-self-end">
                            <a class="nav-link pb-0" href="settings">
                                Settings
                            </a>
                        </li>
                        @endif
                        <li class="nav-item align-self-end">
                            <a class="nav-link pb-0" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                        @endauth
                    </ul>

                </div>

                <div class="col align-self-end">
                    <div class="card border-0">
                        <div class="card-body px-3 pt-3">
                            <form class="form-horizontal" style="min-width: 8rem;" action="searchpost" method="POST">
                                {{ csrf_field() }}
                                <input class="form-control" name="keyword" placeholder="Search">
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        @yield('content')
    </div>
</body>
</html>
