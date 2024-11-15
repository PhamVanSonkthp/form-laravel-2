@extends('administrator.layouts.master')

@include('administrator.'.$prefixView.'.header')

@section('css')

@endsection

@section('content')

    <div class="container-fluid list-products">
        <div class="row">
            <!-- Individual column searching (text inputs) Starts-->
            <div class="col-12">

                <div class="card">

                    <div class="card-header">
                        @include('administrator.'.$prefixView.'.search')
                    </div>

                    <div class="card-body">

                        @include('administrator.components.checkbox_delete_table')

                        <div class="table-responsive product-table">
                            <table class="table table-hover table-bordered">
                                <thead>
                                <tr>
                                    <th><input id="check_box_delete_all" type="checkbox" class="checkbox-parent"
                                               onclick="onSelectCheckboxDeleteItem()"></th>
                                    <th>#</th>
                                    <th>Tên</th>
                                    <th>Hình ảnh</th>
                                    <th>Danh mục</th>
                                    <th>Xu hướng?</th>
                                    <th width="50%">
                                        <div class="row">
                                            <div class="col-4">
                                                Phân loại
                                            </div>
                                            <div class="col-2">
                                                Tồn kho
                                            </div>
                                            <div class="col-2">
                                                Giá bán lẻ
                                            </div>
                                            <div class="col-2">
                                                Giá bán buôn
                                            </div>
                                            <div class="col-2">
                                                Giá bán CTV
                                            </div>
                                        </div>
                                    </th>
                                    <th>Hành động</th>
                                </tr>
                                </thead>
                                <tbody class="" id="body_container_item">
                                @foreach($items as $index => $item)
                                    @include('administrator.'.$prefixView.'.row', ['item' => $item, 'index' => $index])
                                @endforeach

                                </tbody>

                                <tfoot>
                                <tr>
                                    <th><input id="check_box_delete_all_footer" type="checkbox" class="checkbox-parent" onclick="onSelectCheckboxDeleteItemFooter()"></th>
                                    <th>#</th>
                                    <th>Tên</th>
                                    <th>Hình ảnh</th>
                                    <th>Danh mục</th>
                                    <th>Xu hướng?</th>
                                    <th width="50%">
                                        <div class="row">
                                            <div class="col-4">
                                                Phân loại
                                            </div>
                                            <div class="col-2">
                                                Tồn kho
                                            </div>
                                            <div class="col-2">
                                                Giá bán lẻ
                                            </div>
                                            <div class="col-2">
                                                Giá bán buôn
                                            </div>
                                            <div class="col-2">
                                                Giá bán CTV
                                            </div>
                                        </div>
                                    </th>
                                    <th>Hành động</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div>
                            @include('administrator.components.footer_table')
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

@endsection

@section('js')
    <script>
        function onChangeInventory(id, key, value) {

            callAjax(
                "PUT",
                "{{route('ajax.administrator.products.update')}}",
                {
                    id: id,
                    [key]: value,
                },
                (response) => {

                    showToastSuccess()

                },
                (error) => {

                },
                false,
            )
        }

        $('.input-product-is-feature').change(function () {

            callAjax(
                "PUT",
                "{{route('ajax.administrator.products.update')}}",
                {
                    id: $(this).val(),
                    'is_feature': this.checked ? 1 : 0,
                },
                (response) => {
                    showToastSuccess()
                },
                (error) => {

                },
                false,
            )
        });


    </script>


@endsection

