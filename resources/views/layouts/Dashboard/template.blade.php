<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Diamante Web</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @include('layouts.Dashboard.css')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    @include('layouts.Dashboard.navbar')
    @include('layouts.Dashboard.sidebar')
    <div class="content-wrapper">
        @yield('content')
    </div>
</div>
@include('layouts.Dashboard.script')
</body>
</html>
