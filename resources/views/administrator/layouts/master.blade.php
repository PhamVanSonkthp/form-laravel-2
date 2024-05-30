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
{{--    <link rel="shortcut icon" href="{{ env('APP_URL') . \App\Models\Helper::logoImagePath() }}">--}}
    <link rel="shortcut icon" href="{{ \App\Models\Helper::logoImagePath() }}">

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
    <link rel="stylesheet"
          href="{{asset('/assets/administrator/NobleUI/assets/vendors/flag-icon-css/css/flag-icon.min.css')}}">
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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
          integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
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
            border: 1px solid #e9ecef;
        }


        .table-bordered > thead > tr > th {
            cursor: pointer;
        }

        .item-search-method{
            cursor: pointer;
        }

        .item-search-method:hover{
            background-color: #d5d5d5;
        }

        #container_search_method{
            overflow: hidden;
        }

        .container-search-method{
            display: none;
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


    <div class="container-search-method" id="bg" style="top: 60px;position: absolute;width: 100%;height: 100%;background: #2b3d53;z-index: 999;opacity: 0.95;filter: blur(8px);-webkit-filter: blur(8px);">

    </div>

    <div class="container-search-method" id="container_search_method"
         style="left:240px;width: 80vw;height: 80vh; position: absolute; z-index: 1000;background-color: white; top: 60px;border-radius: 21px;">
        <div style="height: 100%;overflow: auto;" id="container_search_method_item">



        </div>
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

<script src="{{asset('vendor/tinymce/tinymce.min.js') }}"></script>
<script src="{{asset('vendor/sweet-alert-2/sweetalert2@11.js')}}"></script>
<script src="{{asset('vendor/select2/select2.min.js')}}"></script>
<script type="text/javascript" src="{{asset('vendor/datetimepicker/moment.min.js')}}"></script>
<script type="text/javascript" src="{{asset('vendor/datetimepicker/daterangepicker.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/helper/main_helper.js')}}"></script>

<script>

    function onLinkMethod(e) {
        let a = $(e).children('a')[0];

        window.location.href = $(a).attr('href')
    }

    function onSearchMethod(){
        $('#container_search_method_item').html('')

        const value = toNonAccentVietnamese($('#input_search_method').val().toLowerCase())

        if (value){
            $('.container-search-method').show()
        }else{
            $('.container-search-method').hide()
        }

        let is_have_data = false

        $(".nav-item").each(function () {
            const parent = $(this);
            const element = parent.children('a')[0];

            if (element) {

                let span = $(element).children('span');

                if ($(span).html()){
                    if (toNonAccentVietnamese($(span).html().toLowerCase()).includes(value)) {

                        $('#container_search_method_item').append(`<div class="item-search-method p-3" onclick="onLinkMethod(this)">
                            <a href="${$(element).attr('href')}" style="color: black;font-size: 21px;">
                                ${$(span).html()}
                            </a>
                        </div>`)

                        is_have_data = true;
                    }
                }


            }
        });

        if (!is_have_data){
            $('#container_search_method_item').append(`<div class="item-search-method p-3">
                            <a href="#" style="color: red;font-size: 21px;">
                                Không có dữ liệu
                            </a>
                        </div>`)
        }
    }

    $(document).ready(function () {
        $(".nav-item").each(function () {
            const parent = $(this);
            parent.removeClass('active')
            const element = parent.children('a')[0];

            if (element) {
                if (window.location.href.includes($(element).attr('href'))) {
                    parent.addClass('active')

                    $('#container_slidebar').animate({scrollTop: parent.offset().top - 200}, '1500');

                    return
                }
            }
        });


        $('#bg').on('click', function(e) {
            if (e.target === this) {
                $('.container-search-method').hide()
            }

        });


    });


</script>
@yield('js')

</body>


</html>
