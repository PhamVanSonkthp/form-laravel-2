@extends('administrator.layouts.master')

@include('administrator.'.$prefixView.'.header')

@section('css')


@endsection

@section('content')

    <div class="container-fluid list-products">

        <form action="{{route('administrator.'.$prefixView.'.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-xxl-6">
                    <div class="card">
                        <div class="card-body">
                            @include('administrator.components.require_input_text' , ['name' => 'name' , 'label' => 'Tên'])

                            @include('administrator.components.require_input_datetime' , ['name' => 'begin' , 'label' => 'Ngày bắt đầu'])

                            @include('administrator.components.require_input_datetime' , ['name' => 'end' , 'label' => 'Ngày kết thúc'])

                            @include('administrator.components.require_check_box' , ['name' => 'is_active' , 'label' => 'Hoạt động?'])

                            @if($isSingleImage)
                                <div class="mt-3 mb-3">
                                    @include('administrator.components.upload_image', ['post_api' => $imagePostUrl, 'table' => $table, 'image' => $imagePathSingple , 'relate_id' => $relateImageTableId])
                                </div>
                            @endif

                            @if($isMultipleImages)
                                <div class="mt-3 mb-3">
                                    @include('administrator.components.upload_multiple_images', ['post_api' => $imageMultiplePostUrl, 'delete_api' => $imageMultipleDeleteUrl , 'sort_api' => $imageMultipleSortUrl, 'table' => $table , 'images' => $imagesPath,'relate_id' => $relateImageTableId])
                                </div>
                            @endif

                            {{--                            @include('administrator.components.textarea_description', ['name' => 'description' , 'label' => 'Mô tả'])--}}

                            @include('administrator.components.button_save')
                        </div>
                    </div>
                </div>

                <div class="col-md-6">

                    <div class="card">

                        <div class="form-group mt-3">
                            <label>Sản phẩm <span class="text-danger">*</span></label>
                            <input id="input_search_product" type="text" autocomplete="off" name="name"
                                   class="form-control " value="" oninput="onSearchProduct()"
                                   required="" data-bs-original-title="" title="" placeholder="Tên, code, id, sku, ...">
                        </div>

                        <div id="container_result_search">

                        </div>

                        <div class="card-body">

                            <div class="table-responsive product-table">
                                <table class="table table-hover table-bordered">
                                    <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Sản phẩm</th>
                                        <th>Thuộc tính</th>
                                        <th>Đơn giá</th>
                                        <th>Số lượng</th>
                                        <th>Tổng</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody id="container_products">

                                    </tbody>

                                    <tbody id="container_voucher" style="display: none">
                                    <tr>
                                        <td colspan="5">
                                            <strong class="text-danger">
                                                Mã giảm giá
                                            </strong>
                                        </td>

                                        <td class="text-end" colspan="2">
                                            <strong class="text-warning" id="label_amount_discount">
                                                0
                                            </strong>
                                        </td>
                                    </tr>
                                    </tbody>

                                    <tbody>
                                    <tr>
                                        <td colspan="4">
                                            <strong class="text-danger">
                                                Tổng
                                            </strong>
                                        </td>
                                        <td class="text-end">
                                            <strong id="total_number">
                                                0
                                            </strong>
                                        </td>
                                        <td class="text-end" colspan="2">
                                            <strong class="text-danger" id="total_price">
                                                0
                                            </strong>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </form>

    </div>

@endsection

