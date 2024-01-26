<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <title>Admin & Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Admin Infinity Ltd" name="description">
    <meta content="Pham Son" name="author">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ env('APP_URL') . \App\Models\Helper::logoImagePath() }}">

    @yield('title')

    <!-- Google font-->
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <!-- End fonts -->

{{--    <link rel="stylesheet" type="text/css" href="{{asset('/assets/administrator/css/vendors/font-awesome.css')}}">--}}
{{--    <!-- ico-font-->--}}
{{--    <link rel="stylesheet" type="text/css" href="{{asset('/assets/administrator/css/vendors/icofont.css')}}">--}}
{{--    <!-- Themify icon-->--}}
{{--    <link rel="stylesheet" type="text/css" href="{{asset('/assets/administrator/css/vendors/themify.css')}}">--}}
{{--    <!-- Flag icon-->--}}
{{--    <link rel="stylesheet" type="text/css" href="{{asset('/assets/administrator/css/vendors/flag-icon.css')}}">--}}
{{--    <!-- Feather icon-->--}}
{{--    <link rel="stylesheet" type="text/css" href="{{asset('/assets/administrator/css/vendors/feather-icon.css')}}">--}}
{{--    <!-- Plugins css start-->--}}
{{--    <link rel="stylesheet" type="text/css" href="{{asset('/assets/administrator/css/vendors/scrollbar.css')}}">--}}
{{--    <link rel="stylesheet" type="text/css" href="{{asset('/assets/administrator/css/vendors/date-picker.css')}}">--}}
{{--    <link rel="stylesheet" type="text/css" href="{{asset('/assets/administrator/css/vendors/owlcarousel.css')}}">--}}
{{--    <link rel="stylesheet" type="text/css" href="{{asset('/assets/administrator/css/vendors/prism.css')}}">--}}
{{--    <link rel="stylesheet" type="text/css" href="{{asset('/assets/administrator/css/vendors/whether-icon.css')}}">--}}
{{--    <!-- Bootstrap css-->--}}
{{--    <link rel="stylesheet" type="text/css" href="{{asset('/assets/administrator/css/vendors/bootstrap.css')}}">--}}
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/administrator/css/vendors/jquery-ui.css')}}">

    <!-- NobleUI css start-->

    <!-- inject:css -->
    <link rel="stylesheet" href="{{asset('/assets/administrator/NobleUI/assets/fonts/feather-font/css/iconfont.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/administrator/NobleUI/assets/vendors/flag-icon-css/css/flag-icon.min.css')}}">
    <!-- endinject -->

    <!-- core:css -->
    <link rel="stylesheet" href="{{asset('/assets/administrator/NobleUI/assets/vendors/core/core.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/administrator/NobleUI/assets/css/demo1/style.css')}}">
    <!-- endinject -->

    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{asset('/assets/administrator/NobleUI/assets/vendors/flatpickr/flatpickr.min.css')}}">
    <!-- End plugin css for this page -->

    <!-- NobleUI css end-->

{{--    <link rel="stylesheet" type="text/css" href="{{asset('/vendor/datatable/datatables.css')}}">--}}
{{--    <link rel="stylesheet" type="text/css" href="{{asset('/vendor/owlcarousel/owlcarousel.css')}}">--}}
{{--    <link rel="stylesheet" type="text/css" href="{{asset('/vendor/rating/rating.css')}}">--}}

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" media="all" href="{{asset('vendor/datetimepicker/daterangepicker.css')}}"/>
    <link rel="stylesheet" type="text/css" media="all" href="{{asset('vendor/select2/select2.min.css')}}"/>
{{--    <!-- Plugins css Ends-->--}}
{{--    <!-- App css-->--}}
{{--    <link rel="stylesheet" type="text/css" href="{{asset('/assets/administrator/css/style.css')}}">--}}
{{--    <link id="color" rel="stylesheet" href="{{asset('/assets/administrator/css/color-1.css')}}" media="screen">--}}
{{--    <!-- Responsive css-->--}}
{{--    <link rel="stylesheet" type="text/css" href="{{asset('/assets/administrator/css/responsive.css')}}">--}}

