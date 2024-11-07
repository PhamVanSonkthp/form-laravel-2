<div class="table-responsive product-table">
    <table class="table table-bordered">
        <thead style="background-color: aliceblue;">
        <tr>
            <th>{{$header1}}</th>
            @if($header2 && count($values2) > 0)
            <th>{{$header2}}</th>
            @endif
            <th>Giá</th>
            <th>Kho hàng</th>
            <th>SKU</th>
        </tr>
        </thead>

        <tbody>

        @foreach($values1 as $value)

            @if($value != '')

            <tr>
                <td rowspan="{{count($values2) > 0 ? count($values2) : 1}}">
                    <div class="text-center">
                        {{$value}}
                    </div>
                </td>
                @if($header2 && count($values2) > 0)
                    <td>
                        {{$values2[0]}}
                    </td>
                @endif
                <td>
                    @include('administrator.components.require_input_number' , ['name' => 'prices','value' => ''])
                </td>
                <td>
                    @include('administrator.components.require_input_number' , ['name' => 'inventories','value' => ''])
                </td>
                <td>
                    @include('administrator.components.input_text' , ['name' => 'skus','value' => '', 'class' => 'skus'])
                </td>
            </tr>

            @if($header2 && count($values2) > 0)
                @foreach($values2 as $index => $value2)

                    @if($value2 != '' && $index > 0)

                    <tr>

                        <td>
                            {{$value2}}
                        </td>
                        <td>
                            <input type="text" class="form-control" placeholder="Nhập" required/>
                        </td>
                        <td>
                            <input type="text" class="form-control" placeholder="Nhập" required/>
                        </td>
                        <td>
                            <input style="min-width: 100px;" type="text" class="form-control" placeholder="Nhập" required/>
                        </td>
                    </tr>

                    @endif

                @endforeach
            @endif

            @endif


        @endforeach


        </tbody>
    </table>
</div>
