<div>
    @include('administrator.components.search')

    <a class="btn btn-outline-success float-end" data-bs-toggle="modal" data-bs-target="#createModal"><i
            class="fa-solid fa-plus"></i></a>

{{--    <a href="{{route('administrator.user_transactions.export')}}" class="btn btn-outline-primary float-end me-2" data-bs-original-title="" title="Export excel"><i class="fa-sharp fa-solid fa-file-excel"></i></a>--}}
{{--    <button onclick="exportExcel()" class="btn btn-primary float-end me-2 " title="Export excel"><i class="fa-sharp fa-solid fa-file-excel"></i></button>--}}

    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-3">
            <div class="mt-3">
                <label>Khách hàng</label>
                <select name="user_id" class="form-control select2_init_allow_clear">
                    <option value=""></option>
                    @foreach($users as $itemUser)
                        <option value="{{$itemUser->id}}" {{request('user_id') == $itemUser->id ? 'selected' : ''}}>#{{$itemUser->id}} - {{$itemUser->name}} - {{$itemUser->phone}}</option>
                    @endforeach
                </select>

            </div>
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

    $('select[name="user_id"]').on('change', function () {
        addUrlParameter('user_id', this.value)
    });
    $('select[name="money"]').on('change', function () {
        addUrlParameter('type_money', this.value)
    });
    function exportExcel(){
        window.location.href = "{{route('administrator.user_transactions.export')}}" + window.location.search
    }

</script>
