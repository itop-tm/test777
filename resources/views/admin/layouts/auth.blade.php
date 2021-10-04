
<!DOCTYPE html>
<html lang="en"> 
<head>
    <title>TP - Admin portal</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <meta name="description" content="TP - Admin portal">
    <meta name="author" content="Hojaev MT">
    <link rel="shortcut icon" href="favicon.ico"> 
    
    <script defer src="{{ asset('a-portal/plugins/fontawesome/js/all.min.js') }}"></script>
    <link defer rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link id="theme-style" rel="stylesheet" href="{{ asset('a-portal/css/portal.css') }}">

    @yield('css')
    @stack('css')
    @stack('head')

</head> 

<body class="app app-login p-0">   

    @yield('content')
				
    <script src="{{ asset('a-portal/plugins/popper.min.js') }}"></script>
    <script src="{{ asset('a-portal/plugins/bootstrap/js/bootstrap.min.js') }}"></script>  

    <script src="{{ asset('a-portal/js/app.js') }}"></script> 

    @yield('script')
    @stack('js')

</body>
</html> 