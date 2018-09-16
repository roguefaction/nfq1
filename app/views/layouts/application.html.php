<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <title>Kirpykla</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">    <link rel = "stylesheet" type = "text/css" href = "{{ URL::asset('css/home.css') }}" />

</head>
<body>

<nav class="navbar navbar-expand navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand">Kirpykla</a>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/">Pagrindinis</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/orders">Užsakymai</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

    {PAGE_CONTENT}

</body>
</html>