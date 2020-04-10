<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
    <link rel="shortcut icon" href="/img/CU favicon.png" type="image/x-icon">
    <title>Celbridge updates</title>
</head>
<body>
<div class="content-wrapper brand-background">

    <div class="bg-castletown"></div>
    <div class="content ">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <a class="navbar-brand" href="/">Celbridge updates</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Home</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="/submit">Submit an Update</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="/posts">Business Supports</a>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="container-sm pb-3">
            @if(Session::has('message'))
                <div class="alert alert-success">
                    {{ Session::get('message')}}
                </div>
            @endif
            @yield('content')
        </div>
    </div>
    <footer id="sticky-footer" class="py-4 bg-dark text-white-50">
        <div class="container text-center">
            <small>Idea & Design by Ross McCarthy (<a href="https://status-naas.com">status-naas.com</a>). Developed by CiviQ. Contact info@civiq.eu | 086 1408681</small>
        </div>
    </footer>
</div>

<script type="text/javascript" src="{{ mix('/js/app.js') }}"></script>
<script type="text/javascript"
        src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/xcash/bootstrap-autocomplete@master/dist/latest/bootstrap-autocomplete.min.js"></script>

</body>
</html>
