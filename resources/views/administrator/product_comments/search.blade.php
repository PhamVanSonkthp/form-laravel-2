<div>
    @include('administrator.components.search')

    <a href="{{route('administrator.'.$prefixView.'.create')}}" class="btn btn-outline-success float-end"><i
            class="fa-solid fa-plus"></i></a>

    <a href="{{route('administrator.'.$prefixView.'.export')}}" class="btn btn-outline-primary float-end me-2" data-bs-original-title="" title="Export excel"><i class="fa-sharp fa-solid fa-file-excel"></i></a>
</div>

<div class="clearfix"></div>

<div class="row">

    <div class="col-md-3">
        <div>
            @include('administrator.components.search_select2_allow_clear' , ['name' => 'product_comment_status_id' , 'label' => 'Trạng thái', 'select2Items' => \App\Models\ProductCommentStatus::all()])
        </div>
    </div>

    <div class="col-md-3">
        <div>
            @include('administrator.components.search_select2_allow_clear' , ['name' => 'product_id' , 'label' => 'Sản phẩm', 'select2Items' => \App\Models\Product::where('product_visibility_id',2)->latest()->get()])
        </div>
    </div>

</div>


<script>

    // function onSearchQuery() {
    //     addUrlParameterObjects([
    //         {name: "search_query", value: $('#input_search_query').val()},
    //         {name: "from", value: input_query_from},
    //         {name: "to", value: input_query_to},
    //     ])
    // }

</script>
