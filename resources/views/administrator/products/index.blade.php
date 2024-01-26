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
                                <tbody>
                                @foreach($items as $index => $item)
                                    <tr>
                                        <td class="text-center">
                                            <input type="checkbox" class="checkbox-delete-item" value="{{$item->id}}">
                                        </td>
                                        <td>{{$item->id}}</td>
                                        <td>
                                            <p>
                                                {{\App\Models\Formatter::getShortDescriptionAttribute($item->name, 10)}}
                                            </p>

                                            @if(!empty($item->sku))
                                                <p>
                                                    [{{$item->sku}}]
                                                </p>
                                            @endif
                                        </td>
                                        <td>
                                            <img class="rounded-circle" src="{{$item->avatar()}}" alt="">
                                        </td>
                                        <td>
                                            {{optional($item->category)->name}}
                                        </td>
                                        <td>
                                            <input class="input-product-is-feature" type="checkbox"
                                                   {{$item->is_feature ? 'checked' : ''}} value="{{$item->id}}">
                                        </td>
                                        <td>
                                            @if($item->isProductVariation())
                                                @foreach($item->attributes() as $key => $itemAttribute)
                                                    <div class="row mt-2" data-id="{{$itemAttribute['id']}}">
                                                        <div class="col-4">
                                                            <div>
                                                                {{$itemAttribute['size']}}, {{$itemAttribute['color']}}
                                                            </div>
                                                        </div>
                                                        <div class="col-2">
                                                            <input
                                                                oninput="onChangeInventory('{{$itemAttribute['id']}}','inventory' ,this.value)"
                                                                type="text" autocomplete="off"
                                                                class="form-control number"
                                                                value="{{\App\Models\Formatter::formatNumber($itemAttribute['inventory'])}}">
                                                        </div>
                                                        <div class="col-2">
                                                            <input
                                                                oninput="onChangeInventory('{{$itemAttribute['id']}}','price_client', this.value)"
                                                                type="text" autocomplete="off"
                                                                class="form-control number"
                                                                value="{{\App\Models\Formatter::formatMoney(optional(\App\Models\Product::find($itemAttribute['id']))->price_client)}}">
                                                        </div>
                                                        <div class="col-2">
                                                            <input
                                                                oninput="onChangeInventory('{{$itemAttribute['id']}}','price_agent', this.value)"
                                                                type="text" autocomplete="off"
                                                                class="form-control number"
                                                                value="{{\App\Models\Formatter::formatMoney(optional(\App\Models\Product::find($itemAttribute['id']))->price_agent)}}">
                                                        </div>
                                                        <div class="col-2">
                                                            <input
                                                                oninput="onChangeInventory('{{$itemAttribute['id']}}','price_partner', this.value)"
                                                                type="text" autocomplete="off"
                                                                class="form-control number"
                                                                value="{{\App\Models\Formatter::formatMoney(optional(\App\Models\Product::find($itemAttribute['id']))->price_partner)}}">
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @else
                                                <div class="row mt-2" data-id="{{$item->id}}">
                                                    <div class="col-4">
                                                        <div>

                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <input
                                                            oninput="onChangeInventory('{{$item->id}}','inventory', this.value)"
                                                            type="text" autocomplete="off" class="form-control number"
                                                            value="{{\App\Models\Formatter::formatNumber($item->inventory)}}">
                                                    </div>
                                                    <div class="col-2">
                                                        <input
                                                            oninput="onChangeInventory('{{$item->id}}','price_client', this.value)"
                                                            type="text" autocomplete="off" class="form-control number"
                                                            value="{{\App\Models\Formatter::formatMoney($item->price_client)}}">
                                                    </div>
                                                    <div class="col-2">
                                                        <input
                                                            oninput="onChangeInventory('{{$item->id}}','price_agent', this.value)"
                                                            type="text" autocomplete="off" class="form-control number"
                                                            value="{{\App\Models\Formatter::formatMoney($item->price_agent)}}">
                                                    </div>
                                                    <div class="col-2">
                                                        <input
                                                            oninput="onChangeInventory('{{$item->id}}','price_partner', this.value)"
                                                            type="text" autocomplete="off" class="form-control number"
                                                            value="{{\App\Models\Formatter::formatMoney($item->price_partner)}}">
                                                    </div>
                                                </div>
                                            @endif
                                        </td>
                                        <td>
                                            <a class="btn btn-outline-secondary btn-sm edit" title="Sửa"
                                               href="{{route('administrator.'.$prefixView.'.edit' , ['id'=> $item->id])}}"
                                               data-id="{{$item->id}}"><i class="fa-solid fa-pen"></i></a>

                                            <a href="{{route('administrator.'.$prefixView.'.delete' , ['id'=> $item->id])}}"
                                               title="Xóa"
                                               data-url="{{route('administrator.'.$prefixView.'.delete' , ['id'=> $item->id])}}"
                                               class="btn btn-outline-danger btn-sm delete action_delete">
                                                <i class="fa-solid fa-x"></i>
                                            </a>

                                            <a href="{{route('administrator.'.$prefixView.'.audit' , ['id'=> $item->id])}}"
                                               title="Lịch sử tác động"
                                               data-url="{{route('administrator.'.$prefixView.'.audit' , ['id'=> $item->id])}}"
                                               class="btn btn-outline-info btn-sm action_audit">
                                                <i class="fa-solid fa-circle-info"></i>
                                            </a>

                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
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

