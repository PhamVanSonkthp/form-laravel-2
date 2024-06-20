<tr id="container_row_{{$item->id}}">
    <td class="text-center">
        <input type="checkbox" class="checkbox-delete-item" value="{{$item->id}}">
    </td>
    <td>{{$item->id}}</td>
    <td>{{$item->name}}</td>
    <td>
        <strong>
            {{$item->code}}
        </strong>
    </td>
    <td>{{\App\Models\Formatter::getDateTime($item->begin)}}</td>
    <td>{{\App\Models\Formatter::getDateTime($item->end)}}</td>
    <td>{{\App\Models\Formatter::formatNumber($item->used)}}</td>
    <td>{{\App\Models\Formatter::formatNumber($item->max_use_by_time)}}</td>
    <td>{{$item->textTypeVoucher()}}</td>
    <td>
        @if($item->typeVoucher() == 1)
            {{\App\Models\Formatter::formatMoney($item->discount_amount)}}
        @else
            Giảm: {{\App\Models\Formatter::formatNumber($item->discount_percent)}}% - Giảm tối đa: {{\App\Models\Formatter::formatMoney($item->max_discount_percent_amount)}}
        @endif
    </td>
    <td>
        @include('administrator.components.action_table', ['prefixView' => $prefixView, '$item' => $item])
    </td>
</tr>