{{--    <link rel="stylesheet" type="text/css" href="{{asset('/assets/administrator/css/order-image.css')}}" >--}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <!-- core:js -->
    <script src="{{asset('/assets/administrator/NobleUI/assets/vendors/core/core.js')}}"></script>
    <!-- endinject -->

    <script src="{{asset('/assets/administrator/js/jquery-3.5.1.min.js')}}"></script>
    <script src="{{asset('/assets/administrator/js/jquery.ui.min.js')}}"></script>
{{--    <script src="{{asset('/vendor/jquery-ui-1.13.2/jquery-ui.js')}}"></script>--}}

    <script src="{{asset('/vendor/masknumber/jquery.masknumber.js')}}"></script>


    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

    @include('administrator.components.helper')


    <style>
        .select2-container .select2-selection--single {
            height: 38px;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 19px;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 38px;
        }

        .select2-container--default .select2-selection--single .select2-selection__clear {
            height: 38px;
        }

        .select2-container--default .select2-selection--single {
            border: 1px solid white;
        }


        .table-bordered > thead > tr > th{
            cursor: pointer;
        }

    </style>
    @yield('css')
</head>

<body>

<!-- Loader starts-->
<div class="main-wrapper">


    @include('administrator.components.slidebars')

<!-- page-wrapper Start-->
    <div class="page-wrapper">

        @include('administrator.components.header')

    <!-- Page Body Start-->
        <div class="page-content">
            <!-- Page Sidebar Start-->

                @yield('content')

        </div>

        <!-- footer start-->

            @include('administrator.components.footer')
    </div>


</div>

<!--Modal-->

<div class="modal fade" id="modal_audit" tabindex="-1" aria-labelledby="changeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Lịch sử</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="content_modal_audit">


            </div>

        </div>
    </div>
</div>



<!-- Plugin js for this page -->
<script src="{{asset('/assets/administrator/NobleUI/assets/vendors/flatpickr/flatpickr.min.js')}}"></script>
<script src="{{asset('/assets/administrator/NobleUI/assets/vendors/apexcharts/apexcharts.min.js')}}"></script>
{{--<!-- End plugin js for this page -->--}}

{{--<!-- inject:js -->--}}
<script src="{{asset('/assets/administrator/NobleUI/assets/vendors/feather-icons/feather.min.js')}}"></script>
<script src="{{asset('/assets/administrator/NobleUI/assets/js/template.js')}}"></script>
<!-- endinject -->

<!-- Custom js for this page -->
{{--<script src="{{asset('/assets/administrator/NobleUI/assets/js/dashboard-light.js')}}"></script>--}}
<!-- End custom js for this page -->

<!-- Bootstrap js-->
{{--<script src="{{asset('/assets/administrator/js/bootstrap/bootstrap.bundle.min.js')}}"></script>--}}
{{--<!-- feather icon js-->--}}
{{--<script src="{{asset('/assets/administrator/js/icons/feather-icon/feather.min.js')}}"></script>--}}
{{--<script src="{{asset('/assets/administrator/js/icons/feather-icon/feather-icon.js')}}"></script>--}}
<!-- scrollbar js-->
{{--<script src="{{asset('/assets/administrator/js/scrollbar/simplebar.js')}}"></script>--}}
{{--<script src="{{asset('/assets/administrator/js/scrollbar/custom.js')}}"></script>--}}
{{--<!-- Sidebar jquery-->--}}
{{--<script src="{{asset('/assets/administrator/js/config.js')}}"></script>--}}
{{--<!-- Plugins JS start-->--}}
{{--<script src="{{asset('/assets/administrator/js/sidebar-menu.js')}}"></script>--}}
{{--<script src="{{asset('/assets/administrator/js/prism/prism.min.js')}}"></script>--}}
{{--<script src="{{asset('/assets/administrator/js/counter/jquery.waypoints.min.js')}}"></script>--}}
{{--<script src="{{asset('/assets/administrator/js/counter/jquery.counterup.min.js')}}"></script>--}}
{{--<script src="{{asset('/assets/administrator/js/counter/counter-custom.js')}}"></script>--}}
{{--<script src="{{asset('/assets/administrator/js/datepicker/date-picker/datepicker.js')}}"></script>--}}
{{--<script src="{{asset('/assets/administrator/js/datepicker/date-picker/datepicker.en.js')}}"></script>--}}
{{--<script src="{{asset('/assets/administrator/js/datepicker/date-picker/datepicker.custom.js')}}"></script>--}}
{{--<script src="{{asset('/assets/administrator/js/owlcarousel/owl.carousel.js')}}"></script>--}}
{{--<script src="{{asset('/assets/administrator/js/general-widget.js')}}"></script>--}}
{{--<script src="{{asset('/assets/administrator/js/tooltip-init.js')}}"></script>--}}
{{--<script src="{{asset('/vendor/datatable/datatables.min.js')}}"></script>--}}

<!-- Plugins JS Ends-->

<!-- Plugin used-->
{{--<script src="{{asset('/vendor/rating/jquery.barrating.js')}}"></script>--}}
{{--<script src="{{asset('/vendor/rating/rating-script.js')}}"></script>--}}
{{--<script src="{{asset('/vendor/ecommerce.js')}}"></script>--}}
{{--<script src="{{asset('/vendor/product-list-custom.js')}}"></script>--}}
{{--<script src="{{asset('/vendor/script.js')}}"></script>--}}
{{--<script src="{{asset('/vendor/theme-customizer/customizer.js')}}"></script>--}}

<!-- Theme js-->
{{--<script src="{{asset('/assets/administrator/js/script.js')}}"></script>--}}
{{--<script src="{{asset('/assets/administrator/js/theme-customizer/customizer.js')}}"></script>--}}

<script src="{{asset('vendor/tinymce/tinymce.min.js') }}"></script>
<script src="{{asset('vendor/sweet-alert-2/sweetalert2@11.js')}}"></script>
<script src="{{asset('vendor/select2/select2.min.js')}}"></script>
<script type="text/javascript" src="{{asset('vendor/datetimepicker/moment.min.js')}}"></script>
<script type="text/javascript" src="{{asset('vendor/datetimepicker/daterangepicker.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/helper/main_helper.js')}}"></script>

@yield('js')

</body>


</html>
