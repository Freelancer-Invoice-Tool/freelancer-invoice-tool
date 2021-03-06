<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <!-- google font -->
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,400italic,700' rel='stylesheet' type='text/css'>

    <!-- Compiled and minified materialize CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css">

    <!-- materialize icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- our css -->
    <link rel="stylesheet" type="text/css" href="/css/master.css">
          
</head>

<body>
    <header>
        <nav>
            <div class="nav-wrapper">
                <a href="{{{action('HomeController@showDashboard')}}}" class="brand-logo"><img class="compLogo responsive-img" src="/../../img/compLogo.png"></a>
            </div>
        </nav>
    </header>

    @yield('content')

    <footer>
        <div class="row">
            <div class="col s10">
                <p>&#169; 2016</p>
            </div>
        </div>
    </footer>

<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>

<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js"></script>

<!-- our JS -->
<script src="/js/home.js"></script>

<!-- Yields Page-Specific JS or jQuery -->
@yield('bottom-script')
</body>
</html>