@section('js')


    <script>

        let keywordSearch = "";
        let discount = 0;

        function onSearchProduct() {
            keywordSearch = $('#input_search_product').val()

            if (keywordSearch.length) {

                callAjax(
                    "GET",
                    "{{route('ajax.administrator.products.search')}}",
                    {
                        'search_query': keywordSearch,
                    },
                    (response) => {
                        if (keywordSearch) {
                            if (keywordSearch == response.search_query) {
                                $('#container_result_search').html(response.html)
                            }
                        } else {
                            $('#container_result_search').html("")
                        }
                    },
                    (error) => {

                    },
                    false,
                )

            } else {
                $('#container_result_search').html("")
            }
        }

        function renderSTT() {
            $('.index_product').each(function(i, obj) {
                $(obj).html(i + 1)
            });


        }

        function renderTotalPrice() {

            let totalNumberProduct = 0;
            let totalPriceProduct = 0;

            var ek=[];
            $('.prices').each(function() { ek.push($(this).html()); });


            $('#input_voucher').prop('disabled', ek.length == 0);


            $('.input_products').each(function(i, obj) {
                totalNumberProduct += tryParseInt($(obj).val())
                totalPriceProduct += tryParseInt(ek[i])
            });

            totalPriceProduct -= discount

            $('#total_number').html(totalNumberProduct)
            $('#total_price').html(formatMoney(totalPriceProduct) + "đ")
        }

        function onAddProduct(id, name, variation , price) {


            if ($('#row_product_id_' + id).html()){
                $('#input_number_product_' + id).val(tryParseInt($('#input_number_product_' + id).val()) + 1)

                onChangeNumberProduct(id)
            }else{
                $('#container_products').append(`<tr id="row_product_id_${id}">

                                    <td class="index_product">
                                        1
                                    </td>

                                    <td>
                                        <input class="product_ids d-none" value="${id}"/>
                                        ${name}
                                    </td>
                                    <td>
                                        ${variation}
                                    </td>

                                    <td id="price_product_${id}">
                                        ${formatMoney(price)}
                                    </td>

                                    <td>
                                        <input id="input_number_product_${id}" type="text" class="form-control number input_products quantities" value="1" oninput="onChangeNumberProduct('${id}')">
                                    </td>

                                    <td>
                                        <strong id="total_row_product_${id}" class="prices">${formatMoney(price)}</strong>

                                    </td>
                                    <td>

                                        <a
                                           class="btn btn-outline-danger btn-sm" onclick="onDeleteProduct('row_product_id_${id}')">
                                            <i class="fa-solid fa-x"></i>
                                        </a>

                                    </td>
                                </tr>`)
            }



            renderSTT()
            renderTotalPrice()
        }

        function onDeleteProduct(id) {
            $('#' + id).remove()
            renderSTT()
            renderTotalPrice()
        }

        function onChangeNumberProduct(id) {
            const number = tryParseInt(getOnlyNumber($('#input_number_product_' + id).val()))

            $('#total_row_product_' + id).html(formatMoney(number * tryParseInt($('#price_product_' + id).html())))
            renderTotalPrice()
        }

        function onCreateOrder() {

            const product_ids = [];
            const quantities = [];

            $('.product_ids').each(function() {
                product_ids.push($(this).val());
            });

            $('.quantities').each(function() { quantities.push($(this).val()); });

            if (product_ids.length == 0) return showToastError("Vui lòng chọn sản phẩm")

            callAjax(
                "POST",
                "{{route('ajax.administrator.orders.store')}}",
                {
                    product_ids: product_ids,
                    quantities: quantities,
                    user_id: $('select[name="user_id"]').val(),
                    voucher_id: $('#input_voucher').val(),
                    shipping_fee: $('#input_shipping_fee').val(),
                },
                (response) => {

                    Swal.fire({
                        title: 'Tạo đơn thành công',
                        allowOutsideClick: false,
                        showDenyButton: true,
                        showCancelButton: true,
                        confirmButtonText: `Tạo đơn mới`,
                        denyButtonText: `Quay lại`,
                        cancelButtonText: `In đơn`,
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "{{route('administrator.orders.create')}}"
                        } else if (result.isDenied) {
                            window.location.href = "{{route('administrator.orders.index')}}"
                        }else{
                            const url = "{{ env('APP_URL') . "/administrator/orders/print/" }}" + response.id;

                            window.open(url, '_blank').focus();

                            window.location.reload()
                        }
                    })

                    console.log(response)

                },
                (error) => {

                },
                true,
            )

        }

        function onApplyVoucher() {

            const product_ids = [];

            $('.product_ids').each(function() {
                product_ids.push($(this).val());
            });

            if (product_ids.length == 0) return

            const code = $('#input_voucher').val()

            if (code.length == 0) {
                $('#container_voucher').hide()
                $('#lable_message_voucher').html("")
                discount = 0
                return
            }

            callAjax(
                "POST",
                "{{route('ajax.administrator.voucher.check_with_products')}}",
                {
                    voucher_id: code,
                    product_ids: product_ids,
                },
                (response) => {
                    $('#container_voucher').show()
                    $('#label_amount_discount').html("-" + formatMoney(response.discount))
                    $('#lable_message_voucher').html("Giảm: " + formatMoney(response.discount))
                    $('#lable_message_voucher').addClass("text-success")
                    $('#lable_message_voucher').removeClass("text-danger")
                    discount = response.discount
                    renderTotalPrice()
                    console.log(response)

                },
                (error) => {
                    console.log(error)
                    $('#container_voucher').hide()
                    $('#lable_message_voucher').html(error.responseJSON['data']['message'])
                    $('#lable_message_voucher').addClass("text-danger")
                    $('#lable_message_voucher').removeClass("text-success")
                    discount = 0
                    renderTotalPrice()
                },
                true,
                false,
                false,
            )
        }
    </script>

@endsection

