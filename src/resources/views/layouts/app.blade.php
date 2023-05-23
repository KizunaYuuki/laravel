<html>
<head>
    <title>App Name - @yield('title', 'Default')</title>
</head>
<body>@stack('scripts')
@section('sidebar')
    This is the master sidebar.
@show

<div class="container">
    @yield('content', 'Default content')
</div>



</body>
</html>