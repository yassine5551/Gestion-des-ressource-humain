<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="robots" content="noindex, nofollow">
    <title>@yield("title")</title>
    <link rel="stylesheet" href="{{ URL::to('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::to('assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ URL::to('assets/css/line-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ URL::to('assets/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ URL::to('assets/css/style.css') }}">
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</head>
<body class="account-page error-page" body style="background-color: #f2f2f2;">
<style>
    .invalid-feedback{
        font-size: 14px;
    }

</style>
@yield('content')
<script  src="{{ URL::to('assets/js/jquery-3.5.1.min.js') }}"></script>
<script src="{{ URL::to('assets/js/popper.min.js') }}"></script>
<script src="{{ URL::to('assets/js/select2.min.js') }}"></script>
<script src="{{ URL::to('assets/js/app.js') }}"></script>
@yield('script')
</body>
</html>
