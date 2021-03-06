<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'SB CRM') }}</title>

    <!-- Bootstrap -->
    <link href="/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="/vendors/iCheck/skins/flat/green.css" rel="stylesheet">

    <!-- bootstrap-progressbar -->
    <link href="/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <link href="/vendors/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet"/><script src=""></script>
    <link href="/css/select2.min.css" rel="stylesheet"/>

    <!-- bootstrap-daterangepicker -->
    {{--<link href="/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">--}}

    <!-- Custom Theme Style -->
    <link href="/css/custom.css" rel="stylesheet">


    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>

    <script>
        $.fn.datepicker.defaults.format = "yyyy/mm/dd";
        $('.datepicker').datepicker({
            language: 'lt'
        });
    </script>




</head>