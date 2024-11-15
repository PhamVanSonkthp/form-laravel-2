<tr class="" id="tr_container_index_{{$index}}" data-id="{{$item->id}}">
    <td class="text-center">
        <input type="checkbox" class="checkbox-delete-item" value="{{$item->id}}">
    </td>
    <td>
        @include('administrator.components.sort_icon_for_table', ['prefixView' => $prefixView])

        {{$item->id}}
    </td>
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
        @include('administrator.components.action_table', ['prefixView' => $prefixView, '$item' => $item])

    </td>
</tr>
