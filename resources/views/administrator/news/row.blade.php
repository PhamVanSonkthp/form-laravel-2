<tr id="container_row_{{$item->id}}">
    <th><input id="check_box_delete_all" type="checkbox" class="checkbox-parent" onclick="onSelectCheckboxDeleteItem()"></th>
    <td>{{$item->id}}</td>
    <td>{{$item->title}}</td>
    <td>
        <img class="rounded-circle" src="{{$item->avatar()}}" alt="">
    </td>
    <td>{{ optional($item->category)->name}}</td>
    <td>{{\App\Models\Formatter::getDateTime($item->created_at)}}</td>
    <td>

        @include('administrator.components.action_table', ['prefixView' => $prefixView, '$item' => $item])

    </td>
</tr>
