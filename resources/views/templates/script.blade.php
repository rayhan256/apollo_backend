<!--   Core JS Files   -->
<script src="{{ asset('/assets/js/core/jquery.min.js') }}"></script>
<script src="{{ asset('/assets/js/core/popper.min.js') }}"></script>
<script src="{{ asset('/assets/js/core/bootstrap.min.js') }}"></script>
<script src="{{ asset('/assets/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
<!-- Chart JS -->
<script src="{{ asset('/assets/js/plugins/chartjs.min.js') }}"></script>
<!--  Notifications Plugin    -->
<script src="{{ asset('/assets/js/plugins/bootstrap-notify.js') }}"></script>
<!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
<script src="{{ asset('/assets/js/now-ui-dashboard.min.js?v=1.5.0') }}" type="text/javascript"></script>
<!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
<script src="{{ asset('/assets/demo/demo.js') }}"></script>
<script src="{{ asset('/tagsinput/bootstrap-tagsinput.js') }}"></script>
@production
    <script src="{{ secure_asset('/assets/js/core/jquery.min.js') }}"></script>
    <script src="{{ secure_asset('/assets/js/core/popper.min.js') }}"></script>
    <script src="{{ secure_asset('/assets/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ secure_asset('/assets/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
    <!-- Chart JS -->
    <script src="{{ secure_asset('/assets/js/plugins/chartjs.min.js') }}"></script>
    <!--  Notifications Plugin    -->
    <script src="{{ secure_asset('/assets/js/plugins/bootstrap-notify.js') }}"></script>
    <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ secure_asset('/assets/js/now-ui-dashboard.min.js?v=1.5.0') }}" type="text/javascript"></script>
    <!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
    <script src="{{ secure_asset('/assets/demo/demo.js') }}"></script>
    <script src="{{ secure_asset('/tagsinput/bootstrap-tagsinput.js') }}"></script>
@endproduction

<script>
    $(document).ready(function() {
        // Javascript method's body can be found in assets/js/demos.js
        demo.initDashboardPageCharts();

    });
</script>
