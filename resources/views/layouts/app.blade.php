@include ('includes.header')

<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <!-- sidebar -->
        @include ('includes.sidebar')
        <!-- /sidebar -->

        <!-- top navigation -->
        @include ('includes.topnav')
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
        @yield ('content')
        </div>
        <!-- /page content -->

        <!-- footer content -->
        @include ('includes.footer')
        <!-- /footer content -->
    </div>
</div>

@include ('includes.foot')

</body>
</html>
