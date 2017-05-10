{{--<script src="{{ asset('js/app.js') }}"></script>--}}
<!-- jQuery -->
<script src="/vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="/vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="/vendors/nprogress/nprogress.js"></script>
<!-- Chart.js -->
<script src="/vendors/Chart.js/dist/Chart.min.js"></script>
<!-- gauge.js -->
<script src="/vendors/gauge.js/dist/gauge.min.js"></script>
<!-- bootstrap-progressbar -->
<script src="/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
<!-- iCheck -->
<script src="/vendors/iCheck/icheck.min.js"></script>
<!-- Skycons -->
<script src="/vendors/skycons/skycons.js"></script>
<!-- Flot -->
<script src="/vendors/Flot/jquery.flot.js"></script>
<script src="/vendors/Flot/jquery.flot.pie.js"></script>
<script src="/vendors/Flot/jquery.flot.time.js"></script>
<script src="/vendors/Flot/jquery.flot.stack.js"></script>
<script src="/vendors/Flot/jquery.flot.resize.js"></script>
<!-- Flot plugins -->
<script src="/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
<script src="/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
<script src="/vendors/flot.curvedlines/curvedLines.js"></script>
<!-- DateJS -->
<script src="/vendors/DateJS/build/date.js"></script>
<!-- JQVMap -->
<script src="/vendors/jqvmap/dist/jquery.vmap.js"></script>
<script src="/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
<script src="/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
<!-- bootstrap-daterangepicker -->
<script src="/vendors/moment/min/moment.min.js"></script>
<script src="/js/select2.min.js"></script>
{{--<script src="/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>--}}
<!-- Custom Theme Scripts -->

<script>

    $(".js-select-search").select2({
        placeholder: "Pasirinkite klientą...",
        minimumInputLength: 2,

        ajax: {
            url: function(params) {
                return '/orders/find/' + params.term;
            },
            delay: 250,
            dataType: 'json',
            data: function (params) {
                return {
                    q: $.trim(params.term)
                };
            },
            processResults: function (data) {
                console.log(data);
                return {
                    results: data

                };

            },

            cache: true
        }
    });

//    $(".js-select-search2").on('change', function(data) {
//        // Access to full data
//        var value = $(this).val();
//        console.log(data[0].name);
//        document.querySelector('#test').textContent = vardas;
//    });

//    $('.js-select-search2').on('change', function() {
//        var id = $(this).val();
//        alert(id);
//    });

//    $('.js-select-search2').on('select2:select', function(){
//        $('#test').attr('value', this.name);
//        console.log('value');
//
//    });


//    var selected = $('#test').val();
////////////////////////////////////////////////////////////////////////
//    $(".js-select-search2").on('change', function(e) {
//        var id = $(this).val();
//
//        $.ajax({
//
//            url: '/clients/info/' + params.id,
//                dataType: 'json',
//                data: function (params) {
//                return {
//                    q: $.trim(params.term)
//                };
//            },
//            processResults: function (data) {
//                console.log(data);
//                return {
//                    results: data
//                };
//
//            },
//
//            cache: true
//        });
//
//        document.querySelector('#test').textContent = id;
//    });
//////////////////////////////////////////////////////////////////////////
//I6 dalies veikiantis

    ///////////////////////////////////////////////////////
    $(".js-select-search2").on('change', function(e) {
        var id = $(this).val();

        $.ajax({
            url: '/clients/info/6', // This is the url we gave in the route
            dataType: 'json',
            success: function (data) {
                console.log(data.name);
                document.querySelector('#test').textContent = data.name;
            }
        });
    });



</script>
<script src="/js/custom.js"></script>