@extends('administrator.layouts.master')

@include('administrator.'.$prefixView.'.header')

@section('css')

@endsection

@section('content')

    <div class="container-fluid list-products">
        <div class="row">
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
                                    <th><input id="check_box_delete_all" type="checkbox" class="checkbox-parent" onclick="onSelectCheckboxDeleteItem()"></th>
                                    <th onclick='onSortSearch(`id`, `{{ \App\Models\Helper::getValueInFilterReuquest('id') == "" ? "asc" : (\App\Models\Helper::getValueInFilterReuquest('id') != "desc" ? "desc" : "") }}`)'>
                                        <div>
                                            # {!! \App\Models\Helper::getValueInFilterReuquest('id') == "" ? '<i class="fa-solid fa-sort"></i>' : (\App\Models\Helper::getValueInFilterReuquest('id') != "desc" ? '<i class="fa-solid fa-arrow-up-a-z text-success"></i>' : '<i class="fa-solid fa-arrow-down-z-a text-danger"></i>') !!}
                                        </div>
                                    </th>
                                    <th onclick='onSortSearch(`vn_name`, `{{ \App\Models\Helper::getValueInFilterReuquest('vn_name') == "" ? "asc" : (\App\Models\Helper::getValueInFilterReuquest('vn_name') != "desc" ? "desc" : "") }}`)'>
                                        <div>
                                            Tên ngắn {!! \App\Models\Helper::getValueInFilterReuquest('vn_name') == "" ? '<i class="fa-solid fa-sort"></i>' : (\App\Models\Helper::getValueInFilterReuquest('vn_name') != "desc" ? '<i class="fa-solid fa-arrow-up-a-z text-success"></i>' : '<i class="fa-solid fa-arrow-down-z-a text-danger"></i>') !!}
                                        </div>
                                    </th>
                                    <th onclick='onSortSearch(`short_name`, `{{ \App\Models\Helper::getValueInFilterReuquest('short_name') == "" ? "asc" : (\App\Models\Helper::getValueInFilterReuquest('short_name') != "desc" ? "desc" : "") }}`)'>
                                        <div>
                                            Tên {!! \App\Models\Helper::getValueInFilterReuquest('short_name') == "" ? '<i class="fa-solid fa-sort"></i>' : (\App\Models\Helper::getValueInFilterReuquest('short_name') != "desc" ? '<i class="fa-solid fa-arrow-up-a-z text-success"></i>' : '<i class="fa-solid fa-arrow-down-z-a text-danger"></i>') !!}
                                        </div>
                                    </th>

                                    <th>Hình ảnh</th>
                                    <th onclick='onSortSearch(`is_active`, `{{ \App\Models\Helper::getValueInFilterReuquest('is_active') == "" ? "asc" : (\App\Models\Helper::getValueInFilterReuquest('is_active') != "desc" ? "desc" : "") }}`)'>
                                        <div>
                                            Hoạt động {!! \App\Models\Helper::getValueInFilterReuquest('is_active') == "" ? '<i class="fa-solid fa-sort"></i>' : (\App\Models\Helper::getValueInFilterReuquest('is_active') != "desc" ? '<i class="fa-solid fa-arrow-up-a-z text-success"></i>' : '<i class="fa-solid fa-arrow-down-z-a text-danger"></i>') !!}
                                        </div>
                                    </th>

                                    <th>Api Web2m</th>
                                    <th>Thời gian tạo</th>
                                    <th>Hành động</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($items as $item)
                                    @include('administrator.'.$prefixView.'.row', ['item' => $item, 'prefixView' => $prefixView])
                                @endforeach

                                </tbody>

                                <tfoot>
                                <tr>
                                    <th>

                                    </th>
                                    <th>#</th>
                                    <th>Tên</th>
                                    <th>Tên ngắn</th>
                                    <th>Hình ảnh</th>
                                    <th>Hoạt động</th>
                                    <th>Api Web2m</th>
                                    <th>Thời gian tạo</th>
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

@endsection

